<?php
$link = mysqli_connect('127.0.0.1', 'root', 'kali');
if (!$link) {
	die( 'Error:' . mysql_error());
}
echo 'Good!';
mysql_close($link);
?>
