<?php include 'usercontrol.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>TEST</title>
</head>
<body>
<p> Welcome <?=$u_name?></p>
<form method="post" action="http://172.17.149.139/MemeGenerator/logout.php">
	<input type="submit" value="Log Out"/>
</form>

</body>
</html>
