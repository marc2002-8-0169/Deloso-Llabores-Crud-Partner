<?php
// Include the database connection code
include 'db.php';

// Retrieve student information from the database
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <style>
        body {
            background: linear-gradient(to right, #014872, #A0EACF);
        }

        .container {
            background: linear-gradient(to bottom, #2AF598, white);
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">Student Information</h2>
    <a href="studupdate.php"><button>Update Student Information</button></a><br><br>
    <div class="container">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Course</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><strong>Student ID:</strong> " . $row['student_id'] . "</td></tr>";
                    echo "<tr><td><strong>Last Name:</strong> " . $row['lastname'] . "</td></tr>";
                    echo "<tr><td><strong>First Name:</strong> " . $row['firstname'] . "</td></tr>";
                    echo "<tr><td><strong>Gender:</strong> " . $row['gender'] . "</td></tr>";
                    echo "<tr><td><strong>Address:</strong> " . $row['address'] . "</td></tr>";
                    echo "<tr><td><strong>Contact:</strong> " . $row['contact'] . "</td></tr>";
                    echo "<tr><td><strong>Course:</strong> " . $row['course'] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No student information found.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
