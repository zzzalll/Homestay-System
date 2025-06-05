<?php if (empty($_POST['loginadmin'])) { ?>
<h2>Admin's Login</h2>

<form action="" method="POST">
	<label>Admin ID</label>
	<input type="text" name="id" ><br><br>
	<label>Password</label>
	<input type="password" name="pass" ><br><br>
	<input type="submit" name="loginadmin" value="LOGIN">
</form>
	<br><br>
	If not an admin: <a href="../index.php">Customer's Page</a>
<?php }else{

		//umpuk nilai terus tanpa database
		$id= 'zalikha';
		$pass='inflorescence';
		$idmasuk=$_POST['id'];
		$passmasuk=$_POST['pass'];

		if ('zalikha'==$idmasuk AND 'inflorescence'==$passmasuk) {
			echo "Congratulations you have entered the admin page";
			echo "<br><br>Click <a href='admin.php'>here</a> to admin page";
		}else{
			echo "Sorry you are not an admin. Please return to customer's page";
		}
	}
?>