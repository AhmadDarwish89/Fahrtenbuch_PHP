<?php



include("connect.php");
include("headervorlage.php");
include("connect.php");
echo "<head>";
echo "  <title>Fahrtenbuch Abfrage</title>";
echo "  <title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"abfrage.php\">ZURUCK</a>";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "</div>";
echo " <h1>Fahrtenbuch Abfrage</h1>";
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


$kfz_id = mysqli_real_escape_string($verbindung, $_POST['kfz_id']);
$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM `fahrten`INNER JOIN fahrer on fahrten.fahrer_id=fahrer.id INNER JOIN kfz on fahrten.kfz_id=kfz.id WHERE kfz_id=:kfz_id');
$stmt->bindParam(':kfz_id', $kfz_id);

// Execute the query
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo "<table>";
echo "<tr><th></th><th>ID</th><th></th><th>Fahrer</th><th></th><th>Nach KFZ</th><th></th><th>Datum</th><th></th><th>Startort</th><th></th><th>Zielort</th><th></th><th>Zweck</th><th></th><th>Kilometerstand bei Abfahrt</th><th></th><th>Kilometerstand bei Ankunft</th><th></th><th>Gefahrene Kilometer</th><th></th><th>Tankkosten</th></tr>";

foreach ($results as $row) {
    echo "<tr><td></td><td>" . $row["id"] . "</td><td></td><td>" .$row["vorname"] .$row["nachname"] . "</td><td></td><td>" . $row["kennzeichen"] . "</td><td></td><td>" . $row["datum"] . "</td><td></td><td>" . $row["startort"] . "</td><td></td><td>" . $row["zielort"] . "</td><td></td><td>" . $row["zweck"] . "</td><td></td><td>" . $row["kmabfahrt"] . "</td><td></td><td>" . $row["kmankunft"] . "</td><td></td><td>" . $row["gefahrene_km"] ."</td><td></td><td>" . $row["tankkosten"] . "</td></td><td></tr>";
}
echo " <form method='post' action=\"export.php\"><input type='hidden' name=\"kfz_id\" value=\"$kfz_id\"><input type=\"submit\" name='Exportieren_kfz' value=\"Exportieren\"></form>&nbsp";
echo " <input type=\"submit\" onclick=\"window.print();\" name='Drucken' value=\"Drucken\"> &nbsp";
echo "</table>";




$verbindung->close();
?>