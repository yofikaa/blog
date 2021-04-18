<?php

require('db_connect.php');
require('admin_only_area.php');


if(!isset($_GET['id']))
{
	header("Location: index.php");
}

$categories = $db->prepare("SELECT * FROM category");

$categories->execute();

$articleId = $_GET['id'];

$articleCategories = $db->prepare("SELECT * from `articlecategory` where `articleId` = $articleId");

$articleCategories->execute();

$articleCategory = $articleCategories->fetchAll();

$article = $db->prepare("SELECT * FROM article WHERE articleId = :id");

$article->execute(array('id'=>$_GET['id']));

$article = $article->fetch();

if($article==NULL)
{
	$_SESSION['flash_warning'] = "Illegal Access detected..";
	header("Location: admin.php");
}


$settings = $db->prepare("SELECT * from admin");

$settings->execute();

$setting = $settings->fetchAll();

?>
<!doctype html>
<html lang="en">
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


<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <h3>Add Product</h3>
                <form action="updatePost.php" method="post" >


                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <h6>Product Image</h6>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;">
                                <img src="assets/img/image_placeholder.jpg" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
                              <div>
                                <span class="btn btn-outline-default btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                            </div>



														<label for="categories"> Categories : </label><br>

						<?php

						$categories = $categories->fetchAll();

										foreach($categories as $category)
										{
											echo "<div class='categories'>";
											echo "<input type='checkbox' name='category[]' value='".$category['category']."' ";
											foreach($articleCategory as $articlecat)
												{
													if(in_array($category['category'] , $articlecat))
													  echo "checked";
												}

											echo ">".$category['category'];
											echo "</div>";
										}

						?>


                        </div>

                        <div class="col-md-7 col-sm-7">
													<input type="text" name="articleId" value="<?php echo $_GET['id']; ?>" hidden="true">
                            <div class="form-group">
                                <h6>JUDUL <span class="icon-danger">*</span></h6>
                                <input type="text" name="title" class="form-control border-input" placeholder="judul" value="<?php echo $article['title']; ?>">
                            </div>

                            <div class="form-group">
                                <h6>ISI</h6>
								<textarea class="form-control textarea-limited" name="content" placeholder="This is a textarea limited to 9999 characters." rows="13", maxlength="150"  > <?php echo $article['content']; ?></textarea>
                                <h5><small><span id="textarea-limited-message" class="pull-right">9999 characters left</span></small></h5>

                            </div>
							<div class="form-check">
                            </div>
                        </div>
                    </div>


                    <div class="row buttons-row">

                        <div class="col-md-4 col-sm-4">
                            <button class="btn btn-outline-primary btn-block btn-round">BACK</button>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block btn-round">Save & Publish </button>
                        </div>
												<div class="col-md-4 col-sm-4">
                            <a href="deletePost.php?id=<?php echo $article['articleId']; ?>" button class="btn btn-outline-danger btn-block btn-round">delete</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
