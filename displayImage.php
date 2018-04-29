<?php
include 'usercontrol.php';

echo "<form method='post' action='home.php'>";
echo "<input type='submit' value='Go Back'/>";
echo "</echo>";

$file = $_POST['file'];
$user = "by " . $_POST['user'];
$title = $_POST['title'];


echo '<h2>'. $title . '</h2>';
echo '<h3>'. $user . '</h3>';
echo '<img src='. $file .'>';


