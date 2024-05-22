<?php
session_start();
// Verbindung zur Datenbank herstellen
require_once './mysql/db-conation.php';

// Benutzer-ID holen
require_once './admin-login.php'; // Stelle sicher, dass der Pfad zur Datei mit der getUserId() Funktion korrekt ist
$userId = getUserId();

// Überprüfen, ob eine Datei hochgeladen wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['datei'])) {
    $uploadsDir = './upload/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $files = $_FILES['datei'];

    // Überprüfen, ob das Verzeichnis existiert, ansonsten erstellen
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    // Mehrere Dateien verarbeiten
    foreach ($files['name'] as $key => $name) {
        $tmpName = $files['tmp_name'][$key];
        $type = $files['type'][$key];
        $error = $files['error'][$key];

        // Nur erlaubte Dateitypen zulassen
        if (in_array($type, $allowedTypes) && $error == UPLOAD_ERR_OK) {
            $filePath = $uploadsDir . basename($name);
            move_uploaded_file($tmpName, $filePath);
        }
    }

    // Nach dem Upload zur Galerie weiterleiten
    header("Location: gehaim-galerie.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Top Secret</title>
  <link rel="stylesheet" href="css/gehaim.css">
</head>
<body>
  <div class="container">
    <h1>Top Secret</h1>
    <h2>Gratulation mein Admin!</h2>
    <p>Das ist also die geheime PHP-Datei, die kein Hacker sehen kann.</p>
    
    <form method="POST" action="gehaim.php" enctype="multipart/form-data">     
      <input type="file" name="datei[]" class="file-input" multiple>
      <button type="submit" class="upload-button">Upload</button>
    </form>
    
    <form action="logout.php" method="post">
      <button type="submit" class="logout-button">Abmelden</button>
    </form>

    <a href="gehaim-galerie.php" class="gallery-link">Zur Galerie</a>
  </div>
</body>
</html>
