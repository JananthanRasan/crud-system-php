
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Management System</title>
    </head>
    <body>
    <?php
        $connection = mysqli_connect("localhost", "root", "root", "crud_system");

        if(!$connection){
            die("Connection failed: " .mysqli_connect_error());
        }
        $sql = "SELECT `id`,`admission_no`,`first_name`,`last_name`,`gender`,`grade`,`subjects`,`address`,`email`,`phone_no`,`nic`,`hobbies`,`created_at`,`updated_at` FROM `students`";
        $result = mysqli_query($connection,$sql);

        if(!$result){
            die("Query failed: " .mysqli_error($connection));
        }

        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // echo "<pre>";
        // print_r($students);
        // echo "</pre>";
        mysqli_close($connection);
    ?>
    <a href="create.php">Student Registration</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Admission No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Grade</th>
            <th>Subjects</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>NIC</th>
            <th>Hobbies</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php foreach ($students as $students):?>
        <tr>
            <td><?php echo $students['id']; ?></td>
            <td><?php echo $students['admission_no']; ?></td>
            <td><?php echo $students['first_name']; ?></td>
            <td><?php echo $students['last_name']; ?></td>
            <td><?php echo $students['gender']; ?></td>
            <td><?php echo $students['grade']; ?></td>
            <td><?php echo $students['subjects']; ?></td>
            <td><?php echo $students['address']; ?></td>
            <td><?php echo $students['email']; ?></td>
            <td><?php echo $students['phone_no']; ?></td>
            <td><?php echo $students['nic']; ?></td>
            <td><?php echo $students['hobbies']; ?></td>
            <td><?php echo $students['created_at']; ?></td>
            <td><?php echo $students['updated_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $students['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $students['id']; ?>" onclick="return confirm('Do you want to delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
    </body>
    </html>