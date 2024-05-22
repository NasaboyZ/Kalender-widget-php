<?php
// Verbindung zur Datenbank herstellen
require_once './mysql/db-conation.php';

// Fehlermeldung initialisieren
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten verarbeiten und mit htmlspecialchars behandeln, um XSS-Angriffe zu verhindern
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password']; // Passwort wird nicht mit htmlspecialchars behandelt, da es mit dem in der Datenbank gespeicherten Wert verglichen wird

    // Daten validieren (hier: prüfen, ob die erforderlichen Felder nicht leer sind)
    if (!empty($username) && !empty($password)) {
        // Benutzerdaten aus der Datenbank abrufen
        $query = "SELECT * FROM usertest WHERE nutzername = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Überprüfen, ob der Benutzer existiert und das Passwort korrekt ist
        if ($user && password_verify($password, $user['password'])) {
            // Anmeldung erfolgreich, Benutzer zur gewünschten Seite weiterleiten
            header("Location: ./gehaim.php");
            exit;
        } else {
            $errorMessage = "Invalid username or password.";
        }
    } else {
        $errorMessage = "Please enter username and password.";
    }
}
?>