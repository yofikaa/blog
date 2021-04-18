<?php

	if(!isset($_GET['id']))
	{
		header("Location: index.php");
	}

	require('db_connect.php');

	session_start();

	$article = $db->prepare("SELECT * FROM article WHERE articleId = :id");

	$id = $_GET['id'];

	$article->execute(array('id'=>$id));

	$article = $article->fetch();

	if($article==NULL)
	{
		header('Location: index.php');
		exit;
	}

	if(!isset($_COOKIE["article".$id]))
	{
		setcookie("article".$id,"1");

		//increase the view

		$view = $db->prepare("UPDATE article SET views = views + 1 WHERE articleId = $id");

		$view->execute();
	}

	$rarticles = $db->prepare("SELECT * from article WHERE articleId != $id order BY RAND() LIMIT 1");

	$rarticles->execute();

	$settings = $db->prepare("SELECT * from admin");

	$settings->execute();

	$setting = $settings->fetchAll();


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Kit 2 PRO by Creative Tim</title>
        <meta name="description" content="">
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
<body class="settings">
	<nav class="navbar navbar-expand-lg fixed-top bg-danger navbar-transparent" color-on-scroll="300">
	<div class="container">
		<div class="navbar-translate">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">RUANG BACA</a>
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
					<a class="btn btn-round btn-danger" href="login.php">
						<i class="nc-icon nc-cart-simple"></i> login
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	<div class="wrapper" >
        <div class="main">
            <div class="section section-white">
                <div class="container">

                    <div class="row" id="container">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="text-center">
                                <span class="label label-warning main-tag"> <?php echo $article['title']; ?></span>
                                <a href="javascrip: void(0);"><h3 class="title"><?php echo $article['title']; ?></h3></a>
                                <h6 class="title-uppercase"><?php echo $article['createdAt']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-8 ml-auto mr-auto">
                            <a href="javascrip: void(0);">

                                <div class="card" data-radius="none"></div>
																	<img class="img img-raised" src="<?php echo $article['featuredImage']; ?>" style="width: 500px; margin-left: 110px">

                            </a>
                            <div class="article-content">
                <br>
                                <p>
                              <?php echo nl2br($article['content']); ?>
                                </p>


                                  </div>
																	  </div>
																		  </div>


							<br/>

                            <div class="article-footer">
                                <div class="container">
                                                        </div>
                                                    </a>
                                    <div class="row">

                                        <div class="col-md-4 ml-auto">
                                            <div class="sharing">
                                                <h5>LIKE</h5>
                                                <button class="btn btn-just-icon btn-twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="comments media-area">
                                        <h3 class="text-center">Comments</h3>
                                        <div class="media">
                                            <a class="pull-left" href="#paper-kit">
                                                <div class="avatar">
                                                    <img class="media-object" alt="Tim Picture" src="img/icon1.png">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Lincoln</h5>
                                                <div class="pull-right">
                                                    <h6 class="text-muted">Sep 11, 11:54 AM</h6>
                                                    <a href="#paper-kit" class="btn btn-info btn-link pull-right "> <i class="fa fa-reply"></i> Reply</a>

                                                </div>

                                                <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>

                                                <div class="media">
                                                    <a class="pull-left" href="#paper-kit">
                                                        <div class="avatar">
                                                            <img class="media-object" alt="64x64" src="img/icon1.png">
                                                        </div>
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Erik P.</h5>
                                                        <div class="pull-right">
                                                            <h6 class="text-muted">Sep 11, 11:56 AM</h6>
                                                            <a href="#paper-kit" class="btn btn-info btn-link pull-right "> <i class="fa fa-reply"></i> Reply</a>

                                                        </div>
                                                        <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                                        <p> Don't forget, You're Awesome!</p>

                                                    </div>
                                                </div> <!-- end media -->
                                            </div>
                                        </div> <!-- end media -->
                                        <div class="media">
                                            <a class="pull-left" href="#paper-kit">
                                                <div class="avatar">
                                                    <img class="media-object" alt="64x64" src="img/icon1.png">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">Joe</h5>
                                                <div class="pull-right">
                                                    <h6 class="text-muted">Sep 11, 11:57 AM</h6>
                                                    <a href="#paper-kit" class="btn btn-info btn-link pull-right "> <i class="fa fa-reply"></i> Reply</a>

                                                </div>
                                                <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                                <p> Don't forget, You're Awesome!</p>
                                            </div>
                                        </div> <!-- end media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

    				</div>
                </div>

	<footer class="footer section-nude">
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

<!-- Switches -->
<script src="assets/js/bootstrap-switch.min.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>
</html>
