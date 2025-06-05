<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inflorescence Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		<?php include "header.php"; ?>
	</header>
	<nav>
		<?php include "navadmin.php"; ?>
	</nav>
	<section>
		<article>
			<?php 
			//ambil data dari URL
			$id=$_GET['id'];
			//sambung ke pangkalan data
			include 'capaian.php';
			//query arahan padam
			$SQL="DELETE from homestay WHERE KodHomestay='$id'";
			if (mysqli_query($connect, $SQL)) {
			echo "Record deleted successfully";
			 } else{
			echo "Failed to delete record. Delete address first";
			 }
			 mysqli_close($connect);
			  ?>
			 <br><a href="selenggara.php">Back</a>
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