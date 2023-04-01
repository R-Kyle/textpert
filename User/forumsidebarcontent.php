<?php 
  session_start();
  error_reporting(0);

  $uid = $_SESSION['uid'];
  $display = mysqli_query($con,"SELECT * FROM userlogin WHERE id='$uid' ");
  $result=mysqli_fetch_array($display);
  $name = md5($result['Fullname']);

?>
        <!-- Sidebar content -->
        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
           <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div>
           <div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;">

                <div class="sticky-inner">
                <a class="btn btn-lg btn-block form-control btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold" href="forumask.php?<?php echo $name; ?>">Ask Question</a>
                <div class="bg-white mb-3">

                  <h4 class="px-3 py-4 op-5 m-0">Active Topics</h4>
                  <hr class="m-0">

                  <div class="pos-relative px-3 py-3">
                    <h6 class="text-primary text-sm">
                      <a href="#" class="text-primary">Why Bootstrap 4 is so awesome? </a>
                    </h6>
                    <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">39 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                  </div>

                  <hr class="m-0">
                </div>
              </div>

           </div>
        </div>
        <!-- Sidebar content end -->