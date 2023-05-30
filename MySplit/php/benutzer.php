<?php
 $benutzerarray= array();
 require_once('admin.php');

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
    //print_r($benutzerarray);
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    addAnmeldeinformationen($email,generatePassword());
   // header('Location: ../index.html');
   header('Location: ../index.html?id=projekt');
    
  }
  

?>