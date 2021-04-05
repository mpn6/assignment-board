<?php
session_start();
include 'init.php';
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $query = 'SELECT firstname, lastname, id FROM is218proj.accounts
            WHERE `email` = :username and `password` = :password';
    $statement = $conn->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':username', $username);
    
    $statement->execute();
    $user = $statement -> fetch();
    $statement->closeCursor();
    
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $id = $user['id'];


    if (empty($user)){
        $message = "Wrong username or password";
         echo "<script type='text/javascript'>alert('$message');</script>";
        header("refresh: 0.00001, url = 'login.html'");
        exit();

    }else{
    $_SESSION["logged"] = true;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $username;
    header("Location: homepage.php");
    exit();
    }
    
?>
