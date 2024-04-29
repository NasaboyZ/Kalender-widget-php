<?php
if(isset($_POST["submit"])){
  // Validierungsfunktionen
  function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9_]{4,16}$/', $username);
  }

  function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  function validatePassword($password) {
    // Mindestens 8 Zeichen, mindestens ein Kleinbuchstabe, ein Großbuchstabe, eine Zahl und ein Sonderzeichen
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z\d!@#$%^&*(),.?":{}|<>]{8,}$/', $password);
  }

  // Datenbankverbindung und Vorbereitung der SQL-Statements
  require("mysql.php");

  // Nutzername überprüfen
  if(!validateUsername($_POST["username"])) {
    $error_username = "Der Nutzername entspricht nicht den Anforderungen.";
  }

  // E-Mail überprüfen
  if(!validateEmail($_POST["email"])) {
    $error_email = "Die E-Mail-Adresse ist ungültig.";
  }

  // Passwort überprüfen
  if(!validatePassword($_POST["pw"])) {
    $error_password = "Das Passwort entspricht nicht den Anforderungen.";
  }

  // Überprüfen, ob die Passwörter übereinstimmen
  if($_POST['pw'] !== $_POST['pw2']) {
    $error_pw_match = "Die Passwörter stimmen nicht überein.";
  }

  // Geschlecht überprüfen (Radio-Input)
  if(!isset($_POST['gender']) || ($_POST['gender'] != 'male' && $_POST['gender'] != 'female')) {
    $error_gender = "Bitte wähle ein Geschlecht aus.";
  }

  // Land überprüfen (Select-Input)
  $allowedCountries = array("germany", "france", "spain", "italy");
  if(!isset($_POST['country']) || !in_array($_POST['country'], $allowedCountries)) {
    $error_country = "Bitte wähle ein gültiges Land aus.";
  }

  // AGB akzeptiert überprüfen (Checkbox-Input)
  if(!isset($_POST['agb'])) {
    $error_agb = "Bitte akzeptiere die AGBs.";
  }

  // Überprüfen, ob der Nutzername bereits vergeben ist
  $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
  $stmt->bindParam(":user", $_POST["username"]);
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count > 0) {
    $error_username_exists = "Der Nutzername ist bereits vergeben.";
  }

  // Überprüfen, ob die E-Mail-Adresse bereits vergeben ist
  $stmt = $mysql->prepare("SELECT * FROM accounts WHERE EMAIL= :email");
  $stmt->bindParam(":email", $_POST["email"]);
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count > 0) {
    $error_email_exists = "Die E-Mail-Adresse ist bereits registriert.";
  }

  // Wenn keine Fehler aufgetreten sind, füge den Benutzer hinzu
  if(empty($error_username) && empty($error_email) && empty($error_password) && empty($error_pw_match) && empty($error_gender) && empty($error_country) && empty($error_agb) && empty($error_username_exists) && empty($error_email_exists)) {
    // Nutzer anlegen
    $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, EMAIL, TOKEN) VALUES (:user, :pw, :email, NULL)");
    $stmt->bindParam(":user", $_POST["username"]);
    // Password hashen
    $hash = password_hash($_POST['pw'], PASSWORD_BCRYPT);
    $stmt->bindParam(":pw", $hash);
    $stmt->bindParam(":email", $_POST['email']);
    $stmt->execute();
    echo "Dein Account wurde erfolgreich angelegt.";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Account erstellen</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="checkbox"] {
      margin-right: 5px;
    }
    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      background-color: #45a049;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #666;
    }
    .error {
      color: #ff0000;
      font-size: 14px;
      margin-top: -10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<h1>Account erstellen</h1>
<form action="register.php" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" placeholder="Username" required><br>
  <?php if(isset($error_username)): ?>
    <span class="error"><?php echo $error_username; ?></span>
  <?php endif; ?>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" placeholder="Email" required><br>
  <?php if(isset($error_email)): ?>
    <span class="error"><?php echo $error_email; ?></span>
  <?php endif; ?>
  <label for="pw">Passwort:</label><br>
  <input type="password" id="pw" name="pw" placeholder="Passwort" required><br>
  <?php if(isset($error_password)): ?>
    <span class="error"><?php echo $error_password; ?></span>
  <?php endif; ?>
  <label for="pw2">Passwort wiederholen:</label><br>
  <input type="password" id="pw2" name="pw2" placeholder="Passwort wiederholen" required><br>
  <?php if(isset($error_pw_match)): ?>
    <span class="error"><?php echo $error_pw_match; ?></span>
  <?php endif; ?>
  <label>Geschlecht:</label><br>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <?php if(isset($error_gender)): ?>
    <span class="error"><?php echo $error_gender; ?></span>
  <?php endif; ?>
  <label for="country">Land:</label><br>
  <select id="country" name="country">
    <option value="germany">Germany</option>
    <option value="france">France</option>
    <option value="spain">Spain</option>
    <option value="italy">Italy</option>
  </select><br>
  <?php if(isset($error_country)): ?>
    <span class="error"><?php echo $error_country; ?></span>
  <?php endif; ?>
  <input type="checkbox" id="agb" name="agb" required>
  <label for="agb">AGBs akzeptieren</label><br>
  <?php if(isset($error_agb)): ?>
    <span class="error"><?php echo $error_agb; ?></span>
  <?php endif; ?>
  <button type="submit" name="submit">Erstellen</button>
</form>
<br>
<a href="index.php">Hast du bereits einen Account?</a>
</body>
</html>
