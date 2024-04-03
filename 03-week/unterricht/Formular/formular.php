<?php
session_start();
?>


<?php

$pageTitle = basename($_SERVER['PHP_SELF'], '.php');

    if(!empty($_POST) && isset($cities[$_POST['city']])) {
        include "text/{$_POST['city']}.html";
    }
?>
    <?php include 'länder/country.php'; ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>

    <style>
       body * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        background: rgba(223, 230, 231);
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        height: 100vh;
    }
    
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 0 25px;
        height: 10vh;
    }
    .container-for-interaction {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .container-for-interaction > a {
        text-decoration: none;
        color: black;
        padding: 7px 27px 7px 27px;
        border: solid black 3px;
        background: yellow;
    }

    .form-kontakt {
        gap: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 40%;
    }

    a {
        text-decoration: none;
        color: black;
    }
    .continer-anrede {
        display:flex;
        gap: 1rem;
        margin-left:2rem;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: blue; 
        box-shadow: 0 0 5px blue; 
    }
    .container-länder {
        gap: 1rem;
        display: flex;
        flex-direction: column;
}

    }
    </style>
</head>
<body>
        <?php include 'XSS/functiongengenXss.php';?>

    <header>
        <nav>
            <div class="logo-in-login"><a href="index.html">M.W.C</a></div>
            <div class="container-for-interaction">
                <p class="frage-an-user">Do you already have an account?</p>
                <a href="login.html" class="btn-login">Login</a>
            </div>
        </nav>
    </header>
    
    <main> 
        <div class="container-form">
            <form class="form-kontakt" action="validation.php" method="POST">
                <div class="continer-anrede">
                    <input type="radio" id="male" name="anrede" value="Herr">
                    <label for="male">Herr</label> <br>

                    <input type="radio" id="female" name="anrede" value="Frau">
                    <label for="female">Frau</label> <br>
                    
                    <input type="radio" id="other" name="anrede" value="Andere">
                    <label for="other">Nonbinary</label>
                    <?php
                if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Bitte wählen Sie eine Anrede aus!', $_SESSION['errorMessages'])) {
                    echo '<p style="color: red;">Bitte wählen Sie eine Anrede aus!</p>';
                }
                ?>
                    
                </div>


                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" value="$firstname" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Vorname darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Vorname darf nicht leer sein</p>';
                    }
                    ?>
                </div>


                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" value="$secondname" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Nachname darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Nachname darf nicht leer sein</p>';
                    }
                    ?>
                </div>

                <div class="container-länder">
                    <label for="city">Bitte wählen Sie Ihr Land aus:</label>
                    <select name="city" id="city">
                        <?php foreach($countries as $key => $value): ?>
                            <option value="<?php echo $key; ?>" <?php if(isset($_POST['city']) && $_POST['city']===$key) echo 'selected'; ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Bitte wählen Sie Ihr Land aus!', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Bitte wählen Sie Ihr Land aus!</p>';
                    }
                    ?>
                </div>

                <div class="container-adresse">
                    <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Adresse darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Adresse darf nicht leer sein</p>';
                    }
                    ?>
                </div>
                <div class="container-hausnummer">
                    <input class="focusout" type="text" name="hausnummer" id="hausnummer" placeholder="Hausnummer" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Hausnummer darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Hausnummer darf nicht leer sein</p>';
                    }
                    ?>
                </div>

                <div class="container-plz">
                    <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Postleitzahl darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Postleitzahl darf nicht leer sein</p>';
                    }
                    ?>
                </div>

                <div class="container-ort">
                    <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Ort darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Ort darf nicht leer sein</p>';
                    }
                    ?>
                </div>

                <div class="container-nutzername">
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Nutzername darf nicht leer sein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Nutzername darf nicht leer sein</p>';
                    }
                    ?>
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Bitte geben Sie eine gültige E-Mail-Adresse ein', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Bitte geben Sie eine gültige E-Mail-Adresse ein</p>';
                    }
                    ?>
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password" >
                    <?php
                    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Passwort muss zwischen 8 und 25 Zeichen lang sein und mindestens eine Zahl enthalten', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Passwort muss zwischen 8 und 25 Zeichen lang sein und mindestens eine Zahl enthalten</p>';
                    }
                    ?>
                </div>

                <div class="container-agb">
                <input type="checkbox" id="agb" name="agb" value="accepted"> AGB

                        <span class="checkmark"></span>
                    </label>

                    <?php
    if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Bitte noch die AGBs bestätigen.', $_SESSION['errorMessages'])) {
        echo '<p style="color: red;">Bitte noch die AGBs bestätigen.</p>';
    }
    ?>
                </div>

                <div class="container-newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
                    <label for="newsletter">Ich möchte den Newsletter abonieren.</label>
                </div>

                <div class="container-messsage">
                    <textarea name="message" id="message" placeholder="Nachricht"></textarea>
                      <?php
                        if(isset($_SESSION['hasError']) && $_SESSION['hasError'] && in_array('Die Nachrichten müssen mehr als 4 sein  und nicht länger als 250 Buchstaben enthalten', $_SESSION['errorMessages'])) {
                        echo '<p style="color: red;">Die Nachrichten müssen mehr als 4 Zeichen lang sein und dürfen nicht länger als 250 Zeichen sein.</p>';
                        }
    ?>
                </div>

                <div class="container-submit">
                    <input class="focusout" id="submit" type="submit" value="Abschicken!">
                </div>
            </form>
        </div>
    </main>

    <?php 

    ?>
</body>
</html>
