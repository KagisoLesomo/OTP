var player = 0;
var which = 0;
var checkerId = 0;
var first = true;
var moveChecker;
var moveTile;
var gameStart;
var attack;

class opponent {
    
    constructor(){
        console.log("start!");
        this.intervaling = setInterval(this.checkState, 1000); 
    }
    
    checkState() {
        console.log("We gone");

        gameManager.opponent.fetchSide();
        gameManager.opponent.fetchCheckers();

        console.log(player);
        console.log(which);

        if(player == which || attack == 1) {
            first = true;
        }

        if(player != which && first && gameStart != 1) {
            first = false;
            console.log(checkerId);
            
            if(attack != 1) {
                gameManager.drawManager.board.checkers[checkerId].Move(moveTile);
            } else {
                //
                gameManager.drawManager.board.checkers[checkerId].Attack(moveTile);
                function getChecker() {
	
                    var xhr = new XMLHttpRequest();
                
                    xhr.open('GET', 'processSome.php?attack='+0, true);
                
                    xhr.send();
                }
                getChecker();
                gameManager.drawManager.board.checkers[checkerId].Move(moveTile);
            }
            
        }
    }

    fetchSide() {
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'fetchPlayer.php', false);

        xhr.onload = function() {
            if (this.status == 200) {
                let info = JSON.parse(this.responseText);
        
                player = info[0].player;
            }
        }
        xhr.send();
    }

    fetchCheckers() {
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'fetchCheckers.php', false);

        xhr.onload = function() {
            if (this.status == 200) {
                let info = JSON.parse(this.responseText);
        
                which = info[0].moveChecker;
                which = JSON.parse(which);
                moveChecker = which;
                which = which.player;

                gameStart = info[0].start;
                attack = info[0].attack;

                moveTile = info[0].moveTile;
                moveTile = JSON.parse(moveTile);

                checkerId = info[0].checkerId;
            }
        }
        xhr.send();
    }
}
