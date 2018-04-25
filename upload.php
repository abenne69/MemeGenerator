<?php
	include "db.php";
	include "usercontrol.php";	

	$file = "uploads/" . uniqid() . '.png';
		
	echo '<script>';
  	echo 'console.log("in php")';
	echo 'alert("hello")';
  	echo '</script>';
	echo "Here in php";

	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);

	file_put_contents($file, $data);
	$date = date("Y-m-d h:i:sa");
	$username = $_SESSION['username'];	
		
	$dbconn = dbConnect("MEME");
		
				
	$sql = "INSERT INTO Images(file_name, username, upload_date) VALUES ('$file','$username','$date')";
	mysqli_query($dbconn,$sql);

	echo "It Works";
	

?>
