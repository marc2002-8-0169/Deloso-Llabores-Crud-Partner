<?php
require_once 'db.php';

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


// Function to view assignments
function viewAssignments() {
    global $conn;
    
    // Retrieve distinct status values from the status table
    $statusSql = "SELECT DISTINCT status_id, status_name FROM status";
    $statusResult = $conn->query($statusSql);
    
    echo "<div style='text-align: right;'>";
    echo "<form method='GET' action=''>";
    echo "<label for='status_filter'>Organize by Status:</label>";
    echo "<select name='status_filter' id='status_filter'>";
    
    // Display all option for no filter
    echo "<option value=''>All</option>";
    
    // Display status options retrieved from the database
    while ($statusRow = $statusResult->fetch_assoc()) {
        $statusId = $statusRow['status_id'];
        $statusName = $statusRow['status_name'];
        $selected = (isset($_GET['status_filter']) && $_GET['status_filter'] === $statusId) ? "selected" : "";
        echo "<option value='$statusId' $selected>$statusName</option>";
    }
    
    echo "</select>";
    echo "<input type='submit' value='Apply Filter'>";
    echo "</form><br><br>";
    echo "</div>"; 
    
    // Retrieve assignments based on the selected status filter
    $filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
    $filterSql = ($filter !== '') ? " WHERE assignment.status_id = '$filter'" : "";
    
    $sql = "SELECT assignment.assignment_id AS 'Assignment no.', 
            assignment.assignment_name AS 'Assignment', 
            subject.subject_name AS 'Subject', 
            CONCAT(instructor.firstname, ' ', instructor.lastname) AS 'Instructor', 
            status.status_name AS 'Status'
            FROM assignment
            INNER JOIN subject ON assignment.assignment_id = subject.subject_id
            INNER JOIN instructor ON assignment.assignment_id = instructor.instructor_id
            INNER JOIN status ON assignment.assignment_id = status.status_id
            $filterSql";
            
    $result = $conn->query($sql);
    
    echo "<table class='assignment-table'>";
    echo "<tr><th>Assignment no.</th><th>Assignment</th><th>Subject</th><th>Instructor</th><th>Status</th></tr>";
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Assignment no.'] . "</td>";
            echo "<td>" . $row['Assignment'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Instructor'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No assignments found.</td></tr>";
    }
    
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assignment Management System</title>
</head>
<body>
    <h1>Assignment Management System</h1>
    <div class="logout" style="text-align: right" onclick="alert('Log out successfully.');">
        <a href="login.php" style="color:yellow;">Logout</a>
    </div><br>
    <div style='text-align: right';>
        <select name="assignment_name" onchange="location = this.value;">
        <option value="">Edit Table</option>
        <option value="add.php">Add New Assignment</option>
        <option value="update.php">Update</option>
        <option value="delete.php">Delete</option>
        </select><br><br>
    </div>
    <a href="studinfo.php"><button>Go to Student Information</button></a>
    <style>
         body {
            background: linear-gradient(to right, purple, black);
            margin: 10;
            padding: 10;
            font-family: Arial, sans-serif;
        }
        h1  {
            background: linear-gradient(to right, #009EFD, #F68084);
            padding: 10px;
            margin-left: -10px;
            margin-right: -10px;
            text-align: center;
        }
        .assignment_name {
            position: right;
        }
        .assignment-table {
            background: linear-gradient(to bottom right, #25D366, #F77737);
            border-collapse: collapse;
            width: 100%;
        }

        .assignment-table th,
        .assignment-table td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
    
    <?php
    viewAssignments();
    ?>
    
    </body>
</html>
