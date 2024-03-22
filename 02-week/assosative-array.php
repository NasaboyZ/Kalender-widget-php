<?php


echo "<pre>";
$benutzer = array(
    array(
        "vorname" => "Lilly",
        "nachname" => "Müller",
        "email" => "lillym@gmail.com",
    ),
    array(
        "vorname" => "Simon",
        "nachname" => "Graf",
        "email" => "sgraf@bluewin.ch",
    ),
    array(
        "vorname" => "Anna",
        "nachname" => "Muster",
        "email" => "musteranna@gmx.ch"
    )
);
// echo var_dump($benutzer);

foreach($benutzer AS $studenen){
    echo var_dump($studenen);
}


echo"</pre>"

?>

