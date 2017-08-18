<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The News Reporter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script type="text/javascript" src="val.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="frame.js"> </script>
<script type="text/javascript">

  function OpenModal() {
                $("#divModal").dialog({
                    autoOpen: false, modal: true, title: 'Modal', width: '80%', height: '80%'
                    , buttons: { "Cancel": function () { $(this).dialog("close"); } },
                }).dialog('open');
                return false;
            }
			
			( function($) {
  
function iframeModalOpen(){

		// impostiamo gli attributi da aggiungere all'iframe es: data-src andrà ad impostare l'url dell'iframe
		$('body').on('click','.modalButton', function(e) {
			var src = $(this).attr('data-src');
			//var width = $(this).attr('data-width') || 640; // larghezza dell'iframe se non impostato usa 640
			//var height = $(this).attr('data-height') || 360; // altezza dell'iframe se non impostato usa 360
            var name= $(this).attr('data-name');
			var allowfullscreen = $(this).attr('data-video-fullscreen'); // impostiamo sul bottone l'attributo allowfullscreen se è un video per permettere di passare alla modalità tutto schermo
			
			// stampiamo i nostri dati nell'iframe
			$("#myModal3 iframe").attr({
				'src': src,
				
				'allowfullscreen':''
			});
			
			
		});

		// se si chiude la modale resettiamo i dati dell'iframe per impedire ad un video di continuare a riprodursi anche quando la modale è chiusa
		$('#myModal3').on('hidden.bs.modal', function(){
			$(this).find('iframe').html("");
			$(this).find('iframe').attr("src", "");
		});
	}
  
 function fullScreen(){
	 
	 $('body').on('click','#fullScreenBtn',function(e){
		 
		 
		 var full=$('#fullScreenBtn').text();
		 
		var small=$('#fullScreenBtn').text("Small Screen");
		if(full==="Full Screen"){
			$('#content-model').removeClass("modal-content");
		 $('#content-model').addClass("modal-content2");
			
		}else{
			
			$('#content-model').removeClass("modal-content2");
		 $('#content-model').addClass("modal-content");
			$('#fullScreenBtn').text("Full Screen");
		}
		
	 });
	 
	 
	 
 } 
  
  } ) ( jQuery );







$(window).scroll(function() {

    if ($(this).scrollTop()>170)	
     {
        $('.main_menu_area').addClass('menu-scroll');
		$(".main_menu_area ul li").css({"margin-left": "30px", "font-size": "17px","min-height":"70px"});
		$(".main_menu_area ul li ul li").css({"margin-left": "0px", "font-size": "17px","min-height":"70px"});
		$(".main_menu_area ul li a").css({"padding":"28px 18.7px"});
		$(".main_menu_area ul li a").css({"padding":"28px 18.7px"});
     }	 
    else
     {
      $('.main_menu_area').removeClass('menu-scroll');
	  $(".main_menu_area ul li").css({"margin-left": "0px", "font-size": "15px","min-height":"50px"});
	  $(".main_menu_area ul li a").css({"padding":"18px 18.7px"});
     }
  
  });
  
  jQuery(document).ready(function() {
 
 
 iframeModalOpen();
		fullScreen();

 
var duration = 1500;
 
$(window).scroll(function() {
 
if ($(this).scrollTop() > 600) {
 
$('.back-to-top').fadeIn(duration);
 
} else {
 
$('.back-to-top').fadeOut(duration);
 
}
 
});
 

 
$('.back-to-top').click(function(event) {
 
event.preventDefault();
 
$('html, body').animate({scrollTop: 0}, duration);
 
return false;
 
})
 
});
</script>

</head>

<body>



