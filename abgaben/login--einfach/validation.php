<?php
$hasError = false;
$errorMessages = array();

// Überprüfen, ob Formulardaten vorhanden sind und nicht leer sind
if (!empty($_POST)) {
    // Überprüfen auf leere Felder
    foreach ($_POST as $field => $value) {
        if (empty($value)) {
            $hasError = true;
            $errorMessages[$field] = ucfirst($field) . ' darf nicht leer sein';
        }
    }

    // Nur wenn keine leeren Felder vorhanden sind, weitere Validierungen durchführen
    if (!$hasError) {
        // Adresse überprüfen, ob sie keine Zahl enthält
        if (preg_match('/\d/', $_POST['adresse'])) { 
            $hasError = true;
            $errorMessages['adresse'] = 'Die Adresse darf keine Zahlen enthalten';
        }

        // Postleitzahl darf keine Buchstaben enthalten
        if (preg_match('/[a-zA-Z]/', $_POST['plz'])) {
            $hasError = true;
            $errorMessages['plz'] = 'Die Postleitzahl darf keine Buchstaben enthalten';
        }

        // Nachricht überprüfen (zwischen 4 und 250 Zeichen)
        if (strlen($_POST['message']) < 4 || strlen($_POST['message']) > 250) {
            $hasError = true;
            $errorMessages['message'] = 'Die Nachricht muss mehr als 4 und nicht länger als 250 Zeichen enthalten';
        }

        // Nutzername überprüfen auf Grossbuchstaben
        if (!preg_match('/[A-Z]/', $_POST['nutzername'])) {
            $hasError = true;
            $errorMessages['nutzername'] = 'Der Nutzername muss mindestens einen Grossbuchstaben enthalten';
        }

        // E-Mail-Adresse überprüfen
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $hasError = true;
            $errorMessages['email'] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
        }

        // Vorname überprüfen
        if (empty($_POST['firstname'])) {
            $hasError = true;
            $errorMessages['firstname'] = 'Vorname darf nicht leer sein';
        }

        // Nachname überprüfen
        if (empty($_POST['secondName'])) {
            $hasError = true;
            $errorMessages['secondName'] = 'Nachname darf nicht leer sein';
        }

        // Land überprüfen
        if (empty($_POST['city']) || $_POST['city'] === '') {
            $hasError = true;
            $errorMessages['city'] = 'Bitte wählen Sie Ihr Land aus';
        }

        // Nutzername überprüfen (zwischen 8 und 25 Zeichen, ohne Leerzeichen)
        if (empty($_POST['nutzername']) || strlen($_POST['nutzername']) < 8 || strlen($_POST['nutzername']) > 25 || strpos($_POST['nutzername'], ' ') !== false) {
            $hasError = true;
            $errorMessages['nutzername'] = 'Der Nutzername muss zwischen 8 und 25 Zeichen lang sein und darf keine Leerzeichen enthalten';
        }

        // Passwort-Mindestanforderungen überprüfen
        if (!preg_match('/[0-9]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages['password'] = 'Das Passwort muss mindestens eine Zahl enthalten';
        }

        // Gross- und Kleinschreibung des Passworts überprüfen
        if (!preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[a-z]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages['password'] = 'Das Passwort muss mindestens einen Grossbuchstaben und einen Kleinbuchstaben enthalten';
        }

        // Sonderzeichen im Passwort überprüfen
        if (!preg_match('/[^a-zA-Z\d]/', $_POST['password'])) {
            $hasError = true;
            $errorMessages['password'] = 'Das Passwort muss mindestens ein Sonderzeichen enthalten';
        }

        // Kein Leerzeichen im Passwort überprüfen
        if (strpos($_POST['password'], ' ') !== false) {
            $hasError = true;
            $errorMessages['password'] = 'Das Passwort darf keine Leerzeichen enthalten';
        }

        // Überprüfen, ob die Passwort-Wiederholung übereinstimmt
        if ($_POST['password'] !== $_POST['password_repeat']) {
            $hasError = true;
            $errorMessages['password_repeat'] = 'Die Passwörter stimmen nicht überein';
        }

        // Überprüfen, ob eine Anrede ausgewählt wurde
        if (!isset($_POST['anrede'])) {
            $hasError = true;
            $errorMessages['anrede'] = 'Bitte wählen Sie eine Anrede aus!';
        }

        // Überprüfen, ob die AGB bestätigt wurden
        if (!isset($_POST['agb'])) {
            $hasError = true;
            $errorMessages['agb'] = 'Bitte bestätigen Sie die AGB';
        }

        // Falls keine Fehler vorhanden sind, die Daten in die Datenbank einfügen
        if (!$hasError) {
            include './neuer-benutzer.php';
        }
    }
} else {
    // Falls Formulardaten fehlen, leere Felder-Fehler hinzufügen
    $errorMessages['form'] = 'Bitte füllen Sie das Formular aus';
}
?>
