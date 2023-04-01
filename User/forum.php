<?php require('../include/database.php');
require('include/navigationbar.php');
session_start();
error_reporting(0);

if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

$uid = $_SESSION['uid'];

 ?>
<html>
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/forum.css">
<head>
  <title>TexPert | Forum</title>
</head>
<body style="background:#eeee;">
  <br><br>

<div class="container">
  <div class="row">

        <!-- Main content -->
        <div class="col-lg-9 mb-3">
          <?php 
          require('forumfilter.php'); 
          require('forumpost.php');
          ?>          
        </div>
        <!-- Main content End -->
        
         <!-- Sidebar content -->
        <?php require('forumsidebarcontent.php'); ?>
         <!-- Sidebar content end -->

  </div>
</div>

</body>
</html>