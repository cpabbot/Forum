<?php

session_start();

setcookie("msg", "", time() + (86400 * 1), "/");

require 'connect.php';

//setcookie('msg', '', 1, '/');

// Escape user inputs for security
$first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$message = str_replace("<script","?",$message);

$topic = $_SESSION['topic'];

// attempt insert query execution
$sql = "INSERT INTO names (topic,first_name, message) VALUES ('$topic', '$first_name', '$message')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully." . "<br>Welcome " . $_POST["firstname"];
    
    echo "Value is: " . $_COOKIE["msg"];
    
    header('Location: message-board.html');//window.location.replace(&quot;message-board.html&quot;);
    // TOOK TOO LONG echo '<script type="text/javascript">window.top.location = "message-board2.html"</script>';
} else{
    echo "Error: Could not execute $sql. " . mysqli_error($conn);
}

include 'delete.php';

// close connection
mysqli_close($conn);
?>