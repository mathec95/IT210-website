<?php
include ('settings.php');

$name = $_POST["username"];
$pass = sha1($_POST["password"]);

$sql = "SELECT * FROM Users WHERE username = ? AND password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $pass);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
$stmt->close();

if ($data)
{
    $sql_update = "UPDATE Users SET logged_in = 1 WHERE username = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
    session_start();
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['username'] = $name;
    $_SESSION['userId'] = $data[0]['userId'];
//    setcookie("logged_in", "1", time()+3600, "/");
//    setcookie("username", $name, time()+3600, "/");
//    setcookie("logged_out", "", time()-60, "/");
    header('Location: contact.php');
    exit;
}
else
{
    session_start();
//    setcookie("loginfail", "1", time()+60, "/");
    $_SESSION['wrong_log_in'] = TRUE;
    header('Location: login.php');
    exit;
}
$conn->close();
?>
