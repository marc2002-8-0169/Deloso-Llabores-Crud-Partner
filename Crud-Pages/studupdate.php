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

        input[type="text"]{
            width: 97%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #46A094;
        }
        button{
            tposition: absolute;
            top: 50%;
            transform: translateY(-50%);
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
        <a href="main.php"><button>Go to Main Page</button></a>
        <a href="studinfo.php"><button>Go to Student Information</button></a>
        <form method="POST" action="">
            <label for="student_no">Student Number:</label>
            <input type="text" name="student_no" placeholder="20208564" required>

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

            <label for="program">Program:</label>
            <input type="text" name="program" required>

            <input type="submit" name="update" value="Update">
        </form>
        
        <?php
        // Handle form submission for updating student information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_no = $_POST['student_no'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $program = $_POST['program'];

            // Check if the student exists in the database
            $checkSql = "SELECT * FROM student WHERE student_no = '$student_no'";
            $result = $conn->query($checkSql);

            if ($result->num_rows > 0) {
                // Update the student information in the database
                $updateSql = "UPDATE student SET firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', contact='$contact', program='$program' WHERE student_no='$student_no'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "<p>Student information updated successfully.</p>";
                } else {
                    echo "<p>Error updating student information: " . $conn->error . "</p>";
                }
            } else {
                // Insert the student information into the database
                $insertSql = "INSERT INTO student (student_no, firstname, lastname, gender, address, contact, program) VALUES ('$student_no', '$firstname', '$lastname', '$gender', '$address', '$contact', '$program')";
                if ($conn->query($insertSql) === TRUE) {
                    echo "<p>New student information inserted successfully.</p>";
                } else {
                    echo "<p>Error inserting student information: " . $conn->error . "</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
