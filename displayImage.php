<?php
include 'usercontrol.php';

$file = $_POST['file'];
$user = "by " . $_POST['user'];
$title = $_POST['title'];


echo '<h2>"'. $title . '"</h2>';
echo '<h3>"'. $user . '"</h3>';
echo '<img src="'. $file .'"/>';


