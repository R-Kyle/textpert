

<?php
// connecting to database
require('../include/database.php');
// getting user message through ajax
$getMesg = mysqli_real_escape_string($con, $_POST['text']);

//checking user query to database query
$check_data = "SELECT * FROM phpbot WHERE Queries LIKE '%$getMesg%'";
$run_query = mysqli_query($con, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['Replies'];
    $code = $fetch_data['Sample_Code'];
	echo $replay;
  if ($code=='') {

  }else{
    echo '<br><br>'.$code;
  }
  
  
	

    

}else{
  $programlang = 'PHP';
  $inquiries = "INSERT INTO unanswered (Programming_Language,unanswered) values ('$programlang','$getMesg')";
  $query = mysqli_query($con, $inquiries);
    echo "Sorry can't be able to understand you!";
}

?>





<!-- 
<div id="myModal" class="modal">
	<span class="close">&times;</span>
	<img class="modal-content" id="img01">
</div>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

 -->