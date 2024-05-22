<?php
// Verzeichnis für hochgeladene Dateien
$uploadsDir = './upload/';

$images = array_filter(scandir($uploadsDir), function ($file) use ($uploadsDir) {
    $filePath = $uploadsDir . $file;
    return is_file($filePath) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Top Secret Galerie</title>
  <link rel="stylesheet" href="css/gehaim.css">
</head>
<body>
  <div class="container">
    <h1>Top Secret Galerie</h1>
    <h2>Alle hochgeladenen Bilder</h2>
    <div class="gallery">
      <?php foreach ($images as $image): ?>
        <div class="gallery-item">
          <img src="<?php echo $uploadsDir . $image; ?>" alt="Upload">
        </div>
      <?php endforeach; ?>
    </div>
    <a href="gehaim.php" class="back-link">Zurück zum Upload</a>
  </div>
</body>
</html>
