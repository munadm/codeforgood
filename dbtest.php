<!DOCTYPE html>
<?php

$id = $_POST["user_id"];
$user = $_POST["user"];
$desc = $_POST["desc"];
$money = $_POST["money"];
$deadline = $_POST["deadline"];

$con=mysqli_connect("localhost","root","cfg2014!","team_15");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
}

else{
    $query = "INSERT INTO make_challenge(USER_ID,USER,DESCRIPTION,MONEY_EARNED,DEADLINE) VALUES(" . $id . "," . $user .",". $desc . "," . $money.",". $deadline .")";
    if($con->query($query) === TRUE){
        echo "<script> alert('New Record created successfully') </script>";
        header("http://ec2-54-211-233-68.compute-1.amazonaws.com/formtest.php");
    } else{
        echo "Error:" . $sql ."<br>". $con->error;
    }
    
echo "<br>wizard";
}


mysqli_close($con);


?>