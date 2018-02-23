<?php
include ('settings.php');

$username = $_POST['username'];  


echo $username;

$query = "SELECT * FROM Users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count>0) {
echo 'Sorry! This Username already exists!';
} else {
    $name = $_POST['name'];
    $sql = "INSERT INTO Users (name, username, email, password, logged_in)
            VALUES
            ('$_POST[name]', '$_POST[username]', '$_POST[email]', sha1('$_POST[password]'), 1)";

	if (!mysqli_query($conn,$sql)) {
	    die('Error: ' . mysqli_error($conn));
	}
	echo "1 record added ".$sql;

	session_start();
	$_SESSION['logged_in'] = TRUE;
	$_SESSION['username'] = $name;
//	$_SESSION['userId'] = $data[0]['userId'];
	header('Location: contact.php');
}

mysqli_close($conn);

?>