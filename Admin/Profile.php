<?php 
session_start();
error_reporting(0);
require('../include/database.php');

if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 
$aid = $_SESSION['aid'];

$display = mysqli_query($con, "SELECT * FROM useradmin WHERE id='$aid' ");
$row = $display->fetch_assoc();
$name=$row['Name'];
$username=$row['Username'];
$password=$row['Password'];

if (isset($_POST['update'])) {

    $adminname=$_POST['adminname'];
    $adminusername=$_POST['adminusername'];
    $adminpassword=md5($_POST['adminpassword']);
    $upd = $con->query("UPDATE useradmin SET Name='$adminname', Username='$adminusername', Password='$adminpassword' where id='$aid' ");

    if ($upd) {
        header('location:profile.php');
    }

}
 ?>

<html>
<head>
	<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
	<title>Admin Profile</title>
</head>
<body>
  <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                      
        <?php include('include/topbar.php'); ?>
        <?php include('include/sidebar.php'); ?>
        
        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin Profile</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>     

            <!-- Container fluid  content-->           
            <div class="container-fluid">
                  <!-- Row -->
                <div class="row">


                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Name" value="<?php echo $name; ?>" class="form-control p-0 border-0" name="adminname"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="Text" placeholder="Username" Value="<?php echo $username; ?>" class="form-control p-0 border-0" name="adminusername">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" value="password" value="<?php echo $password; ?>" class="form-control p-0 border-0" name="adminpassword">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="update">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->

            </div>

            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
</body>
</html>