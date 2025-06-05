<?php if(empty($_POST['tempahan'])) {
$Emel=$_GET['Emel'];
$NoKP=$_GET['NoKP']; 
?>

<!--Bahagian Borang Pilih Tarikh -->
<h3>Homestay Booking Form</h3>
<form action="tempahan.php" method="POST">
	<p>E-mail: <?php echo $Emel ?> (<?php echo $NoKP ?>)</p>
	<input type="hidden" name="NoKP" value="<?php echo $NoKP ?>">
	<label>Check in</label> - - - 
	<label>Check out</label><br>
	<input type="date" name="tmsk" > - 
	<input type="date" name="tklr" ><br><br>
	<input type="submit" name="tempahan" value="SUBMIT">
</form>


<?php }else{
	// Bahagian Proses Data Tarikh Sesuai
	$NoKP=$_POST['NoKP'];
	$masuk=$_POST['tmsk'];
	$keluar=$_POST['tklr'];
    //Sambungan Ke DBMS
	include 'capaian.php';
    // Query Semak Unit Kosong
	$query="SELECT * from tempahan where TarikhMasuk >= '$masuk' 
		  AND TarikhKeluar <='$keluar' ";
	echo "Units have been booked on these dates:";
	echo "<br>";
	$panggil=mysqli_query($connect,$query);
	while($data=mysqli_fetch_array($panggil)){
	  	$KodHomestay=$data['KodHomestay'];
	  	// Papar tarikh format d-m-y
	  	$tmasuk=date('d-m-Y',strtotime($data['TarikhMasuk']));
	  	$tkeluar=date('d-m-Y',strtotime($data['TarikhKeluar']));
	  	echo "<br><b style='color:red;'>$KodHomestay</b> ($tmasuk - $tkeluar) ";
	} 
?>
 	<!-- Tempahan Unit Kosong -->
 	<form action="prosestempahan.php" method="GET">
 		<input type="hidden" name="NoKP" value="<?php echo $NoKP ?>">
 		<p>Choose your homestay:</p>
 		<label>Check-in: </label><?php echo $masuk ?>
 		<input type="hidden" name="TarikhMasuk" 
 		value="<?php echo $masuk ?>"><br>
 		<label>Check-out: </label><?php echo $keluar ?>
 		<input type="hidden" name="TarikhKeluar" 
 		value="<?php echo $keluar ?>"><br>
 		<p style="color:red;">Avoid booked units<br>
 		Refer to list above.</p>
 		<label>Homestay Unit:</label>
			<select name="KodHomestay">
	<!-- Guna Data dari DBMS  -->
			<?php include 'capaian.php';
			$query="SELECT * from homestay";
			$panggil=mysqli_query($connect,$query);
			while($data=mysqli_fetch_array($panggil)){
	  			$KodHomestay=$data['KodHomestay'];
	  			$Harga=$data['Harga'];
	  			$NamaHomestay=$data['NamaHomestay'];
	  			if(!empty($NamaHomestay)){
	  			echo "<option value='$KodHomestay'>$NamaHomestay - Price (RM $Harga)</option>";
	  			}
			} ?>
			</select><br><br>
		<input type="submit" name="prosestempah" value="PROCESS">
 	</form>
 	<br>
 	<button onclick="window.location.href = 'semak.php';">Change Booking Date</button>
<?php }
 ?>