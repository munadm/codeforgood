
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
    echo "Before grabbing last query <br>";
    $lastid = $con->query("select max(a_id)as last from accounts")->fetch_object()->last;
    $currentid = $lastid + 1;
    echo "After generatingcurrent last query <br>";
    $query = "insert into accounts values(" . $currentid . ",'" . $name ."','". $email . "','" . $pass. "')";
    if($con->query($query) === TRUE){
        echo "New User: " . $name . " created sucessfully!";
        //echo "<script> alert('New User: " . $name . "created sucessfully!') </script>";
        mysqli_close($con);
        $_SESSION['id'] = $lastid;
        header("http://ec2-54-211-233-68.compute-1.amazonaws.com/choice.html");
    } else{
        echo "Error: " ."<br>". $con->error;
    }
       
    
}

?>
