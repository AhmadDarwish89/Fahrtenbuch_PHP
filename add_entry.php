<?php
// Datenbankverbindung herstellen
include("connect.php");
include("headervorlage.php");
echo "<head>";
echo "  <title>Fahrtenbuch Abfrage</title>";
echo "  <title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "		<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "		<a href=\"entry.php\">NEW Entry</a>";
echo "</div>";
echo " <h1>Fahrtenbuch Abfrage</h1>";

$datum = mysqli_real_escape_string($verbindung, $_POST['datum']);
$startort = mysqli_real_escape_string($verbindung, $_POST['startort']);
$zielort = mysqli_real_escape_string($verbindung, $_POST['zielort']);
$zweck = mysqli_real_escape_string($verbindung, $_POST['zweck']);
$kmabfahrt = mysqli_real_escape_string($verbindung, $_POST['kmabfahrt']);
$kmankunft = mysqli_real_escape_string($verbindung, $_POST['kmankunft']);
$gefahrene_km = mysqli_real_escape_string($verbindung, $_POST['gefahrene_km']);
$fahrer_id = mysqli_real_escape_string($verbindung, $_POST['fahrer_id']);
$tankkosten = mysqli_real_escape_string($verbindung, $_POST['tankkosten']);
$kfz_id = mysqli_real_escape_string($verbindung, $_POST['kfz_id']);

// Eingabevalidierung
if (empty($datum) || empty($startort) || empty($zielort) || empty($zweck) || empty($kmabfahrt) || empty($kmankunft) || empty($gefahrene_km) || empty($fahrer_id) || empty($tankkosten)|| empty($kfz_id)) {
    die("Fehler: Alle Felder sind erforderlich");
}

// SQL-Statement vorbereiten und ausführen
$sql = "INSERT INTO fahrten (datum, startort, zielort, zweck, kmabfahrt, kmankunft, gefahrene_km,tankkosten, fahrer_id, kfz_id)
		VALUES ('$datum', '$startort', '$zielort', '$zweck', '$kmabfahrt', '$kmankunft', '$gefahrene_km','$tankkosten', '$fahrer_id', '$kfz_id')";
if (mysqli_query($verbindung, $sql)) {
	echo "Eintrag erfolgreich hinzugefügt";
} else {
	die("Fehler: " . mysqli_error($verbindung));
}

// Datenbankverbindung schließen
mysqli_close($verbindung);

?>
