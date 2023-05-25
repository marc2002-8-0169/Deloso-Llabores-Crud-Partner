<!DOCTYPE html>
<html>
<head>
    <title>Update Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to left, skyblue, darkgreen);
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background: linear-gradient(to right, lightgreen, darkblue);
            padding: 20px;
            border-radius: 2px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="number"],
        input[type="text"],
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            box-sizing: border-box;
        }

        select {
            height: 35px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <?php
    require_once 'db.php';

    // Function to update the assignment table
    function updateAssignment($assignment_id, $assignment_name, $subject_name, $firstname, $lastname, $status_name) {
        global $conn;

        $stmt = $conn->prepare("UPDATE assignment
            INNER JOIN subject ON assignment.assignment_id = subject.subject_id
            INNER JOIN instructor ON assignment.assignment_id = instructor.instructor_id
            INNER JOIN status ON assignment.assignment_id = status.status_id
            SET assignment.assignment_name = ?, subject.subject_name = ?, instructor.firstname = ?, instructor.lastname = ?, status.status_name = ?
            WHERE assignment.assignment_id = ?");
        $stmt->bind_param("sssssi", $assignment_name, $subject_name, $firstname, $lastname, $status_name, $assignment_id);

        if ($stmt->execute()) {
            echo "Assignment updated successfully.";
        } else {
            echo "Error updating assignment: " . $stmt->error;
        }

        $stmt->close();
    }

    ?>

    <!-- Update Assignment Form -->
    <h2>Update Assignment</h2>
    <form method="POST" action="">
        <label for="assignment_id">Assignment No:</label>
        <input type="number" name="assignment_id" required><br><br>

        <?php
        // Fetch assignment details based on assignment ID
        if (isset($_POST['assignment_id'])) {
            $assignment_id = $_POST['assignment_id'];

            $stmt = $conn->prepare("SELECT assignment.assignment_name, subject.subject_name, instructor.firstname, instructor.lastname, status.status_name FROM assignment
                INNER JOIN subject ON assignment.assignment_id = subject.subject_id
                INNER JOIN instructor ON assignment.assignment_id = instructor.instructor_id
                INNER JOIN status ON assignment.assignment_id = status.status_id
                WHERE assignment.assignment_id = ?");
            $stmt->bind_param("i", $assignment_id);
            $stmt->execute();
            $stmt->bind_result($assignment_name, $subject_name, $firstname, $lastname, $status_name);
            $stmt->fetch();
            $stmt->close();
        }
        ?>

        <label for="assignment_name">Assignment Name:</label>
        <input type="text" name="assignment_name" value="<?php echo isset($assignment_name) ? $assignment_name : ''; ?>" required><br><br>

        <label for="subject_name">Subject:</label>
        <input type="text" name="subject_name" value="<?php echo isset($subject_name) ? $subject_name : ''; ?>" required><br><br>

        <label for="firstname">Instructor First Name:</label>
        <input type="text" name="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>" required><br><br>

        <label for="lastname">Instructor Last Name:</label>
        <input type="text" name="lastname" value="<?php echo isset($lastname) ? $lastname : ''; ?>" required><br><br>

        <label for="status_name">Status:</label>
        <input type="text" name="status_name" value="<?php echo isset($status_name) ? $status_name : ''; ?>" required><br><br>

        <input type="submit" name="update_assignment" value="Update Assignment">
    </form><br><br>
    <a href="main.php"><button>Go to Main Page</button></a>

    <?php
    // Update Assignment form submission handling
    if (isset($_POST['update_assignment'])) {
        $assignment_id = $_POST['assignment_id'];
        $assignment_name = $_POST['assignment_name'];
        $subject_name = $_POST['subject_name'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $status_name = $_POST['status_name'];

        // Update assignment, subject, instructor, and status
        updateAssignment($assignment_id, $assignment_name, $subject_name, $firstname, $lastname, $status_name);
    }
    ?>
</body>
</html>
