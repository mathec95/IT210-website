<?php
include('settings.php');

session_start();
$sql_update = "UPDATE Users SET logged_in = 0 WHERE username = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$stmt->close();
session_destroy();
header('Location: login.php');

?>
