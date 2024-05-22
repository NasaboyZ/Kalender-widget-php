<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test upload</title>
    <link rel="stylesheet"  href="./Formular/css/formular-style-sheet.css">
</head>
<body>
 <form method="POST" action="./upload.php" enctype="multipart/form-data">     <!-- ohne das enctype multipart/form-data wird das array nicht befühlt. Also ohne das wir keine datei hochgeladen-->
    <input type="file" name="datei[]"> <!-- wenn du mehrere Dateien uploaden willst kannst du dies so schreiben damit der array mit einem wisch abgearbeitet werden kann. -->
    <button type="submit">upload</button>
 </form>   
</body>
</html>