<?php

/* Session already started in insert.php
session_start();
$topic = $_SESSION['topic'];*/

if( $topic == 'public_chat' ) {
    $sql_delete = 
"DELETE FROM `names`
  WHERE id <= (
    SELECT id
    FROM (
      SELECT id
      FROM `names`
      WHERE topic='$topic'
      ORDER BY id DESC
      LIMIT 1 OFFSET 9 -- keep this many records
    ) foo
  )";
}

else {
    $sql_delete = 
"DELETE FROM `names`
  WHERE id <= (
    SELECT id
    FROM (
      SELECT id
      FROM `names`
      ORDER BY id DESC
      LIMIT 1 OFFSET 500 -- keep this many records
    ) foo
  )";
}

mysqli_query($conn, $sql_delete);
    
?>