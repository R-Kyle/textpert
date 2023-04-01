<?php 
session_start();
error_reporting(0);
require('../include/database.php');
if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 

  if(isset($_GET['deleteid']))
  {
    $rowid=intval($_GET['deleteid']);
    $query=mysqli_query($con,"DELETE from javabot where id='$rowid'");
    header("Location:javabotresponse.php");
  }


 ?>
<html>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Response List</title>
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
                        <h4 class="page-title">Java Response list</h4>
                        
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
                                    <div class="row">

                                            <?php   
                                                $java="SELECT * FROM javabot ";
                                                if ($result=mysqli_query($con,$java))
                                                 {
                                                  // Return the number of rows in result set
                                                  $count=mysqli_num_rows($result);
                                                 }
                                                if ($count != 0)
                                                 {
                                                 

                                            ?>
                                        
                                        <table class="table caption-top table-bordered fixed">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Queries</th>
                                              <th scope="col">Replies</th>
                                              <th scope="col">Sample Codes</th>
                                              <th scope="col">View</th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">Delete</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                    <?php 
                                        $limit = 5; // variable to store number of rows per page
                                        $ret=mysqli_query($con,"SELECT * FROM javabot");

                                        $total_rows = mysqli_num_rows($ret);//get the total number of rows
                                        $total_pages = ceil ($total_rows / $limit); // get the required number of pages

                                        // update the active page number
                                        if (!isset ($_GET['page']) ) {  
                                                $page_number = 1;  
                                            } else {  
                                                $page_number = $_GET['page']; 
                                            }
                                        $initial_page = ($page_number-1) * $limit;

                                        // get data of selected rows per page 
                                        $getQuery = "SELECT * FROM javabot LIMIT " . $initial_page . ',' . $limit;
                                        $result = mysqli_query($con, $getQuery); 

                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($result)) {
                                    ?>
                                            <tr>
                                              <th class="col-1"><?php echo $cnt; ?></th>
                                              <td class="text-truncate" style="max-width: 150px; height:10px;" ><?php echo $row['Queries']; ?></td>
                                              <td class="text-truncate" style="max-width: 150px; height:10px;"><?php echo $row['Replies']; ?></td>
                                              <td class="text-truncate" style="max-width: 150px; height:10px;"><?php echo $row['Sample_Code']; ?></td>
                                              <td class="col-1"><button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['id']; ?>"><span class="fa fa-eye" style="color:white; font-size:20px;"></span></button></td>
                                              <td class="col-1"><a href="javaeditresponse.php?itemid=<?php echo $row['id'];?>" class="btn btn-warning form-control"><span class="fa fa-edit" style="color:white; font-size:20px;"></span></a></td>
                                              <td class="col-1"><a href="javabotresponse.php?deleteid=<?php echo $row['id'];?>" class="btn btn-danger form-control"><span class="fa fa-trash" style="color:white; font-size:20px;"></span></a></td>
                                              
                                            </tr>

                                        <!-- Modal View -->
                                              <div class="modal fade" id="staticBackdrop<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>View Response List</b></h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <h4>Query Response<br></h4>
                                                      <h5><b> <?php echo $row['Queries']; ?> </b></h5>
                                                      <hr>
                                                      <h4>Reply Response<br></h4>
                                                      <h5><b> <?php echo $row['Replies']; ?> </b></h5>
                                                      <hr>
                                                      <h4>Sample Code<br></h4>
                                                      <h5><Pre class="form-control" disabled style="height:150px;"><?php echo $row['Sample_Code']; ?> </Pre></h5>
                                                      <hr>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                     </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <!-- Modal View End-->       






                                        <?php $cnt=$cnt+1;}//while loop ?>     
                              
                                          </tbody>
                                        </table>

                                    </div>
                                </form>
                                <div class="clearfix">
                                    
                                    <ul class="pagination">
                                      
                                    <?php for($page_number = 1; $page_number<= $total_pages; $page_number++) {   ?>                 
                                        <li class="page-item active">
                                            <a href = "javabotresponse.php?page=<?php echo $page_number; ?>" class="page-item page-link active" ><?php echo $page_number; ?></a> 
                                        </li>&nbsp &nbsp
                                    <?php } ?>
                                        
                                    </ul>
                                </div>

                                <?php                                      
                                        }else{
                                            require_once('noresult.php');
                                        }
                                 ?>
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




