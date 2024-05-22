<?php
// Starte die Sitzung, um auf die Sitzungsvariablen zugreifen zu können
session_start();

// Lösche alle Sitzungsvariablen
$_SESSION = array();

// Zerstöre die Sitzung
session_destroy();

// Leite den Benutzer zur Login-Seite weiter
header("Location: admin-login.php");
exit;
?>
