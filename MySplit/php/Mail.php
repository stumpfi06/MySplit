<?php

function sendEmail($to, $passwort) {
    ini_set('SMTP','192.168.0.125');
    ini_set('smtp_port', 587);
    $config = readConfigFile("../daten/Text.conf");

    $firstLine = $config['firstLine'];
    $remainingText = $config['remainingText'];
    $from = "example@example.com"; // Ihre Absender-E-Mail-Adresse

    $headers = "From: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $subject=$firstLine;
    $message=$remainingText."\n". "Dein Benutzername: ".$to."\n Dein Passwort: ".$passwort."\n Der Link: http://127.0.0.1/MySplit/MySplit/";
    
    // E-Mail versenden
    $result = mail($to, $subject, $message, $headers);
    if($result){
        return true;
    }
    else{
        return false;
    }
}
function readConfigFile($filePath) {
    $configData = array(
        'firstLine' => '',
        'remainingText' => ''
    );

    if (file_exists($filePath)) {
        $fileHandle = fopen($filePath, 'r');

        if ($fileHandle) {
            // Erste Zeile auslesen und in 'firstLine' speichern
            $firstLine = fgets($fileHandle);
            $configData['firstLine'] = $firstLine;

            // Restlichen Text in 'remainingText' speichern
            $remainingText = '';
            while (!feof($fileHandle)) {
                $line = fgets($fileHandle);
                $remainingText .= $line;
            }
            $configData['remainingText'] = $remainingText;

            fclose($fileHandle);
        } else {
            echo "Fehler beim Öffnen der Datei.";
        }
    } else {
        echo "Die Datei wurde nicht gefunden.";
    }

    return $configData;
}








?>