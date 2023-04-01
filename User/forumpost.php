<?php
session_start();
error_reporting(0);

if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

$uid = $_SESSION['uid'];

$display = mysqli_query($con,"SELECT * FROM forum_post");
while ($row=mysqli_fetch_array($display)) {

 ?>       

          <!-- End of post 1 -->
          <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
            <div class="row align-items-center">
              <div class="col-md-8 mb-3 mb-sm-0">
                <h2>
                  <a href="forumview.php?postid=<?php echo $row['id']; ?>" class="text-primary"><?php echo $row['Title']; ?></a>
                </h2>
                <span class="d-inline-block text-truncate" style="max-width: 400px;">
                  <b><?php echo $row['Content']; ?></b>
                </span><br>
                <p class="text-sm">
                  Posted By:<b> <?php echo $row['Posted_By_Name']; ?></b><br>
                  Posted on: <?php 
                                $date=date_create($row['Date_Posted']);
                                echo date_format($date,"F d, Y");
                              ?>
                </p>

                <div class="text-sm op-5">Tags: <?php echo $row['Category']; ?></div>                
              </div>
              <div class="col-md-4 op-7">
                <div class="row text-center op-7">
                  <!-- <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141 Votes</span> </div> -->
                  <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
                  <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /End of post 1 -->
<?php  } ?>