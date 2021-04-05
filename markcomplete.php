<?php
session_start();
include 'init.php';

$taskid= $_GET["id"];

try{
    
    $query = "SELECT * FROM is218proj.todos WHERE `id` = :id";
    $statement = $conn->prepare($query);
    $statement -> bindValue(':id', $taskid);
    $statement -> execute();
    
    $results = $statement->fetch();
	$statement->closeCursor();
    
     if($results["isdone"] == 0){
        $isdone = 1;
    }else{$isdone = 0;}

    $query = "UPDATE is218proj.todos SET isdone =:isdone WHERE id=:id";
        $statement = $conn->prepare($query);
        $statement -> bindValue(':isdone', $isdone);
        $statement -> bindValue(':id', $taskid);
    
        $result = $statement->execute();
        $statement->closeCursor();
 
        header("Location: homepage.php");
        exit();
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
 }


?>
