<?php
session_start();
include 'init.php';
    
    $email = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $college = $_POST["college"];
    $major = $_POST["major"];
        
    $query = 'INSERT INTO is218proj.accounts
                 (id, email, firstname, lastname, password, college, major)
              VALUES
              (:id,:email,:firstname,:lastname,:password,:college, :major)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':college', $college);
    $statement->bindValue(':major', $major);
    
    $statement->execute();
    $statement->closeCursor();
    
    $query = 'SELECT id FROM is218proj.accounts where `email`=:email and `password` =:password' ;
    $statement = $conn->prepare($query);
    $statement->bindValue(':email', $email);
     $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement -> fetch();
    $statement->closeCursor();
    
    $id = $user['id'];
    
    $_SESSION["logged"] = true;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $email;

    header("Location: homepage.php");
    exit();


?>
