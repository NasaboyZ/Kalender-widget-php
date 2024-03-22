
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
// Zuerst vorbereitung
$begruessung = 'Hallo Welt <span class="primary-color">extended</span>!';

// Dann Output
?>

    <style>
		body {
			text-align:center;
			margin-top:10vh;
		}
		.primary-color {
			color:#77bf54;
		}
	</style>
</head>
<body>
<h1><?php echo $begruessung; ?></h1>
</body>
</html>