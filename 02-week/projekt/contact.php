<?php 
$pageTItle = 'Nicos Portofolio'
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Nico's Portfolio | Kontakt</title>
	<meta name="title" content="Nico's Portfolio | Kontakt">
	<meta name="description" content="Kontaktiere mich per E-Mail!">
	<meta name="author" content="Nico">

	<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
	<header class="navbar navbar-expand-md bd-navbar">
		<nav class="container flex-wrap flex-md-nowrap" aria-label="Main navigation">
			<a class="navbar-brand p-0 me-2" href="/">NICO's PORTFOLIO<a>
					<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" href="index.html">Home</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2" href="portfolio.html">Portfolio</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 active" href="contact.html">Contact me</a>
						</li>
					</ul>
		</nav>
	</header>

	<section class="main-section">
		<div class="container">
			<div class="mt-3">
				<h1>Contact me</h1>
				<p><a href="mailto:terry@bytekultur.net">nico@myportfolio.biz</a></p>
			</div>
			<div class="mt-5">
				<h2>Send me a message</h2>
				<form action="/submit_form" method="post">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="mb-3">
						<label for="message" class="form-label">Message</label>
						<textarea class="form-control" id="message" name="message" rows="3" required></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</section>

	<section class="footer-section">
		<div class="container">
			<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
				<div class="col-md-4 d-flex align-items-center">
					<a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
						<svg class="bi" width="30" height="24">
							<use xlink:href="#bootstrap"></use>
						</svg>
					</a>
					<span class="mb-3 mb-md-0 text-body-secondary">© 2024 Nico the webdesigner</span>
				</div>


			</footer>
		</div>
	</section>

</body>

</html>