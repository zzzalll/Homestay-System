<h3>Add Homestay Unit</h3>
<?php if (empty($_POST['tambah'])) {?>
<form action="tambahunit.php"method="POST" >
	<label>Unit Code:</label>
	<input type="text" name="kodunit" placeholder="AA00"><br><br>
	<label>Unit Name:</label> 
	<input type="text" name="namaunit" placeholder="Rose" ><br><br>
	<label>Price:</label> RM
	<input type="text" name="harga"><br><br>
	<input type="submit" name="tambah" value="ADD">
</form>

<h3>Homestay Unit List</h3>
	<table border="1">
	<tr><th>No</th><th>Unit Code</th><th>Name</th><th>Price</th><th>Manage</th></tr>
<?php 
	//sambung ke pangkalan data
	include 'capaian.php';
	//query panggil semua data
	$SQL="SELECT * from homestay order by homestay.KodHomestay";
	//laksanakan
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while ($data=mysqli_fetch_array($panggil)) {
		
		$kodunit=$data ['KodHomestay'];
		$namaunit=$data ['NamaHomestay'];
		$harga=$data ['Harga'];
		$i++;
		echo "<tr><td>$i</td>
			<td>$kodunit</td>
			<td>$namaunit</td>
			<td>RM$harga</td>
			<td> <a href='deleteunit.php?id=".$kodunit."'>Delete</a></td>
			</tr>";
	}
 ?>
 	</table>

<?php }else{
	//terima data dari borang secara POST
	$kunit=$_POST['kodunit'];
	$nunit=$_POST['namaunit'];
	$hunit=$_POST['harga'];
	//sambung ke pangkalan data
	include 'capaian.php';
	//query panggil semua data
	$SQL="insert into homestay (KodHomestay,NamaHomestay,Harga)
		values ('$kunit','$nunit','$hunit') ";
	//laksanakan
	$tambah=mysqli_query($connect,$SQL);
	if ($tambah) {
		echo "New Unit Added Successfully";
		echo "<br><br><a href='tambahalamat.php'>Add Address</a>";
	}else{
		echo "Failed To Add New Unit";
	}
} ?>


</table>