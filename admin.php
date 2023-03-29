<?php

include("connect.php");
include("headervorlage.php");


echo "<head>";
echo "  <title>ANMELDEN</title>";
echo "  <title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "	<a href=\"entry.php\">NEW</a>";
echo "</div>";
echo " <h1>ANMELDEN</h1>";

echo "<form class=\"form\" method='post'>";
echo "		<label for=\"username\">Username:</label>";
echo "		<input type=\"text\" style=\"background-color: lightgray\" name=\"username\" id=\"username\" required><br><br>";
echo "		<label for=\"password\">Password:</label>";
echo "		<input type=\"text\" style=\"background-color: lightgray\" name=\"password\" id=\"password\" required><br><br>";

echo "<td><input type='submit' name='login' value='Login to Dashboard'></form></td>";

if(isset($_POST['login'])) {
 $username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		$result=mysqli_query($verbindung, $sql);
	
	  if( mysqli_num_rows($result)>0){
            echo "Anmeldung Erfolgt";
			   header("Location: fahrer.php");
    } else {
        echo " Falscher Benuzername oder Passwort " . mysqli_error($verbindung);
    }
	}

// Close the database connection
mysqli_close($verbindung);

echo "</body>";

?>