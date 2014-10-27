<?php

$e_name = $_POST["e_name"];
$description = $_POST["description"];
$goal = $_POST["goal"];
$progress = $_POST["progress"];
$ev_date = $_POST["ev_date"];

$check = False;
$con=mysqli_connect("localhost","root","cfg2014!","team_15");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


 echo "Before grabbing last query <br>";
    $lastid = $con->query("select max(e_id)as last from events")->fetch_object()->last;
    $currentid = $lastid + 1;
    echo "After generatingcurrent last query <br>";
   $sql = "insert into events values(" . $currentid . ",'" . $e_name . "','". $description . "'," .$goal . "," . $progress . ",'" .$ev_date ."')";

if ($con->query($sql)===TRUE){
    echo "Successful";
    Header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/createdevent.html");
}
else {
    echo "Error: " . $sql . "<br>" . $con->error;
    Header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/createdevent.html");
}



mysqli_close($con);
?>

