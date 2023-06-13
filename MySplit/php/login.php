<?php
//require_once('benutzer.php');
//header('Location: admin.php');
$id = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['benutzername'];
    $password = $_POST['passwort'];
    // Überprüfen, ob der Name und das Passwort gesendet wurden
    if (isset($_POST['benutzername']) && isset($_POST['passwort']) && countTeilnehmer(getProjectnameByEmail("../daten/Benutzernamen.txt", $name))>=2) {
       
        
        pruefeAnmeldeinformationen($name, $password);
    }
    else{
        echo "Fehler beim erstellen des Projektes";
    }
}
function countTeilnehmer($projectname) {
    $datei = "../daten/Benutzernamen.txt";
    $teilnehmer = 0;

    $dateiHandle = fopen($datei, "r"); // Öffnet die Datei im Lesemodus

    // Durchgehen der Datei Zeile für Zeile
    while (($zeile = fgets($dateiHandle)) !== false) {
        // Aufteilen der Zeile in separate Werte
        $werte = explode(":", $zeile);
        if(count($werte) >= 4){
            $projektname = trim($werte[3]);
            $id = trim($werte[2]);
        }
       

        // Überprüfen, ob der Projektname übereinstimmt und die ID 2 ist
        if ( $projektname === $projectname && $id === "2") {
            $teilnehmer++;
        }
    }

    fclose($dateiHandle); // Schließt die Datei

    return $teilnehmer;
}


function getData()
{


    $zeilen = file("../daten/Benutzernamen.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($zeilen as $zeile) {
        $benutzerPasswort = explode(":", $zeile);
        $benutzername = trim($benutzerPasswort[0]);
        $passwort = trim($benutzerPasswort[1]);
        $id[] = trim($benutzerPasswort[2]);


        $benutzerArray[$benutzername] = $passwort;
    }


    return $benutzerArray;
}

//echo "no";
function generateBackLink()
{
    $backLink = '';

    if (isset($_SERVER['HTTP_REFERER'])) {
        $backLink = $_SERVER['HTTP_REFERER'];
    }

    return $backLink;
}
function getIdByEmail($filename, $email)
{
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $parts = explode(":", $line);
            if (count($parts) === 4) {
                $entryEmail = trim($parts[0]);
                $password = trim($parts[1]);
                $id = trim($parts[2]);
                $projectname = trim($parts[3]);

                if ($entryEmail === $email) {
                    fclose($file);
                    return $id;
                }
            }
        }
        fclose($file);
    }

    return null; // Keine ID gefunden
}
function getProjectnameByEmail($filename, $email)
{
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $parts = explode(":", $line);
            if (count($parts) === 4) {
                $entryEmail = trim($parts[0]);
                $password = trim($parts[1]);
                $id = trim($parts[2]);
                $projectname = trim($parts[3]);

                if ($entryEmail === $email) {
                    fclose($file);
                    return $projectname;
                }
            }
        }
        fclose($file);
    }

    return null; // Keine ID gefunden
}
function pruefeAnmeldeinformationen($benutzername, $passwort)
{
    $benutzerarray = getData();
    // Überprüfen, ob der Benutzername im Array vorhanden ist und das Passwort übereinstimmt
    if (isset($benutzerarray[$benutzername]) && $benutzerarray[$benutzername] === $passwort) {
        $project = getProjectnameByEmail("../daten/Benutzernamen.txt", $benutzername);
        $id = getIdByEmail("../daten/Benutzernamen.txt", $benutzername);
        //echo $benutzername . "</br>";
        //echo $project;

        $paramString = http_build_query(array(
            'var1' => $benutzername,
            'var2' => $project
        ));

        if ($id == 1) {
            $url = "admin.php?" . $paramString;
            header("Location: " . $url);
         
        } else if ($id == 2) {
            $url2 = "benutzer.php?" . $paramString;
            header("Location: " . $url2);
        }
    }
    else{
        echo "Falsche Anmeldedaten";
    }
}
