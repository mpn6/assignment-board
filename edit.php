<?php
session_start();
include 'init.php';

$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
$id = $_SESSION["id"];

$taskid= $_GET["id"];


    $query = "SELECT * FROM is218proj.todos WHERE `id` = :id";
    $statement = $conn->prepare($query);
    $statement -> bindValue(':id', $taskid);
    $statement -> execute();
    
    $results = $statement->fetch();
	$statement->closeCursor();



if (!empty($_POST["editTask"])) {
    
   
        
   
        $sql = "UPDATE is218proj.todos SET message =:title, duedate= :duedate, description = :desc WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement -> bindValue(':title', $_POST['title']);
        $statement -> bindValue(':duedate', $_POST['duedate']);
        $statement -> bindValue(':desc', $_POST['description']);
        $statement -> bindValue(':id', $taskid);
    
        $result = $statement->execute();
        $statement->closeCursor();
 
        header("Location: homepage.php");
        exit();
    
    }
    



?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment Board</title>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="main.css">
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
            <h1 class="center"> <?php echo "$firstname $lastname" . "'s Assignments" ?></h1>
            <h3 style="font-weight: normal"> Edit Task
            </h3>
        <form action="" method="post">
            Title: <br><input type="text" name="title" id="title" value="<?php echo $results["message"];?>" required><br>
            Due Date: <br><input type=datetime name="duedate" id="duedate" value="<?php echo $results["duedate"];?>" required><br>
            Description: <br><input name="description" id="description" type="text" onKeyDown="limitText(this.form.description,this.form.countdown,144);" 
            onKeyUp="limitText(this.form.description,this.form.countdown,144);" maxlength="144" value="<?php echo $results["description"];?>" required><br>
            <font size="1">(Maximum characters: 15)<br>
            You have <input readonly type="text" name="countdown" size="3" value="144"> characters left.</font><br><br>
            <input type=submit name="editTask" value="Edit Task"> 
            <a href="homepage.php"><input type="button" name="cancel" id="cancel" value="Cancel"></a>
            
        </form> 
        
       

       
        
        
</div>
    </div>
</div>

