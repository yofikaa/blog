<?php

require('db_connect.php');



$settings = $db->prepare("SELECT * from admin");

$settings->execute();

$setting = $settings->fetchAll();



$posts = $db->prepare("SELECT COUNT('articleId') from article");

$posts->execute();
$post = $posts->fetch();
$articles = $db->prepare("SELECT * from article order BY article.createdAt DESC");
$articles->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>RUANG BACA</title>

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
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">smkn 1 surabya</a>
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
                        <a class="btn btn-round btn-warning" href="login.php">
                            <i class="fa fa-unlock-alt"></i> login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-round btn-danger" href="register.php">
                            <i class="fa fa-id-card-o"></i> register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header" data-parallax="true" style="background-image: url('as.jpg');">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="motto">
                    <h1 class="title">RUANG BACA</h1>
                    <h3 class="description">SMKN 1 SURABAYA</h3>
                    <br />
                                    </div>
            </div>
        </div>

    </div>





<div class="section section-blog" >
      <div class="container">
    <div class="row">




  <?php

                $prev_date = NULL;

                while($article = $articles->fetch())
                {
                    $date = strtotime($article['createdAt']);

                    $formatted_date = date("F Y",$date);


                ?>

              <div class="col-md-4" id="container" >

                <?php



                if($article['featureImageFloat']=="left")
                    {
                ?>



                <div class="card card-blog" style="background-color:#cacdd1">
                  <div class="card-image">
                    <a href="post.php?id=<?php echo $article['articleId']; ?>">
                      <br>
                      <br><center>
                      <img class="img img-raised" src="<?php echo $article['featuredImage']?>">
                    </center>
                    </a>
                  </div>
                  <div class="card-body">
                    <h6 class="card-category text-info"><?php $date = strtotime($article['createdAt']); echo date("F j",$date); ?></h6>
                    <h5 class="card-title">
                      <a href="#pablo"><?php echo $article['title']?></a>
                    </h5>

                  <hr>
                <center>  <a href="post.php?id=<?php echo $article['articleId']; ?>">  <button class='btn btn-danger btn-round btn-sm'>
                   Read More</button></center>
</a>
                  <br>
                  </div>
                </div>


                <?php

                }


                ?>
                </div>

                <?php

                }

                ?>
     </div>


         </div>
       </div>






<center>
<div id="preloaders">
        <div class='uil-reload-css reload-background' style=''><div></div></div>
  </div>
</center>

    <footer class="footer footer-black" >
        <div class="container">
            <div class="row">

                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by PANKA
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>

</html>
