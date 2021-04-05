<?php
session_start();
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
$id = $_SESSION["id"];
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment Board</title>
    <link type="text/css" rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="signup.js"></script>
    <script language="javascript" type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
</head>

<body>
<div class="navbar">
    <div class="title">
        <a href="#"><b><?php echo "Welcome $firstname $lastname";?></b></a>
    </div>
    <a href="logout.php" class="right">Log Out</a>
</div>

<div class = "title">
    <p class="lead center"><i>Here to help you keep track of your course assignments!</i></p>
</div>


<div class="content">
    <div class="col-container">
        <div class="col form">
            <h1 class="center"><?php echo "$firstname $lastname" . "'s Assignments" ?></h1>
            <h3 style="font-weight: normal"> Add a New Task
            </h3>
            
          
            
        <form action="add.php" method=post>
            Title: <br><input type="text" name="title" id="title" required><br>
            Due Date: <br><input type=datetime name="duedate" id="duedate" placeholder="YYYY-MM-DD" required><br>
            Time: <br><input type=time name="time" id="time" placeholder = "HH:MI:SS" required><br>
            Description: <br><input name="description" type="text" onKeyDown="limitText(this.form.description,this.form.countdown,144);" 
            onKeyUp="limitText(this.form.description,this.form.countdown,144);" maxlength="144"><br>
            <font size="1">(Maximum characters: 144)<br>
            You have <input readonly type="text" name="countdown" size="3" value="144"> characters left.</font><br>

            <input type=submit name="addTask" value="Add Task">
            <input type=submit name="cancelTask" value="Cancel" onClick="window.location.href='homepage.php';"/>
        </form> 
      
</div>
    </div>
</div>


<?php
    

    

?>
