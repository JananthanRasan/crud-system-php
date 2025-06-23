<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
</head>
<body>
    <form action="connection.php" method="post">
        <fieldset>
            <legend>Student Registration</legend>
            <table>
                <tr>
                    <td>
                        <label for="admission_no">Admission No</label>
                    </td>
                    <td>
                        <input type="text" name="admission_no" id="admission_no" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="first_name">First Name</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" id="first_name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="last_name">Last Name</label>
                    </td>
                    <td>
                        <input type="text" name="last_name" id="last_name" required>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="gender">Gender</label>
                    </td>
                    <td>
                        <input type="radio" name="gender" id="male" value="Male" required>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">Female</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="grade">Grade</label>
                    </td>
                    <td>
                        <select name="grade" id="grade" required>
                            <option value="10A">10A</option>
                            <option value="10B">10B</option>
                            <option value="10C">10C</option>
                            <option value="11A">11A</option>
                            <option value="11B">11B</option>
                            <option value="11C">11C</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="subjects">Subjects</label>
                    </td>
                    <td>
                        <input type="checkbox" name="subjects[]" id="maths" value="Maths">
                        <label for="maths">Maths</label><br>
                        <input type="checkbox" name="subjects[]" id="science" value="Science">
                        <label for="science">Science</label><br>
                        <input type="checkbox" name="subjects[]" id="english" value="English">
                        <label for="english">English</label><br>
                        <input type="checkbox" name="subjects[]" id="tamil" value="Tamil">
                        <label for="tamil">Tamil</label><br>
                        <input type="checkbox" name="subjects[]" id="it" value="IT">
                        <label for="it">IT</label>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="address">Address</label>
                    </td>
                    <td>
                        <textarea name="address" id="address"></textarea>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" required>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="phone_no">Phone No</label>
                    </td>
                    <td>
                        <input type="tel" name="phone_no" id="phone_no" required>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="nic">NIC No</label>
                    </td>
                    <td>
                        <input type="text" name="nic" id="nic" required>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <label for="hobbies">Hobbies</label>
                    </td>
                    <td>
                        <select name="hobbies[]" id="hobbies" size="5" multiple>
                            <option value="Reading">Reading</option>
                            <option value="Traveling">Traveling</option>
                            <option value="Sports">Sports</option>
                            <option value="Music">Music</option>
                            <option value="Art">Art</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit">
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