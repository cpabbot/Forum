<?php

define('DB_NAME', 'id307019_firstdb');
define('DB_USER', 'id307019_webhost');
define('DB_PASSWORD', 'dev7Archers');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!db_selected) {
    die('Can\'t use ' . DB_NAME . ': ' .mysql_error());
}

$value = $_POST('first_name');

$sql = "INSERT INTO first-table1 (first_name) VALUES ('$value')";

if(!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}

mysql_close();
?>