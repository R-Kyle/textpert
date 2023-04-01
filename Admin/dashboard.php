<?php 
session_start();
error_reporting(0);
require('../include/database.php');

if (strlen( $_SESSION['aid']==0)) {
  header('location:signout.php');
  } 

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>TexPert | Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
</head>

<body>

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                      
        <?php include('include/topbar.php'); ?>
        <?php include('include/sidebar.php'); ?>
        
        <div class="page-wrapper">

            <?php include('include/breadcrumb.php'); ?>        

            <!-- Container fluid  -->           
            <div class="container-fluid">
                
                <div class="row justify-content-center">



                    <div class="col-lg-6 col-md-12" >
                        <a href="Cplusresponse.php">
                            <div class="white-box analytics-info" style="border-radius:20px;">

                                <?php 
                                    $cplus="SELECT * FROM cplus ";

                                            if ($result=mysqli_query($con,$cplus))
                                            {
                                                 // Return the number of rows in result set
                                                $countcplus=mysqli_num_rows($result);

                                            }
                                 ?>
                                <h3 class="box-title" style="color:black;">Response List for C++</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><canvas width="67" height="30"
                                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-success"><?php echo $countcplus; ?></span></li>
                                </ul>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <a href="javabotresponse.php">
                            <div class="white-box analytics-info" style="border-radius:20px;">
                                <?php 
                                    $java="SELECT * FROM javabot ";

                                            if ($result=mysqli_query($con,$java))
                                            {
                                                 // Return the number of rows in result set
                                                $countjava=mysqli_num_rows($result);

                                            }
                                ?>
                                <h3 class="box-title" style="color:black;">Response list for Java</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash3"><canvas width="67" height="30"
                                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-info"><?php echo $countjava; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <a href="phpresponse.php">
                            <div class="white-box analytics-info" style="border-radius:20px;">
                                <?php 
                                    $php="SELECT * FROM phpbot ";

                                            if ($result=mysqli_query($con,$php))
                                            {
                                                 // Return the number of rows in result set
                                                $countphp=mysqli_num_rows($result);

                                            }
                                ?>
                                <h3 class="box-title" style="color:black;">Response list for PHP</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash4"><canvas width="67" height="30"
                                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-info"><?php echo $countphp; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>

                     <div class="col-lg-6 col-md-12" >
                        
                            <div class="white-box analytics-info" style="border-radius:20px;">

                                <?php 
                                    $unanswer="SELECT * FROM unanswered ";

                                            if ($result=mysqli_query($con,$unanswer))
                                            {
                                                 // Return the number of rows in result set
                                                $unanswered=mysqli_num_rows($result);

                                            }
                                 ?>
                                <h3 class="box-title" style="color:black;">Unanswered List</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><span class="fa fa-question" style="color:violet; font-size:45px;"></span></div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-dark"><?php echo $unanswered; ?></span></li>
                                </ul>
                            </div>
                     
                    </div>


                    <div class="col-lg-6 col-md-12" >
                        
                            <div class="white-box analytics-info" style="border-radius:20px;">

                                <?php 
                                    $totalresponse = $countcplus + $countjava + $countphp + $countvb;
                                 ?>
                                <h3 class="box-title" style="color:black;">Total Response List</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><span class="fa fa-calculator" style="color:black; font-size:45px;"></span></div>
                                        
                                    </li>
                                    <li class="ms-auto"><span class="counter text-dark"><?php echo $totalresponse; ?></span></li>
                                </ul>
                            </div>
                        
                    </div>

              
                </div>
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
 
   
</body>

</html>