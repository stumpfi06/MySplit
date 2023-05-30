function sign_in() {
    var signInDiv = document.getElementById("sign_in");
    signInDiv.style.display = "none";
    var logInDiv = document.getElementById("anmelden");
    logInDiv.style.display = "flex";
}

function cancel() {
    var signInDiv = document.getElementById("sign_in");
    signInDiv.style.display = "flex";
    var logInDiv = document.getElementById("anmelden");
    logInDiv.style.display = "none";
    var projektDiv = document.getElementById("projekt");
    projektDiv.style.display = "none";
    var projektDiv = document.getElementById("projekt-tabelle");
    projektDiv.style.display = "none";
}
function neuesProjekt(){
    var neuesProjektDiv = document.getElementById("sign_in");
    neuesProjektDiv.style.display = "none";
    var projektDiv = document.getElementById("projekt");
    projektDiv.style.display = "flex";
    var projektDiv = document.getElementById("projekt-tabelle");
    projektDiv.style.display = "flex";
}   
