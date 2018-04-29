<?php 
include 'usercontrol.php'; 
include_once 'db.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title>Meme City</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>       
        $(document).ready(function(){
                $(".imageBtn").click(function(e){
               
			var result = this.value;
			var title = this.innerHTML;

			var file = result.substring(0,result.indexOf(":"));
			var user = result.substring(result.indexOf(":")+1,result.length);					
			console.log(file);
			console.log(user);
 			
                        $.ajax({
                                type: "POST",
                               	url: "displayImage.php", 
				data: { 
                                        file: file,
					user: user,
					title: title
                                }
                        }).done(function(o) {
                                console.log('saved');
                        });
			window.location.href = "displayImage.php";                        
                        
                });     
        });
</script>

</head>
<body>
<p> Welcome to Meme City, <?=$u_name?></p>
<form method="post" action="http://172.17.149.139/MemeGenerator/logout.php">
	<input type="submit" value="Log Out"/>
</form>
<table align=center>
<th>Meme City Population</th>
<?php

	$dbconn = dbConnect("MEME");
	
	$sql = "SELECT * FROM Images";

	$result = mysqli_query($dbconn, $sql);

	while($resultsArr = mysqli_fetch_object($result)){
		$tempValue = $resultsArr->file_name.':'.$resultsArr->username;
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
