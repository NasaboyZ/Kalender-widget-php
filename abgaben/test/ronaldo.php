
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="./Formular/css/formular-style-sheet.css">
</head>
<body>
       
    <header>
        <nav>
            <div class="logo-in-login"><a href="./formular.php">M.W.C</a></div>
            <div class="container-for-interaction">
                <p class="frage-an-user">Do you already have an account?</p>
                <a href="./Formular/admin-login.php" class="btn-login">Login</a>
            </div>
        </nav>
    </header>
    
    <main> 
        <div class="container-form">
            <form class="form-kontakt" action='validation.php' method="POST">
                <div class="continer-anrede">
                    <input type="radio" id="male" name="anrede" value="Herr">
                    <label for="male">Herr</label> <br>

                    <input type="radio" id="female" name="anrede" value="Frau">
                    <label for="female">Frau</label> <br>
                    
                    <input type="radio" id="other" name="anrede" value="Andere">
                    <label for="other">Nonbinary</label>
                </div>


                <div class="container-firstname">
                    <input class="focusout" type="text" name="firstname" id="firstname" placeholder="Vorname" value="<?= (isset($_POST['firstname'])) ? $_POST['firstname'] : "" ?>" >
                </div>


                <div class="container-secondname">
                    <input class="focusout" type="text" name="secondName" id="secondName" placeholder="Nachname" value="<?= (isset($_POST['secondName'])) ? $_POST['secondName'] : "" ?>" >
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
                    <input class="focusout" type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?= (isset($_POST['adresse'])) ? $_POST['adresse'] : "" ?>" >
                </div>
                <div class="container-hausnummer">
                    <input class="focusout" type="text" name="hausnummer" id="hausnummer" placeholder="Hausnummer" value="<?= (isset($_POST['hausnummer'])) ? $_POST['hausnummer'] : "" ?>">
                </div>

                <div class="container-plz">
                    <input class="focusout" type="text" name="plz" id="plz" placeholder="Postleitzahl" value = "<?= (isset($_POST['plz'])) ? $_POST['plz'] : "" ?>" >
                </div>

                <div class="container-ort">
                    <input class="focusout" type="text" name="ort" id="ort" placeholder="Ort" value ="<?= (isset($_POST['ort'])) ? $_POST['ort'] : "" ?>" >
                </div>

                <div class="container-nutzername">
                    <input class="focusout" type="text" name="nutzername" id="nutzername" placeholder="Nutzername" value="<?= (isset($_POST['nutzername'])) ? $_POST['nutzername'] : "" ?>" >
                </div>

                <div class="container-email">
                    <input class="focusout" type="email" name="email" id="email" placeholder="Email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : "" ?>" >
                </div>

                <div class="container-password">
                    <input class="focusout" type="password" name="password" id="password" placeholder="Password"  >
                </div>

                <div class="container-agb">
                    <label>
                        <input type="checkbox" id="agb" name="agb" value="accepted"> AGB
                        <span class="checkmark"></span>     
                    </label>
                </div>

                <div class="container-newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
                    <label for="newsletter">Ich möchte den Newsletter abonieren.</label>
                </div>

                <div class="container-messsage">
                    <textarea name="message" id="message" placeholder="Nachricht"><?= (isset($_POST['message'])) ? $_POST['message'] : "" ?></textarea>
                </div>

                <div class="container-submit">
                    <input class="focusout" id="submit" type="submit" value="Abschicken!">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
