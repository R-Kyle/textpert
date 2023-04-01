<?php 
include('css/csslinks.php'); 
require('../../include/database.php');
session_start();
error_reporting(0);



$query1 = $con->query("SELECT * FROM common_bot ");
$row = $query1->fetch_assoc();

$imageURL = "../../ImageLogo/".$row["System_Logo"];



?>

<link rel="stylesheet" type="text/css" href="css/styles.css">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <link rel="shortcut icon" href="../../ImageLogo/Logoss.png">
    <br><br><br>

            <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="../index.php"><img src="<?php echo $imageURL; ?>"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../C++.php">C++</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Java.php">Java</a></li>
                        <li class="nav-item"><a class="nav-link" href="../PHP.php">PHP</a></li>
                        <li class="nav-item"><a class="nav-link" href="../forum.php">Forums</a></li>


                        <?php 
                            $uid=$_SESSION['uid'];
                            $getdata = $con->query("SELECT * from userlogin WHERE id='$uid' ");
                            $row = $getdata->fetch_assoc();
                            $fullname = $row['Fullname'];
                         ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
                          <?php echo $fullname; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="../profile.php">Profile</a>
                          <a class="dropdown-item" href="../changepassword.php">Change Password</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="../signout.php">Sign out</a>
                        </div>
                    </li>



                    </ul>
                </div>
            </div>
        </nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>