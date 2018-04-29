<?php

	include_once 'common.php';
	include_once 'db.php';

	session_start();

	if(isset($_POST['username'])){
		$u_name = $_POST['username'];
	}else{
		$u_name = $_SESSION['username'];
	}
	if(isset($_POST['password'])){
                $pwd = $_POST['password'];
        }else{
                $pwd = $_SESSION['password'];
        }

	if(!isset($u_name)){
	?>
	<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
	<head>
	<style>

	body {
	 font-family: Courier, monospace;
	 font-size: 14px;
	 cursor: pointer;
	 font-weight: 100;
	 text-align:center;
	 background-image:url("https://orig00.deviantart.net/0932/f/2012/106/b/6/windows_98_hd_by_cecil475-d4wfwm8.jpg");
	 }

	 .center {
	  position: absolute;
	  height: 200px;
	  width: 400px;
	  margin:-100px 0 0 -200px;
	  top: 50%;
	  left: 50%;
	  background: darkgrey;
	  border-top: 20px solid grey;
	 }

	 h1 {
	    font-weight: 100;
	    font-size: 20px;
	 }

	 #logo {
	   font-size:50px;
	   color: white;
	   font-family: "Impact";
	    text-shadow:
	   -3px -3px 0 #000,							         3px -3px 0 #000,							      -3px 3px 0 #000,							            3px 3px 0 #000;
	 }

	</style>
	<title> Log In </title>
	
	</head>
	<body>
	<p id = "logo">meme city</p>
	<img src = "https://zippy.gfycat.com/GrouchyRevolvingKitty.gif" style= "width:100px;height:100px;">
		<div class = "center">
		
		<h1>Please Log In</h1>
		<br>
		<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
			Username: <input type="text" name="username"/><br>
			Password: <input type="password" name="password"/><br>
			<input type="submit" value="Log in"/>
			<form action="http://172.17.149.139/MemeGenerator/signup.php">
				<input type="submit" value="Sign Up"/>
			</form>
		</form>
		</div>
	</body>
	</html>
<?php
		exit;
	}	
	$_SESSION['username'] = $u_name;
	$_SESSION['password'] = $pwd;

	$dbconn = dbConnect('MEME');
	$sql = "SELECT * FROM Users WHERE username = '$u_name' AND password = '$pwd'";
	
	$result = mysqli_query($dbconn, $sql);
	
	if(!$result){
		error("DB ERROR ON USER AUTH");
	}
	if(mysqli_num_rows($result) == 0){
		unset($_SESSION['username']);
		unset($_SESSION['password']);

	?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
	<head>
	<title> Log In </title>
        
        </head>
        <body>
                <h1>Please Log In</h1>
		<br>
		<p style="color:red;">Invalid Login.</p><br>
                <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                        Username: <input type="text" name="username"/><br>
			Password: <input type="password" name="password"/><br>
			<input type="submit" value="Log in"/>
                	<form action="http://172.17.149.139/MemeGenerator/signup.php">
			<input type="submit" value="Sign Up"/>
                        </form>	
		</form>
        </body>
        </html>
	
<?php
	exit;
	}
?>

