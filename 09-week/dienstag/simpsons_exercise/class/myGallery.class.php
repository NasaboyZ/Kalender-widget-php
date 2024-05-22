<?php
class MyGallery {
    // Eigenschaft: Array für die Bildpfade
    // Das brauche ich in BEIDEN Methoden,
    // deshalb muss ich hier zwingend eine Eigenschaft einsetzen
    public $bilder = array();

    // Konstruktor mit typischen Aufgaben
    function __construct($gallerypath) {
        // Checke, ob der Ordner existiert
        if (is_dir($gallerypath)) {
            // Einlesen aller Pade zu den Bildern in das Array
	        foreach (glob($gallerypath."/"."*.gif") as $image) {
		        $this->bilder[] = $image;
	        }
            // Checke, ob der Gallerie Ordner leer ist
            $anzBilder = count($this->bilder);
            if ($anzBilder == 0) {
                exit("Der Galerie-Ordner hat noch keinen Inhalt");
            }
        }
        else {
            exit("Kann den Galerie-Ordner nicht finden, bitte Pfad überprüfen");         
        }
    }

    // Methode: HTML-Code zusammensetzen
    function makeGallery() {
	    $htmlCode = "";
        // Start <div> with gallery
        $htmlCode = "<div class=\"pswp-gallery pswp-gallery--single-column\" id=\"gallery--getting-started\">\n";

	    foreach ($this->bilder as $srcValue) {
            // Dimensionen der Bilder bestimmen
            $size = getimagesize($srcValue);
            $width = $size[0];
            $height = $size[1];

            // HTML-Code zusammensetzen
            $htmlCode.= "<a href=\"".$srcValue."\"";
            $htmlCode.= " data-pswp-width=\"".$width."\"";
            $htmlCode.= " data-pswp-height=\"".$height."\""; 
            $htmlCode.= " target=\"_blank\">";
            $htmlCode.= "<img src=\"".$srcValue."\" alt=\"\" />";
            $htmlCode.= "</a>";
	    }
        // End <div> with gallery
        $htmlCode .= "</div>\n";

	    return $htmlCode;
    }
}