<div class="header_area" >
      <div class="logo floatleft"><a href="#"><img src="images/logo1.png" alt="" /></a></div>
      <div class="top_menu floatleft">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a  href="contact.php">Contact us</a></li>
          <li><a  type="button" onclick="load_Contact()">About us</a></li>
       
		  <?php if(isset($_SESSION['USSR'])){ ?>
         <li><a type="button" data-toggle="modal" data-target="#myModal"><span style="text-transform:capitalize;font-weight:bold;font-size:15px;"><?php echo $_SESSION['USSR']  ?></a></span><a href="logout.php">&nbsp;(Logout)</a></li>
          <?php }else{ ?>
           <li><a href="login.php">User Login</a></li>
           <?php }?>
		   <!--<li><a href="admin.php">admin</a></li>-->
        </ul>
		<!--register count-->
	<div align="center" style="position:absolute;top:35px;width:300px ;height:50px;">
	
	<?php
			  
				  include('config/config.php');
		$sql="select MAX(id) AS max from user";
		$run= mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($run,MYSQLI_ASSOC);
					 
		 ?>      
	<!--<p style="color:#000;font-size:20px;font-family:Rockwell;padding:20px 10px;font-weight:bold;">Registered Users&nbsp;<span style=""><?php echo $row['max']?></span></p>-->
	
	</div>
      </div>
      <div class="social_plus_search floatright">
        <div class="social">
          <ul>
            <li><a href="#" class="twitter"></a></li>
            <li><a href="#" class="facebook"></a></li>
            <li><a href="#" class="feed"></a></li>
          </ul>
        </div>
        <div class="search">
          <form action="search.php" method="post" id="search_form" name="search_form">
            <input type="text" name="search_text" placeholder="Search news" id="s" />
            <input type="submit" id="searchform" name="search" value="search" />
            <input type="hidden" value="post" name="post_type" />
          </form>
        </div>
      </div>
    </div>
    <div class="main_menu_area" >
      <ul id="nav">
	    
        <li><a>Latest&nbsp; news</a>
          <ul>
            <li><a href="S&V.php">Security and Vulnerabilities</a></li>
            <li><a href="cyber.php">Cyber Security</a></li>
            <li><a  href="tech.php">Technology</a></li>
            <li><a href="science.php">Science</a></li>
          </ul>
        </li>
        <li><a>All&nbsp;  News</a>
		   <ul>         
            <li><a href="all_cyber.php?page=1">Cyber Security</a></li>
			<li><a href="all_foren.php?page=1">Forensics</a></li>
            <li><a  href="all_tech.php?page=1">Technology</a></li>
            <li><a  href="all_science.php?page=1">Science</a></li>
          </ul>
		
		
		</li>
        <li><a href="journal.php">Journals</a></li>
        <li><a  href="conference.php">Conferences</a></li>
        <li><a href="#">Tools</a>
		  <ul>
            <li><a href="#">Software Tools</a>
			   <ul>
                 <li><a href="#">Security</a></li>
                 <li><a href="#"> Digital Forensics</a></li>
               </ul>
			</li>
            <li><a href="#">Hardware Tools</a>
			   <ul>
                 <li><a href="#">Security</a></li>
                 <li><a href="#"> Digital Forensics</a></li>
               </ul>
			</li>
			<li><a href="#">Real-time Attacks</a></li>
          </ul>
		
		</li>
        <li><a href="#">Free&nbsp;  Courses</a>
		<ul>
            <li><a href="#">E-Learning</a>
			     <ul>
                 <li><a href="MIT.php">MIT University</a></li>
              </ul>
			</li>
            <li><a href="#">Videos</a>
			   <ul>
                 <li><a href="infoSec.php">InfoSec</a></li>
                 <li><a href="defcon.php">Defcon</a></li>
                 <li><a href="RSA.php">RSA</a></li>
                 <li><a href="blackhat.php">BlackHat</a></li>
                 <li><a href="Cristian.php">Cristian008</a></li>
                 <li><a href="Ecouncil.php">EC-Council</a></li>
                 <li><a href="ClubHackTv.php">ClubHack TV</a></li>
                 <li><a href="IBM.php">IBM</a></li>
                 <li><a href="Tripwire.php">Tripwire Inc.</a></li>
               </ul>
			</li>
            
          </ul>		
		</li>
        <li><a href="publication.php">E-Books</a>
		      <ul>
              
                 <li> <a type="button" class="modalButton " data-name="e-books" data-toggle="modal" data-src="http://smtebooks.com/" data-width="100%" data-height="100%" data-target="#myModal3" data-video-fullscreen="">E-Books</a></li>
               </ul>
		</li>
        <li><a target="_blank" href="forum/index.php" >Discussions</a></li>
      </ul>
    </div>
	<!-- Modal 1-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your profile info</h4>
        </div>
		<?php
		include('config/config.php');
		$sql="select * from user where name='{$_SESSION['USSR']}'";
		$run= mysqli_query($conn,$sql);
	    $row=mysqli_fetch_array($run,MYSQLI_ASSOC);
			
	?>
		
        <div class="modal-body">
         
		  <ul class="prof-info">
		    <li style="list-style-type:none;margin:10px auto;padding:5px 5px;"><h2 style="text-align:center;padding:10px 2px;font-size:20px;font-weight:bold;font-family:Rockwell;text-shadow:2px 2px #f20920;-moz-text-shadow:2px 2px #f20920;-webkit-text-shadow:2px 2px #f20920;font-size:25px"><?php echo $row['name']?></h2></li>
			<li style="list-style-type:none;margin:10px auto;padding:5px 5px;">Password:&nbsp;&nbsp; <?php echo $row['password']?><a type="button" data-toggle="modal" data-target="#myModal2" style="color:red;font-size:12px;font-weight:500;padding:5px 10px;margin-left:10px;">Change password</a></li>
			<li style="list-style-type:none;margin:10px auto;padding:5px 5px;">Email:&nbsp;&nbsp; <?php echo $row['email']?><a style="color:red;font-size:12px;font-weight:500;padding:5px 10px;margin-left:10px;" href="#">Update Email</a></li>
		  </ul>
        </div>
		
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
	<!-- Modal 2-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Your Password</h4>
        </div>
		
		
        <div class="modal-body">
         
		   <form method="POST" name="pass_Form" action="cnfm_Pass.php" onSubmit="return validate();" style="padding:20px 50px;">
    <div class="form-group row">
      <label for="lgFormGroupInput" class=" col-form-label col-form-label-lg">New Password</label>
      <div >
        <input type="password" name="pass1" class="form-control form-control-lg" id="pass1" placeholder="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput"  class=" col-form-label col-form-label-sm">Confirm Password</label>
      <div>
        <input type="password" name="pass2" class="form-control form-control-lg" id="pass2" placeholder="confirm password">
      </div>
    </div>
	<input type="submit" class="btn btn-primary" value="Submit" name="sub_Pass" />
  </form>
		 <span id="err"></span>
        </div>
		
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
	
  </div>

	<!--Back to top button-->

<a align="center" href="#" class="back-to-top " style="display: inline;">
 
<i class="glyphicon glyphicon-chevron-up"></i>
 
</a>


</body>


</html>