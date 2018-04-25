<?php
	include "db.php";
	include "usercontrol.php";	

	if(isset($_POST['upload'])){
		$file = rand(1,10000)."-".$_FILES['file']['name'];
		$file_location = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$username = $_SESSION['username'];
		$date = date("Y-m-d h:i:sa");
		$folder = "uploads";
		$toptxt = $_POST['toptxt'];
		$bottxt = $_POST['bottxt'];
		$username = $_SESSION['username'];	
		
		$dbconn = dbConnect("MEME");
	
		move_uploaded_file($file_location,"$folder/$$file");
		$sql = "INSERT INTO Images(file_name, size, type, username, upload_date, toptext, bottomtext) VALUES ('$file','$file_size','$file_type','$username','$date','$toptxt','$bottxt')";
		mysqli_query($dbconn,$sql);

		echo "It Works";
	}

?>
