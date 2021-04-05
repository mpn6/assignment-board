   
<?php
session_start();
include 'init.php';


 	$users = ["id" => $_POST['id'],"duedate" => $_POST['duedate'], "title" => $_POST['title'], "message" => $_POST['message']];
	$query = 'UPDATE is218proj.todos SET duedate = :duedate, title = :title, message = :message, WHERE ownerid = :id';
	
	$statement = $conn->prepare($query);
 	$statement->execute($users);
 	$statement->closeCursor();
	 print("Homework Assignment is Updated!");
	 

	        
?>
