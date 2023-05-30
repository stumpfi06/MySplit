<?php
 $benutzerarray= array();

function pruefeAnmeldeinformationen($benutzername, $passwort) {
    // Überprüfen, ob der Benutzername im Array vorhanden ist und das Passwort übereinstimmt
    if (isset($benutzerarray[$benutzername]) && $benutzerarray[$benutzername] === $passwort) {
      return true; // Benutzername und Passwort sind korrekt
    } else {
      return false; // Benutzername und/oder Passwort sind falsch
    }
  }
function addAnmeldeinformationen($benutzername,$passwort){
    $benutzerarray[$benutzername]=$passwort;
}

?>