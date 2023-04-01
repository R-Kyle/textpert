<?php 
include('css/csslinks.php'); 
require('../include/database.php');

$query1 = $con->query("SELECT * FROM common_bot ");
$row = $query1->fetch_assoc();

$imageURL = "../ImageLogo/".$row["System_Logo"];

?>

<link rel="stylesheet" type="text/css" href="css/styles.css">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="../ImageLogo/Logoss.png">
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
                        <li class="nav-item"><a class="nav-link" href="../ContactUs.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../UserLogin.php">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link" href="../UserRegister.php">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>