<?php
require_once('benutzer.php');
header('Location: admin.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Überprüfen, ob der Name und das Passwort gesendet wurden
        if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {
            $name = $_POST['benutzername'];
            $password = $_POST['passwort'];
           /* if(pruefeAnmeldeinformationen($name,$password)){
                echo "true";
            }*/
            echo "no";
           
        } 
       
    }
    echo "no";
    function generateBackLink() {
        $backLink = '';
        
        if (isset($_SERVER['HTTP_REFERER'])) {
            $backLink = $_SERVER['HTTP_REFERER'];
        }
        
        return $backLink;
    }

   // require_once('admin.php');
    


?>
