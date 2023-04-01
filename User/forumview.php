<?php 
require('../include/database.php');
require('include/navigationbar.php');
session_start();
error_reporting(0);
$uid = $_SESSION['uid'];

$postid = $_GET['postid'];

$display = mysqli_query($con,"SELECT * FROM forum_post INNER JOIN userlogin ON forum_post.Posted_By_Id=userlogin.id WHERE forum_Post.id = '$postid' ");
$row=mysqli_fetch_array($display);
$posterimageURL = "../ImageLogo/".$row["ProfilePhoto"];
?>








 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" type="text/css" href="css/commentbox.css">
 <head>
 	<title>TexPert | View Questions</title>
 </head>
 <body>
<br><br>
<div class="container-fluid">
 	<div class="row">
 		<div class="col-sm-2"></div>

 		<div class="col-sm-7">

      <div class="container-fluid mt-100">
           <div class="row">
               <div class="col-md-12">
                   <div class="card mb-4">
                       <div class="card-header">
                        <div class="row">

                           <div class="col-sm-4  align-items-center" style="padding: 2%;">                            
                            <center>
                              <img src="<?php echo $posterimageURL; ?>" class="d-block ui-w-40 rounded-circle" width="150" height="150" alt="">

                               <div class="media-body ml-3">
                                <p style="font-weight: bolder; font-size:20px;"><?php echo $row['Fullname']; ?></p>                                
                                   <div class="text-muted small">
                                      <!-- Time ago display -->
                                      Posted : <?php require('timeago.php');echo timeago($row['Date_Posted']); ?>                                  
                                    </div>
                               </div>
                               <div class="text-muted small ml-3">
                                  <?php $date=date_create($row['Date_Registered']);?>
                                   <div>Member since : <strong><?php echo date_format($date,"F d, Y"); ?></strong></div>
                               </div>
                              </center>
                           </div>

                            <div class="col-sm-8 media align-items-center" style="padding: 2%;">
                                <div class="media-body ml-3">
                                  <div class="text-active Large"><h4>Category : <b><?php echo $row['Category']; ?></b></h4></div>
                                  <h1><?php echo $row['Title']; ?></h1>                                  
                                </div>
                             </div>

                        </div>
                       </div>

                       <div class="card-body">  

                        <p><?php echo $row['Content']; ?></p>
                          <pre class="form-control" style="height:400px;"><code ><?php $codes = wordwrap($row['Sample_Code']); print_r($codes);?></code></pre>
                       </div>


                       <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                          <div class="px-4 pt-3">
                            <!-- <i class="fa fa-eye text-muted fsize-3"></i>&nbsp;
                            <span class="align-middle"></span> -->
                            &nbsp;&nbsp;
                            <?php 
                              $sql="SELECT * FROM forum_comments WHERE Post_Id = '$postid' ";
                              if ($result=mysqli_query($con,$sql))
                              {   // Return the number of rows in result set
                                   $countcomment=mysqli_num_rows($result);

                               }

                             ?>
                            <i class="fa fa-comments text-muted fsize-3"></i>&nbsp;
                            <span class="align-middle"><?php echo $countcomment; ?> Comments</span>

                          </div>
                           <div class="px-4 pt-3">
                            <!-- <button type="button" class="btn btn-primary"><i class="fa fa-comment"></i>&nbsp; Comment</button> -->
                          </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

      <!-- comment section start -->
      <?php 
        $displaycommentor = mysqli_query($con,"SELECT * FROM userlogin INNER JOIN forum_comments ON userlogin.id = forum_comments.User_Id INNER JOIN forum_post ON forum_comments.Post_Id = forum_post.id WHERE Post_Id = '$postid' ORDER BY Comment_Date Desc "); 
        while ($comment=mysqli_fetch_array($displaycommentor)) { 
         $imageURL = "../ImageLogo/".$comment["ProfilePhoto"];               
      ?>
      <div class="card">
        <div class="d-flex flex-row p-3">
          <img src="<?php echo $imageURL; ?>" width="40" height="40" class="rounded-circle mr-3">
          <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex flex-row align-items-center">
                  <span class="mr-3">&nbsp&nbsp <?php echo $comment['Fullname']; ?></span>
              </div>
              <small><?php echo timeago($comment['Comment_Date']); ?></small>
            </div>  <br>

            <p class="text-justify comment-text mb-0">
                 <?php echo $comment['Comment']; ?>
            </p>
            <?php
            $codecomment = $comment['Code'];
            if ($codecomment != "") {
            ?>
            <div class="d-flex flex-row user-feed">
              <textarea class="text-justify comment-text mb-0 form-control" readonly style="height:200px;"><?php echo $comment['Code']; ?></textarea>
            </div> 
            <?php } ?>                     
          </div>
        </div>
      </div>
      <br><hr>
      <?php } ?>
        <!-- comment section end -->
 		




<?php 
    if (isset($_POST['submit'])) {

        $comment = $_POST['comment'];
        $samplecode = $_POST['code'];

        $code = $con->real_escape_string($samplecode);
        $comment = $con->real_escape_string($comment);
        $insert = mysqli_query($con,"INSERT INTO forum_comments (Post_Id,User_Id,Comment,Code) VALUES ('$postid','$uid','$comment','$code')");
        echo ' <script>
            window.location.href = window.location.href;
        </script>';

    }
 ?>
    <form method="post">
          <div class="col-sm-12 card">
            <div class="card-body">

              <h4>Your Comment Here</h4>
              <div class="form-floating">
                <textarea class="form-control" name="comment" id="floatingTextarea2" required style="height: 100px"></textarea>
                <label for="floatingTextarea2">Your Comment Here</label>
              </div>
              <br>
              <h4>Enter Your Sample Code Here</h4>
              <div class="form-floating">
                <textarea class="form-control" name="code" id="floatingTextarea2"  style="height: 100px"></textarea>
                <label for="floatingTextarea2">Enter Your Sample Code Here</label>
              </div>
              <br>
              <button type="submit" name="submit" class="btn btn-primary form-control" >Add Your Comment</button>
            </div>
          </div>
    </form>
    </div>

 		<div class="col-sm-3"></div>		
 	</div>
</div>
<br><br>
 <?php include('include/footer.php'); ?>
</body>
</html>





