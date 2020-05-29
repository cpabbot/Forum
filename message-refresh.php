<html>
<head>
    <!--script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/keep_message.js"></script-->
</head>
<body>
    
<?php

session_start();
$topic = $_SESSION['topic'];
echo $topic . "<br>";

header("Refresh:2");

require 'connect.php';

$sql = ("
SELECT MAX( ID )
FROM names
WHERE topic = '$topic'
");

$fetchID = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$lastID = $fetchID['MAX( ID )'];

/*$myfile = fopen("IDcheck.txt", "r") or die("Unable to open file");
$lastRecID = fread($myfile, filesize("IDcheck.txt"));
fclose($myfile);*/
$lastRecID = $_SESSION['lastRecID'];

echo 'Last Recorded ID ' . $lastRecID . '<br>';
echo 'Real Last ID ' . $lastID . '<br>';
    
if($lastRecID != $lastID) {
    //echo "<script type='text/javascript'>alert('New message!\\nPlease refresh this page');
    /*echo "
        <script type='text/javascript'>
        var str = document.getElementById('title').innerHTML
        
        </script>
        ";*/
    //echo '<script> reload(); </script>';
    echo '<script> window.top.location.reload(); </script>';
}

?>

</body>
</html>