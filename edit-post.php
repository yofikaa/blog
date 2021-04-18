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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body class="profile">
<br>
<br>
<br>

                          <div class="col-md-8 ml-auto mr-auto">

                              <div class="table-responsive">
                              <table class="table">
                                <?php
  $flag = 0; //Check wheather the control entering into the where condition for first time
  while($article=$articles->fetch())
  {
    if($flag==0)
    {
      echo "<tr><th>Article Name</th><th>Views</th><th>action</th></tr>";
      $flag = 1;
    }

    echo "<tr><td><a class='article'  title='".$article['title']."''>".$article['title']."</a></td><td class='views'>".$article['views']." </td><td class='views'><a href='edit.php?id=".$article['articleId']."'>EDIT</td></tr>";
  }


  if($flag==0)
  {
    echo "<center><h2> You didn't post anything till now :( </h2></center>";
  }

?>
                              </table>
                              </div>




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
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>
</html>
