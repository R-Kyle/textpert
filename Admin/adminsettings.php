<?php 
session_start();
error_reporting(0);
require('../include/database.php');
if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 


$targetDir = "../ImageLogo/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$mainline = $_POST['mainline'];
$subline = $_POST['subline'];
$tagline = $_POST['tagline'];

    if(isset($_POST["submit"])){

         $updates = $con->query("UPDATE common_bot SET Mainline='$mainline', Subline='$subline', Tagline='$tagline' ");
            // Allow certain file formats
             $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG');
             if(in_array($fileType, $allowTypes)){
                 // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                     $upd = $con->query("UPDATE common_bot SET System_Logo='$fileName'");
                }//Move File            
             }//Allowtpes

        }//isset


 ?>

 <!-- Image Preview  -->
<script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<html>

<style type="text/css">
.uploadfile{
  
  color: white;
  padding: 0.5rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 1rem;
}
</style>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Admin Settings</title>
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
                        <h4 class="page-title">Admin Settings</h4>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <?php 
                   require('../include/database.php');
                    $query1 = $con->query("SELECT * FROM common_bot ");
                    $row = $query1->fetch_assoc();

                    $imageURL = "../ImageLogo/".$row["System_Logo"];
                ?>   
<form action="" method="post" enctype="multipart/form-data">
            <!-- Container fluid  content-->           
            <div class="container-fluid">
                  <!-- Row -->
                <div class="row">  
                    <div class="col-sm-12">
                       
                    </div>
                    <br>




                      <div class="col-sm-3">
                        <div class="card">
                          <img  src="<?php echo $imageURL; ?>" class="card-img-top"  height="200" id="preview" style="padding:10px;">
                          <div class="card-body">
                            <h5 class="card-title"><center>System Logo</center></h5>
                            <!-- <button class="btn btn-primary form-control">Upload Photo</button> -->
                            <input type="file" name="file" id="upload" hidden/ onchange="readURL(this);">
                           <center> <label for="upload" class="uploadfile btn btn-primary">Select Profile Image</label></center>
                          </div>
                        </div>
                        
                      </div>

                    <div class="col-sm-8 card" style="background:#3131;">
                        <div class="card-body">
                            <h4>Main</h4>
                            <input type="text" class="form-control" name="mainline" placeholder="Main Line" value="<?php echo $row['Mainline']; ?>">
                            <br>
                            <h4>Sub Main</h4>
                            <input type="text" class="form-control" name="subline" placeholder="Sub Main Line" value="<?php echo $row['Subline']; ?>">
                            <br>
                            <h4>Tagline</h4>
                            <input type="text" class="form-control" name="tagline" placeholder="Tagline" value="<?php echo $row['Tagline']; ?>">
                            <br>
                            <div class="col-sm-3"><button type="submit" name="submit" class="btn btn-success form-control">Update</button></div>


                        </div>
                    </div>


</form>
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

