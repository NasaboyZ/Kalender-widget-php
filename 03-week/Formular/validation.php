<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = htmlspecialchars($_POST["firstname"]);
    $secondname = htmlspecialchars($_POST["secondName"]);
    $adress = htmlspecialchars($_POST["adresse"]);

    if(empty($firstname)){
        exit();
        header("Location: ../index.php");
    }


    echo "These are the data the user submitted:";
    echo "<bre>";
    echo $firstname;
    echo "<bre>";
    echo $secondname;
    echo "<bre>";
    echo $adress;

    header("Location: ../index.php");
} else {
    header ("Location: ../index.php");
}