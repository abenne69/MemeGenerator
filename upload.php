<?php
	include "db.php";
	include "usercontrol.php";	

	$file = "uploads/" . uniqid() . '.png';
		

	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);

	file_put_contents($file, $data);

	$date = date("Y-m-d h:i:sa");
	$username = $_SESSION['username'];	
	$desc = $_POST['desc'];	
		
	$dbconn = dbConnect("MEME");
		
				
	$sql = "INSERT INTO Images(file_name, username, upload_date, description) VALUES ('$file','$username','$date','$desc')";
	mysqli_query($dbconn,$sql);

	

?>
