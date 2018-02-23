<?php
include ('settings.php');
//include ('settingsComments.php');
session_start();

$comment = $_POST["comment"];
$userid = (int)$_SESSION['userId'];

$sql = "INSERT INTO `Comments`(`userID`, `comment`) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $userid, $comment);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
$stmt->close();

?>