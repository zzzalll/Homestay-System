<h3>Homestay Information</h3>
<table border="1"><tr><th>No</th><th>Unit Code</th><th>Homestay Name</th><th>Price</th><th>Address</th></tr>
<?php 
	//sambungan ke DBMS
	include 'capaian.php';
	//query semak unit kosong
	$SQL="SELECT* from homestay inner join alamat on homestay.NamaHomestay=alamat.NamaHomestay";
	$x=0;

	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){

		$KodHomestay=$data['KodHomestay'];
		$NamaHomestay=$data['NamaHomestay'];
		$Harga=$data['Harga'];
		$Alamat=$data['Alamat'];
		$x++;

		echo "<tr><td>$x</td>
				<td>$KodHomestay</td>
				<td>$NamaHomestay</td>
				<td>RM$Harga</td>
				<td>$Alamat</td>
			</tr>";
	}
	mysqli_close($connect);
 ?>
 		</table>
 		<br>
 		<button onclick="window.location.href='login.php';">Book Here</button>