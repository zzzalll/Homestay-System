<?php if(empty($_POST['semak'])) {?>
<h3>Check Customer Booking</h3>

<form action="" method="POST">
	<label>Enter IC number:</label>
	<input type="text" name="NoKP" placeholder="000000-00-0000">
	<br><br>
	<input type="submit" name="semak" value="CHECK">
</form>
<?php }else{
	//kawasan proses data
	include 'capaian.php';

	$NoKP=$_POST['NoKP'];
	$query="select * from tempahan where NoKP='$NoKP'";
	$panggil=mysqli_query($connect,$query);
	while($hasil=mysqli_fetch_array($panggil)){
		
		$NoKP=$hasil['NoKP'];
		$KodHomestay=$hasil['KodHomestay'];
		$TarikhMasuk=$hasil['TarikhMasuk'];
		$TarikhKeluar=$hasil['TarikhKeluar'];
		$Bayaran=$hasil['Bayaran'];

		echo "Your Bookings";
		echo "
			<br>
			<table border='2'>
			<tr><td>IC No</td><td>$NoKP</td></tr>
			<tr><td>Homestay Code</td><td>$KodHomestay</td></tr>
			<tr><td>Check in</td><td>$TarikhMasuk</td></tr>
			<tr><td>Check out</td><td>$TarikhKeluar</td></tr>
			<tr><td>Payment</td><td>RM$Bayaran</td></tr>
			<br> ";
		}
		echo "</table>";
}
 ?>
 <br>
 <button onclick="fungsiCetak()">PRINT</button>
 <script type="text/javascript">
 	function fungsiCetak(){
 		window.print();
 	}
 </script>