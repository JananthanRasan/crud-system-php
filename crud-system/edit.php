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
    $sql = "SELECT `admission_no`,`first_name`,`last_name`,`gender`,`grade`,`subjects`,`address`,`email`,`phone_no`,`nic`,`hobbies` FROM `students` WHERE `id` = " . $_GET['id'];
    $result = mysqli_query($connection,$sql);

    if(!$result){
        die("Query failed: " .mysqli_error($connection));
    }

    $students = mysqli_fetch_assoc($result);

    $subjects = explode(", ", $students['subjects']);
    $hobbies = explode(", ", $students['hobbies']);

    if(!$students){
        echo "No student found with this ID!";
        exit;
    }

    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
        <fieldset>
            <legend>Edit Student</legend>
            <table>
                <tr>
                    <td>
                        <label for="admission_no">Admission No</label>
                    </td>
                    <td>
                        <input type="text" name="admission_no" id="admission_no" required value="<?php echo $students['admission_no']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="first_name">First Name</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" id="first_name" required value="<?php echo $students['first_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="last_name">Last Name</label>
                    </td>
                    <td>
                        <input type="text" name="last_name" id="last_name" required value="<?php echo $students['last_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gender">Gender</label>
                    </td>
                    <td>
                        <input type="radio" name="gender" id="male" value="Male" <?php echo ($students['gender'] == 'Male') ? 'checked' : ''; ?>>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female" <?php echo ($students['gender'] == 'Female') ? 'checked' : ''; ?>>
                        <label for="female">Female</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="grade">Grade</label>
                    </td>
                    <td>
                        <select name="grade" id="grade">
                            <option value="10A" <?php echo ($students['grade'] == '10A') ? 'selected' : ''; ?>>10A</option>
                            <option value="10B" <?php echo ($students['grade'] == '10B') ? 'selected' : ''; ?>>10B</option>
                            <option value="10C" <?php echo ($students['grade'] == '10C') ? 'selected' : ''; ?>>10C</option>
                            <option value="11A" <?php echo ($students['grade'] == '11A') ? 'selected' : ''; ?>>11A</option>
                            <option value="11B" <?php echo ($students['grade'] == '11B') ? 'selected' : ''; ?>>11B</option>
                            <option value="11C" <?php echo ($students['grade'] == '11C') ? 'selected' : ''; ?>>11C</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="subjects">Subjects</label>
                    </td>
                    <td>
                        <input type="checkbox" name="subjects[]" id="maths" value="Maths" <?php echo (in_array('Maths', $subjects)) ? 'checked' : ''; ?>>
                        <label for="maths">Maths</label><br>
                        <input type="checkbox" name="subjects[]" id="science" value="Science" <?php echo (in_array('Science', $subjects)) ? 'checked' : ''; ?>>
                        <label for="science">Science</label><br>
                        <input type="checkbox" name="subjects[]" id="english" value="English" <?php echo (in_array('English', $subjects)) ? 'checked' : ''; ?>>
                        <label for="english">English</label><br>
                        <input type="checkbox" name="subjects[]" id="tamil" value="Tamil" <?php echo (in_array('Tamil', $subjects)) ? 'checked' : ''; ?>>
                        <label for="tamil">Tamil</label><br>
                        <input type="checkbox" name="subjects[]" id="it" value="IT" <?php echo (in_array('IT', $subjects)) ? 'checked' : ''; ?>>
                        <label for="it">IT</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address</label>
                    </td>
                    <td>
                        <textarea name="address" id="address"><?php echo $students['address'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" required value="<?php echo $students['email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone_no">Phone No</label>
                    </td>
                    <td>
                        <input type="text" name="phone_no" id="phone_no" required value="<?php echo $students['phone_no']; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nic">NIC No</label>
                    </td>
                    <td>
                        <input type="text" name="nic" id="nic" required value="<?php echo $students['nic']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="hobbies">Hobbies</label>
                    </td>
                    <td>
                        <select name="hobbies[]" id="hobbies" size="5" multiple>
                            <option value="Reading" <?php echo (in_array('Reading', $hobbies)) ? 'selected' : ''; ?>>Reading</option>
                            <option value="Traveling" <?php echo (in_array('Traveling', $hobbies)) ? 'selected' : ''; ?>>Traveling</option>
                            <option value="Sports" <?php echo (in_array('Sports', $hobbies)) ? 'selected' : ''; ?>>Sports</option>
                            <option value="Music" <?php echo (in_array('Music', $hobbies)) ? 'selected' : ''; ?>>Music</option>
                            <option value="Art" <?php echo (in_array('Art', $hobbies)) ? 'selected' : ''; ?>>Art</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>