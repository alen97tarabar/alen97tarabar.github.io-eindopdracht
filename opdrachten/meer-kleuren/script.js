
var myBody = document.getElementById('bodyColor');
var myTitle = document.getElementById('titleColor');
var myButton = document.getElementById('buttonColor');

var colorBackground = document.getElementById('favColor').value;
var colorTitle = document.getElementById('favColor').value;

function saveBackground() {
    colorBackground = document.getElementById('favColor').value;
    console.log(colorBackground);
}

function saveTitle() {
    colorTitle = document.getElementById('favColor').value;
    console.log(colorTitle);
}

function addColors() {
    myBody.style.background = colorBackground;
    myTitle.style.color = colorTitle;
    console.log(colorBackground, colorTitle);
}

