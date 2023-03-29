
<?php

include("connect.php");
include("headervorlage.php");

echo "<head>";
echo "	<title>Fahrtenbuch-Eintrag hinzufügen</title>";
echo "	<title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "	<a href=\"abfrage.php\">FAHRTEN ABFRAGE</a>";
echo "</div>";
echo "	<h1>Fahrtenbuch-Eintrag hinzufügen</h1>";
echo "	<form class=\"form\" method=\"post\" action=\"add_entry.php\">";
echo "		<label for=\"datum\" >Datum:</label>";
echo "		<input type=\"date\" style=\"background-color: rgba(172,216,230,0.3)\" name=\"datum\" id=\"datum\" required><br><br>";
echo "		<label for=\"startort\">Startort:</label>";
echo "		<input type=\"text\" name=\"startort\" id=\"startort\" required><br><br>";
echo "		<label for=\"zielort\">Zielort:</label>";
echo "		<input type=\"text\" name=\"zielort\" id=\"zielort\" required><br><br>";
echo "		<label for=\"zweck\">Zweck:</label>";
echo "		<input type=\"text\" name=\"zweck\" id=\"zweck\" required><br><br>";
echo "		<label for=\"kmabfahrt\">Kilometerstand bei Abfahrt:</label>";
echo "		<input type=\"number\" name=\"kmabfahrt\" id=\"kmabfahrt\" required><br><br>";
echo "		<label for=\"kmankunft\">Kilometerstand bei Ankunft:</label>";
echo "		<input type=\"number\" name=\"kmankunft\" id=\"kmankunft\" required><br><br>";
echo "		<label for=\"gefahrene_km\">Gefahrene Kilometer:</label>";
echo "		<input type=\"number\" name=\"gefahrene_km\" id=\"gefahrene_km\" required><br><br>";
echo "		<label for=\"tankkosten\"> Tankkosten (€):</label>";
echo "		<input type=\"number\" name=\"tankkosten\" id=\"tankkosten\" required><br><br>";
echo "		<label for=\"fahrer_id\">Fahrer:</label>";
echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name=\"fahrer_id\" id=\"fahrer_id\" required><br><br>\n";
		
$sql0="select * from fahrer ORDER BY vorname ASC";
$query0=mysqli_query($verbindung,$sql0);
while($ergebnis0=mysqli_fetch_assoc($query0))
{
	$ma_id=$ergebnis0["id"];
	$vorname=$ergebnis0["vorname"];
	$nachname=$ergebnis0["nachname"];

    echo "<option value='".$ma_id."'>".$vorname." ".$nachname."</option>";
	
}

echo "</select><p>";
echo "<br>";


echo "<label for=\"kfz_id\">Nach KFZ:</label>";
echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name=\"kfz_id\" id=\"kfz_id\"required><br><br>\n";

$sql1 = "SELECT * FROM kfz ORDER BY kennzeichen ASC";
$query1=mysqli_query($verbindung,$sql1);
while($ergebnis1=mysqli_fetch_assoc($query1))
{
	$auto_id=$ergebnis1["id"];
	$kfz=$ergebnis1["kennzeichen"];

	
echo "<option   value=$auto_id>$kfz </option>";	
}

echo "</select><p>";
echo "<br><br>";

echo "<input type=\"submit\" value=\"Eintrag hinzufügen\">";
echo "</form>";
echo "</body>";

	
		
		
?>