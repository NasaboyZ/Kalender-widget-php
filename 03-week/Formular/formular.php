<?php 
$pageTitle = basename($_SERVER['PHP_SELF'], '.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $pageTitle ?></title>

    <style>
        body *{
            ox-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            background: rgba(223 230 231);
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
        }
        
        nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0 25px;
            height: 10vh;
        }
        .container-for-interaction{
            display: flex;
            align-items: center;
             gap: 2rem;
        }

        .container-for-interaction > a{
            text-decoration: none;
            color: black;
            padding: 7px 27px 7px 27px;
            border: solid black 3px;
            background: yellow;
        }


        .form-kontakt{
            gap: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 40%;
        }

        a{
            text-decoration: none;
             color: black;

        }
        .continer-anrede{
            display:flex;
            gap: 1rem;
            margin-left:2rem;
        }
    </style>
</head>
<body>
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
            <input type="radio" id="html" name="fav_language" value="anredeer">
             <label for="news-letter">Er</label> <br>

<input type="radio" id="html" name="fav_language" value="anredesie">
             <label for="news-letter">Sie</label> <br>
<input type="radio" id="html" name="fav_language" value="nonbinar">
             <label for="news-letter">nonbinare</label>
    </div>
            <div class="container-firstname">
                <label for="firstname"></label>
                <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" >
            </div>
            <div class="container-secondname">
                <label for="secondName"></label>
                <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" >
            </div>
            <select class="länder" name="#" id="">
                <option value="# my-4">länder</option>
                <option value="#">Schweiz</option>
                <option value="#">Camarun</option>
                <option value="#">Frankreich</option>
                <option value="#">Weissrussland</option>
            </select>
            <div class="container-adresse">
                <label for="adresse"></label>
                <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" >
            </div>
            <div class="container-plz">
                <label for="plz"></label>
                <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" >
            </div>
            <div class="container-ort">
                <label for="ort"></label>
                <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" >
            </div>
            <div class="continer-email">
                <label for="email"></label>
                <input class="focusout" type="email" name="email" id="email" placeholder="Email" >
            </div>
            <div class="continer-password">
                <label for="password"></label>
                <input class="focusout" type="password" name="password" id="password" placeholder="Password" >
            </div>
            <div class="continer-agb">
            <label class="container">AGB
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
            </label>
            </div>

            <div class="continer-newsletter">
            <input type="radio" id="html" name="fav_language" value="news-letter">
             <label for="news-letter">Ich möchte den Newsletter abonieren.</label>
            </div>
            <div class="container-messsage">
                <label for="message"></label>
                <textarea name="message" id="message" placeholder="Nachricht"></textarea>
            </div>
            <div class="container-submit">
                <input class="focusout" id="submit" type="submit" value="Subscribe!">
            </div>
        </form>
    </div>
    </main>
</body>
</html>
<?php

// auslesen von Daten aus einem GET Formular;
var_dump($_GET);


//auslesen von Daten mit eine post formular;
var_dump($_POST);
?>