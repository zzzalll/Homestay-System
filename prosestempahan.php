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
		<?php include 'nav.php'; ?>
	</nav>
	<section>
		<article>
<?php 
	include 'capaian.php';

	$NoKP=$_GET['NoKP'];
	$TarikhMasuk=$_GET['TarikhMasuk'];
	$TarikhKeluar=$_GET['TarikhKeluar'];
	$KodHomestay=$_GET['KodHomestay'];
	$Bayaran=0.0;

	$query="INSERT into tempahan(NoKP,KodHomestay,TarikhMasuk,TarikhKeluar,Bayaran) values ('$NoKP','$KodHomestay','$TarikhMasuk','$TarikhKeluar','$Bayaran')";

	$simpan=mysqli_query($connect,$query);
	if($simpan){
		echo "Congratulations your booking is completed.<br>Please pay during your check in";
	}else{
		echo "Sorry your booking has failed";
	}
?>
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