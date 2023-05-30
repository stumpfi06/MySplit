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
}
