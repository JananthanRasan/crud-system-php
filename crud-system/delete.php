<?php
    if(!isset($_GET['id'])){
        echo "No ID provided!";
        exit;
    }

    if(!is_numeric($_GET['id'])){
        echo "Invalid ID!";
        exit;
    }

    $connection = mysqli_connect("localhost", "root", "root", "crud_system");

    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql = "DELETE FROM `students` WHERE `id` = " . $_GET['id'];
    $result = mysqli_query($connection,$sql);

    if(!$result){
        die("Query failed: " .mysqli_error($connection));
    }
    
    mysqli_close($connection);

    header("Location: index.php");
?>