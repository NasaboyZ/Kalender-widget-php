<?php
session_start();

// Ausgabe der Formulardaten zum Debuggen
var_dump($_POST);    

$hasError = false;
$errorMessages = array();

// Überprüfen, ob Formulardaten vorhanden sind und nicht leer sind
if (!empty($_POST)) {
    // Überprüfen auf leere Felder
    foreach ($_POST as $field => $value) {
        if (empty($value)) {
            $hasError = true;
            $errorMessages[] = ucfirst($field) . ' darf nicht leer sein';
        }
    }

    // Nur wenn keine leeren Felder vorhanden sind, weitere Validierungen durchführen
    if (!$hasError) {
        // Adresse überprüfen ob Sie keine Zahl ist
        if (preg_match('/\d/', $_POST['adresse'])) { 
            $hasError = true;
            $errorMessages[] = 'Die Adresse darf keine Zahlen enthalten';
        }

        // Postleizahl darf keine Buchstaben haben
        if (preg_match('/[a-zA-Z]/', $_POST['plz'])) {
            $hasError = true;
            $errorMessages[] = 'Die Postleizahl darf keine Buchstaben haben';
        }

        // Message max Anzahl Zeichen
        if (strlen($_POST['message']) < 4 || strlen($_POST['message']) > 250) {
            $hasError = true;
            $errorMessages[] = 'Die Nachrichten müssen mehr als 4 und nicht länger als 250 Buchstaben enthalten';
        }

        // Nutzername überprüfung auf Buchstaben
        if (!preg_match('/[A-Z]/', $_POST['nutzername'])) {
            $hasError = true;
            $errorMessages[] = 'Nutzername muss mindestens einen Grossbuchstaben enthalten';
        }
        

        // E-Mail-Adresse überprüfen
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $hasError = true;
            $errorMessages[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
        }

        // Vorname überprüfen
        if (empty($_POST['firstname'])) {
            $hasError = true;
            $errorMessages[] = 'Vorname darf nicht leer sein';
        }

        // Nachname überprüfen
        if (empty($_POST['secondName'])) {
            $hasError = true;
            $errorMessages[] = 'Nachname darf nicht leer sein';
        }

        // Nutzername überprüfen
        if (empty($_POST['nutzername']) || strlen($_POST['nutzername']) < 4 || strlen($_POST['nutzername']) > 16 || strpos($_POST['nutzername'], ' ') !== false) {
            $hasError = true;
            $errorMessages[] = 'Nutzername muss zwischen 4 und 16 Zeichen lang sein und darf keine Leerzeichen enthalten';
        }

        // Mindestlänge und Zeichen des Passworts überprüfen
        if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 25 || !preg_match('/[0-9]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages[] = 'Passwort muss zwischen 8 und 25 Zeichen lang sein und mindestens eine Zahl enthalten';
        }

        // Gross- und Kleinschreibung des Passworts überprüfen
        if (!preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[a-z]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages[] = 'Passwort muss mindestens einen Grossbuchstaben und einen Kleinbuchstaben enthalten';
        }

        // Sonderzeichen im Passwort überprüfen
        if (!preg_match('/[^a-zA-Z\d]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages[] = 'Passwort muss mindestens ein Sonderzeichen enthalten';
        }

        // Kein Leerzeichen im Passwort überprüfen
        if (strpos($_POST['password'], ' ') !== false) {
            $hasError = true;
            $errorMessages[] = 'Passwort darf keine Leerzeichen enthalten';
        }

        // Überprüfen, ob eine Anrede ausgewählt wurde
        if (!isset($_POST['anrede'])) {
            $hasError = true;
            $errorMessages[] = 'Bitte wählen Sie eine Anrede aus!';
        } 

        // Überprüfen, ob eine Checkbox ausgewählt wurde
        if (!isset($_POST['agb'])) {
            $hasError = true;
            $errorMessages[] = 'Bitte noch die AGBs bestätigen.';
        } 

        // Überprüfen, ob eine Selection ausgewählt wurde
        if (!isset($_POST['city'])) {
            $hasError = true;
            $errorMessages[] = 'Bitte wählen Sie Ihr Land aus!';
        }
    }
} else {
    // Falls Formulardaten fehlen, leere Felder-Fehler hinzufügen
    $hasError = true;
    $errorMessages[] = 'Bitte füllen Sie das Formular aus';
}

// Setze $_SESSION['hasError'] auf true, wenn ein Fehler aufgetreten ist
$_SESSION['hasError'] = $hasError;

require_once './Formular/neuer-benutzer.php';

// Weitere Verarbeitung je nachdem, ob ein Fehler aufgetreten ist oder nicht
if ($hasError) {
    // Wenn Fehler auftreten, Weiterleitung zurück zum Formular mit Fehlermeldungen
    $_SESSION['errorMessages'] = $errorMessages;
    $_SESSION['inputs'] = $_POST;
    header('Location: ./formular.php');
    exit();
} else {
    // Wenn keine Fehler vorliegen, Weiterleitung an neuer-benutzer.php
    header('Location: ./Formular/neuer-benutzer.php');  
    var_dump($_SESSION); 
    echo'jojo';
    exit();
}
?>
