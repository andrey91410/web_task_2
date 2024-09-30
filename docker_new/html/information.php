<?php
$link = mysqli_connect('db', 'root', 'kali');
if (!$link) {
	die( 'Error:' . mysql_error());
}
echo 'Good!';
mysql_close($link);
?>
