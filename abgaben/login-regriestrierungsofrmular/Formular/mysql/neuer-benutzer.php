<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=pinkTonic', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    die('MySQL Verbindungsfehler: ' . $exception->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nutzername']) && isset($_POST['password'])) {
        $nutzername = htmlspecialchars($_POST['nutzername']); // Sicherheit: HTML-Tags entfernen
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Sicher gehashtes Passwort

        // Überprüfung, ob Benutzername bereits vorhanden ist - Beispiel
        $checkQuery = "SELECT COUNT(*) AS count FROM usertest WHERE nutzername = :nutzername";
        $checkStatement = $db->prepare($checkQuery);
        $checkStatement->bindParam(':nutzername', $nutzername);
        $checkStatement->execute();
        $result = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo 'Der Benutzername ist bereits vergeben.';
            exit(); // Beende das Skript, um das Einfügen in die Datenbank zu verhindern
        }

        // Einsetzen der Daten in die Datenbank
        $insertQuery = "INSERT INTO usertest (nutzername, password) VALUES (:nutzername, :password)";
        $statement = $db->prepare($insertQuery);
        $statement->bindParam(':nutzername', $nutzername);
        $statement->bindParam(':password', $password);

        try {
            $statement->execute();
            //echo 'Daten erfolgreich in die Datenbank eingefügt.'; // Auskommentiert für die Weiterleitung
            header("Location: admin-login.php");
            exit(); // Beende das Skript nach der Weiterleitung
        } catch (Exception $e) {
            echo 'Die Daten konnten nicht gespeichert werden: ' . $e->getMessage();
        }
    } else {
        echo "Es wurden keine Daten gesendet.";
    }
} else {
    echo "Es wurde keine POST-Anfrage gesendet.";
}

?>
