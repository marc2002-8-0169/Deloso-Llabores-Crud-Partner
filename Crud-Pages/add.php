<?php
require('db.php');

// Function to add an assignment
function addAssignment($assignment_name) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO assignment (assignment_name) VALUES (?)");
    $stmt->bind_param("s", $assignment_name);

    if ($stmt->execute()) {
        echo "Assignment added successfully.";
    } else {
        echo "Error adding assignment: " . $stmt->error;
    }
}

// Function to add a subject
function addSubject($subject_name) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO subject (subject_name) VALUES (?)");
    $stmt->bind_param("s", $subject_name);

    if ($stmt->execute()) {
        return $conn->insert_id;
    } else {
        echo "Error adding subject: " . $stmt->error;
    }

    $stmt->close();
}

// Function to add a new instructor
function addInstructor($firstname, $lastname) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO instructor (firstname, lastname) VALUES (?, ?)");
    $stmt->bind_param("ss", $firstname, $lastname);

    if ($stmt->execute()) {
        return $conn->insert_id;
    } else {
        echo "Error adding instructor: " . $stmt->error;
        return null;
    }

    $stmt->close();
}

// Function to add a status
function addStatus($status_name) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO status (status_name) VALUES (?)");
    $stmt->bind_param("s", $status_name);

    if ($stmt->execute()) {
        return $conn->insert_id;
    } else {
        echo "Error adding status: " . $stmt->error;
    }

    $stmt->close();
}

// Add Assignment form submission handling
if (isset($_POST['add_assignment'])) {
    $assignment_name = $_POST['assignment_name'];
    $subject_name = $_POST['subject_name'];
    $instructor_first_name = $_POST['instructor_first_name'];
    $instructor_last_name = $_POST['instructor_last_name'];
    $status_name = $_POST['status_name'];



    $subject_id = addSubject($subject_name);

    $instructor_id = addInstructor($instructor_first_name, $instructor_last_name);

    $status_id = addStatus($status_name);

    $assignment_name = addAssignment($assignment_name);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, purple, pink);
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background: linear-gradient(to right, #2AF598, #009EFD);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

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

        .name-field {
            display: flex;
        }

        .name-field input[type="text"] {
            flex: 1;
            margin-right: 5px;
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
    <!-- Add Assignment Form -->
    <h2>Add Assignment</h2>
    <form method="POST" action="main.php">
        <label for="assignment_name">Assignment Name:</label>
        <input type="text" name="assignment_name" required><br><br>

        <label for="subject_name">Subject:</label>
        <input type="text" name="subject_name" required><br><br>

        <label for="instructor_first_name">Instructor:</label>
        <div class="name-field">
            <input type="text" name="instructor_first_name" placeholder="First name" required>
            <input type="text" name="instructor_last_name" placeholder="Last name" required>
        </div><br><br>

        <label for="status_name">Status:</label>
        <input type="text" name="status_name" required><br><br>

        <input type="submit" name="add_assignment" value="Add Assignment">
    </form>
</body>
</html>