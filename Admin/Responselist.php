<?php 
session_start();
error_reporting(0);
require('../include/database.php');
if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 
 
  $selectlanguage=$_POST['selectlanguage'];

if (isset($_POST['submit'])) {
 
 

  $queries=$_POST['queries'];
  $replies=$_POST['Replies'];
  $samplecode=$_POST['samplecode'];

  if ($selectlanguage == 'Java') {   

    $samplecode = $con->real_escape_string($samplecode);
    $insert = mysqli_query($con,"INSERT INTO javabot (Queries,Replies,Sample_Code) VALUES ('$queries','$replies','$samplecode') ");
    $msg="Add new Responses success";

  }else if ($selectlanguage == 'C++'){

    $samplecode = $con->real_escape_string($samplecode);
    $insert = mysqli_query($con,"INSERT INTO Cplus (Queries,Replies,Sample_Code) VALUES ('$queries','$replies','$samplecode') ");
    $msg="Add new Responses success";

  }else if ($selectlanguage == 'PHP'){

    $samplecode = $con->real_escape_string($samplecode);
    $insert = mysqli_query($con,"INSERT INTO phpbot (Queries,Replies,Sample_Code) VALUES ('$queries','$replies','$samplecode') ");
    $msg="Add new Responses success";

  }
}

 ?>
<html>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Add New Response List</title>
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
                        <h4 class="page-title">Add New Response List</h4>
                        
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

                        <div class="col-sm-8"><h1 name="language">Add New Response List </h1></div>
                        <div class="col-sm-4">
                          <button type="submit" name="submit" class="btn btn-success form-control">Save </button>
                        </div>

                         <p ><center><?php echo $msg; ?></center></p>

                        <div class="col-sm-12">
                          <label>Language</label>
                          <select class="form-control" name="selectlanguage" id="select_language">
                            <option>Select Language</option>
                            <option>C++</option>
                            <option>Java</option>
                            <option>PHP</option>
                          </select>
                        </div>
                        <br>
                       <div class="col-sm-12">
                          <label>Queries</label>
                          <input class="form-control" name="queries" rows="3" Placeholder="Queries"></input>
                        </div>

                       <br>
                       <div class="col-sm-12">
                          <label>Replies</label>
                          <textarea class="form-control" name="Replies" rows="5" Placeholder="Replies here"></textarea>
                        </div>

                        <br>
                       <div class="col-sm-12">
                          <label>Sample Code</label>
                          <textarea class="form-control" name="samplecode" rows="5" Placeholder="Sample Code here"></textarea>
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
