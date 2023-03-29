<?php
$datenbank="fahrtenbuch";
$user="root";
$passwort="";
$host="localhost";

$verbindung=mysqli_connect($host,$user,$passwort,$datenbank);

if(mysqli_connect_error())
{
	echo" Fehler , das nicht funktioniert";
}
else
{
	//echo" cool , das funktioniert";
}

?>