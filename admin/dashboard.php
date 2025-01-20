<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 250px;
      background: #343a40;
      color: white;
      transition: width 0.3s;
    }
    .sidebar.collapsed {
      width: 80px;
    }
    .sidebar .nav-link {
      color: white;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
    .list-group-item {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <?php include('./components/sidebar.php');?>

  <!-- Content -->
  <div class="content">
    <h1>Welcome to the Dashboard</h1>
    <p>This is the main content area.</p>

    <h2>Pending List</h2>
    <ul class="list-group">
      <li class="list-group-item">Request 1</li>
      <li class="list-group-item">Request 2</li>
      <li class="list-group-item">Request 3</li>
    </ul>

    <h2>Approved List</h2>
    <ul class="list-group">
      <li class="list-group-item">Approval 1</li>
      <li class="list-group-item">Approval 2</li>
      <li class="list-group-item">Approval 3</li>
    </ul>

    <h2>Rejected List</h2>
    <ul class="list-group">
      <li class="list-group-item">Rejection 1</li>
      <li class="list-group-item">Rejection 2</li>
      <li class="list-group-item">Rejection 3</li>
    </ul>

    <h2>Faculty List (Bus Users)</h2>
    <ul class="list-group">
      <li class="list-group-item">Faculty Member 1</li>
      <li class="list-group-item">Faculty Member 2</li>
      <li class="list-group-item">Faculty Member 3</li>
    </ul>

    <h2>Employee List</h2>
    <ul class="list-group">
      <li class="list-group-item">Employee 1</li>
      <li class="list-group-item">Employee 2</li>
      <li class="list-group-item">Employee 3</li>
    </ul>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



