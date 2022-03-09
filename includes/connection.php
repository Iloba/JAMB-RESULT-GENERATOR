<?php 
	
	$server = "localhost";
	$user = "root";
	$password = "";
	$db = "jamb";
	

	$con = mysqli_connect($server, $user, $password, $db);
	if (!$con) {
		echo "Connection Not Established";
	}




 ?>