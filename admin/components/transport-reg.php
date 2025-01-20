
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$limit = 10; // Number of entries per page.
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

$sql = "SELECT * FROM registrations WHERE student_id LIKE '%$search_query%' LIMIT $start, $limit";
$result = $conn->query($sql);

$registrations = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $registrations[] = $row;
    }
}

$total_result = $conn->query("SELECT COUNT(*) FROM registrations WHERE student_id LIKE '%$search_query%'")->fetch_row()[0];
$total_pages = ceil($total_result / $limit);

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .pagination {
      display: flex;
      justify-content: center;
      list-style-type: none;
      padding: 0;
    }
    .pagination li {
      margin: 0 5px;
    }
    .pagination a {
      text-decoration: none;
      padding: 8px 16px;
      border: 1px solid #ddd;
      color: black;
    }
    .pagination a.active {
      background-color: #4CAF50;
      color: white;
    }
    .pagination a:hover:not(.active) {
      background-color: #ddd;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2>Admin Dashboard - Registration Data</h2>
    <form method="GET" action="admin_dashboard.php" class="form-inline mb-3">
      <div class="form-group mr-2">
        <input type="text" name="search" class="form-control" placeholder="Search by Student ID" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Department</th>
          <th>Level/Term</th>
          <th>Destination</th>
          <th>Payment Number</th>
          <th>Image</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tbody>
        

        <?php foreach ($registrations as $registration): ?>
          <tr>
            <td><?php echo htmlspecialchars($registration['student_id']); ?></td>
            <td><?php echo htmlspecialchars($registration['full_name']); ?></td>
            <td><?php echo htmlspecialchars($registration['department']); ?></td>
            <td><?php echo htmlspecialchars($registration['level_term']); ?></td>
            <td><?php echo htmlspecialchars($registration['destination']); ?></td>
            <td><?php echo htmlspecialchars($registration['payment_number']); ?></td>
            <td><img src="<?php echo htmlspecialchars($registration['image']); ?>" width="50" height="50" alt="Image"></td>
            <td><?php echo htmlspecialchars($registration['created_at']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <ul class="pagination">
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
          <a class="page-link" href="admin_dashboard.php?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search_query); ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
</body>
</html>
