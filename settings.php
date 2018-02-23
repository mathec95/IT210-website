<?php 
$database = "IT210";
$host = "localhost";
$username = "ehoward";
$password = "1234";

$conn = mysqli_connect($host, $username, $password, $database)
or die ("unable to connect");
if (mysqli_connect_errno())
{
	echo "Did not connect" . mysqli_connect_error;
}
?>
