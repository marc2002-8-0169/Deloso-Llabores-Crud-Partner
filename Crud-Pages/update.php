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
    function updateAssignment($assignment_id, $assignment_name) {
        global $conn;

        $stmt = $conn->prepare("UPDATE assignment SET assignment_name = ? WHERE assignment_id = ?");
        $stmt->bind_param("si", $assignment_name, $assignment_id);

        if ($stmt->execute()) {
            echo "Assignment updated successfully.";
        } else {
            echo "Error updating assignment: " . $stmt->error;
        }

        $stmt->close();
    }

    // Function to update the subject table
    function updateSubject($subject_id, $subject_name) {
        global $conn;

        $stmt = $conn->prepare("UPDATE subject SET subject_name = ? WHERE subject_id = ?");
        $stmt->bind_param("si", $subject_name, $subject_id);

        if ($stmt->execute()) {
            echo "Subject updated successfully.";
        } else {
            echo "Error updating subject: " . $stmt->error;
        }

        $stmt->close();
    }

    // Function to update the instructor table
    function updateInstructor($instructor_id, $firstname, $lastname) {
        global $conn;

        $stmt = $conn->prepare("UPDATE instructor SET firstname = ?, lastname = ? WHERE instructor_id = ?");
        $stmt->bind_param("ssi", $firstname, $lastname, $instructor_id);

        if ($stmt->execute()) {
            echo "Instructor updated successfully.";
        } else {
            echo "Error updating instructor: " . $stmt->error;
        }

        $stmt->close();
    }

    // Function to update the status table
    function updateStatus($status_id, $status_name) {
        global $conn;

        $stmt = $conn->prepare("UPDATE status SET status_name = ? WHERE status_id = ?");
        $stmt->bind_param("si", $status_name, $status_id);

        if ($stmt->execute()) {
            echo "Status updated successfully.";
        } else {
            echo "Error updating status: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <!-- Update Assignment Form -->
    <h2>Update Assignment</h2>
    <form method="POST" action="main.php">
        <label for="assignment_id">Assignment ID:</label>
        <input type="number" name="assignment_id" required><br><br>

        <label for="assignment_name">Assignment Name:</label>
        <input type="text" name="assignment_name" required><br><br>

        <label for="subject_id">Subject:</label>
        <select name="subject_id" required>
            <?php
            $sql = "SELECT * FROM subject";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['subject_id'] . "'>" . $row['subject_name'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="instructor_id">Instructor:</label>
        <select name="instructor_id" required>
            <?php
            $sql = "SELECT * FROM instructor";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['instructor_id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="status_id">Status:</label>
        <select name="status_id" required>
            <option value="in progress">In Progress</option>
            <option value="done">Done</option>
        </select><br><br>

        <input type="submit" name="update_assignment" value="Update Assignment">
    </form>

    <?php
    // Update Assignment form submission handling
    if (isset($_POST['update_assignment'])) {
        $assignment_id = $_POST['assignment_id'];
        $assignment_name = $_POST['assignment_name'];
        $subject_id = $_POST['subject_id'];
        $instructor_id = $_POST['instructor_id'];
        $status_id = $_POST['status_id'];

        updateAssignment($assignment_id, $assignment_name);
        updateSubject($subject_id, $subject_name);
        updateInstructor($instructor_id, $firstname, $lastname);
        updateStatus($status_id, $status_name);
    }
    ?>
</body>
</html>