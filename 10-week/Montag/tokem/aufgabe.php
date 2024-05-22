<?php
session_start();
// Aktuelle Zeit in der Systemuhr des Server lesen
$currentTime = time();
// "Lebenszeit" für den Token definieren (Sekunden)
$tokenLifetime = 10;

if (isset($_POST['go'])) {
	if ($_SESSION['time_expire'] >= $currentTime) {
		$feedback = "<div class=\"feedback_positive\">";
		$feedback .= "Die Lebenszeit wurde eingehalten.";
		$feedback .= "</div>\n";
	}
	else {
		$feedback = "<div class=\"feedback_negative\">";
		$feedback .= "Die Lebenszeit ist abgelaufen.";
		$feedback .= "</div>\n";
	}
}
else {
	$feedback = "";
}
$_SESSION['time_expire'] = $currentTime + $tokenLifetime;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lebenszeit definieren</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/formstyles.css">
</head>
<body>
    <div id="container">
        <h1>Die Lebenszeit des Tokens definieren</h1>
        <p>Nach dem Verschicken des Formulars wird gecheckt, wie viel Zeit seit dem letzten Aufruf des Forms verstrichen ist.</p>
        
        <p>Beachte bitte, dass der visuelle Countdown unten mit JavaScript realisiert wurde, das hat <strong>absolut nichts</strong> zu tun mit dem serverseitigem Script! Dieser Contdown ist dafür gedacht, dir das Testen zu erleichtern.</p>
        <p id="countdown" style="font-size: 48px;"><?=$tokenLifetime?></p>
        <p><?=$feedback?></p>
        <form method="post">
            <div class="form_control">
                <button type="submit" name="go" class="btn btn-blue">Verschicken</button>
            </div>
        </form>
    </div>
</body>
<script>
// einfacher JavaScript-Countdown,
// dient nur zur Veranschaulichung!!!
let countdown =  document.getElementById("countdown");
const startTime = countdown.textContent;
let currentTime = startTime;
function countBack() {
	currentTime--;
	countdown.textContent = currentTime;
}

setInterval(countBack, 1000);
</script>
</html>