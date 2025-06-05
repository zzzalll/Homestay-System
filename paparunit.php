<!DOCTYPE html>
<html>
<head>
	<title>The Inflorescence Homestay</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<header>
		<?php include "header.php"; ?>
	</header>
	<nav>
		<ul>
	<li><a href="index.php">Home</a></li>
	<li><a class="active" href="paparunit.php">Homestay Info</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="daftar.php">Sign Up</a></li>
	<li><a href="semak.php">Check Bookings</a></li>
	<li><a href="hubungi.php">Contact Us</a></li>
</ul>
	</nav>
	<section>
		<article>
			<?php include "jadualpaparunit.php"; ?>
		</article>
		<aside>
			<?php include "asideinfo.php"; ?>
		</aside>
	</section>
	<footer>
		<?php include "footer.php"; ?>
	</footer>
</body>
</html>