<?php
session_start();
?>

<?php 
if(isset($_SESSION['hasError']) && $_SESSION['hasError'] == true && isset($_SESSION['errorMessages'])) {
    foreach($_SESSION['errorMessages'] as $errorMessage) {
        echo "<p style='color: red;'>$errorMessage</p>";
    }
    unset($_SESSION['hasError']);
    unset($_SESSION['errorMessages']);
}
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
                    
                </div>

                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" >
                </div>

                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" >
                </div>

                <div class="container-länder">
                    <label for="city">Bitte wählen Sie Ihr Land aus:</label>
                    <select name="city" id="city">
                        <?php foreach($countries as $key => $value): ?>
                            <option value="<?php echo $key; ?>" <?php if(isset($_POST['city']) && $_POST['city']===$key) echo 'selected'; ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="container-adresse">
                    <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" >
                </div>

                <div class="container-plz">
                    <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" >
                </div>

                <div class="container-ort">
                    <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" >
                </div>

                <div class="container-nutzername>
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername" >
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email" >
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password" >
                </div>

                <div class="container-agb">
                    <label class="container"id="agb" name="agb" value="agb">AGB
                        <input type="checkbox" >
                        <span class="checkmark"></span>
                    </label>
                </div>

                <div class="container-newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
                    <label for="newsletter">Ich möchte den Newsletter abonieren.</label>
                </div>

                <div class="container-messsage">
                    <textarea name="message" id="message" placeholder="Nachricht"></textarea>
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
