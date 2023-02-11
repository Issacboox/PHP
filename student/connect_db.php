<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "hris";
	
	if(!($conn = mysqli_connect($dbhost , $dbuser , $dbpass,$dbname) ) ) {
		die('User Connect : '.mysqli_error());
	}
    mysqli_query($conn,'SET NAMES UTF8'); 
?>
