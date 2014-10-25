<?php

$user = $_POST["user"];
$pass = $_POST["pass"];


$check = False;
$con=mysqli_connect("localhost","root","cfg2014!","team_15");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo "wizard";

$result = mysqli_query($con,"SELECT * FROM accounts");

while($row = mysqli_fetch_array($result)) {
  if ($row['email'] == $user && $row['password'] == $pass){
      $check = True;
      echo'success';
  }  
}

if ($check == false){
    echo 'potato';
}



mysqli_close($con);
?>

