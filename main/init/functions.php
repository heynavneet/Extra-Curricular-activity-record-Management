<?php	
	function get_dbc(){
		require 'db.php';
		
		return $con;
	}

// admin_email='$email' OR
	function login($email,$password){
		$con = get_dbc();
		$msg = "";
		$smtp = $con->prepare("SELECT 1 FROM `users` WHERE  user_name='$email' OR user_mail='$email' AND user_password='$password'");
		$smtp->execute();
		$result = $smtp->fetch();
		if ($result) {
			$hour = time() + 604800; 
			setcookie(admin_id, $email, $hour,"/","", 0); 
			setcookie(admin_key, $password, $hour,"/","", 0);	 
	 
			$_SESSION['admin_id'] = $email;
			header('location: home.php');
		}else {
			$msg .= "Error ! Wrong Credentials";
		}
		return $msg;

	}

	function check_session(){
		$con = get_dbc();
		if (isset($_COOKIE['admin_id'])) {
			$email = $_COOKIE['admin_id'];
			$password = $_COOKIE['admin_key'];
			$smtp = $con->prepare("SELECT 1 FROM `users` WHERE user_name='$email' or user_mail='$email' AND user_password='$password'");
			$smtp->execute();
			$result = $smtp->fetch();
			if ($result) {
				$_SESSION['admin_id'] = $email;
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

function admin_role($session_id)
{	
	$con = get_dbc();
	$smtp = $con->prepare("SELECT * FROM `admin` WHERE admin_username='$session_id' or admin_email='$session_id'");
	$smtp->execute();
	$result = $smtp->fetchAll();

	foreach ($result as $user) {
    	return $user['admin_role'];
	}
	
}


function new_event($title,$description,$date, $time,$location,$user)
	{
		$con = get_dbc();

		$msg = '';
		$smtp = $con->prepare("INSERT INTO `events`(`event_title`, `event_description`, `event_date`, `event_time`, `event_location`,`user_id`) VALUES ('$title','".$description."','$date','$time','$location',$user)");
		$save = $smtp->execute();
		if($save==1){
			$msg .= "Event Creation Success";
		}else {
			$msg .= "Opps! Event Creation Fail";
		}
		return($msg);
	}