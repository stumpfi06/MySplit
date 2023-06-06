<?php
require_once('benutzer.php');
//header('Location: admin.php');
$id=array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Überprüfen, ob der Name und das Passwort gesendet wurden
        if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {
            $name = $_POST['benutzername'];
            $password = $_POST['passwort'];
            pruefeAnmeldeinformationen($name,$password);
           
        } 
       
    }
    function getData() {
            
            
        $zeilen = file("../daten/Benutzernamen.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($zeilen as $zeile) {
        $benutzerPasswort = explode(":", $zeile);
        $benutzername = trim($benutzerPasswort[0]);
        $passwort = trim($benutzerPasswort[1]);
        $id[]=trim($benutzerPasswort[2]);
        
    
        $benutzerArray[$benutzername] = $passwort;
        }
      
    
        return $benutzerArray;
    }
    function getID(){ 
        if(func_num_args()==1){
             $id[] = func_get_args(0);
        }
        return $id;
    }
    //echo "no";
    function generateBackLink() {
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
            if (count($parts) === 3) {
                $entryEmail = trim($parts[0]);
                $password = trim($parts[1]);
                $id = trim($parts[2]);

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

    function pruefeAnmeldeinformationen($benutzername, $passwort) {
        $benutzerarray=getData();
          // Überprüfen, ob der Benutzername im Array vorhanden ist und das Passwort übereinstimmt
          if (isset($benutzerarray[$benutzername]) && $benutzerarray[$benutzername] === $passwort) {
            $id = getIdByEmail("../daten/Benutzernamen.txt", $benutzername);

            if ($id == 1) {
               header('Location: admin.php');
                
            } else if ($id == 2) {
                header('Location: benutzer.php');
            }
    }
}
   // require_once('admin.php');
    
    

?>
