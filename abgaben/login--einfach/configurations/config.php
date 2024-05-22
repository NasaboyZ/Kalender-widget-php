
<?php
$host = 'localhost'; // oder der Hostname deiner Datenbank
$dbname = 'pinktonic'; // der Name deiner Datenbank
$username = 'root'; // dein Datenbank-Benutzername
$password = ''; // dein Datenbank-Passwort

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
}
?>
