<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "csci4300";

function dbConnect($db=""){
        global $dbhost, $dbuser, $dbpass;
 
        $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die('Not connecting ' . mysqli_error($dbconn));	
	
	return $dbconn;
}
?>
