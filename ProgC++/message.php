

<?php
// connecting to database
require('../include/database.php');
// getting user message through ajax
$getMesg = mysqli_real_escape_string($con, $_POST['text']);

//checking user query to database query
$check_data = "SELECT * FROM CPlus WHERE Queries LIKE '%$getMesg%'";
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
  $programlang = 'C++';
  $inquiries = "INSERT INTO unanswered (Programming_Language,unanswered) values ('$programlang','$getMesg')";
  $query = mysqli_query($con, $inquiries);
    echo "Sorry can't be able to understand you!";
}

?>
