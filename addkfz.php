
<?php

include("connect.php");
include("headervorlage.php");

echo "<head>";
echo "	<title>KFZ hinzufügen</title>";
echo "	<title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"fahrer.php\">ZURUCK</a>";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "</div>";;
echo "	<h1>KFZ hinzufügen</h1>";

echo "<form class=\"form\" method='post'>";

echo "		<label for=\"id2\">ID:</label>";
echo "		<input type=\"text\"  style=\"background-color: lightgray\" name=\"id\" id=\"id\" required><br><br>";
echo "		<label for=\"kennzeichen2\">Kennzeichen:</label>";
echo "		<input type=\"text\" style=\"background-color: lightgray\" name=\"kennzeichen\" id=\"kennzeichen\" required><br><br>";

echo " <input type='submit' name='add' id='add' value='KFZ hinzufügen'>";
echo "</form>";


try {
	if(isset($_POST['add'])) {
 $id = $_POST['id'];
  $kennzeichen = $_POST['kennzeichen'];

$sql = "INSERT INTO kfz (id, kennzeichen)
		VALUES ('$id', '$kennzeichen')";
if(mysqli_query($verbindung, $sql)){
	echo "KFZ erfolgreich hinzugefügt";
} else {
	die("Fehler: " . mysqli_error($verbindung));
}
}
} 
// Catch-Block für den Fall eines MySQLi-SQL-Fehlers
catch (mysqli_sql_exception $e) {
  // Überprüfe, ob der Fehler auf einen PRIMARY KEY-Konflikt zurückzuführen ist
  if (strpos($e->getMessage(), "Duplicate entry") !== false && strpos($e->getMessage(), "for key 'PRIMARY'") !== false) {
    // Behandle den Fehler
	//echo '<script>alert("Willkommen auf unserer Webseite!");</script>';

      echo "<div class=\"error\">Es gibt bereits einen Datensatz mit dieser ID.</div>";

  } else {
    // Wenn der Fehler nicht mit einem PRIMARY KEY-Konflikt zusammenhängt, gib den Fehler einfach aus
   echo "<div class=\"error\">Es ist ein SQL-Fehler aufgetreten: " . $e->getMessage() . "</div>";
  }
}


mysqli_close($verbindung);
echo "</body>";

?>