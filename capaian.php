<?php 

	$host='localhost';
	$user='root';
	$pswd='';
	$dbase='dbase_zalikha';
	//pemboleh ubah capaian = $connect
	$connect=mysqli_connect($host,$user,$pswd,$dbase);
	if($connect){
		//echo "You have succesfully reached the database. ";
	}else{
		echo "Sorry, you failed to reach the database";
	}
 ?>