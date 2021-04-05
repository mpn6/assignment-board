<?php
session_start();
include 'init.php';

$taskid= $_GET["id"];

try{

    $query = "DELETE FROM is218proj.todos WHERE `id` = :id";
    $statement = $conn->prepare($query);
    $statement -> bindValue(':id', $taskid);
    $statement -> execute();
    $statement->closeCursor();
 
    header("Location: homepage.php");
    exit();
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
 }




?>
