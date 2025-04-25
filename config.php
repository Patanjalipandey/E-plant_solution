<?php
$hostProvider = 'localhost';
$userName = 'root';
$userPwd = '';
$userDbName = 'e-plant';

$conn = mysqli_connect($hostProvider,$userName,$userPwd,$userDbName);

if(!$conn)
{
	die("Database Error:");
}

?>