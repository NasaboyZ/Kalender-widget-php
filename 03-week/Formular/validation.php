<?php
// Auslesen von Daten mit einem POST-Formular
var_dump($_POST);

$hasError = false;
$errorMessages = array();

// Überprüfen auf leere Felder
if(isset($_POST['firstName']) && isset($_POST['secondname']) && isset($_POST['adress']) && isset($_POST['plz']) && isset($_POST['ort']) && isset($_POST['email']) && isset($_POST['password'])) {
    if(empty($_POST['firstName'])){
        $hasError = true;
        $errorMessages[] = 'Vorname darf nicht leer sein';
        echo 'Vorname darf nicht leer sein';
    }

    if(empty($_POST['secondname'])){
        $hasError = true;
        $errorMessages[] = 'Nachname darf nicht leer sein';
        echo 'Nachname darf nicht leer sein';
    }

    if(empty($_POST['adress'])){
        $hasError = true;
        $errorMessages[] = 'Adresse darf nicht leer sein';
        echo 'Adresse darf nicht leer sein';
    }

    if(empty($_POST['plz'])){
        $hasError = true;
        $errorMessages[] = 'PLZ darf nicht leer sein';
        echo 'PLZ darf nicht leer sein';
    }

    if(empty($_POST['ort'])){
        $hasError = true;
        $errorMessages[] = 'Ort darf nicht leer sein';
        echo 'Ort darf nicht leer sein';
    }

    if(empty($_POST['email'])){
        $hasError = true;
        $errorMessages[] = 'Email darf nicht leer sein';
        echo 'Email darf nicht leer sein';
    }

    if(empty($_POST['password'])){
        $hasError = true;
        $errorMessages[] = 'Passwort darf nicht leer sein';
        echo 'Passwort darf nicht leer sein';
    }
} else {
    echo 'Da ist ein leerer Wert';
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
    echo 'Vorname darf keine Leerzeichen enthalten';
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
    $errorMessages [] = 'Passwort muss mindestens einen Großbuchstaben enthalten';

    if(strtoupper($_POST['password']) == $_POST['password']){
        $hasError = true;
        $errorMessages [] = 'Passwort muss mindestens einen Kleinbuchstaben haben';
    }
}

// passwort Sonderzeichen
if(strpos($_POST['password'], ' ') !== false) {
    $hasError = true;
    $errorMessages[] = 'password darf keine Leerzeichen enthalten';
    echo 'password darf keine Leerzeichen enthalten';
}
//passwort darf kein leerzeichen haben

// Überprüfen, ob das Passwort mindestens eine Zahl enthält
if (!preg_match('/[0-9]/', $_POST['password'])) {
    $hasError = true;
    $errorMessages[] = 'Passwort muss mindestens eine Zahl enthalten';
    echo 'Passwort muss mindestens eine Zahl enthalten';
}



// Überprüfen, ob ein Wert für den Radio-Button gesetzt ist
if (!isset($_POST['anrede'])) {
    $hasError = true;
    $errorMessages[] = 'Bitte wählen Sie eine Option für den Radio-Button aus';
    echo 'Bitte wählen Sie eine Option für den Radio-Button aus';
}



//Diese auswahl muss wahlide sein
// Gültige Optionen für den Radio-Button
$validOptions = array('option1', 'option2', 'option3');

// Überprüfen, ob ein Wert für den Radio-Button gesetzt ist
if (!isset($_POST['radioOption']) || !in_array($_POST['radioOption'], $validOptions)) {
    $hasError = true;
    $errorMessages[] = 'Bitte wählen Sie eine gültige Option für den Radio-Button aus';
    echo 'Bitte wählen Sie eine gültige Option für den Radio-Button aus';
}



// Select input muss mindest eine Option ausgewählt sein

// diese Auswahl muss valide sein

// Wenn es keine Fehler gibt, nächster Schritt (Versenden)
if($hasError == false){
    echo 'Bereit zum Versenden der E-Mails';
}

// Fehlermeldungen ausgeben (Array als String flatten), wenn vorhanden
if(count($errorMessages) > 0){
    echo implode("<br>", $errorMessages);
}
?>
