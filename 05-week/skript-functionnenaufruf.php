<?php 
//Das ist das skript, welches function aufrufen soll
require_once 'functionen.php';

check_password();
$fehlerarray = check_password();
echo '<pre>';
print_r($fehlerarray);
echo '</pre>';
?>