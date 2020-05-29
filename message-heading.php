<?php

session_start();
$topic = $_SESSION['topic'];

include 'header.php';

?>

<html>
<head>
    
<style>
    body {
        overflow: hidden;
    }
    main {
        width: 100%;
        text-align: center;
    }
    h1 {
        margin-top: 10px;
        color: rgba(0,0,0,.87);
    }
</style>
    
</head>
<body>
    
<main>
    <h1 id="title" style='text-transform:capitalize'><?php echo $topic; ?></h1>
</main>
    
</body>
</html>