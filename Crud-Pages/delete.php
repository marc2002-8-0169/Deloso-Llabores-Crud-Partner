<!DOCTYPE html>
<html>
<head>
    <title>Delete Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, black, green);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: white;
        }

        form {
            background: linear-gradient(to left, black, green);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            box-sizing: border-box;
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
    require('db.php');
    
    // Function to delete an assignment
    function deleteAssignment($assignment_id) {
        global $conn;
        
        $stmt = $conn->prepare("DELETE FROM assignment WHERE assignment_id = ?");
        $stmt->bind_param("i", $assignment_id);
        
        if ($stmt->execute()) {
            echo "Assignment deleted successfully.";
        } else {
            echo "Error deleting assignment: " . $stmt->error;
        }
        
        $stmt->close();
    }
    ?>

    <!-- Delete Assignment Form -->
    <h2>Delete Assignment</h2>
    <form method="POST" action="main.php">
        <label for="assignment_id">Assignment ID:</label>
        <input type="number" name="assignment_id" required><br><br>

        <input type="submit" name="delete_assignment" value="Delete Assignment">
    </form>

    <?php
    // Delete Assignment form submission handling
    if (isset($_POST['delete_assignment'])) {
        $assignment_id = $_POST['assignment_id'];

        deleteAssignment($assignment_id);
    }
    ?>
</body>
</html>
