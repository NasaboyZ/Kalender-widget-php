<?php
// Code der Klasse hier zur Verfügung stellen
require("class/MyGallery.class.php");
// Instanz der Klasse erzeugen,
// dabei wird auch der Konstruktor automatisch abgearbeitet
$superhero = new MyGallery("simpsons_gallery");
$gallery = $superhero -> makeGallery();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Simpsons - mit Klasse</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="photoswipe/dist/photoswipe.css">

</head>
<body>
    <div id="container">
        <h1>Profigalerie</h1>

        <div class="output">
            <?=$gallery?>
        </div>
    </div>
<script type="module">
import PhotoSwipeLightbox from '/photoswipe/dist/photoswipe-lightbox.esm.js';

const lightbox = new PhotoSwipeLightbox({
  // may select multiple "galleries"
  gallery: '#gallery--getting-started',

  // Elements within gallery (slides)
  children: 'a',

  // setup PhotoSwipe Core dynamic import
  pswpModule: () => import('/photoswipe/dist/photoswipe.esm.js')
});
lightbox.init();
</script>   
</body>
</html>