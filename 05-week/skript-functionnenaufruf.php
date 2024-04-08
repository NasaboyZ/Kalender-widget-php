<?php 
// Das ist das Skript, das die Funktion aufrufen soll
require_once('functionen.php');
require_once('constante-global.php');

$patternLower = "#([a-z])#"; // Kleinbuchstaben finden
$patternUpper = "#([A-Z])#"; // Großbuchstaben finden
$patternSpecial = "#^(.*)([^a-zA-Z0-9\s])(.*)#"; // Sonderzeichen finden

check_password();
$fehlerarray = check_password();
echo '<pre> test1234';
print_r($fehlerarray);
echo '</pre>';
?>
