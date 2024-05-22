<?php
require  '../configurations/config.php';  // Einbinden der Konfigurationsdatei

try {
    // PDO-Objekt mit Verbindung erstellen
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (Exception $exception) {
    // Abbruch, wenn die DB Verbindung nicht klappt
    die('MySQL Verbindungsfehler: ' . $exception->getMessage());
}
?>
