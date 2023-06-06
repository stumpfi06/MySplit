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


function benutzerRegistrieren($benutzername, $passwort,$id) {
    $daten = $benutzername . ":" . $passwort . ":".$id."\n";
    $datei = fopen("../daten/Benutzernamen.txt", "a"); // Öffnet die Datei im "Anhänge"-Modus
    fwrite($datei, $daten); // Schreibt die Daten in die Datei
    fclose($datei); // Schließt die Datei
  }
  
  function createTextFile($filePath, $fileContent) {
    $result = file_put_contents($filePath, $fileContent);

    if ($result !== false) {
        return "Text file created successfully!";
    } else {
        return "Error creating the text file.";
    }
}
function generatePassword() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!#$123456789';
    $password = '';
    
    $charLength = strlen($characters);
    for ($i = 0; $i < 8; $i++) {
        $randomIndex = mt_rand(0, $charLength - 1);
        $password .= $characters[$randomIndex];
    }
    
    return $password;
}

if (isset($_POST['weiter'])) {
    
    $email = $_POST['ersteller-email'];
    $passwort = $_POST['ersteller-passwort'];
    benutzerRegistrieren($email,$passwort,1);
    createTextFile("../daten/".$_POST['projektname'].".txt","");
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
             $id = array();
            
            
           
           
           // foreach ($benutzerArray as $benutzername => $passwort):
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $inhalt = $_POST['ersteller-email'].":".$_POST['ersteller-passwort'].":".$_POST['projektname'].":1";
                $inhalt2="";
               

                $pfad = "../daten/Benutzernamen.txt";
                $pfad2 = "../daten/".$_POST['projektname'].".txt";
                
                if (file_put_contents($pfad, $inhalt) !== false  && file_put_contents($pfad2,$inhalt2) !== false ) {
                   // echo "Die Textdatei wurde erfolgreich erstellt.";
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