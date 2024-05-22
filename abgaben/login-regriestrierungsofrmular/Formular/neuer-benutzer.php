<?php
require_once './mysql/db-conation.php';

if (!$hasError) {
    // Check if both username and password are set
    if (isset($_POST['nutzername']) && isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['nutzername']);
        $password = $_POST['password']; // Get raw password
        
        // Check if the username already exists
        $checkQuery = "SELECT COUNT(*) AS count FROM usertest WHERE nutzername = :nutzername";
        $checkStatement = $db->prepare($checkQuery);
        $checkStatement->bindParam(':nutzername', $username);
        $checkStatement->execute();
        $result = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo 'Der Benutzername ist bereits vergeben.';
            exit();
        }

        // Validate and hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $insertQuery = "INSERT INTO usertest (nutzername, password) VALUES (:nutzername, :password)";
        $statement = $db->prepare($insertQuery);
        $statement->bindParam(':nutzername', $username);
        $statement->bindParam(':password', $hashedPassword);
        
        try {
            $statement->execute();
            // Redirect or display success message
            header('Location: ./admin-login.php');
            exit();
        } catch (PDOException $e) {
            echo 'Die Daten konnten nicht gespeichert werden: ' . $e->getMessage();
        }
    } else {
        echo "Es wurden keine Daten gesendet.";
    }
} else {
    echo "Es wurde keine POST-Anfrage gesendet.";
}
