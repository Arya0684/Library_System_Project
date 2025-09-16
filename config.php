<?php
	// code for Connection
	$serverName="localhost";
	$userName="root";
	$password="";
	$databaseName="mydb";

	$conn = new mysqli($serverName,$userName,$password,$databaseName);
	if($conn->connect_error){
		echo "Sorry Database not Connected";
	}
	
?>