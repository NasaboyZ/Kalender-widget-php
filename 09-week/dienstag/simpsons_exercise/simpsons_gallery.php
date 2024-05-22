<?php
class MyGallery {
    // Eigenschaft: Array für die Bildpfade
    public $bilder = array();

    // Standard-Template-String für die Gallerie
    private $template = <<<HTML
<div class="gallery">
    {{IMAGES}}
</div>
HTML;

    // Template-String für einzelne Bilder
    private $imageTemplate = '<img src="{{SRC}}" alt="Gallery Image">';

    // Konstruktor mit typischen Aufgaben
    function __construct($gallerypath) {
        // Checke, ob der Ordner existiert
        if (is_dir($gallerypath)) {
            // Einlesen aller Pfade zu den Bildern in das Array
	        foreach (glob($gallerypath."/"."*.gif") as $image) {
		        $this->bilder[] = $image;
	        }
            // Checke, ob der Galerie-Ordner leer ist
            $anzBilder = count($this->bilder);
            if ($anzBilder == 0) {
                exit("Der Galerie-Ordner hat noch keinen Inhalt");
            }
        } else {
            exit("Kann den Galerie-Ordner nicht finden, bitte Pfad überprüfen");         
        }
    }

    // Methode: HTML-Code zusammensetzen
    function makeGallery() {
        $imagesHtml = "";
        foreach ($this->bilder as $srcValue) {
            $imagesHtml .= str_replace('{{SRC}}', $srcValue, $this->imageTemplate) . "\n";
        }

        return str_replace('{{IMAGES}}', $imagesHtml, $this->template);
    } 
    
}
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
        <!-- <h1>The Simpsons (Bilder in Ordner lesen)</h1> -->
        <div class="output">
            <!-- <?=$srcValue?> -->
        </div>
    </div>
</body>
</html>