<?php
   	$DB_SERVER ='localhost';
   	$DB_USERNAME = 'root';
   	$DB_PASSWORD = '';
   	$DB_DATABASE = 'istudent';
   	$connection = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
   	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
   	}
?>