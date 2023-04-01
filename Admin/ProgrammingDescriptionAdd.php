<?php 
session_start();
error_reporting(0);
require('../include/database.php');
if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 
 
  $selectlanguage=$_POST['selectlanguage'];

if (isset($_POST['submit'])) {
 
 

  $title=$_POST['title'];
  $description=$_POST['description'];

  if ($selectlanguage != 'Select Language') {
    
     $description = $con->real_escape_string($description);

    $insert = mysqli_query($con,"INSERT INTO programming_description (Language,Title_Description,Description) VALUES ('$selectlanguage','$title','$description') ");
    header('Location:ProgrammingDescription.php');

  }else{
    $msg="something Went Wrong";
  }
 





}

 ?>
<html>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Programming Desctiption</title>
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
                        <h4 class="page-title">Programming Desctiption <?php echo $msg; ?></h4>
                        
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

                        <div class="col-sm-8"><h1 name="language">Programming Desctiption </h1></div>
                        <div class="col-sm-4">

                          <button type="submit" name="submit" class="btn btn-success form-control">Save </button>
                        </div>


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
                          <label>Title</label>
                          <input class="form-control" name="title" rows="3" Placeholder="Title"></input>
                        </div>

                       <br>
                       <div class="col-sm-12">
                          <label>Description</label>
                          <textarea class="form-control" name="description" rows="5" Placeholder="Description here"></textarea>
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
