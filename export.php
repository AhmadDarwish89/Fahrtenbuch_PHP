<?php

//connect to database
include("connect.php");


if(isset($_POST['Exportieren_fahrer'])) {
//get values from form
$fahrer_id = mysqli_real_escape_string($verbindung, $_POST['fahrer_id']);//query the database
//query the database
$query = "SELECT * FROM `fahrten`INNER JOIN fahrer on fahrten.fahrer_id=fahrer.id INNER JOIN kfz on fahrten.kfz_id=kfz.id WHERE fahrer_id=  '$fahrer_id'";
	}
	
if(isset($_POST['Exportieren_kfz'])) {
$kfz_id = mysqli_real_escape_string($verbindung, $_POST['kfz_id']);
$query = "SELECT * FROM `fahrten`INNER JOIN fahrer on fahrten.fahrer_id=fahrer.id INNER JOIN kfz on fahrten.kfz_id=kfz.id WHERE  kfz_id= '$kfz_id'";
	}
	
if(isset($_POST['Exportieren_datum'])) {

$from_date = mysqli_real_escape_string($verbindung, $_POST['from_date']);
$to_date = mysqli_real_escape_string($verbindung, $_POST['to_date']);
$query = "SELECT * FROM fahrten INNER JOIN fahrer on fahrten.fahrer_id=fahrer.id INNER JOIN kfz on fahrten.kfz_id=kfz.id WHERE datum BETWEEN '$from_date' AND '$to_date'";
	}
	
	
$result = mysqli_query($verbindung, $query);

//create a CSV file and write results to it
$filename = "fahrtenbuch_export_" . date('Ymd') . ".csv";
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Fahrer', 'KFZ', 'Datum', 'Startort', 'Zielort', 'Zweck', 'Kilometerstand bei Abfahrt', 'Kilometerstand bei Ankunft', 'Gefahrene Kilometer', 'Tankkosten'));

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);

//close database connection
mysqli_close($verbindung);
?>
