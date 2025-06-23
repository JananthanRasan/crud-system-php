<?php
    if(isset($_POST['subjects'])){
        $subjects = implode(", ",$_POST['subjects']);
    } else {
        $subjects = "No";
    }

    if(isset($_POST['hobbies'])){
        $hobbies = implode(", ",$_POST['hobbies']);
    } else {
        $hobbies = "No";
    }

    $admission_no = $_POST['admission_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];
    //$subjects = implode(", ", $_POST['subjects']);
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $nic = $_POST['nic'];
    //$hobbies = implode(", ", $_POST['hobbies']);


    $connection = mysqli_connect("localhost", "root", "root", "crud_system");

    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql = "INSERT INTO `students` (`admission_no`,`first_name`,`last_name`,`gender`,`grade`,`subjects`,`address`,`email`,`phone_no`,`nic`,`hobbies`) VALUES ('$admission_no','$first_name','$last_name','$gender','$grade','$subjects','$address','$email','$phone_no','$nic','$hobbies')";
    $result = mysqli_query($connection,$sql);

    if(!$result){
        die("Query failed: " .mysqli_error($connection));
    }
    // echo "New record created successfully";
    mysqli_close($connection);

    header("Location: index.php");
?>