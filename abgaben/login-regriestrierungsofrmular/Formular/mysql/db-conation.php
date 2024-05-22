<?php
try {
    // PDO Objekt mit verbindung erstellen
    $db = new PDO('mysql:host=localhost;dbname=pinktonic', 'root', ''); // xampp leer, mampp 'root'
    // var_dump($db);
} catch ( Exception $exception ){
    // Abbruch, wenn die DB Verbindung nicht klappt
    die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
}

?>