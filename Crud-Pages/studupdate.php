<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: linear-gradient(to bottom, #75E2FF, #244D61);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            background: linear-gradient(to right, #FDD037, #E65C4F);
            padding: 10px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #46A094;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include('db.php');
        ?>

        <!-- Update Student Information Form -->
        <h2>Update Student Information</h2>
        <form method="POST" action="">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" placeholder="20208564" required>

            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" required>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" required>

            <label for="course">Course:</label>
            <input type="text" name="course" required>

            <input type="submit" name="update" value="Update">
        </form>

        <?php
        // Handle form submission for updating student information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $course = $_POST['course'];

            // Update the student information in the database
            $updateSql = "UPDATE student SET firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', contact='$contact', course='$course' WHERE student_id='$student_id'";
            if ($conn->query($updateSql) === TRUE) {
                echo "<p>Student information updated successfully.</p>";
            } else {
                echo "<p>Error updating student information: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
