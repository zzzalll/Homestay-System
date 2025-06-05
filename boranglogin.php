<?php if (empty($_GET['login'])) { ?>

<h3>Login</h3>
<form>
	<label>E-mail:</label>
	<input type="text" name="user" placeholder="example@email.com"><br><br>
	<label>Password:</label>
	<input type="password" name="pass"><br><br>
	<input type="submit" name="login" value="LOGIN">
</form>
	<br>No account? <a href="daftar.php">Sign up now</a>
	<br><br>Admin's Login: <a href="./admin">Click here</a>
<?php }else{
 	//kawasan memproses data login
	include 'capaian.php';

	$user=$_GET['user'];
	$pass=$_GET['pass'];

	$query="select * from pelanggan where Emel='$user'
	and Password='$pass' ";

	$panggil=mysqli_query($connect,$query);

	while($hasil=mysqli_fetch_array($panggil)) {
		$Emel=$hasil['Emel'];
		$NoKP=$hasil['NoKP'];
		if(empty($Emel)){
			echo "Sorry your login has failed";
		}else{
			echo "Congratulations you have logged in";
			echo "<br><br>Click <a href='tempahan.php? Emel=$Emel && NoKP=$NoKP'>here</a> to continue";
		}
	}

}
 ?>