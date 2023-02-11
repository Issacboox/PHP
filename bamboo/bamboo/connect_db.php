<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "bamboo";
	
	if(!($conn = mysqli_connect($dbhost , $dbuser , $dbpass,$dbname) ) ) {
		die('User Connect : '.mysql_error());
	}
    mysqli_query($conn,'SET NAMES UTF8'); 
?>