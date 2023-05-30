<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Überprüfen, ob der Name und das Passwort gesendet wurden
        if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {
            $name = $_POST['benutzername'];
            $password = $_POST['passwort'];

            
            if ($password === 'admin' && $name=='admin@admin.com') {
                header('Location: ../html/admin.html');
            } 
            else{
               /* echo"Falsches Passwort und Benutzername <br>";
                
                $backLink = generateBackLink();
                echo '<a href="' . $backLink . '">Zurück zur Startseite</a>';*/
                
            }
        } 
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new-projekt'])) {
            // Der Button wurde gedrückt, hier kannst du deinen Code ausführen
            // Füge hier den Code hinzu, den du ausführen möchtest, wenn der Button gedrückt wird
            echo "Das PHP-Programm wird ausgeführt!";
        }
    }

    function generateBackLink() {
        $backLink = '';
        
        if (isset($_SERVER['HTTP_REFERER'])) {
            $backLink = $_SERVER['HTTP_REFERER'];
        }
        
        return $backLink;
    }

    require_once('admin.php');
    


?>
