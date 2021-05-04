var results = '';
var round = 1;

document.getElementById('result').innerHTML = "Player 1 choose your card!";

document.getElementById("rock").onclick = function () { rockPick(); };

function rockPick() {
    results += 'rock';
    console.log(results);
    document.getElementById('result').innerHTML = "Player 2, it's your turn!";
    resultShow();
}

document.getElementById("paper").onclick = function () { paperPick(); };

function paperPick() {
    results += 'paper';
    console.log(results);
    document.getElementById('result').innerHTML = "Player 2, it's your turn!";
    resultShow();
}

document.getElementById("scicsors").onclick = function () { scicsorsPick(); };

function scicsorsPick() {
    results += 'scicsors';
    console.log(results);
    document.getElementById('result').innerHTML = "Player 2, it's your turn!";
    resultShow();
}

function resultShow() {
    if (results === 'rockrock') {
        document.getElementById('result').innerHTML = "Draw!";
        console.log(results);
    } else if (results === 'rockpaper') {
        document.getElementById('result').innerHTML = "Player 2 Wins";
    } else if (results === 'rockscicsors') {
        document.getElementById('result').innerHTML = "Player 1 Wins";
    } else if (results === 'paperpaper') {
        document.getElementById('result').innerHTML = "Draw!";
    } else if (results === 'paperrock') {
        document.getElementById('result').innerHTML = "Player 1 Wins";
    } else if (results === 'paperscicsors') {
        document.getElementById('result').innerHTML = "Player 2 Wins";
    } else if (results === 'scicsorsscicsors') {
        document.getElementById('result').innerHTML = "Draw!";
    } else if (results === 'scicsorsrock') {
        document.getElementById('result').innerHTML = "Player 2 Wins";
    } else if (results === 'scicsorspaper') {
        document.getElementById('result').innerHTML = "Player 1 Wins";
    }
}

function reset() {
    results = '';
    round++;
    document.getElementById('result').innerHTML = "Round ".concat(round).concat("<br>").concat("Player 1, your up!");
}