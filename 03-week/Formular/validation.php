<?php
session_start();

// Auslesen von Daten mit einem POST-Formular
var_dump($_POST);

$hasError = false;
$errorMessages = array();

// Überprüfen auf leere Felder
if(isset($_POST['firstname']) && isset($_POST['secondName']) && isset($_POST['adresse']) && isset($_POST['plz']) && isset($_POST['ort']) && isset($_POST['email']) && isset($_POST['password'])) {
    if(empty($_POST['firstname'])){
        $hasError = true;
        $errorMessages[] = 'Vorname darf nicht leer sein';
    }

    if(empty($_POST['secondName'])){
        $hasError = true;
        $errorMessages[] = 'Nachname darf nicht leer sein';
    }

    if(empty($_POST['adresse'])){
        $hasError = true;
        $errorMessages[] = 'Adresse darf nicht leer sein';
    }

    if(empty($_POST['plz'])){
        $hasError = true;
        $errorMessages[] = 'PLZ darf nicht leer sein';
    }

    if(empty($_POST['ort'])){
        $hasError = true;
        $errorMessages[] = 'Ort darf nicht leer sein';
    }

    if(empty($_POST['email'])){
        $hasError = true;
        $errorMessages[] = 'Email darf nicht leer sein';
    }

    if(empty($_POST['password'])){
        $hasError = true;
        $errorMessages[] = 'Passwort darf nicht leer sein';
    }
} else {
    $hasError = true;
    $errorMessages[] = 'Da ist ein leerer Wert';
}

// E-Mail-Korrekt?
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
    $hasError = true;
    $errorMessages[]= 'Bitte gültige E-Mail ausgeben';
}

// Mindestnutzernamezeichen 4 bis 16
$namenlaenge = strlen($_POST['firstname']);
if($namenlaenge < 4 || $namenlaenge > 16){
    $hasError = true;
    $errorMessages[]= 'Name muss zwischen 4 und 16 Zeichen haben.';
}
// nutzername darf keine leer zeichen haben 
if(strpos($_POST['firstname'], ' ') !== false) {
    $hasError = true;
    $errorMessages[] = 'Vorname darf keine Leerzeichen enthalten';
}

// Password-Mindestanzahl Zeichen 8 bis 25 zeichen haben 
$passwortlaenge = strlen($_POST['password']);

if($passwortlaenge < 8 || $passwortlaenge > 25 ){
    $hasError = true;
    $errorMessages[]= 'Passwort muss zwischen 8 und 25 Zeichen haben.';
}

// Password wird auf Gross- und Kleinschreibung überprüft
if(strtolower($_POST['password']) == $_POST['password']){
    $hasError = true;
    $errorMessages [] = 'Passwort muss mindestens einen Grossbuchstaben enthalten';

    if(strtoupper($_POST['password']) == $_POST['password']){
        $hasError = true;
        $errorMessages [] = 'Passwort muss mindestens einen Kleinbuchstaben haben';
    }
}

// passwort Sonderzeichen
if(strpos($_POST['password'], ' ') !== false) {
    $hasError = true;
    $errorMessages[] = 'Password darf keine Leerzeichen enthalten';
}

// Überprüfen, ob das Passwort mindestens eine Zahl enthält
if (!preg_match('/[0-9]/', $_POST['password'])) {
    $hasError = true;
    $errorMessages[] = 'Passwort muss mindestens eine Zahl enthalten';
}

// Überprüfen, ob ein Wert für den Radio-Button gesetzt ist
if (!isset($_POST['anrede'])) {
    // Wenn keine Anrede ausgewählt wurde, kannst du hier eine Fehlermeldung anzeigen
    $hasError = true;
    $errorMessages[] = 'Bitte wählen Sie eine Anrede aus!';
} 

// Session-Variablen setzen
$_SESSION['hasError'] = $hasError;
$_SESSION['errorMessages'] = $errorMessages;

// Umleitung zum ursprünglichen Formular
header("Location: formular.php");
exit();
?>
