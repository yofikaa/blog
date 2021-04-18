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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Web profil</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body class="profile">
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-danger nav-down" color-on-scroll="200">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
                <div class="navbar-header">
                    <a class="navbar-brand" href="index-admin.php">Smkn 1 surabaya</a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <button href="#paper-kit" class="dropdown-toggle btn btn-round btn-success" data-toggle="dropdown">More <b class="caret"></b></button>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-success">

                        <a class="dropdown-item" href="add.php">ADD</a>
                        <a class="dropdown-item" href="edit-post.php">EDIT</a>
                    </ul>
                </li>
                    <li class="nav-item">
                        <a class="btn btn-round btn-danger" href="logout.php">
                            <i class="fa fa-unlock-alt"></i> logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-small" style="background-image: url('../assets/img/sections/rodrigo-ardilha.jpg');">
            <div class="filter"></div>
        </div>
        <div class="profile-content section">
            <div class="container">
                <div class="row">
                    <div class="profile-picture">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new img-no-padding">
                                <center><img src="../images/dp/thumb<?php echo ($setting[2]['value']==NULL)?'.png':$setting[2]['value']; ?>" alt="..."></center>
                            </div>
                            <div class="name">
                                <h4 class="title text-center"><?php echo ucfirst($_SESSION['authorName']); ?><br /></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                      <div class="row">

                          <div class="col-md-8 ml-auto mr-auto">

                              <div class="table-responsive">
                              <table class="table">
                                <?php
  $flag = 0; //Check wheather the control entering into the where condition for first time
  while($article=$articles->fetch())
  {
    if($flag==0)
    {
      echo "<tr><th>Article Name</th><th>Views</th></tr>";
      $flag = 1;
    }

    echo "<tr><td><a class='article'  title='".$article['title']."''>".$article['title']."</a></td><td class='views'>".$article['views']."</tr>";
  }


  if($flag==0)
  {
    echo "<center><h2> You didn't post anything till now :( </h2></center>";
  }

?>
                              </table>
                              </div>




                          </div>
                      </div>

          <a href="edit.php?id=<?php echo  $user['id'] ?>"><btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
      </a></div>
  </div>
  <br/>
                  <div class="credits ml-auto">
      <span class="copyright">
          © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Panka
      </span>
  </div>
</div>
</div>
</footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/popper.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>
</html>
