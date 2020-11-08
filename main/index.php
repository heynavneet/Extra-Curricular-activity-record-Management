<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin -Administrator</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />


<link href="public/assets/css/font-awesome.css" rel="stylesheet"> 
<link href="public/assets/css/style.css" rel="stylesheet" type="text/css" media="all">

<link href="//fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900iSlabo+27px&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<body>

<div class="agileheader">
	<h2 ><a style="color: white;" href="../">ECAR Management System</a></h2>
</div>
<?php 
    session_start();
    // ob_start();

    include 'init/functions.php';
    $msg = "";
    if (check_session() == True) {
        $msg = "You're Already Login";
        header( "refresh:1;url=home.php" ); // redirect page after 2 second
    }

    if (isset($_POST) & !empty($_POST)) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $login = login($email,$password);
        $msg = $login;
    }

 ?>


<section class="main-w3l">
	<div class="w3layouts-main">
		<h2>User Login</h2>
			<div class="w3ls-form">
				<form action="#" method="post">
					<div class="email-w3ls">
						<input type="text" name="email" placeholder="E-mail or Username" required="">
						<span class="icon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					</div>	
					<div class="w3ls-password">
						<input type="password" name="password" placeholder="Password" required="">
						<span class="icon3"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>	
						<div>
							<p><?php 
								if($msg){
									echo $msg;
								}
							 ?></p>

						</div>
						<div class="clear"></div>
						<input type="submit" value="login" name="login">
						<br>
						
				</form>
			</div>	

	</div>	
</section>

<div class="footer-w3l">
	<p>© 2020 ECAR Management System</p>
</div>


</body>
</html>