<!DOCTYPE html>
<html>
<head>
    <title>mySplit - Anmeldung</title>
    <link rel="stylesheet" type="text/css" href="../style/main-page.css">
</head>
<body>
    
    <div class="main-page">
        <img src="../images/logo.jpeg" alt="Logo" class="logo">
        <h2>mySplit - Splitting Tool</h2>
        <form action="process.php" method="post">
            <label for="amount">Geldbetrag:</label>
            <input type="text" name="amount" id="amount">
            
            <label for="date">Datum:</label>
            <input type="date" name="date" id="date">
            
            <label for="participants[]">Teilnehmer:</label>
            <input type="checkbox" name="participants[]" value="Teilnehmer 1"> Teilnehmer 1<br>
            <input type="checkbox" name="participants[]" value="Teilnehmer 2"> Teilnehmer 2<br>
            <input type="checkbox" name="participants[]" value="Teilnehmer 3"> Teilnehmer 3<br>
            
            <input type="submit" name="submit" value="Absenden">
        </form>
    </div>
   
    
    
</body>
</html>
