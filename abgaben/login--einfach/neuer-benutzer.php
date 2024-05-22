<?php
// Verbindung zur Datenbank herstellen
require_once './mysql/db-conation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten verarbeiten und mit htmlspecialchars behandeln, um XSS-Angriffe zu verhindern
    $firstname = htmlspecialchars($_POST['firstname']);
    $secondname = htmlspecialchars($_POST['secondName']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $hausnummer = htmlspecialchars($_POST['hausnummer']);
    $plz = htmlspecialchars($_POST['plz']);
    $ort = htmlspecialchars($_POST['ort']);
    $nutzername = htmlspecialchars($_POST['nutzername']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // Das Passwort wird nicht mit htmlspecialchars behandelt, da es gehasht wird
    $massages = htmlspecialchars($_POST['message']); // Feld in der Datenbank heißt 'massages'

    // Daten validieren (hier: prüfen, ob die erforderlichen Felder nicht leer sind)
    if (!empty($firstname) && !empty($secondname) && !empty($adresse) && !empty($hausnummer) && !empty($plz) && !empty($ort) && !empty($nutzername) && !empty($email) && !empty($password) && !empty($massages)) {
        // E-Mail-Adresse validieren
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Daten in die Datenbank einfügen
            $insertQuery = "INSERT INTO usertest (firstname, secondname, adresse, hausnummer, plz, ort, nutzername, email, password, massages) VALUES (:firstname, :secondname, :adresse, :hausnummer, :plz, :ort, :nutzername, :email, :password, :massages)";
            $statement = $db->prepare($insertQuery);
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':secondname', $secondname);
            $statement->bindParam(':adresse', $adresse);
            $statement->bindParam(':hausnummer', $hausnummer);
            $statement->bindParam(':plz', $plz);
            $statement->bindParam(':ort', $ort);
            $statement->bindParam(':nutzername', $nutzername);
            $statement->bindParam(':email', $email);
            // Das Passwort wird gehasht, bevor es in die Datenbank eingefügt wird
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':massages', $massages);

            try {
                $statement->execute();
                // Weiterleitung zur admin-bereich.php
                header("Location: ./admin-login.php");
                exit; // Wichtig, um sicherzustellen, dass nach der Weiterleitung nichts mehr ausgeführt wird
            } catch (PDOException $e) {
                // Fehlermeldung sicher ausgeben und in Logs speichern
                error_log("Database Insert Error: " . $e->getMessage());
                echo "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.";
            }
        } else {
            echo "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
        }
    } else {
        echo "Bitte füllen Sie alle erforderlichen Felder aus.";
    }
}
?>
