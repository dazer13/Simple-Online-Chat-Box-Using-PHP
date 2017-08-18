<?php


session_start();

include('config/config.php');
$message = mysqli_real_escape_string($conn,$_POST['message']);

// attempt insert query execution
$sql = "INSERT INTO comment (user, comment_text) VALUES ('{$_SESSION['USSR']}', '$message')";
mysqli_query($conn, $sql);
 
 $sql2="SELECT * FROM comment ORDER by id DESC";
$result=mysqli_query($conn,$sql2);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	echo "<p id='c-text' style='opacity:0.8; color:#1a1a1a;font-size:12px;'><span style='font-size:15px; font-weight:bold;color:#0883db;margin:30px auto;'>". $row['user']."</span>&nbsp;&nbsp;". $row['comment_text']."</P>";
	
}

?>
