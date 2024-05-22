<?php

require_once './validation.php';
require_once './länder/country.php';

function displayError($field, $errorMessages) {
    return isset($errorMessages[$field]) ? '<span class="error-message">' . $errorMessages[$field] . '</span>' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="./css/formular-style-sheet.css">

    <style>
        .error-message {
            color: red;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo-in-login"><a href="./formular.php">M.W.C</a></div>
            <div class="container-for-interaction">
                <p class="frage-an-user">Do you already have an account?</p>
                <a href="./admin-login.php" class="btn-login">Login</a>
            </div>
        </nav>
    </header>
    
    <main> 
        <div class="container-form">
            <form class="form-kontakt" action='./formular.php' method="POST" novalidate>
                <div class="container-anrede">
                    <input type="radio" id="male" name="anrede" value="Herr" <?php echo isset($_POST['anrede']) && $_POST['anrede'] === 'Herr' ? 'checked' : ''; ?>>
                    <label for="male">Herr</label> <br>

                    <input type="radio" id="female" name="anrede" value="Frau" <?php echo isset($_POST['anrede']) && $_POST['anrede'] === 'Frau' ? 'checked' : ''; ?>>
                    <label for="female">Frau</label> <br>
                    
                    <input type="radio" id="other" name="anrede" value="Andere" <?php echo isset($_POST['anrede']) && $_POST['anrede'] === 'Andere' ? 'checked' : ''; ?>>
                    <label for="other">Nonbinary</label>

                    <?php echo displayError('anrede', $errorMessages); ?>
                </div>

                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('firstname', $errorMessages); ?>
                </div>

                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" value="<?php echo isset($_POST['secondName']) ? htmlspecialchars($_POST['secondName'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('secondName', $errorMessages); ?>
                </div>

                <div class="container-länder">
                    <label for="city">Bitte wählen Sie Ihr Land aus:</label>
                    <select name="city" id="city" required>
                        <?php foreach ($countries as $key => $value): ?>
                            <option value="<?php echo $key; ?>" <?php echo isset($_POST['city']) && $_POST['city'] === $key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo displayError('city', $errorMessages); ?>
                </div>

                <div class="container-adresse">
                    <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('adresse', $errorMessages); ?>
                </div>

                <div class="container-hausnummer">
                    <input class="focusout" type="text" name="hausnummer" id="hausnummer" placeholder="Hausnummer" value="<?php echo isset($_POST['hausnummer']) ? htmlspecialchars($_POST['hausnummer'], ENT_QUOTES) : ''; ?>">
                </div>

                <div class="container-plz">
                    <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" value="<?php echo isset($_POST['plz']) ? htmlspecialchars($_POST['plz'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('plz', $errorMessages); ?>
                </div>

                <div class="container-ort">
                    <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" value="<?php echo isset($_POST['ort']) ? htmlspecialchars($_POST['ort'], ENT_QUOTES) : ''; ?>">
                </div>

                <div class="container-nutzername">
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername" value="<?php echo isset($_POST['nutzername']) ? htmlspecialchars($_POST['nutzername'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('nutzername', $errorMessages); ?>
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>">
                    <?php echo displayError('email', $errorMessages); ?>
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password">
                    <?php echo displayError('password', $errorMessages); ?>
                </div>

                <div class="container-password-repeat">
                    <input class="focusout" type="password" name="password_repeat" id="password_repeat" placeholder="Password wiederholen">
                    <?php echo displayError('password_repeat', $errorMessages); ?>
                </div>

                <div class="container-agb">
                    <label>
                        <input type="checkbox" id="agb" name="agb" value="accepted" <?php echo isset($_POST['agb']) ? 'checked' : ''; ?>> Ich akzeptiere die <a href="/agb.html">AGB</a>
                        <span class="checkmark"></span>  
                    </label>
                    <?php echo displayError('agb', $errorMessages); ?>
                </div>

                <div class="container-newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter" value="newsletter" <?php echo isset($_POST['newsletter']) ? 'checked' : ''; ?>>
                    <label for="newsletter">Ich möchte den Newsletter abonieren.</label>
                </div>

                <div class="container-message">
                    <textarea name="message" id="message" placeholder="Nachricht"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES) : ''; ?></textarea>
                    <?php echo displayError('message', $errorMessages); ?>
                </div>

                <div class="container-submit">
                    <input class="focusout" id="submit" type="submit" value="Abschicken!">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
