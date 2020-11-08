<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$db_name  = 'event';

	try {
		$con = new PDO("mysql:host=$hostname;dbname=$db_name",$username,$password);
		// print('Connection Success');
		
	} catch (PDOException  $e) {
		print($e->getMessage());
	}
 ?>
