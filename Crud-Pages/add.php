<?php
session_start();
include ("sql/conn.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- table design -->
    <style>
    .container {
      position: relative;
      padding: 20px;
    }

    .crud-actions {
      position: absolute;
      top: 0;
      right: 0;
      margin: 20px;
    }

    .crud-table {
      margin-top: 80px;
    }

    .crud-table th {
      background-color: #f2f2f2;
      text-align: center;
    }

    .crud-table td {
      text-align: center;
    }

    .action-buttons {
      display: flex;
      justify-content: center;
    }
  </style>

</head>
<body>
    <div class="main">
        <div class="verbar">
            <h2>AMS</h2>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="add.php">Assignments</a></li>
                <li><a href="teachers.php">Teachers</a></li>
                <li><a href="subject.php">Subject</a></li>
            </ul>
            <div class="logout">
                <a href="login.php">Logout</a>
            </div>
        </div>
<div class="site-con">
    <div class="header">Assigntment Tab: Add Assignment</div>
    <div class="container">
    <div class="crud-actions">
      <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
      <button class="btn btn-warning">Update</button>
    </div>

    <table class="table table-bordered crud-table">
      <thead class="thead-light">
        <tr>
          <th>Assignment ID</th>
          <th>Sub ID</th>
          <th>Assignment Name</th>
          <th>Subject Type</th>
          <th>Instructor Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Add your table data rows here -->
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="action-buttons">
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <!--Popup create table-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Create Assignment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="subId">Sub ID</label>
                <select class="form-control" id="subId">
                  <option value="math">Math</option>
                  <option value="science">Science</option>
                </select>
              </div>
              <div class="form-group">
                <label for="assignmentName">Assignment Name</label>
                <input type="text" class="form-control" id="assignmentName">
              </div>
              <div class="form-group">
                <label for="subjectType">Subject Type</label>
                <input type="text" class="form-control" id="subjectType">
              </div>
              <div class="form-group">
                <label for="instructorName">Instructor Name</label>
                <input type="text" class="form-control" id="instructorName">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </div>

</div>
</body>
</html>