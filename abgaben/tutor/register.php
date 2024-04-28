<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
  </head>
  <body>
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0) {
        // email überprüfen

        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE EMAIL= :email"); //Username überprüfen
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0) {
             
        // Username ist frei
        if($_POST['pw'] == $_POST['pw2']) {
          // User anlegen
          $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, EMAIL, TOKEN) VALUES (:user, :pw, :email, NULL)");
          $stmt->bindParam(":user", $_POST["username"]);
          // Password hashen
          $hash = password_hash($_POST['pw'], PASSWORD_BCRYPT);
          $stmt->bindParam(":pw", $hash);
          $stmt -> bindParam(":email", $_POST['email']);
          $stmt->execute();
          echo "Dein Account wurde angelegt.";
        } else {
          echo "Passwörter stimmen nicht überein";
        }

        } else{
          echo 'email ist schon vergen';
        }
      } else {
        echo "Der Nutzername ist bereits vergeben";
      }
    }
      
     ?>
    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="text" name="email" placeholder="Email" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
      <button type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="index.php">Hast du bereits einen Account?</a>
  </body>
</html>