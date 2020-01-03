<?php  
include "db/connect.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<form action="http://localhost:8080/chromeTimeTracker/db/login.php" action="POST">
    <label for="userName">User Name: </label>
    <input type="text" name="userName" id="userName">
    <br>
    <label for="passWord">Password: </label>
    <input type="text" name="passWord" id="passWord">
    <br>
</form>