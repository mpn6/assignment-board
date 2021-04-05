<?php
session_start();
include 'init.php';


 try {
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $ownerid = $_SESSION["id"];
    $owneremail = $_SESSION["email"];


    $title = $_POST['title'];
    $desc = $_POST["description"];
    $duedate = $_POST["duedate"];
    $timedue = $_POST["time"];
    $status = "In Progress";
    $isdone = 0;

    
    
    $due =  date('Y-m-d H:i:s', strtotime("$duedate $timedue"));
    
        
    $query = "INSERT INTO is218proj.todos
                 (`id`, `owneremail`, `ownerid`, `duedate`,  `message`, `description`, `isdone`, `status`)
              VALUES
              (:taskid,:owneremail, :ownerid, :duedate, :message,:description, :isdone, :status)";

    echo "<br>query done";

    $statement = $conn->prepare($query);
    $statement->bindValue(':taskid', $taskid);

    $statement->bindValue(':owneremail', $owneremail);
    $statement->bindvalue(':ownerid', $ownerid);
    $statement->bindValue(':duedate', $due);
    $statement->bindValue(':message', $title);
    $statement->bindValue(':description', $desc );
    $statement->bindValue(':isdone', $isdone);
    $statement->bindValue(':status', $status);
    $statement->execute();
    $statement->closeCursor();
 
    header("Location: homepage.php");
    exit();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
