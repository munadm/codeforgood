<?php session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["password"];
$currentid;
$con=mysqli_connect("localhost","root","cfg2014!","team_15");

if(mysqli_connect_errno()){
    echo "<h2> Failed to connect to MYSQL: " .mysqli_connect_error();
}

else{
    /* $result = $con->query("SELECT MAX(A_ID) FROM ACCOUNT");
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lastid = $row["0"];
        }
    }
      
     */
    $lastid = $con->query("SELECT MAX(A_ID) as LAST FROM ACCOUNT")->fetch_object()->LAST;
    $currentid = $lastid + 1;
    $query = "INSERT INTO ACCOUNT VALUES(" . $currentid . "," . $name .",". $email . ")";
    if($con->query($query) === TRUE){
        echo "<script> alert('New User: " . $name . "created sucessfully!') </script>";
        mysqli_close($con);
        header("http://ec2-54-211-233-68.compute-1.amazonaws.com/choice.html");
    } else{
        echo "Error:" . $sql ."<br>". $con->error;
    }
       
    
}

?>
