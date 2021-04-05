<?php
session_start();

// connect to your local database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "is218proj"; // your database name

 try {
    $conn = new PDO("mysql:host=$servername;$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

return $conn;
?>

