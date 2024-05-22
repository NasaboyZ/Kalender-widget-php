<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$isPost = strtolower($_SERVER['REQUEST_METHOD']) === 'POST'; // diese variable checkt ab ob der abruf gerade vom Formular kommt oder nicht. strolower macht den string in kleinbuchstaben. Nun Sind Manipulationen nicht möglich.
$hasFile = isset($_FILES['datei']) && count($_FILES['datei']) > 0; // diese variable checkt ab ob ein file hochgeladen wurde. Das wir so überprüft das man in der Globalen Variable $_FILES in einen Array überprüft und schaut ob dieser key Datei existiert.


if(!$isPost && !$hasFile) {
    header('Location:./index.php');
    exit();
}

$dateiPfad = $_FILES['datei']['tmp_name'] [0];// das tmp_name ist der Pfad wo die Datei temporär gespeichert ist. wenn wir also beim index schauen haben wir doch die Eckigen klammern geschrieben beim name Datei. ohne die Eckigen klammern würde es gehen aber wir haben sie mitgegeben,das heisst wir müssen sie auch hier schreiben.

$fileSize = filesize($dateiPfad); // diese Funktion gibt die Größe des Files zurück.

$finfo = finfo_open(FILEINFO_MIME_TYPE); // diese Funktion gibt den MIME Type des Files zurück.

$type = finfo_file($finfo, $dateiPfad);

if($fileSize === 0){ // diese if Abfrage überprüft ob die Datei leer ist.
    echo 'Die Datei ist leer';
    die();
}
// wellche dateitypen sind erlaubt
$erlaubteTypen = [
    'image/png'=> 'png',
    'image/jpeg'=> 'jpeg',
    'image/gif' => 'gif',
    'image/webp' => 'webp'
];

if(!in_array($type,array_keys($erlaubteTypen))){ // in_array ist eine Funktion die überprüft ob ein Wert in einem Array steht.
    echo 'Ungültiger Dateityp';
    die();
}

$erweiterung = $erlaubteTypen[$type];

$zielPfad = __DIR__ .'../gehaim.php'.time().'.'.$erweiterung;// __DIR__ gibt den Pfad des aktuellen Verzeichnisses zurück. $erweiterung gibt die erweiterung des Files zurück.
if(!copy($dateiPfad, $zielPfad)){ // copy ist eine Funktion die überprüft ob eine Datei kopiert werden kann.
    echo "Konnte". $dateiPfad. "nicht in ". $zielPfad. " kopieren";
    die();
}

unlink($dateiPfad); // unlink ist eine Funktion die eine Datei löscht.
echo $zielPfad. " wurde erfolgreich hochgeladen";