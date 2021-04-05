<?php
session_start();
include 'init.php';


unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["logged"]);
$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment Board</title>
    <link type="text/css" rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="signup.js"></script>
</head>

<body>
<div class="navbar">
    <div class="title">
        <a href="#"><b>Assignment Board</b></a>
    </div>
    <a href="login.html" class="right">Log In</a>
    <a href="signup.html" class="right">Sign Up</a>
</div>
   
    <div class = "title">
    <p class="lead center"><i>Here to help you keep track of your course assignments!</i></p>
    </div>


<div class="content">
    <div class="col-container">
        <div class="col form">
            <img src= "images/goodbye.png" class = "center" style="width:60%; float:center">
            <h3 style="text-align:center;">Sad to see you go, you have been signed out. </h3> 
            <h3 style="text-align:center"> To sign back in, click <a href='login.html'>here.</a> <h3>
           
        </div>
    </div>
</div>

<div id="footer" class="center">
    Assignment Board -
    <script type="text/javascript">
        var d = new Date()
        document.write(d.getFullYear())
    </script>
</div>

</div>
</body>