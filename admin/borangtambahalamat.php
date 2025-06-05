<?php if (empty($_POST['tambahalamat'])) {?>

<form action= "tambahalamat.php" method="POST" id="borangalamat" >

 	<label>Homestay Name:</label>
			<select name="NamaHomestay">

			<?php include 'capaian.php';
			$query="SELECT * from homestay";
			$panggil=mysqli_query($connect,$query);
			while($data=mysqli_fetch_array($panggil)){
	  			$NamaHomestay=$data['NamaHomestay'];
	  			if(!empty($NamaHomestay)){
	  			echo "<option value='$NamaHomestay'>$NamaHomestay</option>";
	  			}
			} ?>
			</select><br><br>

	<label>Address:</label>
	<textarea rows="4" cols="50" name="alamat" form="borangalamat"></textarea>
	<input type="submit" name="tambahalamat" value="ADD">
</form>

<h3>Homestay Address List</h3>
	<table border="1">
	<tr><th>No</th><th>Unit Code</th><th>Name</th><th>Address</th><th>Manage</th></tr>
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
			<td>$alamat</td>
			<td> <a href='deletealamat.php?id=".$kodunit."'>Delete</a></td>
			</tr>";
	}
 ?>
 	</table>
 	
<?php }else{
	//Terima data dari borang secara POST
	$NamaHomestay=$_POST['NamaHomestay'];
	$alamat=$_POST['alamat'];
	//sambung ke pangkalan data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="INSERT into alamat (NamaHomestay,Alamat) values ('$NamaHomestay', '$alamat') ";
	//Laksanakan
	$tambah=mysqli_query($connect,$SQL);
	if ($tambah) {
		echo "New address added successfully";
	} else {
		echo "Failed to add new address";
	}
} 
?>
</table>
 