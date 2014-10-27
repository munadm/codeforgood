<?php session_start();
    $type= $_GET['type'];
    $_SESSION['selection'] = $type;
    header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/fundc.php");
?>


