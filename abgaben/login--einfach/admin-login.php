<?php
session_start();
require '/login/login.php';

function getUserId() {
    // Überprüfen, ob eine Benutzer-ID in der Session gespeichert ist
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    } else {
        // Keine Benutzer-ID gefunden, hier könnte eine Fehlerbehandlung eingefügt werden
        return null; // oder throw new Exception('Benutzer-ID nicht gefunden.');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,300;1,400;1,500;1,700;1,800;1,900&family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <title>Login</title>
</head>

<body>

    <nav>
        <div class="logo-in-login"><a href="./index.php">M.W.C</a></div>
        <div class="container-for-interaction">
            <p class="frage-an-user">Create an account with us?</p>
            <a href="./formular.php" class="btn-login">Sign up</a>
        </div>
    </nav>
    <div class="container-login">
        <form action='' method="POST">
            <?php
            if (!empty($errorMessage)) {
                echo '<p style="color:red">' . $errorMessage . '</p>';
            }
            ?>
            <div class="user-name">
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="Enter your Username">
            </div>

            <div class="passwort">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Enter your Password">
            </div>

            <div class="container-submit">
                <input class="focusout" id="submit" type="submit" value="Login" />
            </div>
        </form>
    </div>

</body>

</html>
