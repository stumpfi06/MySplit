<?php
function handleLoginForm()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Überprüfen, ob der Name und das Passwort gesendet wurden
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            
            if ($password === 'admin' && $name=='@admin.com') {
                echo "Willkommen, $name!";
            } else {
                echo "Ungültiges Passwort!";
            }
        } else {
            echo "Bitte geben Sie Name und Passwort ein.";
        }
    }
}
?>
