<?php
// PHP Mailer "laden":
require 'phpmailer/vendor/autoload.php';
require 'config.php'; // Konfigurations-Konstanten laden

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mailer = new PHPMailer();
$mailer->isSMTP(); // wir nutzen SMTP

// Verbindungsdaten festlegen für den SMTP Server
$mailer->Host = 'smtp.live.com'; // Hotmail SMTP-Host
$mailer->Username = 'josefleite.00@hotmail.com'; // Deine Hotmail-E-Mail-Adresse
$mailer->Password = 'Josefleite1996_'; // Dein Hotmail Passwort
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // STARTTLS-Verschlüsselung verwenden
$mailer->Port = 587; // Hotmail SMTP-Port

// Mail erstellen
$mailer->setFrom('josefleite.00@hotmail.com', 'Dein Name'); // Absenderadresse und Name
$mailer->addAddress('terry.harker@bytekultur.net', 'Terry Harker, byteKultur');
$mailer->addAddress('test-1eayji497@srv1.mail-tester.com', 'Terry Harker, byteKultur'); // Tip: mail-tester.com zum Testen des Spam Ratings nutzen!

$mailer->isHtml(true); // verwende HTML

// Mail erstellen: 
$mailer->Subject = 'Mail aus dem PHPMailer Demo Script';
$mailer->Body = 'Hallo, dies ist ein <b>Testmail aus PHPMailer</b>.';

if( $mailer->send() ){
    echo 'Mail wurde versendet';
}else{
    echo 'Mail konnte nicht versendet werden';
}

?>


