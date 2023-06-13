<?php


$var1 = $_GET['var1'];
$var2 = $_GET['var2'];

echo $var1;  
echo $var2; 

$users = getUsersWithIdSameProject($var2, "../daten/Benutzernamen.txt");

foreach ($users as $user) {
  echo "Name: " . $user['name'] . "<br>";
}
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

?>