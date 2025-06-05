<?php if(empty($_POST['register'])) {?>
<h2>Sign Up</h2>

<form action="" method="POST">
	<label>Name:</label>
	<input type="text" name="Nama"><br><br>
	<label>IC Number:</label>
	<input type="text" name="NoKP" placeholder="000000-00-0000"><br><br>
	<label>E-mail:</label>
	<input type="e-mail" name="Emel"placeholder="example@email.com"><br><br>
	<label>Telephone No.:</label>
	<input type="text" name="NoTelefon"placeholder= "012-34567890"><br><br>
	<label>Password:</label>
	<input type="text" name="pswd"><br><br>
	<input type="submit" name="register" value="REGISTER">
</form>
<?php }else{
  //proses data masuk ke dalam pangkalan data
	include "capaian.php";

	$Nama=$_POST['Nama'];
	$NoKP=$_POST['NoKP'];
	$Emel=$_POST['Emel'];
  $NoTelefon=$_POST['NoTelefon'];
  $pswd=$_POST['pswd'];
    
    $query="insert into pelanggan (Nama,NoKP,Emel,NoTelefon,Password)
    values('$Nama','$NoKP','$Emel','$NoTelefon','$pswd');";
    $simpan=mysqli_query($connect,$query);

    if($simpan){
       echo "<script type='text/javascript'>
       window.alert('Congratulations! Your registration is successful');
       </script>";
       echo "Registeration successful";
       
    }else{
       echo "<script type ='text/javascript'>
       window.alert('Sorry! Your registration has failed');
       </script>";
       echo "Click <a href='daftar.php'>here</a> to register";
    }
} 
?>