<?php 
include 'usercontrol.php'; 
include_once 'db.php';
include_once 'common.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Change Password</title>
</head>
<body>
<p> Welcome to Your Profile, <?=$u_name?></p>
<form method="post" action="userProfile.php">
        <input type="submit" value="Back to Profile"/>
</form>
<form method="post" action="home.php">
        <input type="submit" value="Back to Home"/>
</form>
<form method="post" action="changePassword.php">
	<input type="submit" value="Change Password"/>
</form>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Old Password: <input type="text" name="oldPwd"/>
	New Password: <input type="text" name="newPwd1"/>
	Confirm New Password: <input type="text" name="newPwd2"/>
</form>

<?php
	$oldPwd = $_POST['oldPwd'];
	$newPwd1 = $_POST['newPwd1'];
	$newPwd2 = $_POST['newPwd2'];

	$dbconn = dbConnect("MEME");

	$username = $_SESSION['username'];  

	$sql = "SELECT password FROM Images WHERE username = $username";
	
	$result = mysqli_query($dbconn, $sql);
	
	$resultArr = mysqli_fetch_object($result);

	if($resultArr->password !== $oldPwd){
		error("Incorrect Password");
	}
	if($newPwd1 !== $newPwd2){
		error("Passwords do not match.");
	}
	
	$sql = "UPDATE Images SET password = $newPwd1 WHERE username = $username";
	
	echo '<script language="javascript">';
  	echo 'alert(Password Updated Successfully)';  //not showing an alert box.
  	echo '</script>';	

	header("Location:userProfile.php");
?>
</table>
</body>
</html>
