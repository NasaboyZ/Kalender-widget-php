<?php
$wochenzahl = date("d");
$wochentag = date("l");
$jarundMonat = date("M"." Y");
?>

<html>
<head>
	<title>MINI KALENDER</title>
</head>
<body>

<h3 style="color:#999999;">MINI KALENDER</h3>
<div style="border:1px solid black;border-top:5px solid #000000; width:200px; height:250px;text-align:center;">
	<h2><?php echo $wochentag ?></h2>

	
	<span style="font-size:100px;font-weight:bold;"><?php echo $wochenzahl; ?></span>
	
	<h2><?php echo $jarundMonat ?></h2>
</div>

</body>
</html>