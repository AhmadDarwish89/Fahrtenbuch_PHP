<?php
include("connect.php");
include("headervorlage.php");


echo "<head>";
echo "  <title>Fahrtenbuch Abfrage</title>";
echo "  <title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "	<a href=\"entry.php\">NEW</a>";
echo "</div>";
echo " <h1 >Fahrtenbuch Abfrage</h1>";
echo " <form  class=\"form\" method=\"post\" action=\"zeigen1.php\">";
echo " <label for=\"fahrer_id\">Nach Fahrer:</label>";
echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name=\"fahrer_id\" id=\"fahrer_id\">\n";
	


$sql0="select * from fahrer WHERE 1;";
$query0=mysqli_query($verbindung,$sql0);

while($ergebnis0=mysqli_fetch_assoc($query0))
{
	$ma_id=$ergebnis0["id"];
	$ma_vorname=$ergebnis0["vorname"];
	$ma_nachname=$ergebnis0["nachname"];

	
echo "<option value=$ma_id>$ma_vorname $ma_nachname </option>";	
}

echo "</select>";

echo " <input type=\"submit\" value=\"Abfragen nach Fahrer\">";
echo "</form>";

echo "<br>";
echo "<br>";

echo " <form class=\"form\" method=\"post\" action=\"zeigen.php\">";
echo "<label for=\"kfz_id\">Nach KFZ:</label>";

echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name=\"kfz_id\" id=\"kfz_id\">";

$sql1 = "SELECT * FROM kfz WHERE 1;";
$query1=mysqli_query($verbindung,$sql1);
while($ergebnis1=mysqli_fetch_assoc($query1))
{
	$auto_id=$ergebnis1["id"];
	$kfz=$ergebnis1["kennzeichen"];

	
echo "<option   value=$auto_id>$kfz </option>";	
}

echo "</select>";
echo " <input type=\"submit\" value=\"Abfragen nach KFZ\">";
echo "</form>";

echo "<br>";
echo "<br>";


echo " <form class=\"form\" method=\"post\" action=\"zeigen2.php\">";
echo "		<label for=\"datum\">Von:</label>";
echo "		<input type=\"date\" style=\"background-color: rgba(172,216,230,0.3)\" name=\"datum1\" id=\"datum1\" required><br><br>";

echo "		<label for=\"datum\">Bis:</label>";
echo "		<input type=\"date\" style=\"background-color: rgba(172,216,230,0.3)\" name=\"datum2\" id=\"datum2\" required><br><br>";
echo " <input type=\"submit\" name=\"Abfragen_nach_Datum\" value=\"Abfragen nach Datum\">";
echo "</form>";


echo "</body>";
//mysqli_free_result($query0);
//mysqli_free_result($query1);

mysqli_close($verbindung);
?>