<?php
var_dump($_SERVER["PHP_SELF"]);
$dateeiname = basename($_SERVER["PHP_SELF"]);
echo 'dataname:'.$dateeiname;
?>

<a class="navbar-brand p-0 me-2" href="/">NICO's PORTFOLIO<a>
					<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 active" href="index.html">Home</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" <?php echo $dateeiname == 'index.php' ?'aktive': ''; ?> href="portfolio.html">Portfolio</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" href="contact.html">Contact me</a>
						</li>
					</ul>