<?php

require('db_connect.php');

require('admin_only_area.php');


$settings = $db->prepare("SELECT * from admin");

$settings->execute();

$setting = $settings->fetchAll();



$posts = $db->prepare("SELECT COUNT('articleId') from article");

$posts->execute();
$post = $posts->fetch();

$articles = $db->prepare("SELECT * from article order BY article.createdAt DESC LIMIT 5");

$articles->execute();

?>
<html lang="en">
<!doctype html>
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Kit 2 PRO by Creative Tim</title>

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
<body class="add-product">
	<nav class="navbar navbar-expand-lg fixed-top bg-danger nav-down">
		<div class="container">
			<div class="navbar-translate">
				<div class="navbar-header">
					<a class="navbar-brand" href="admin.php">RUANG BACA</a>
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
						<a class="btn btn-round btn-danger" href="#">
							<i class="nc-icon nc-cart-simple"></i> Buy now
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>




<footer class="footer footer-black">
	<div class="container">
		<div class="row">
			<nav class="footer-nav">
				<ul>
					<li><a href="https://www.creative-tim.com">Creative Tim</a></li>
					<li><a href="http://blog.creative-tim.com">Blog</a></li>
					<li><a href="https://www.creative-tim.com/license">Licenses</a></li>
				</ul>
			</nav>
			<div class="credits ml-auto">
				<span class="copyright">
					© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
				</span>
			</div>
		</div>
	</div>
</footer>

</body>

<!-- Core JS Files -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  for fileupload -->
<script src="assets/js/jasny-bootstrap.min.js"></script>

<!--  Plugins for Tags -->
<script src="assets/js/bootstrap-tagsinput.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>

</html>
