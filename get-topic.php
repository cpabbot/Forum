<?php

session_start();

require 'connect.php';

$topic = $_GET['topic'];
    $_SESSION['topic'] = $topic;
    echo $topic;

$sql = "SELECT password FROM topics WHERE topic = '$topic'";
$result = mysqli_query($conn, $sql);
$value = mysqli_fetch_array($result);

$getPass = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$password = $getPass['password'];

$_SESSION['password'] = $password;
echo $password;

if($password == "none") {
    header('Location: message-board.html');
}
else {
     header('Location: password.html');
}

?>