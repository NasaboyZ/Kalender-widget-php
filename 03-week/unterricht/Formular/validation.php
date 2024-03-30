<?php
session_start();

// Erforderliche Dateien einbinden
 require '../phpmailer/vendor/autoload.php'; // Mailer-Bibliothek einbinden
require 'config.php'; // Konfigurationsdatei mit den Mailer-Einstellungen einbinden

// Ausgabe der Formulardaten zum Debuggen
var_dump($_POST);

$hasError = false;
$errorMessages = array();

// Überprüfen auf leere Felder
$requiredFields = ['firstname', 'secondName', 'adresse', 'plz', 'ort', 'email', 'password', 'message'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $hasError = true;
        $errorMessages[] = ucfirst($field) . ' darf nicht leer sein'; //ucfirst macht den erst buchstaben gross eines string 
    }
}



//Adresse überprüft ob Sie keine zahl ist
if (preg_match('/\d/', $_POST['adresse'])) { 
    $hasError = true;
    $errorMessages[] = 'Die Adresse darf keine Zahlen enthalten';
}

//postleizahl darf kein buchstaben haben
if(preg_match('/[a-zA-Z]+/g', $_POST['plz'])){
    $hasError = true;
    $errorMessages[]= 'Die Postleizahl darf keine Buchstaben haben';
}

//plz überprüfung auf Buchstaben

if(preg_match('/[a-zA-Z]+/g',$_POST['plz'])){
    $hasError = true;
    $errorMessages [] = 'Postleizahlen dürfen keine Buchstaben haben';
}

// Message max anzahl zeichen
if(strlen($_POST['message'])<4 || strlen($_POST['message']>250)){
    $hasError = true;
    $errorMessages []= 'Die Nachrichten müssen mehr als 4 sein  und nicht länger als 250 Buchstaben enthaltnen';
}
//nutzername überprüfung auf Buchstaben

if(preg_match('/[a-zA-Z]+/g',$_POST['nutzername'])){
    $hasError = true;
    $errorMessages [] = 'Postleizahlen dürfen keine Buchstaben haben';
}

// E-Mail-Adresse überprüfen
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $hasError = true;
    $errorMessages[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
}

// Mindestlänge und Leerzeichen im nutzer überprüfen
if (strlen($_POST['nutzername']) < 4 || strlen($_POST['nutzername']) > 16 || strpos($_POST['nutzername'], ' ') !== false) {
    $hasError = true;
    $errorMessages[] = 'Vorname muss zwischen 4 und 16 Zeichen lang sein und  darf keine Leerzeichen enthalten';
}

// Mindestlänge und Zeichen des Passworts überprüfen
if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 25 || !preg_match('/[0-9]/', $_POST['password'])) {
    $hasError = true;
    $errorMessages[] = 'Passwort muss zwischen 8 und 25 Zeichen lang sein und mindestens eine Zahl enthalten';
}

// Gross- und Kleinschreibung des Passworts überprüfen
if (!preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[a-z]/', $_POST['password'])) {
    $hasError = true;
    $errorMessages[] = 'Passwort muss mindestens einen Großbuchstaben und einen Kleinbuchstaben enthalten';
}

// Sonderzeichen im Passwort überprüfen
if (!preg_match('/[^a-zA-Z\d]/', $_POST['password'])) {
    $hasError = true;
    $errorMessages[] = 'Passwort muss mindestens ein Sonderzeichen enthalten';
}

// Leerzeichen im Passwort überprüfen
if (strpos($_POST['password'], ' ') !== false) {
    $hasError = true;
    $errorMessages[] = 'Passwort darf keine Leerzeichen enthalten';
}

// Überprüfen, ob eine Anrede ausgewählt wurde #Radio Button überprüfung
if (!isset($_POST['anrede'])) {
    $hasError = true;
    $errorMessages[] = 'Bitte wählen Sie eine Anrede aus!';
} 
// Überprüfen, ob eine Checkbox ausgewählt wurde #checkbox überprüfung
if (!isset($_POST['agb'])) {
    $hasError = true;
    $errorMessages[] = 'Bitte noch die AGBs bestätigen.';
} 
// Überprüfen, ob eine Selection ausgewählt wurde #select input überprüfung
if (!isset($_POST['city'])) {
    $hasError = true;
    $errorMessages[] = 'Bitte noch die AGBs bestätigen.';
} 

    

// Wenn keine Fehler vorliegen
if (!$hasError) {
    // Vorbereitung zum Versenden der E-Mails
    $mailer = new PHPMailer();
    $mailer->isSMTP();
    $mailer->Host = SMTP_HOST;
    $mailer->Username = SMTP_USER;
    $mailer->Password = SMTP_PASSWORD;
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mailer->Port = 465;

    // E-Mail an den registrierten Benutzer
    $mailer->setFrom('citystrolch@gmail.com', 'Terry Harker Privat');
    $mailer->addAddress($_POST['email'], $_POST['firstname'] . ' ' . $_POST['secondName']); 
    $mailer->isHtml(true);
    $mailer->Subject = 'Bestätigung von M.W.C Collectives';
    $mailer->Body = 'Hallo ' . $_POST['firstname'] . ', du bist registriert. Vielen Dank für Ihre Anmeldung!';

    // E-Mail an den Administrator
    $mailer->addAddress('terry.harker@bytekultur.net', 'Terry Harker, byteKultur');
    $mailer->Subject = 'Neue Benutzerregistrierung';
    $mailer->Body = 'Ein neuer Benutzer mit dem Namen ' . $_POST['firstname'] . ' ' . $_POST['secondName'] . ' hat sich registriert.';

    // Versenden der E-Mails
    if (!$mailer->send()) {
        $hasError = true;
        $errorMessages[] = 'Fehler beim Versenden der E-Mails: ' . $mailer->ErrorInfo;
    }
}

// Setzen der Sitzungsvariablen für Fehlerindikator und Fehlermeldungen
$_SESSION['hasError'] = $hasError;
$_SESSION['errorMessages'] = $errorMessages;

// Umleitung zum ursprünglichen Formular
header("Location: formular.php");
 exit();
?>
