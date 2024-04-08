<?php 
// Funktion zur Ausgabe der Fehlermeldung
function printErrorMessage($errorMessages, $errorKey) {
    if(isset($errorMessages[$errorKey])) {
        echo '<span class="error">' . $errorMessages[$errorKey] . '</span><br>';
    }
}

// Beispielaufruf: printErrorMessage($errorMessages, 'empty_field');
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
            <?php printErrorMessage($errorMessages, 'empty_field'); ?>
            <?php printErrorMessage($errorMessages, 'invalid_username'); ?>
            
            <label for="email">E-Mail:</label><br>
            <input type="email" id="email" name="email"><br>
            <?php printErrorMessage($errorMessages, 'empty_field'); ?>
            <?php printErrorMessage($errorMessages, 'invalid_email'); ?>
            
            <label for="password">Passwort:</label><br>
            <input type="password" id="password" name="password"><br>
            <?php printErrorMessage($errorMessages, 'empty_field'); ?>
            <?php printErrorMessage($errorMessages, 'invalid_password'); ?>
            
            <label for="password-repeat">Passwort wiederholen:</label><br>
            <input type="password" id="password-repeat" name="password-repeat"><br>
            <?php printErrorMessage($errorMessages, 'empty_field'); ?>
            <?php printErrorMessage($errorMessages, 'password_mismatch'); ?>
            
            <label for="country">Land:</label><br>
            <select id="country" name="country">
                <option value="DE">Deutschland</option>
                <option value="AT">Österreich</option>
                <option value="CH">Schweiz</option>
                <!-- Weitere Länderoptionen hier einfügen -->
            </select><br>
            <?php printErrorMessage($errorMessages, 'empty_country'); ?>
            
            <input type="checkbox" id="checkbox" name="checkbox">
            <label for="checkbox">Ich stimme den Nutzungsbedingungen zu</label><br>
            <?php printErrorMessage($errorMessages, 'empty_checkbox'); ?>
            
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
