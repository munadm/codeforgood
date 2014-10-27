
<?php 
/*
Create a session variable 
*/

session_start();
if ($_SESSION["selection"] === NULL){
  $_SESSION['selection'] = 'title'; //default value for initial session instance
}
$select = $_SESSION["selection"]; //get the user preference query string
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/sponsor.css"/>
  <link rel="stylesheet" href="css/foundation-icons.css"/>
  <link rel="stylesheet" href="icons/foundation-icons.css" />

  <script src="js/vendor/modernizr.js"></script>
  <script src="//www.parsecdn.com/js/parse-1.3.0.min.js"></script>

  <link href='http://fonts.googleapis.com/css?family=Jura:400,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>


</head>


<body>


  <div id="content"> 
    <div id="logo"></div>
    <div id="sometext">Fund a challenge.</div>
<!--       <div id="learn">
        <img src="img/learn.jpg">
      </div>
    -->
    <nav id="navbar">
      <div class="large-12 columns">
        <ul class="button-group even-2">
          <li><a class="button" href="sponsor.html" id="active">SPONSOR</a></li>
          <li><a class="button" href="fundraiser.html">FUNDRAISER</a></li>
        </ul>
      </div>
    </nav>
    

    <div class="row">
      <div class="large-12 columns">
        <div class="row collapse">
          <div class="small-10 columns">
            <input type="text" placeholder="Find a challenge.">
          </div>
          <div class="small-2 columns">
            <a href="#" class="button postfix" id="searcht">Search</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- The div below is a link menu that calls a small scale php controller for setting the query parameters so the sort can be made to a consumers utilization -->
    <div id="order">
      <p><a href="funcontrol.php?type=title">By name</a> | <a href="funcontrol.php?type=goal">By fund</a></p>
      <p><a href=""><i class="fi-social-facebook"></i>What have your friends been doing?</a></p>
    </div>
    <?php
 /*This is a very high level description of the php code below.The query grabs results and sorts them using a user preference set in a session variable. The results are then binded into the design shell to generate a dynamic and responsive table of all the challenges*/
    $con=mysqli_connect("localhost","root","cfg2014!","team_15");
    $query = "Select * from fund_challenge2 order by " . $select;

    if(mysqli_connect_errno()){
      echo "<h2> Failed to connect to MYSQL: " .mysqli_connect_error();
    }

    $result = $con->query($query);
    if($result->num_rows === 0) {
     echo "<h2> Table fund_challenge2 Empty</h2>";
   }
   else{
     while($row = $result->fetch_row()){
       echo '<div class="row la" id="createc">
       <div class="large-2 columns">
       <img src="img/placeholder.jpg">
       </div>
       <div class="large-8 columns rtext">
       <div class="name">'. $row[1] . '</div>
       <div class="descrip">' . $row[2] . '</div>
       <div class="prog">Goal: '. $row[3] .' | Progress: '. $row[4] .'</div>

       <div class="progress success round">
       <span class="meter" style="width:' . ($row[4]/$row[3]) *100 . '%"></span>
       </div>
       
       </div>
       <div class="large-2 columns" id="sponsorb">
       <a href="sponsorpp.html" class="button [secondary success alert]" id="searcht">Sponsor!</a>
       </div>
       </div>';
     }
   }
   mysqli_close($con);
   ?>



   <!--

    <div class="row la" id="createc">
      <div class="large-2 columns">
        <img src="img/ameya.jpg">
      </div>
      <div class="large-10 columns rtext">
        <div class="name">
          Miles for Michael (J. Fox)
        </div>
         <div id = "descriptionevent"> For every $10 donated before October 31, Ameya will run a mile! Visit her event page to track her Halloween run!  
         </div>
         <div id = "textthing3"> <i>Goal:</i> $1000 </div>
        <div id = "textthing3"> <i>Progress:</i> $100 </div>
        
        <div class="progress success round">
          <span class="meter" style="width: 10%"></span>
        </div>
         <div class="small-2 small-push-10 columns">
            <a href="#" class="button [secondary success alert]" id="searcht">Sponsor!</a>
         </div>
      </div>
    </div>


    <div class="row la" id="createc">
      <div class="large-2 columns">
        <img src="img/cathy.jpg">
      </div>
      <div class="large-10 columns rtext">
        <div class="name">
          Push-ups for Parkinson's
        </div>
          </div>
         <div id = "descriptionevent"> Cathy's trying to work on Parkinson's research while working on her muscles. 1 pushup for each dollar donated!
         </div>
         <div id = "textthing4"> <i>Goal:</i> $150 </div>
        <div id = "textthing4"> <i>Progress:</i> $137 </div>
        <div class="progress success round">
          <span class="meter" style="width: 90%"></span>
        </div>
         <div class="small-2 small-push-10 columns">
            <a href="#" class="button [secondary success alert]" id="searcht">Sponsor!</a>
         </div>
      </div>
    </div>

  -->
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/fiddly.js"></script>

  <script src="js/storeget.js"></script>

  <script>
  $(document).foundation();


  </script>
</body>
</html>
