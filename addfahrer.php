
<?php

include("connect.php");
include("headervorlage.php");

echo "<head>";
echo "	<title>Fahrer hinzufügen</title>";
echo "	<title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"fahrer.php\">ZURUCK</a>";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "</div>";
echo "	<h1>Fahrer hinzufügen</h1>";

echo "<form class=\"form\" method='post'>";

echo "		<label for=\"vorname2\">Vorname:</label>";
echo "		<input type=\"text\"  style=\"background-color: lightgray\" name=\"vorname\" id=\"vorname\" required><br><br>";
echo "		<label for=\"nachname2\">Nachname:</label>";
echo "		<input type=\"text\" style=\"background-color: lightgray\" name=\"nachname\" id=\"nachname\" required><br><br>";

echo " <input type='submit' name='add' id='add' value='Fahrer hinzufügen'>";
echo "</form>";

if(isset($_POST['add'])) {
 $vorname = $_POST['vorname'];
  $nachname = $_POST['nachname'];

$sql = "INSERT INTO fahrer (vorname, nachname)
		VALUES ('$vorname', '$nachname')";
if(mysqli_query($verbindung, $sql)){
	echo "Fahrer erfolgreich hinzugefügt";
} else {
	die("Fehler: " . mysqli_error($verbindung));
}
}

mysqli_close($verbindung);
echo "</body>";

?>