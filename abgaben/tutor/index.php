<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
    // username existent und pw stimmt?
    if(isset($_POST['submit'])) {
        // Try Catch Verbindung zu Datenbank verlinken
       require("mysql.php");

   // Datenbankabfrage
     // Existiert Nutzername?
       $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Username überprüfen
       $stmt->bindParam(":user", $_POST['username']); // Variable von oben wird ersetzt
       $stmt->execute();
       $count = $stmt->rowCount(); // Wieviele Reihen in der DB enthalten username
       // Wenn count null, dann existiert Nutzername noch nicht
       if($count == 1) {
           // pw aus der datenbank in variabel speichern
         $row = $stmt->fetch();
           
         if(password_verify($_POST['pw'], $row['password'])) { //  pw-veryfy gibt ein boolean zurück
           // Login
           session_start();
           $_SESSION['username'] = $row['username'];
           header("Location: gehaim.php");
         } else {
           echo "Der Login ist fehlgeschlagen";
         }
       } else {
         echo "Der Login ist fehlgeschlagen";
       }
   }
     ?>
    <h1>Anmelden</h1>
    <form action="index.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <button type="submit" name="submit">Einloggen</button>
    </form>
    <br>
    <a href="register.php">Noch keinen Account?</a><br>
    <a href="passwordreset.php">Hast du dein Passwor vergessen?</a>
  </body>
</html>