<?php
session_start(); 
require_once './configurations/config.php';

// Überprüfen, ob eine Datei hochgeladen wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['datei'])) {
    $uploadsDir = './upload/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $files = $_FILES['datei'];

    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    foreach ($files['name'] as $key => $name) {
        $tmpName = $files['tmp_name'][$key];
        $type = $files['type'][$key];
        $error = $files['error'][$key];

        if (in_array($type, $allowedTypes) && $error == UPLOAD_ERR_OK) {
            $filePath = $uploadsDir . basename($name);
            move_uploaded_file($tmpName, $filePath);
        }
    }

    header("Location: gehaim-galerie.php");
    exit;
}

// Überprüfen, ob 'login_time' in der Session gesetzt ist
if (isset($_SESSION['login_time'])) {
    $loginTime = date("Y-m-d H:i:s", $_SESSION['login_time']);
} else {
    $loginTime = "N/A"; // Standardwert, falls 'login_time' nicht gesetzt ist
}

// Überprüfen, ob 'user_id' in der Session gesetzt ist
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = "N/A"; // Standardwert, falls 'user_id' nicht gesetzt ist
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
    <p>User ID: <?php echo $userId; ?></p>
    <p>Login Time: <?php echo $loginTime; ?></p>
    
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
