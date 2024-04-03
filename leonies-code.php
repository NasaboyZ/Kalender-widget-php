<?php 
// SEO konfigurieren
$pageTitle = "Knotted Cloud Registration New";

// Auslesen von Daten aus einem POST Formular:
echo '<pre>';
// var_dump($_POST);
print_r($_POST);
echo '</pre>';

// Status Variablen
$hasError = false;
$errorMessages = array();

// Input Variablen
$userName = isset($_POST['username']) ? $_POST['username'] : '';
$eMail = isset($_POST['email']) ? $_POST['email'] : '';
$passWord = isset($_POST['password']) ? $_POST['password'] : '';
$passwordRepeat = isset($_POST['password-repeat']) ? $_POST['password-repeat'] : '';

$inputFields = array($userName, $eMail, $passWord, $passwordRepeat);

// zuerst abfragen, ob überhaupt Daten existieren / angekommen sind
if(!empty($inputFields)) {
    // ----- checkbox ergänzen? oder unten in if statement? -----
    echo 'Alle Werte exisitieren';

    // Auf leere Felder prüfen
    // prüfen auf leere Felder gender ratio button
    if(empty($_POST['gender'])) {
        // das Feld gender ist empty
        $hasError = true;
        $errorMessages[] = 'Kein Geschlecht angewählt';
        echo 'Kein Geschlecht angewählt';
    }

    // prüfen auf leere Felder username
    if(empty($userName)) {
        // das Feld username ist empty
        $hasError = true;
        $errorMessages[] = 'Username darf nicht leer sein';
        echo 'Username ist leer';
    }

    // prüfen auf leere Felder email
    if(empty($eMail)) {
        // das Feld email ist empty
        $hasError = true;
        $errorMessages[] = 'Email darf nicht leer sein';
        echo 'Email ist leer';
    }

    // prüfen auf leere Felder password
    if(empty($passWord)) {
        // das Feld password ist empty
        $hasError = true;
        $errorMessages[] = 'Passwort darf nicht leer sein';
        echo 'Passwort ist leer';
    }

    if(empty($passwordRepeat)) {
        // das Feld password-repeat ist empty
        $hasError = true;
        $errorMessages[] = 'Passwort-Repeat darf nicht leer sein';
        echo 'Passwort-Repeat ist leer';
    }

    // prüfen auf leere Felder country select
    if(empty($_POST['country'])) {
        // das Feld country ist empty
        $hasError = true;
        $errorMessages[] = 'Kein Land ausgewählt';
        echo 'Country-Selection ist leer';
    }

    // prüfen auf leere Felder checkbox
    if(empty($_POST['checkbox'])) {
        // das Feld checkbox ist empty
        $hasError = true;
        $errorMessages[] = 'Checkbox nicht angewählt';
        echo 'Checkbox ist nicht angewählt';
    }   

    // Validierung Werte
    // Nutzername
    // 4-16 Zeichen
    $nameLaenge = strlen($userName);
    if($nameLaenge < 4 || $nameLaenge > 16){
        $hasError = true;
        $errorMessages[] = "Username muss zwischen 4 und 16 Zeichen haben";
    }
    // ohne Leerzeichen
    if(strpos($userName, " ") !== false) {
        // wenn Leerzeichen vorkommt, dann
        $hasError = true;
        $errorMessages[] = 'Username darf keine Leerzeichen enthalten';
    }

    // Email
    // Valide Email Adresse 
    if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
        // wenn nicht korrekt
        $hasError = true;
        $errorMessages[] = 'Bitte eine gültige Email angeben';
    }

    // Passwort
    // Mindestens 8 Zeichen
    $passwortLaenge = strlen($passWord);
    if($passwortLaenge < 8){
        $hasError = true;
        $errorMessages[] = "Passwort muss mindestens 8 Zeichen haben";
    }

    // mind. ein Grossbuchstaben
    if(!preg_match("/[A-Z]/", $passWord)) {
        $hasError = true;
        $errorMessages[] = 'Passwort muss mindestens einen Grossbuchstaben enthalten';
    }

    // mind. ein Kleinbuchstaben
    if(!preg_match("/[a-z]/", $passWord)) {
        $hasError = true;
        $errorMessages[] = 'Passwort muss mindestens einen Kleinbuchstaben enthalten';
    }

    // mind. 1 Sonderzeichen
    if (!preg_match("/[^\w\s]/", $passWord)) {
        $hasError = true;
        $errorMessages[] = 'Passwort muss mindestens ein Sonderzeichen enthalten';
    }

    // keine Leerzeichen
    if(strpos($passWord, " ") !== false) {
        // wenn Leerzeichen vorkommt, dann
        $hasError = true;
        $errorMessages[] = 'Passwort darf keine Leerzeichen enthalten';
    }

    // Mindestens eine Zahl
    if (!preg_match("/[0-9]/", $passWord)) {
        $hasError = true;
        $errorMessages[] = 'Passwort muss mindestens eine Zahl enthalten';
    }

    // Password repeat
    // Stimmt mit 'password' überein
    if ($passwordRepeat !== $passWord) {
        $hasError = true;
        $errorMessages[] = 'Die Passwörter stimmen nicht überein';
    }

    // Select-Inputs
    if (empty($_POST['country'])) {
        $hasError = true;
        $errorMessages[] = 'Bitte ein Land auswählen';
    }    

    // Checkbox-Input
    // Bereinigen der Werte, bevor sie weiterverwendet werden
    // HTML Tags entfernen
    $clearUsername = strip_tags($userName);
    $clearEmail = strip_tags($eMail);
    $clearPassword = strip_tags($passWord);
    $clearPasswordRepeat = strip_tags($passwordRepeat);
    $clearCountry = strip_tags($_POST['country']);

    // wenn keine Fehler, dann versenden
    if(!$hasError) {
        echo 'ready zum verschicken des Emails';
    }

} else {
    echo 'ein Wert existiert nicht';
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Weitere Meta-Tags und Stylesheets einbinden -->
</head>
<body>
    <header>
        <!-- Header -->
   

    <header class="main-header register">
        <!-- Navigation -->
        <?php include('partials/navigation-admin.php') ?>

        <!-- links -->
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/login-register.css">
        <link rel="stylesheet" href="assets/css/contact.css"> 
        </header>
    <section>
        <h2>Registrierung</h2>
        <form action="leonies-code.php" method="POST">
            <label for="username">Benutzername:</label><br>
            <input type="text" id="username" name="username"><br>
            <?php if(isset($errorMessages) && in_array('Username darf nicht leer sein', $errorMessages)) {
        echo '<span class="error">Username darf nicht leer sein</span><br>';
                } ?>
            
            <label for="email">E-Mail:</label><br>
            <input type="email" id="email" name="email"><br>
            <?php if(isset($errorMessages) && in_array('Email darf nicht leer sein', $errorMessages)) {
        echo '<span class="error">Email darf nicht leer sein</span><br>';
    } ?>
            
            <label for="password">Passwort:</label><br>
            <input type="password" id="password" name="password"><br>
            <?php if(isset($errorMessages) && in_array('Passwort darf nicht leer sein', $errorMessages)) {
    echo '<span class="error">Passwort darf nicht leer sein</span><br>';
} ?>
<?php if(isset($errorMessages) && in_array('Passwort muss mindestens 8 Zeichen haben', $errorMessages)) {
    echo '<span class="error">Passwort muss mindestens 8 Zeichen haben</span><br>';
} ?>
            
            <label for="password-repeat">Passwort wiederholen:</label><br>
            <input type="password" id="password-repeat" name="password-repeat"><br>
            <?php if(isset($errorMessages) && in_array('Passwort-Repeat darf nicht leer sein', $errorMessages)) {
    echo '<span class="error">Passwort-Repeat darf nicht leer sein</span><br>';
} ?>
<?php if(isset($errorMessages) && in_array('Die Passwörter stimmen nicht überein', $errorMessages)) {
    echo '<span class="error">Die Passwörter stimmen nicht überein</span><br>';
} ?>
            <label for="country">Land:</label><br>
            <select id="country" name="country">
                <option value="DE">Deutschland</option>
                <option value="AT">Österreich</option>
                <option value="CH">Schweiz</option>
                <!-- Weitere Länderoptionen hier einfügen -->
            </select><br>
            <?php if(isset($errorMessages) && in_array('Kein Land ausgewählt', $errorMessages)) {
    echo '<span class="error">Bitte wählen Sie ein Land aus</span><br>';
} ?>
            
            <input type="checkbox" id="checkbox" name="checkbox">
            <label for="checkbox">Ich stimme den Nutzungsbedingungen zu</label><br>
            <?php if(isset($errorMessages) && in_array('Checkbox nicht angewählt', $errorMessages)) {
    echo '<span class="error">Bitte akzeptieren Sie die Nutzungsbedingungen</span><br>';
} ?>
            <label for="gender">Geschlecht:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Männlich</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Weiblich</label><br>
            
            <input type="submit" value="Registrieren">
        </form>
    </section>
    <!-- Weitere Abschnitte und Inhalte hier einfügen -->
</body>
</html>
