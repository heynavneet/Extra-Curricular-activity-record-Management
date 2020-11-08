<!DOCTYPE html>
<html lang="en">
<head>
    <title>Extra Curricular activity record Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=""/>

    <link href="public/asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/asset/css/style.css" rel='stylesheet' type='text/css' media="all">
    <script src="public/asset/js/main.js" ></script>
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<?php 
    include 'init/functions.php';
    $msg = "";
    if (isset($_POST) & !empty($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $new_user = new_user($name,$email,$password);
        $msg = $new_user;
    }

 ?>
<body>
    <h1 class="error">Sign Up to ECAR Management System</h1>
    <div class="w3layouts-two-grids">
        <div class="mid-class">
            <div class="img-right-side">
                <h4>Extra Curricular activity record Management System</h4>
                <p></p>
                <img src="public/asset/images/b11.png" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
                <h2> Sign Up Here </h2>
                <form action="#" method="post">
                    <div class="form-left-to-w3l">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input type="text" name="name" placeholder=" Name" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l">
                        <span id="email_error" class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="Email" onblur="validate_email();" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l ">

                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required="">
                        <div class="clear"></div>
                    </div>
                    <div>
                         <?php 
                            if($msg){
                                echo $msg;
                            }
                         ?>
                    </div>
                    <div class="main-two-w3ls">
                        <!-- <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">Remember me </span>
                        </div>
          -->
                    </div>
                    <div class="btnn">
                        <button type="submit">Sign Up </button>
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>Already Have an account..?
                        <a href="./main/index.php">Login Here </a>
                    </h3>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function validate_email(){
        var email = document.getElementsByName("email")[0].value;
        // console.log(email);
        // console.log(ValidateEMail(email));
        if (ValidateEMail(email) == true) {
            document.getElementById("email_error").style.color ="";
        }else{
            document.getElementById("email_error").style.color ="red";
        }
    }
</script>

    <footer class="copyrigh-wthree">
        <p>© 2020 Extra Curricular activity record Management System</p>
    </footer>
</body>
</html>