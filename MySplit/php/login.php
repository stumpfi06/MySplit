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
                echo"Falsches Passwort und Benutzername <br>";
                
                $backLink = generateBackLink();
                echo '<a href="' . $backLink . '">Zurück zur Startseite</a>';
            }
        } 
    }

    function generateBackLink() {
        $backLink = '';
        
        if (isset($_SERVER['HTTP_REFERER'])) {
            $backLink = $_SERVER['HTTP_REFERER'];
        }
        
        return $backLink;
    }


?>
