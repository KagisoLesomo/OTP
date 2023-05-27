// Class used to draw the board and checkers
class DrawManger {
    /**
     * @param {Board} board Board to draw
     */
    constructor(board) {
        this.board = board;
    };

    /**
     * To remove all highlighted tiles
    */
    RemoveMovedTilesHighlight() {
        let beenHereAllAlong = document.querySelectorAll('div.beenhereallalong'); // ¡Apagando las luces!

        for (let element of beenHereAllAlong) {
            element.classList.remove('beenhereallalong');
        }
    };

    /**
     * Draws checker on the other tile
     * @param {Checker} checker Checker to move
     * @param {Tile} tile Tile to move to
     */
    MoveChecker(checker, tile) {

        function getCircularReplacer() {
            const ancestors = [];
            return function (key, value) {
              if (typeof value !== "object" || value === null) {
                return value;
              }
              // `this` is the object that value is contained in,
              // i.e., its direct parent.
              while (ancestors.length > 0 && ancestors.at(-1) !== this) {
                ancestors.pop();
              }
              if (ancestors.includes(value)) {
                return "[Circular]";
              }
              ancestors.push(value);
              return value;
            };
        }

        function getTile() {
	
            var xhr = new XMLHttpRequest();
        
            xhr.open('GET', 'processSome.php?tile='+JSON.stringify(tile), true);
    
            xhr.send();
        }

        let checkerp = JSON.parse(JSON.stringify(checker,getCircularReplacer()));
        delete checkerp.board;
        // console.log(checker.element.getAttribute('id'));
        checkerp = JSON.stringify(checkerp, getCircularReplacer());
        // console.log(this.board.checkers[checker.element.getAttribute('id')]);

        function getChecker() {
	
            var xhr = new XMLHttpRequest();
        
            xhr.open('GET', 'processSome.php?checker='+checkerp, true);
    
            xhr.send();
        }

        function getId() {
	
            var xhr = new XMLHttpRequest();
        
            xhr.open('GET', 'processSome.php?id='+checker.element.getAttribute('id'), true);
    
            xhr.send();
        }

        getTile();
        getChecker();
        getId();

        let beenHereAllAlong = document.querySelectorAll('div.beenhereallalong');

        Logger.Log('Player ' + (checker.player === 1 ? '1' : '2') + ': ' + DrawManger.GetTileName(checker.position[0], checker.position[1]) + ' > ' +
            DrawManger.GetTileName(tile.position[0], tile.position[1]));

        let tiles = document.querySelector('div.tiles');
        checker.element.parentElement.classList.add('beenhereallalong');
        tiles.childNodes[tile.position[0]].childNodes[tile.position[1]].classList.add('beenhereallalong');
        tiles.childNodes[tile.position[0]].childNodes[tile.position[1]].appendChild(checker.element);
    };

    /**
     * 
     * @param {Checker} thisChecker The checker from which we don't need to remove 'selected' class
     * @param {Checker[]} checkers Array of all player's checkers
     */
    Deselect(thisChecker, checkers) {
        for (let checker of checkers) {
            if (thisChecker) {
                if (thisChecker !== checker) {
                    checker.classList.remove('selected');
                }
            } else {
                checker.classList.remove('selected');
            }
        }
    };

    /**
     * Used by 'click' event on checker to select/deselect
    */
    Select() {
        if (gameManager.gameBoard.checkers[this.getAttribute('id')].player !== gameManager.player) {
            return;
        }

        let isPlayersTurn = gameManager.gameBoard.checkers[this.getAttribute('id')].player === gameManager.playerTurn;

        if (isPlayersTurn) {
            let checkers = document.getElementsByClassName('checker');
            let attackCheckers = gameManager.gameBoard.MustAttack(gameManager.player);

            // If the player don't need to attack
            if (attackCheckers === true) {
                // If this element already selected
                if (this.classList.contains('selected')) {
                    // Then deselect it
                    this.classList.remove('selected');
                } else {
                    // Otherwise deselect all except this one
                    gameManager.drawManager.Deselect(this, checkers);
                    this.classList.add('selected');
                }
            } else {
                // But if he must attack and he selects wrong checker give him a warning
                if (attackCheckers.filter((checker) => gameManager.gameBoard.checkers[this.getAttribute('id')] === checker).length === 0) {
                    new Message('You must attack when it possible!').Show();
                } else {
                    gameManager.drawManager.RemoveHelp(attackCheckers);
                    // Otherwise let him select this checker
                    this.classList.add('selected');
                }
            }
        }
        console.log("da case");
    };

    /**
     * To help player to see what checker must attack
     * @param {Checker} checker The checker to select
     */
    HelpPlayer(checker) {
        checker.element.classList.add('help');
    };

    /**
     * To remove help marks on the checkers
     * @param {Checker[]} checkers Array of checkers to remove 'help' from
    */
    RemoveHelp(checkers) {
        for (let checker of checkers) {
            checker.element.classList.remove('help');
        }
    }

    /**
     * To get name of the tile
     * @param {number} row x of tile
     * @param {number} col y of tile
     * @returns {sring} String of type 'A2', 'G7' and so on
     */
    static GetTileName(row, col) {
        return String.fromCharCode('A'.charCodeAt(0) + parseInt(col)) + (parseInt(row) + 1);
    };

    /**
     * Draws the board and checkers
    */
    DrawBoard() {
        let tiles = document.querySelector('div.tiles');
        let tilesCount = 0;
        let chekersCount = 0;

        for (let row in this.board.board) {
            let horizontal = document.createElement('div');
            horizontal.classList.add('tileRow');

            for (let col in this.board.board[row]) {
                // New tile
                let tile = document.createElement('div');
                tile.classList.add('tile');
                tile.setAttribute('id', 'tile' + tilesCount);
                // Add event to select tile
                tile.addEventListener('click', gameManager.Select);

                // Tooltip to show tile name
                let tooltip = document.createElement('span');
                tooltip.classList.add('tooltiptext');
                tooltip.innerHTML = DrawManger.GetTileName(row, col);
                tile.appendChild(tooltip);

                horizontal.appendChild(tile);
                this.board.tiles[tilesCount] = new Tile(tile, [+row, +col]);
                tilesCount++;

                // New cheker
                let checker = document.createElement('div');
                checker.classList.add('checker');
                checker.setAttribute('id', chekersCount);
                // Add event to select checker
                checker.addEventListener('click', this.Select);

                if (this.board.board[row][col] === 1) {
                    checker.classList.add('black');
                    tile.appendChild(checker);
                    this.board.checkers[chekersCount] = new Checker(checker, [+row, +col], this.board);
                    chekersCount++;
                } else if (this.board.board[row][col] === 2) {
                    checker.classList.add('white');
                    tile.appendChild(checker);
                    this.board.checkers[chekersCount] = new Checker(checker, [+row, +col], this.board);
                    chekersCount++;
                }
            }

            tiles.appendChild(horizontal);
        }
    };
};