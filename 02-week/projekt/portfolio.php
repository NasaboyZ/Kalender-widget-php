<?php
// Bilder aus dem Medienordner auslesen
echo "<pre>";
$ordner = "media";
$dateien = scandir($ordner); // Gibt das Verzeichnis zurück

$jpgDateien = array();
$pngDateien = array();

foreach ($dateien as $datei) {
    
    $dateipfad = $ordner . DIRECTORY_SEPARATOR . $datei;
    
    
    if (is_file($dateipfad) && (pathinfo($dateipfad, PATHINFO_EXTENSION) == 'jpg' || pathinfo($dateipfad, PATHINFO_EXTENSION) == 'jpeg')) {
        $jpgDateien[] = $datei;
    } elseif (is_file($dateipfad) && pathinfo($dateipfad, PATHINFO_EXTENSION) == 'png') {
        $pngDateien[] = $datei;
    }
}

echo "JPG-Dateien:\n";
print_r($jpgDateien);

echo "\nPNG-Dateien:\n";
print_r($pngDateien);

echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Nico's Portfolio | Webdesign Projekte</title>
	<meta name="title" content="Nico's Portfolio | Webdesign Projekte">
	<meta name="description" content="Meine aktuellen Projekte">
	<meta name="author" content="Nico">

	<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
	<header class="navbar navbar-expand-md bd-navbar">
		<nav class="container flex-wrap flex-md-nowrap" aria-label="Main navigation">
			<a class="navbar-brand p-0 me-2" href="/">NICO's PORTFOLIO<a>
					<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" href="index.html">Home</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 active" href="portfolio.html">Portfolio</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" href="contact.html">Contact me</a>
						</li>
					</ul>
		</nav>
	</header>

	<section class="main-section">
		<div class="container">

			<div class="mt-5">
				<h2>Aktuelle Projekte</h2>
			</div>
			<div class="row mt-4">
				<div class="col-12 col-sm-6 col-md-3">
					<img src="media/Business-20.png">
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<img src="media/eaef_Blurr-402x.jpg">
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<img src="media/Pompeo.jpg">
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<img src="media/biznus.jpg">
				</div>
			</div>
			<div>
				<em class="text-muted">image credit: webflow.io</em>
			</div>
		</div>
	</section>

	<section class="footer-section">
		<div class="container">
			<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
				<div class="col-md-4 d-flex align-items-center">
					<a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
						<svg class="bi" width="30" height="24">
							<use xlink:href="#bootstrap"></use>
						</svg>
					</a>
					<span class="mb-3 mb-md-0 text-body-secondary">© 2024 Nico the webdesigner</span>
				</div>


			</footer>
		</div>
	</section>


</body>

</html>