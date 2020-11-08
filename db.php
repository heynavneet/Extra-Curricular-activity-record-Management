<?php 
	$hostname = '139.59.49.67';
	$username = 'root';
	$password = '';
	$db_name  = 'attendance';

	try {
		$con = new PDO("mysql:host=$hostname;dbname=$db_name",$username,$password);
		print('Connection Success');
		
	} catch (PDOException  $e) {
		print($e->getMessage());
	}
 ?>
