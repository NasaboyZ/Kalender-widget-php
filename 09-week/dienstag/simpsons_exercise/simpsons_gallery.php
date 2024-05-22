<?php
function makeGallery() {
	$bilder = array();
	$pfad = "simpsons_gallery/";
    // Alle Pfade im Ordner in Array einlesen
    // Hier werden nur .gif Dateien brücksichtigt
	foreach (glob($pfad."*.gif") as $image) {
		$bilder[] = $image;
	}

    // HTML-Code zusammensetzen
	$htmlCode = "";
	foreach ($bilder as $srcValue) {
		$htmlCode .= "<img src=\"".$srcValue."\">\n";
	}
	return $htmlCode;
}
$gallery = makeGallery();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Simpsons (Bilder in Ordner lesen)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <div id="container">
        <h1>The Simpsons (Bilder in Ordner lesen)</h1>
        <div class="output">
            <?=$gallery?>
        </div>
    </div>
</body>
</html>