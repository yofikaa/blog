<?php

session_start();

require_once('db_connect.php');

$settings = $db->prepare("SELECT * from admin");

$settings->execute();

$setting = $settings->fetchAll();


if(isset($_SESSION['authorName']))
{
	header("Location: admin/admin.php");
}

if(!isset($_POST['email']))
{

?>
<html lang="en">
<head>

    <title>Web profil</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body class="full-screen login">
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200" >
        <div class="container">
            <div class="navbar-translate">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Web Profil</a>
                </div>
                <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" data-scroll="true" href="javascript:void(0)">SMKN 1 SURABAYA</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <form name="login" method="post" action="login.php">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="card-title">Welcome</h3>
                            <form class="register-form">
                                <label>Email</label>
                                <input class="form-control no-border" type="email" name="email" placeholder="Username atau email">

                                <label>Password</label>
                                <input class="form-control no-border" type="password" name="password" placeholder="Password" >
                                <button class="btn btn-danger btn-block btn-round" value="Masuk" >login</button>
                            </form>
                            <div class="forgot">
                                <a href="register.php" class="btn btn-link btn-danger">BELUM PUNYA AKUN?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="demo-footer text-center">
                    <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by PANKA</h6>
                </div>
            </div>
        </form>
        </div>
    </div>

</body>
<?php

}
else
{
	include_once('db_connect.php');


	if($setting[6]['value']==$_POST['email']&&$setting[7]['value']==$_POST['password'])
	{
		$_SESSION['authorName']=$setting[1]['value'];

		$_SESSION['flash_notice']="Logged in successfully";

		header('Location: admin.php');
	}
	else
	{


		echo "password or username is wrong";
	}


}
?>

<!-- Core JS Files -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>

</html>
