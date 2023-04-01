<?php 
require('include/navigationbar.php');
 ?>

 <!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/chatbox1.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textpert | Java bot</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<br>

 <div class="container">
 	<div class="row">
 		<div class="col-sm-12">
            <center>
 			   <div class="wrapper">
			        <div class="title">Learn to Code with Java</div>
			        <div class="form">
			            <div class="bot-inbox inbox">
			                <div class="icon">
			                    <img src="../ImageLogo/bot.png" class="icon">
			                </div>
			                <div class="msg-header">
			                     <p><?php

			                        	$getdata = $con->query("SELECT Intro_Message from Common_Bot ");
										$row = $getdata->fetch_assoc();
										$IntroMessage  = $row['Intro_Message'];

										echo $row['Intro_Message'];
			                          ?></p>
			                </div>
			            </div>
			        </div>
			        <div class="typing-field">
			            <div class="input-data">
			                <input id="data" type="text" placeholder="Type something here.." required>
			                <button id="send-btn">Send</button>
			            </div>
			        </div>
			    </div>
                </center>
 		</div>
 	</div>
 </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><img src="../ImageLogo/user.png" class="icon"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                       $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="../ImageLogo/bot.png" class="icon"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
    <?php include("include/footer.php"); ?>
</body>
</html>