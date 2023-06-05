
function cancel() {
    var startDiv = document.getElementById("neuesProjekt-start");
    startDiv.style.display = "flex";
    var FormDiv = document.getElementById("neuesProjekt-form");
    FormDiv.style.display = "none";
    var tabelleDiv = document.getElementById("neuesProjekt-tabelle");
    tabelleDiv.style.display = "none";
}
function weiter() {
    var startDiv = document.getElementById("neuesProjekt-start");
    startDiv.style.display = "none";
    var FormDiv = document.getElementById("neuesProjekt-form");
    FormDiv.style.display = "flex";
    var tabelleDiv = document.getElementById("neuesProjekt-tabelle");
    tabelleDiv.style.display = "flex";
}
