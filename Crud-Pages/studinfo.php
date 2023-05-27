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
            text-align: center;
            display: flex;
            justify-content: center; 
            align-items: center; 
        }

        table {
            width: 100%;
            border: collapse;
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
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td><strong>Student Number:</strong></td><td>" . $row['student_no'] . "</td></tr>";
                    echo "<tr><td><strong>Last Name:</strong></td><td>" . $row['lastname'] . "</td></tr>";
                    echo "<tr><td><strong>First Name:</strong></td><td>" . $row['firstname'] . "</td></tr>";
                    echo "<tr><td><strong>Gender:</strong></td><td>" . $row['gender'] . "</td></tr>";
                    echo "<tr><td><strong>Address:</strong></td><td>" . $row['address'] . "</td></tr>";
                    echo "<tr><td><strong>Contact:</strong></td><td>" . $row['contact'] . "</td></tr>";
                    echo "<tr><td><strong>Program:</strong></td><td>" . $row['program'] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No student information found.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
