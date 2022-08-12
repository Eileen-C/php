<?php
$servername = "localhost";
$username = "root";
$password = "12345678";

$con = new mysqli($servername, $username, $password);

//Check connection
if (mysqli_connect_errno())
{
	echo "Connection Failed:" .$con -> connect_error;
}
?>