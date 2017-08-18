<?php

include_once('exec/log_check.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The News Reporter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

 
<script type="text/javascript">

function load_com(){
	
	if(comment.message.value==''){
		alert("Please type your message!");
	}
	
	var message=comment.message.value;
	
		$.ajax({
   type: 'POST',
   data: {message : message},
   url: 'comment_exe.php',
   success: function(data) {},
   error: function() {}
   
});
	
  

}
</script>
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet" type="text/css" href="assets/main/main.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/news.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
</head>
<body id="load">
<div class="body_wrapper">
  <div class="center">
   
   <?php include('header.php');?>
   
    <div class="img-responsive" style="margin:40px auto;padding:10px 8%;">

	    <section id="c-box" style="border:1px solid #000;width:80%;height:350px;">
		 <div  style="background-color:#000;height:50px;width:100%;margin-bottom:20px;">
		  <p style="color:#FFF;text-align:center;padding:10px 2px;font-size:20px;font-weight:bold;font-family:Rockwell;">Welcome to Chat Room &nbsp;&nbsp;<span style="text-shadow:2px 2px #f20920;-moz-text-shadow:2px 2px #f20920;-webkit-text-shadow:2px 2px #f20920;font-size:25px"><?php echo $_SESSION['USSR']?></span></p>
		 </div>
		   <div class="container-fluid" id="comm" style="padding:20px 10px;overflow:auto;max-height:270px;">
	     
	       </div>
		   	 
		  
		</section>
		
       <form class="img-responsive"  name="comment"style="width:80%;height:53px;border:1px solid #000;">
	      <input type="text"  name="message" style="width:80%;height:50px;" placeholder="Type your message here..."/>
		  <a  value="chat" class="btn btn-primary"  onClick="load_com()" style="width:19%;height:50px;font-size:25px;background-color:#000;color:#FFF;">Send</a>
           </form>
         

	   
	</div>
   
   <?php include('footer.php');?>
  </div>
</div>

<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
<script type="text/javascript" src="page_load.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	
	$.ajaxSetup({cache:false});
	setInterval(function(){$('#comm').load('comm.php');},200);
	$("#comm").animate({
    scrollTop: $("#comm").position().top
}, 1000);
});
</script>

</body>
</html>