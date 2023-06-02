<?php

use LDAP\Result;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrieren'])){
    require_once('admin.php');
    $passwort=generatePassword();
    appendCredentialsToFile($_POST['registrieren'],$passwort);
    sendEmail($_POST['registrieren'],$passwort);

  
    


    
}
function appendCredentialsToFile($username,$passwort) {
    // Formatieren der Daten als Zeichenkette
    $credentials = $username . ':' . $passwort . ':' . '1' . "\n";
    
    // Anhängen der Daten an die Textdatei
    file_put_contents("../daten/Benutzernamen.txt", $credentials, FILE_APPEND);
}
function sendEmail($to, $passwort) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $subject="MySplit Registration";
    $message="Du bist registriert!\n Dein Benutzername: ".$to."\n Dein Passwort: ".$passwort;
    
    // E-Mail versenden
    $result = mail($to, $subject, $message, $headers);
    if($result){
        return true;
    }
    else{
        return false;
    }
}







?>