<?php session_start();
    $type= $_GET['type'];
    $_SESSION['selection2'] = $type;
    header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/funevent.php");
?>


