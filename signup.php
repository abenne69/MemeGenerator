<?php

	include 'common.php';
	include 'db.php';

	if(!isset($_POST['submitok'])):
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<style>

	html {
	 height: 100%;
	}

	body {
	 font-family:"Helvetic Neue", Helevetica, Arial, sans-serif;
	 font-size: 12px;
	 background: linear-gradient(lightcoral,lightsalmon,palegoldenrod,palegreen,lightblue,plum,pink);
	 text-align: center;
	 margin: 0;
	 }

	h3 {
	  font-family: "Impact";
	  color: white;
	  font-size: 30px;
	  text-shadow:
	  -2px -2px 0 #000,
	   2px -2px 0 #000,
	   -2px 2px 0 #000,
	   2px 2px 0 #000;
	}
	
	h2 {
	 font-family: "Impact";
	 font-size: 50px;
	 text-align:right;
	 padding-right: 10px;
	 color:white;
	 text-shadow:
	 -3px -3px 0 #000,
	 3px -3px 0 #000,
	 -3px 3px 0 #000,
	 3px 3px 0 #000;
	}

	img {
	  postion: fixed;
	  height: 190px;
	  padding-top:5px;
	  }

	.center {
	 margin:auto;
         padding: 20px;
	 border-radius: 25px;
	 background: white;
	 width: 35%;
	}
	</style>
	<title>New User Registration</title>	

	</head>
	<br>
	<h2>meme city</h2>
	<h3>New User Registration</h3>

  	<p><font color="orangered" size="+1"><tt><b>*</b></tt></font> indicates a required field</p>

  <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
  <br><br>
  <div class = "center">
    <table border="0" cellpadding="0" cellspacing="5">

      <tr>
        <td align="right">
          <p>User ID</p>
        </td>

        <td>
          <input name="username" type="text" maxlength="100" size="25" />
         <font color="orangered" size="+1"><tt><b>*</b></tt></font>
       </td>
    </tr>

    <tr>
      <td align="right">
        <p>Password</p>
      </td>
      <td>
        <input name="password1" type="password" maxlength="100" size="25" />
        <font color="orangered" size="+1"><tt><b>*</b></tt></font>
      </td>
    </tr>
    <tr>
      <td align="right">
        <p>Confirm Password</p>
      </td>
      <td>
        <input name="password2" type="password" maxlength="100" size="25" />
        <font color="orangered" size="+1"><tt><b>*</b></tt></font>
      </td>
    </tr>



    <tr>
      <td align="right" colspan="2">
        <hr noshade="noshade" />
        <input type="reset" value="Reset Form" />
        <input type="submit" name="submitok" value="   OK   " />
      </td>
    </tr>

  </table>
</div>
</form>
<img src = "https://vignette.wikia.nocookie.net/roblox/images/1/18/Patrick_vector_by_zavkat-d6041ea.png/revision/latest?cb=20180101153238">
</body>

</html>
	<?php
		else:
			$dbconn = dbConnect('MEME');
			if($_POST['username']=='' or $_POST['password1']=='' or $_POST['password2']==''){
				error('One or more required fields are incomplete.');
			}
			if($_POST['password1'] != $_POST['password2']){
				error('Passwords do not match');	
			}
			
			$sql = "SELECT * FROM Users WHERE username = '$_POST[username]'";
			$result = mysqli_query($dbconn,$sql);
	
			//print($result);
			if(mysqli_num_rows($result)>0) {
				error('Username already exists');
			}
			$sql = "INSERT INTO Users (username, password) VALUES ('$_POST[username]','$_POST[password1]')";
			
			if(!mysqli_query($dbconn,$sql)){
				error('DATABASE ERROR AT INSERT QUERY');
			}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title> Registration Complete </title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	</head>
	<body>
	<p><strong>User registration successful!</strong></p>
	<input type="submit" value="Go To Login" onclick="window.location='http://172.17.149.139/MemeGenerator/login.php';"/>
		
	</body>
</html>
<?php
endif;
?>


