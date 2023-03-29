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
echo "<h1>DASHBOARD</h1>";


echo "<form class=\"form\" method='post'>";
$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');

$stmt = $pdo->prepare('SELECT  id, vorname, nachname FROM fahrer WHERE 1;');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<label for=\"fahrer\">Fahrer:</label>";
echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name='driver'>";
foreach ($results as $row) {
    echo "<option value='".$row['id']."'>".$row['vorname']." ".$row['nachname']."</option>";
}

echo "<input type='submit' name='add_fahrer' formaction=\"addfahrer.php\" value='Hinzufügen Fahrer'>&nbsp";

echo "<input type='submit' name='delete_fahrer' value='Fahrer Löschen'>&nbsp";
echo "<input type='submit' name='delete_fahrt' formaction=\"fahrer2.php\" value='Fahrten Löschen'>&nbsp";
echo "</form>";

if(isset($_POST['delete_fahrer'])) {
    echo "<form method='post'>";
    echo "<p>Sind Sie sicher, dass Sie diese Fahrten löschen möchten?</p>";
    echo "<input type='hidden' name='driver' value='".$_POST['driver']."'>";
    echo "<input type='submit' name='confirm_delete_fahrer' value='Ja'>&nbsp";
    echo "<input type='submit' name='cancel_delete_fahrer' value='Nein'>";
    echo "</form>";
}

if(isset($_POST['confirm_delete_fahrer'])) {
    $id = $_POST['driver'];
    $sql0 = "DELETE FROM fahrten WHERE fahrer_id = $id";
    $sql1 = "DELETE FROM fahrer WHERE id = $id";
    if(mysqli_query($verbindung, $sql0)) {
        if(mysqli_query($verbindung, $sql1)) {
            echo "Datensatz erfolgreich gelöscht";
        }
    } else {
        echo "Fehler beim Löschen des Datensatzes: " . mysqli_error($verbindung);
    }
}

echo "<br>";
echo "<br>";

echo " <form class=\"form\" method=\"post\" >";
$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');

$stmt = $pdo->prepare('SELECT  id, kennzeichen FROM kfz WHERE 1;');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<label for=\"kfz\">KFZ:</label>";
echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name='driver'>";
foreach ($results as $row) {
    echo "<option value='".$row['id']."'>".$row['kennzeichen']."</option>";
}
echo "</select>";
echo "<input type='submit' name='add_kfz' formaction=\"addkfz.php\" value='Hinzufügen KFZ'>&nbsp";
echo "<input type='submit' name='delete_kfz' value='KFZ Löschen'>&nbsp";

echo "<input type='submit' name='delete_fahrt2' formaction=\"kfz2.php\"  value='Fahrten Löschen'>&nbsp";


echo "</form>";

if(isset($_POST['delete_kfz'])) {
    echo "<form method='post'>";
    echo "<p>Sind Sie sicher, dass Sie dieses KFZ löschen möchten?</p>";
    echo "<input type='hidden' name='driver' value='".$_POST['driver']."'>";
    echo "<input type='submit' name='confirm_delete_kfz' value='Ja'>&nbsp";
    echo "<input type='submit' name='cancel_delete_kfz' value='Nein'>";
    echo "</form>";
}

if(isset($_POST['confirm_delete_kfz'])) {
    $id = $_POST['driver'];
    $sql0 = "DELETE FROM fahrten WHERE kfz_id = $id";
    $sql1 = "DELETE FROM kfz WHERE id = $id";
    if(mysqli_query($verbindung, $sql0)) {
        if(mysqli_query($verbindung, $sql1)) {
            echo "Datensatz erfolgreich gelöscht";
        }
    } else {
        echo "Fehler beim Löschen des Datensatzes: " . mysqli_error($verbindung);
    }
}



echo "</form>";
echo "<br>";
echo "<br>";


echo "<form class=\"form\" method='post'>";

$pdo = new PDO('mysql:host=localhost;dbname=fahrtenbuch', 'root', '');

$stmt = $pdo->prepare('SELECT  id, vorname, nachname FROM fahrer WHERE 1;');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name='driver'>";
foreach ($results as $row) {
    echo "<option value='".$row['id']."'>".$row['vorname']." ".$row['nachname']."</option>";
}
echo "</select>";



$stmt = $pdo->prepare('SELECT  id, kennzeichen FROM kfz WHERE 1;');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<select style=\"background-color: rgba(172,216,230,0.3)\" name='driver2'>";
foreach ($results as $row) {
    echo "<option value='".$row['id']."'>".$row['kennzeichen']."</option>";
}

echo "<input type=\"date\" style=\"background-color: rgba(172,216,230,0.3)\" name=\"datum1\" id=\"datum1\" required><br><br>";


echo "<input type='submit' name='delete_fahrt3' formaction=\"deletefahrt.php\"  value='Fahrten Löschen'>&nbsp";


echo "</form>";

echo "</body>";

$verbindung->close();
?>