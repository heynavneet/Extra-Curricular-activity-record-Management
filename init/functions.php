<?php 
	function get_dbc()
	{
		require './inc/db.php';
		
		return $con;
	}

	function new_user($name,$email,$password)
	{
		$con = get_dbc();
		require 'vendor/autoload.php';
		require './inc/config.php';
		
		
		$msg = '';
		if(substr($email, -12) == 'sharda.ac.in'){
			$checkEmail = $con->query("SELECT * FROM `users` WHERE user_mail='$email'");
			$count = $checkEmail->rowCount();
			if($count == 1){
				$msg .= "<p style='color:#e80000;;'>Email Already in Use</p>";
			}else {
				$password = md5($password);
				$user_verification = md5($name);
				// save data to users table
				$save = $con->exec("INSERT INTO `users`(`user_name`, `user_mail`, `user_password`,`user_verification`) VALUES ('$name','$email','$password','$user_verification')");
				if($save == 1){
					// sending confirmation mail
					$api = $sendGridAPI; // 
					$sg_email = new \SendGrid\Mail\Mail(); 
					$sg_email->setFrom("navneet@1lipics.com", "Navneet Srivastava");
					$sg_email->setSubject("ECAR Management System - Confirm Your Email Address");
					$sg_email->addTo($email, $name);
					$sg_email->addContent(
					    "text/html", "<strong>ECAR Management System - Confirm Your mail Address</strong>
									<p>Thank You ".$name." for Sign Up to ECAR Management System</p>
									<p>Complete Your Sign Up Process by Confirming Your Emil by Click on Confirm Button</p>
									<button><a href="."http://localhost/activity/verify.php?key=".$user_verification.">Confirm Now</a></button>
					    			 "
					);
					$sendgrid = new \SendGrid($api);
					if ($sendgrid->send($sg_email)) {
						$msg .= "<p style='color:#67e878;'>Sign UP Success, Check Your mail box to Confirm email address</p>";
					}

				}
			}
		}else {
			$msg .= "Error ! Not Sharda Mail";
		}	
		return($msg);
	}

	function login($email,$password)
	{
		$con = get_dbc();
		$msg = "";
		$smtp = $con->prepare("SELECT 1 FROM `users` WHERE user_mail='$email' AND user_password='$password' AND status=1");
		$smtp->execute();
		$result = $smtp->fetch();
		if ($result) {
			$hour = time() + 604800; 
			setcookie(event_id, $email, $hour,"/","", 0); 
			setcookie(event_key, $password, $hour,"/","", 0);	 
	 
			$_SESSION['event_id'] = $email;
			header('location: home.php');
		}else {
			$msg .= "Error ! Wrong Credentials";
		}
		return $msg;

	}

	function check_session(){
		$con = get_dbc();
		if (isset($_COOKIE['event_id'])) {
			$email = $_COOKIE['event_id'];
			$password = $_COOKIE['event_key'];
			$smtp = $con->prepare("SELECT 1 FROM `users` WHERE user_mail='$email' AND user_password='$password' AND status=1");
			$smtp->execute();
			$result = $smtp->fetch();
			if ($result) {
				$_SESSION['event_id'] = $email;
				return True;
			}else {
				return False;
			}
		}
	}

function get_username($session_id)
{	
	$con = get_dbc();
	$smtp = $con->prepare("SELECT * FROM `users` WHERE user_name='$session_id' or user_mail='$session_id'");
	$smtp->execute();
	$result = $smtp->fetchAll();

	foreach ($result as $user) {
    	return $user['user_name'];
	}
	
}
function get_user_id($session_id)
{	
	$con = get_dbc();
	$smtp = $con->prepare("SELECT * FROM `users` WHERE user_name='$session_id' or user_mail='$session_id'");
	$smtp->execute();
	$result = $smtp->fetchAll();

	foreach ($result as $user) {
    	return $user['user_id'];
	}
	
}


 ?>
