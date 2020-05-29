<?php

session_start();

require 'header.php';

require 'connect.php';

$topic = $_SESSION['topic'];
$password = $_SESSION['password'];


/******* Password Confirmation ********/

$confirm = $_SESSION['confirm'];
$login = $topic . $password;
if ( $login !== $confirm && $password !== "none" ) {
    // failure to confirm
    echo "Login: " . $login . "<br>";
    echo "Confirm: " . $confirm . "<br>";
    echo '<script> window.top.location = "password-retry.html" </script>';
    // REMOVED: header('Location: password.html');
}
else if ( $login === $confirm || $password === "none" ) {
    //continue data retrieval
    // '}' ends retrieval

/**************************************/


$sql = ("
SELECT * FROM (
  SELECT * 
  FROM names
  WHERE topic='$topic'
  ORDER BY id DESC
  LIMIT 20
) AS `table` ORDER by id ASC
");
//Query the Database
$result = mysqli_query($conn, $sql);

//Count the returned rows
if(mysqli_num_rows($result) != 0) {
    
    if ( $topic != 'public_chat' ) {
        echo "<div class='load-more'><button class='load-more'>^ Load 20 more ^</button></div><br>";
    }
    else {
        echo '<br>';
    }
    
    //Turn the results into an array
    while($rows = mysqli_fetch_assoc($result)) {
        
        //$reversed = array_reverse($rows);
        $first_name = $rows['first_name'];
        $message = $rows['message'];
        
        echo "<div class='message-cell'><div class='message-text'><p class='message-cell'>$message</p></div><p id='name-label'>$first_name</p></div><br>";
        
    }
    echo "<div id='bottom'></div>";
    echo "<button id='toggle-reload' onclick='window.top.location = &quot;message-board.html&quot;'>Start Reload</button>";
    //echo "<div style='width:100%;background-color:lightgray;position:fixed;top:0vh;'><h1 id='title' style='text-transform:capitalize;display:inline-block'>$topic</h1><a href='' style='margin-left:80vw;'>admin</a></div>";
    
}
//Display the results
else {
    echo "No results.";
}


/********** FOR AUTO UPDATE ***********/
$sql_forFile = ("
SELECT MAX( ID )
FROM names
WHERE topic = '$topic'
");

$fetchID = mysqli_fetch_assoc(mysqli_query($conn, $sql_forFile));
$lastID = $fetchID['MAX( ID )'];

//echo "New record has id: " . $lastID . "<br>"; //mysqli_insert_id($conn);

/*$myfile = fopen("IDcheck.txt", "w") or die("Unable to open file");
fwrite($myfile, $lastID);
fclose($myfile);*/

$_SESSION['lastRecID'] = $lastID;
    
} // END RETRIEVAL - password confirmation end

?>