<?php
	include 'inc/db.php'; 
	$user_verification = $_GET['key'];
	// echo($user_verification);

	$update = $con->exec("UPDATE `users` SET `status`=1 WHERE user_verification='$user_verification'");
	if($update == 1){
		echo 'Your email Verified Success, <br> wait 5 second we redirect to login page';
		header( "refresh:5;url=login.php" );
	}else {
		echo 'Verification key Expired or Already Used';
	}

 ?>