<?php

/*define('DB_NAME', 'id307019_firstdb');
define('DB_USER', 'id307019_webhost');
define('DB_PASSWORD', 'dev7Archers');
define('DB_HOST', 'localhost');*/

$mysql_host = 'localhost'; //localhost
$mysql_user = 'root'; //id389750_forumuser
$mysql_password = ''; //dev7Archers

// CONNECT TO MYSQL
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, "test"); //id389750_forum
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>