<?php
session_start();

try {
    // Verbindung zur Datenbank herstellen
    $db = new PDO('mysql:host=localhost;dbname=pinkTonic', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    // Fehlerbehandlung bei Verbindungsfehler
    die('MySQL Verbindungsfehler: ' . $exception->getMessage());
    var_dump($db);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfung und Einfügung der Daten in die Datenbank durchführen
    if (isset($_POST['nutzername']) && isset($_POST['password'])) {
        $nutzername = htmlspecialchars($_POST['nutzername']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Überprüfen, ob der Benutzername bereits existiert
        $checkQuery = "SELECT COUNT(*) AS count FROM usertest WHERE nutzername = :nutzername";
        $checkStatement = $db->prepare($checkQuery);
        $checkStatement->bindParam(':nutzername', $nutzername);
        $checkStatement->execute();
        $result = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo 'Der Benutzername ist bereits vergeben.';
            exit();
        }

        // Daten in die Datenbank einfügen
        $insertQuery = "INSERT INTO usertest (nutzername, password) VALUES (:nutzername, :password)";
        $statement = $db->prepare($insertQuery);
        $statement->bindParam(':nutzername', $nutzername);
        $statement->bindParam(':password', $password);

        try {
            $statement->execute();
            // Erfolgreiche Eintragung, Weiterleitung oder Rückmeldung
            header(' Location: ./admin-login.php'); 
            exit();
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
