<?php 
session_start();
error_reporting(0);
require('../include/database.php');
if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 
$itemid= $_GET['itemid'];

$display = mysqli_query($con, "SELECT * FROM javabot WHERE id='$itemid' ");  
$row = $display->fetch_assoc();

  $query=$_POST['query'];
  $reply=$_POST['reply'];
  $samplecode=$_POST['samplecode'];

if (isset($_POST['submit'])) {
    
 $samplecode = $con->real_escape_string($samplecode);

 $update = mysqli_query($con,"UPDATE cplus SET Queries='$query', Replies='$reply', Sample_Code='$samplecode' WHERE id='$itemid' ");
  
  if ($update) {
   header('Location:javabotresponse.php');
  }else{
    $msg="Hindi nag Update";
  }

  




}

 ?>
<html>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Java Edit Response list</title>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 row">
                        <h4 class="page-title">Java Edit Response list</h4>
                        <?php echo $msg; ?>
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
                      <div class="card-body bg-dark" style="color:white;">

                       <form Method="POST" class="row">

                        <div class="col-sm-8"><h1 name="language">Java</h1></div>
                        <div class="col-sm-4"><button type="submit" name="submit" class="btn btn-success form-control">Save Response</button></div>


                        <div class="col-sm-12">
                          <label>Query</label>
                          <input type="text" name="query" class="form-control" placeholder="Query" value="<?php echo $row['Queries']; ?>">
                        </div>
                        <br>
                       <div class="col-sm-12">
                          <label>Reply</label>
                          <textarea class="form-control" name="reply" rows="5" Placeholder="Reply to this Query Here!!"><?php echo $row['Replies']; ?></textarea>
                        </div>

                       <br>
                       <div class="col-sm-12">
                          <label>Sample Code</label>
                          <textarea class="form-control" name="samplecode" rows="5" Placeholder="State your Sample Code Here"><?php echo $row['Sample_Code']; ?></textarea>
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

