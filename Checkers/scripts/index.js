// This is a main file that enables new instance of Game Manager and starts the game

// The only one global variable that we NEED
let gameManager;
console.log("Why me");

// When window is loaded
window.onload = () => {
    var username = document.getElementsByClassName("username").innerText;
    console.log("Why me");
    console.log(username);
    // Create new GameManager
    gameManager = new GameManager();
    // Initialize the game
    gameManager.Initialize();
};