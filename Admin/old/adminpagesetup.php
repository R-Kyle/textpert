<?php 
require('../include/database.php');
$editlist = $_GET['editlist'];


$ret=mysqli_query($con,"select * from unanswered where id='$editlist'");
$row=mysqli_fetch_array($ret);
$name = $row["unanswered"];

 ?>

<html>
<head>
	<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
	<title>Admin Profile</title>
</head>
<body>

    
  <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                      
        <?php include('include/topbar.php'); ?>
        <?php include('include/sidebar.php'); ?>
        
        <div class="page-wrapper">

            <?php include('include/breadcrumb.php'); ?>        

            <!-- Container fluid  content-->           
            <div class="container-fluid">
                
<?php  echo $name;?>
            </div>
            
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
</body>
</html>