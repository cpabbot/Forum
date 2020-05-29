<?php

session_start();
$topic = $_SESSION['topic'];
$password = $_SESSION['password'];
$enteredPass = $_POST["password"];

echo $enteredPass . "<br>";

if($password === $enteredPass) {
    $_SESSION['confirm'] = $topic . $password;
    header('Location: message-board.html');
}
else {
    $_SESSION['confirm'] = "false";
    echo "Password: " . $password . " Entered: " . $enteredPass . "<br>";
    header('Location: password-retry.html');
}

echo $_SESSION['confirm'];

?>