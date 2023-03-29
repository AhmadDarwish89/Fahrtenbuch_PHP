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
echo "	<a href=\"fahrer.php\">ZURUCK</a>";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "</div>";
echo "<h1>FAHRTEN</h1>";

echo<<<formular
<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}
th {
  background-color:rgba(172,216,230,0.3);
  }
td{
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
formular;

if(isset($_POST['delete_fahrt3'])) { 

  $fahrer_id = mysqli_real_escape_string($verbindung, $_POST['driver']);
   $kfz_id = mysqli_real_escape_string($verbindung, $_POST['driver2']);
 $datum = mysqli_real_escape_string($verbindung, $_POST['datum1']);
 
$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');


$stmt = $pdo->prepare('SELECT fahrten.id,fahrten.datum, fahrten.startort, fahrten.zielort, fahrten.zweck, fahrten.kmabfahrt,fahrten.kmankunft,fahrten.gefahrene_km, fahrten.tankkosten,fahrer.vorname,fahrer.nachname, kfz.kennzeichen FROM `fahrten`left JOIN fahrer on fahrten.fahrer_id=fahrer.id left JOIN kfz on fahrten.kfz_id=kfz.id WHERE fahrer_id=:fahrer_id AND kfz_id=:kfz_id AND datum=:datum');
$stmt->bindParam(':fahrer_id', $fahrer_id );
$stmt->bindParam(':kfz_id', $kfz_id );
$stmt->bindParam(':datum', $datum );

// Execute the query
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
echo "<tr><th></th><th>ID</th><th></th><th>Fahrer</th><th></th><th>Nach KFZ</th><th></th><th>Datum</th><th></th><th>Startort</th><th></th><th>Zielort</th><th></th><th>Zweck</th><th></th><th>Kilometerstand bei Abfahrt</th><th></th><th>Kilometerstand bei Ankunft</th><th></th><th>Gefahrene Kilometer</th><th></th><th>Tankkosten</th></tr>";

foreach ($results as $row) {
    echo "<tr><td></td><td>" . $row["id"] . "</td><td></td><td>" . $row["vorname"] .$row["nachname"] . "</td><td></td><td>" . $row["kennzeichen"] . "</td><td></td><td>" . $row["datum"] . "</td><td></td><td>" . $row["startort"] . "</td><td></td><td>" . $row["zielort"] . "</td><td></td><td>" . $row["zweck"] . "</td><td></td><td>" . $row["kmabfahrt"] . "</td><td></td><td>" . $row["kmankunft"] . "</td><td></td><td>" . $row["gefahrene_km"] ."</td><td></td><td>" . $row["tankkosten"] . "</td><td><form method='post'><input type='hidden' name='id' value='".$row['id']."'><input type='submit' name='delete' value='Löschen'></form></td></td></tr>";
}

echo "</table>";
}


//delete ein fahrt
if(isset($_POST['delete'])) {
    echo "<form method='post'>";
    echo "<p>Sind Sie sicher, dass Sie diesen Fahrer löschen möchten?</p>";
    echo "<input type='hidden' name='id' value='".$_POST['id']."'>";
    echo "<input type='submit' name='confirm_delete_fahrt' value='Ja'>&nbsp";
    echo "<input type='submit' name='cancel_delete_fahrt' value='Nein'>";
    echo "</form>";
}

if(isset($_POST['confirm_delete_fahrt'])) {
   $id = $_POST['id'];
$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');
	$sql0 = "DELETE FROM fahrten WHERE id = '$id'";
    
  if(mysqli_query($verbindung, $sql0)) {
    
	echo "Datensatz erfolgreich gelöscht";
    } else {
        echo "Fehler beim Löschen des Datensatzes: " . mysqli_error($verbindung);
    }

}


echo "</body>";



$verbindung->close();
?>