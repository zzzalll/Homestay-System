<h3>Homestay Unit List</h3>
	<table border="1">
	<tr><th>No</th><th>Unit Code</th><th>Name</th><th>Price</th><th>Address</th></tr>
<?php 
	//sambung ke pangkalan data
	include 'capaian.php';
	//query panggil semua data
	$SQL="SELECT * from homestay 
	inner join alamat on homestay.NamaHomestay=alamat.NamaHomestay order by homestay.KodHomestay";
	//laksanakan
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while ($data=mysqli_fetch_array($panggil)) {
		
		$kodunit=$data ['KodHomestay'];
		$namaunit=$data ['NamaHomestay'];
		$harga=$data ['Harga'];
		$alamat=$data ['Alamat'];
		$i++;
		echo "<tr><td>$i</td>
			<td>$kodunit</td>
			<td>$namaunit</td>
			<td>RM$harga</td>
			<td>$alamat</td>
			</tr>";
	}
 ?>
 	</table>
 	<p><button onclick="window.location.href='tambahunit.php';">Add Unit</button>
 		<button onclick="window.location.href='tambahalamat.php';">Add Address</button></p>
