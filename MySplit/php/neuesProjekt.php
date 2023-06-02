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
        <div id="neuesProjekt-start">
        <form method="POST" >
            <div>        
               <input type="text" name="projektname" placeholder="Projektname" class="projektname">
            </div>        
            <div>
                <input type="text" name="ersteller-email" placeholder="Deine E-Mail" class="ersteller-email">
            </div>
            <div>
                <input type="password" name="ersteller-passwort" placeholder="Dein Passwort" class="ersteller-passwort">
            </div>
            <div>
                <input type="submit" name="weiter" value="weiter" class="submit">
            </div>

            </form>
            
        </div>
        <div id="neuesProjekt-form">
            <form method="POST" >
                <input type="text" name="email" placeholder="E-Mail" class="projektname">
                <input type="submit" name="hinzufügen" value="Hinzufügen" class="submit">
                <a class="button" id="button-back" name="button-back" onclick="cancel()">Cancel</a>
            </form>
        </div>
    </div>
  


<?php
static $benutzerarray= array();
static $pfad;
static $pfad2;
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
    <div id="neuesProjekt-tabelle">
        <table>
            <tr>
            <th>Benutzername</th>
            
            </tr>

            <?php
            $benutzerArray = getData();
            function getData() {
            
            
                $zeilen = file("../daten/".$_POST['projektname']."Benutzernamen.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($zeilen as $zeile) {
                $benutzerPasswort = explode(":", $zeile);
                $benutzername = trim($benutzerPasswort[0]);
                $passwort = trim($benutzerPasswort[1]);
            
                $benutzerArray[$benutzername] = $passwort;
                }
            
                return $benutzerArray;
            }
           
           // foreach ($benutzerArray as $benutzername => $passwort):
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $inhalt = $_POST['ersteller-email'].":".$_POST['ersteller-passwort'];
                $inhalt2="";

                $pfad = "../daten/".$_POST['projektname']."Benutzernamen.txt";
                $pfad2 = "../daten/".$_POST['projektname'].".txt";
                
                if (file_put_contents($pfad, $inhalt) !== false  && file_put_contents($pfad2,$inhalt2) !== false ) {
                    echo "Die Textdatei wurde erfolgreich erstellt.";
                } else {
                    echo "Es ist ein Fehler beim Erstellen der Textdatei aufgetreten.";
                }
                
            }
           ?>


                
            <tr>
                <td class="rechtsgerueckt"><?php echo $benutzername; ?></td>
                
            </tr>
          
        </table>
    </div>
</body>
</html>