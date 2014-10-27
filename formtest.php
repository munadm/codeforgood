<!DOCTYPE html>
<?php
session_start();
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Challenge</title>
    </head>
    <body>
        <?php
        
        
        ?>
        
        <div id="formfield">
            <form method="post" action="dbtest.php">            
            id: <input type ="text" name="user_id" id="user_id">
            <br>
            user: <input type ="text" name="user" id="user">
            <br>
            description: <input type="text" name="desc" id="desc">
            <br>
            money earned: <input type="text" name="money" id="money">
            <br>
            deadline: <input type="text" name="deadline" id="deadline">
            <button type="submit">Done</button>
        </form>
        
            
        </div>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
