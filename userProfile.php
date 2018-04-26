<?php 
include 'usercontrol.php'; 
include_once 'db.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?=$u_name?></title>
</head>
<body>
<p> Welcome to Your Profile, <?=$u_name?></p>
<form method="post" action="home.php">
        <input type="submit" value="Back to Home"/>
</form>
<form method="post" action="changePassword.php">
	<input type="submit" value="Change Password"/>
</form>
<table align=center>

<?php
	$dbconn = dbConnect("MEME");
	
	$username = $_SESSION['username'];	
	
	$sql = "SELECT * FROM Images WHERE username = '$username'";

	$result = mysqli_query($dbconn, $sql);
	
	echo "<th>My Memes</th>";
	

	while($resultsArr = mysqli_fetch_object($result)){
		echo "<tr><td>";
		echo "<form method='post' action='displayImage.php'>";
		echo "<input type='hidden' value='$resultsArr->file_name' name='file'/>";
		echo "<input type='hidden' value='$resultsArr->username' name='user'/>";
		echo "<input type='submit' value='$resultsArr->description' name='title'/>";
		echo "</form>";
		echo "</td></tr>";
	}		
?>

</table>
</body>
</html>
