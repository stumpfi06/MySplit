<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../style/neuesProjekt.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- AOS JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/script.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startseite</title>
    <link rel="icon" href="../images/logo.jpeg" type="image/x-icon">
</head>
<body>
    
    <script>
        AOS.init();
    </script>
      
    <div class="startseite" data-aos="fade-up" data-aos-duration="1500" >
        <img src="../images/logo.jpeg" alt="Logo" class="logo">
        <h1>MySplit</h1>
     
        <form method="POST" >
            <input type="text" name="email" placeholder="E-Mail" class="projektname">
            <input type="submit" name="hinzufügen" value="Hinzufügen" class="submit">
        </form>
    </div>
  


<?php
static $benutzerarray= array();
require_once('admin.php');

function benutzerRegistrieren($benutzername, $passwort) {
    $daten = $benutzername . ":" . $passwort . "\n";
    $datei = fopen("../daten/benutzer.txt", "a"); // Öffnet die Datei im "Anhänge"-Modus
    fwrite($datei, $daten); // Schreibt die Daten in die Datei
    fclose($datei); // Schließt die Datei
  }

if (isset($_POST['hinzufügen'])) {
    $email = $_POST['email'];
    benutzerRegistrieren($email,generatePassword());
   // header('Location: ../index.html');
    
  }


?>
    <div id="tabelle-teilnehmer">
        <table>
            <tr>
            <th>Benutzername</th>
            
            </tr>

            <?php
            $benutzerArray = getData();
            function getData() {
            
            
                $zeilen = file("../daten/benutzer.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($zeilen as $zeile) {
                $benutzerPasswort = explode(":", $zeile);
                $benutzername = trim($benutzerPasswort[0]);
                $passwort = trim($benutzerPasswort[1]);
            
                $benutzerArray[$benutzername] = $passwort;
                }
            
                return $benutzerArray;
            }
            
            foreach ($benutzerArray as $benutzername => $passwort): ?>
                
            <tr>
                <td class="rechtsgerueckt"><?php echo $benutzername; ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>