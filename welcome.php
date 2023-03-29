
<?php

include("connect.php");
include("headervorlage.php");

echo "<head>";
echo "	<title>Fahrer hinzufügen</title>";
echo "	<title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body class=\"body2\">";
echo "	<div class=\"navbar\">";

echo "	</div>";
echo "	<h1 class=\"header\">Willkommen zum Fahrtenbuch der JIKU- IT Solutions</h1>";
echo<<<formular
<style>
.header {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
    background-color:black;
text-align: left;
  padding: 8px;
  color: #fff;
  
}

</style>
formular;
echo "<div class=\"marq\"><marquee  width=\"100%\"  bgcolor=\"white\" direction=\"left\" behavior=\"scroll \"> Diese Webseite hat entwicklet von : Ahmad Darwish  _  Torsten Kant  _  Alexander Ginter </marquee></div>";
	


echo " <form class=\"form\" style=\"background-color: rgba(0,0,0,0)\" method=\"post\>";


echo "		<input type=\"text\" class=\"btn\"  style=\"background-color: rgba(0,0,0,0)\" name=\"id\" id=\"id\" required><br><br>";

echo "	<div class=\"btn\">";
echo " <input type='submit' name='add' id='input' formaction=\"entry.php\" value='Fahrten hinzufügen'><br><br>";
echo " <input type='submit' name='add' id='input' formaction=\"abfrage.php\" value='Fahrten Abfrage'><br><br>";
echo " <input type='submit' name='add' id='input' formaction=\"admin.php\" value='DASHBOARD'><br><br>";
echo " <input type='submit' name='add' id='input'  value='KONTAKT'>";
echo "	</div>";

echo "</form>";

?>