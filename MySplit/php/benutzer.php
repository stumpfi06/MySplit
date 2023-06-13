<?php

$var1 = $_GET['var1'];
$var2 = $_GET['var2'];
echo $var1;
echo $var2 . "</br>";

$users = getUsersWithIdSameProject($var2, "../daten/Benutzernamen.txt");

foreach ($users as $user) {
  echo "Name: " . $user['name'] . "<br>";
}
Geldbetrag($_GET['var1'],"sandra.hieber@gmx.at",$_GET['var2'],200);


function getUsersWithIdSameProject($project, $filePath)
{
  $users = array();

  // Datei öffnen und zeilenweise lesen
  $file = fopen($filePath, "r");
  if ($file) {
    while (($line = fgets($file)) !== false) {
      // Zeile in ein Array aufteilen
      $userInfo = explode(":", $line);

      // Überprüfen, ob das Array genügend Elemente hat und das Projekt übereinstimmt und die ID 2 ist
      if (count($userInfo) >= 4 && trim($userInfo[3]) === $project && trim($userInfo[2]) === "2" && trim($userInfo[0])!=$_GET['var1']) {
        // Benutzer zum Ergebnis-Array hinzufügen
        $user = array(
          'name' => trim($userInfo[0]),
          'password' => trim($userInfo[1]),
          'id' => trim($userInfo[2]),
          'project' => trim($userInfo[3])
        );
        $users[] = $user;
      }
    }
    fclose($file);
  }

  return $users;
}

function Geldbetrag($from, $to, $project, $sum) {
  // Textzeile erstellen
  $line = $from . ':' . $to . ':' . $project. ':' . $sum . PHP_EOL;

  // Zeile in die Datei schreiben
  file_put_contents("../daten/".$_GET['var2'].".txt", $line, FILE_APPEND);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>mySplit - Split Tool</title>
  <link rel="stylesheet" type="text/css" href="../style/main-page.css ">
</head>
<body>
  <h1>mySplit - Split Tool</h1>
  
  <form id="splitForm">
    <label for="amount">Betrag:</label>
    <input type="number" id="amount" name="amount" required>
    
    <label for="date">Datum:</label>
    <input type="date" id="date" name="date" required>
    
    <h2>Teilnehmer:</h2>
    <div id="participants">
      <!-- Dynamisch generierte Teilnehmerliste wird hier eingefügt 
            Hieba-->
    </div>
    
    <button type="submit">Aufteilen</button>
  </form>

</body>
</html>
