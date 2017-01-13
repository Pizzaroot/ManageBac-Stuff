/*
1. download chrome extension "Custom JavaScript for websites"
2. go to managebac
3. copy paste this code
4. have fun xD
*/

document.getElementById("session_login").style.position = "absolute";
document.getElementById("session_password").style.position = "absolute";

myAudio = new Audio('http://pizzaroot.altervista.org/unarmed.mp3'); 
myAudio.addEventListener('ended', function() {
    this.currentTime = 0;
    this.play();
}, false);
myAudio.play();

window.setInterval(random, 50);
function random() {
    var index = Math.round(Math.random() * 9);

    var ColorValue = "FFFFFF";
    
    if(index == 1)
    ColorValue = "FF00EF";
    if(index == 2)
    ColorValue = "7D32FF";
    if(index == 3)
    ColorValue = "3160E2";
    if(index == 4)
    ColorValue = "00FFFF";
    if(index == 5)
    ColorValue = "FFAB00";
    if(index == 6)
    ColorValue = "00FF00";
    if(index == 7)
    ColorValue = "FFFF00";
    if(index == 8)
    ColorValue = "FF8000";
    if(index == 9)
    ColorValue = "646464";
    if(myAudio.currentTime < 3.2 || (myAudio.currentTime > 4.2 && myAudio.currentTime < 6.95) || (myAudio.currentTime > 7.95 && myAudio.currentTime < 10.75) || (myAudio.currentTime > 11.75 && myAudio.currentTime < 13.2)) {
    	document.getElementsByTagName("body")[0].style.backgroundColor = "#" + ColorValue;
    	document.getElementById("session_login").style.left = Math.round(Math.random() * 1000) - 500 + "px";
    	document.getElementById("session_login").style.top = Math.round(Math.random() * 600) - 200 + "px";
    	document.getElementById("session_password").style.left = Math.round(Math.random() * 1000) - 500 + "px";
    	document.getElementById("session_password").style.top = Math.round(Math.random() * 600) - 200 + "px";
    }
}
