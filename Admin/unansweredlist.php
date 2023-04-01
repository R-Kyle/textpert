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
    $query=mysqli_query($con,"DELETE from Unanswered where id='$rowid'");
    header("Location:unansweredlist.php");
  }



 ?>
<html>
<head>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
    <title>Unanswered Response List</title>
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
                        <h4 class="page-title">Unanswered Response list</h4>
                        
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
                                                $cplus="SELECT * FROM Unanswered ";
                                                if ($result=mysqli_query($con,$cplus))
                                                 {
                                                  // Return the number of rows in result set
                                                  $count=mysqli_num_rows($result);
                                                 }
                                                if ($count != 0)
                                                 {
                                                 

                                            ?>
                                        
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Programming Langauge</th>
                                              <th scope="col">Queries</th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">Delete</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                    <?php 
                                        $limit = 5; // variable to store number of rows per page
                                        $ret=mysqli_query($con,"SELECT * FROM Unanswered");

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
                                        $getQuery = "SELECT * FROM Unanswered LIMIT " . $initial_page . ',' . $limit;
                                        $result = mysqli_query($con, $getQuery); 

                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($result)) {
                                          $itemid = $row['id'];
                                          
                                    ?>
                                            <tr>
                                              <th class="col-1"><?php echo $cnt; ?></th>
                                              <td class="text-truncate"><?php echo $row['Programming_Language']; ?></td>
                                              <td class="text-truncate"><?php echo $row['unanswered']; ?></td>                                              
                                              <td class="col-1"><a href="unanswereditlist.php?editlist=<?php echo $row['id'];?>" type="button" class="btn btn-primary"><span class="fa fa-edit" style="color:white; font-size:20px;"></span></a></td>
                                              <td class="col-1"><a href="unansweredlist.php?deleteid=<?php echo $row['id'];?>" type="button" class="btn btn-danger"><span class="fa fa-trash" style="color:white; font-size:20px;"></span></a></td>
                                            </tr>


                                        <?php $cnt=$cnt+1;}//while loop ?>                                          
                                          </tbody>
                                        </table>
                                        <?php echo $msg; ?>
                                    </div>
                                </form>
                                <div class="clearfix">
                                    
                                    <ul class="pagination">
                                      
                                    <?php for($page_number = 1; $page_number<= $total_pages; $page_number++) {   ?>                 
                                        <li class="page-item active">
                                            <a href = "unansweredlist.php?page=<?php echo $page_number; ?>" class="page-item page-link active" ><?php echo $page_number; ?></a> 
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

