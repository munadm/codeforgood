<?php

$challengeName = $_POST["challengeName"];
$description = $_POST["description"];
$date = $_POST["date"];
$challengegoal = $_POST["challengegoal"];


$check = False;
$con=mysqli_connect("localhost","root","cfg2014!","team_15");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


 echo "Before grabbing last query <br>";
    $lastid = $con->query("select max(fund_id)as last from fund_challenge2")->fetch_object()->last;
    $currentid = $lastid + 1;
    echo "After generatingcurrent last query <br>";
    $query = "insert into accounts values(" . $currentid . ",'" . $name ."','". $email . "','" . $pass. "')";
    $sql = "INSERT INTO fund_challenge2 VALUES (" . $currentid . ",'". $challengeName . "','" . $description . "'," . $challengegoal . ", 0)";

if ($con->query($sql)===TRUE){
    echo "Successful";
    Header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/createdchallenge.html");
}
else {
    echo "Error: " . $sql . "<br>" . $con->error;
    Header("Location: http://ec2-54-211-233-68.compute-1.amazonaws.com/fundraiser.html");
}



mysqli_close($con);
?>

