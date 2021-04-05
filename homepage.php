<?php
session_start();
include 'init.php';

$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
$id = $_SESSION["id"];
$email = $_SESSION["email"];
?>
            
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
            <h1 class="center"><?php echo "$firstname $lastname" . "'s Assignments"?></h1>
            <h4 style="font-weight: normal"> This is a simple personal homework assignments management web application to manage your homework! It helps you manage your incomplete and complete assignments.
            </h4>
    <?php
                    
    $isdone = 0;
    
    $query = 'SELECT * FROM is218proj.todos WHERE `ownerid` = :id and `isdone` = :isdone ORDER BY duedate';
    $statement = $conn->prepare($query);
    $statement -> bindValue(':id', $id);
    $statement -> bindValue(':isdone', $isdone);
    $statement -> execute();
    
    $results = $statement->fetchAll();
	$statement->closeCursor();
        
     
    if (count($results) == 0){
        echo "You don't have any tasks!
        <form action='addTask.php'>
       <button id='button2' onclick='window.location.href = 'addTask.php''>Add</button>
        </form>";
    }
    echo "<table style='width:100%' border=\"1\"><tr><th>To-do</th></tr>";
	
    foreach ($results as $row) {
        $taskid = $row["id"];
		echo "<tr class ='todo_table'>
                <td>".$row["message"]."<br>  Description: ".$row["description"]."<br> Due Date: ".$row["duedate"].
                "<br>
     
      <form method='get' action='edit.php'>
        <input type='submit' name='action' value='Edit'/>
        <input type='hidden' name='id' value=\"".$row['id']."\"'/>
      </form>
    

        <form action='addTask.php'>
       <button id='button2' onclick='window.location.href = 'addTask.php''>Add</button>
        </form>

        <form method='get' action='delete.php'>
            <input type='submit' name='action' value='Delete'/>
            <input type='hidden' name='id' value=\"".$row['id']."\"'/>
        </form>

        <form method='get' action='markcomplete.php'>
            <input type='submit' name='action' value='Mark Complete'/>
            <input type='hidden' name='id' value=\"".$row['id']."\"'/>
        </form>
       
       
       </form>
       ".
                "</td>
                
            </tr>";
     
    }
    
    $isdone = 1;
    
    $query = 'SELECT * FROM is218proj.todos WHERE `ownerid` = :id and `isdone` = :isdone ORDER BY duedate';
    $statement = $conn->prepare($query);
    $statement -> bindValue(':id', $id);
    $statement -> bindValue(':isdone', $isdone);
    $statement -> execute();
    
    $results = $statement->fetchAll();
	$statement->closeCursor();
        
    echo "<table style='width:100%' border=\"1\"><tr><th>Completed</th></tr>";
	
    foreach ($results as $row) {
        $taskid = $row["id"];
		echo "<tr>
                <td>".$row["message"]."<br> Description: ".$row["description"]."<br> Due Date: ".$row["duedate"].
                "<br>
     
      <form method='get' action='edit.php'>
        <input type='submit' name='action' value='Edit'/>
        <input type='hidden' name='id' value=\"".$row['id']."\"'/>
      </form>
    

        <form action='addTask.php'>
       <button id='button2' onclick='window.location.href = 'addTask.php''>Add</button>
        </form>

        <form method='get' action='delete.php'>
            <input type='submit' name='action' value='Delete'/>
            <input type='hidden' name='id' value=\"".$row['id']."\"'/>
        </form>

        <form method='get' action='markcomplete.php'>
            <input type='submit' name='action' value='Mark Uncomplete'/>
            <input type='hidden' name='id' value=\"".$row['id']."\"'/>
        </form>
       
       
       </form>
       ".
                "</td>
                
            </tr>";
     
    }

    
        exit();
    
    
     
    ?>
                
            
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
</body>
</html>
