<?php
include "../../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $profile_image = $_FILES['profile_image']['name'];
    $target_dir = "../../../tms/user/uploads/";
    $target_file = $target_dir . basename($profile_image);

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
        try {
            $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, department, password, profile_image) VALUES (:student_id, :full_name, :department, :password, :profile_image)");
            $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':profile_image', $target_file);
            $stmt->execute();
            echo "<script>alert('Registration Successfull')</script>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
      echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
}
?>




<?php include("./sidebar.php");?>

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
  </style>
</head>
<body>
  

    <!-- Student Registration Form -->
    <section id="student-registration" class="p-3">
      <h2>Student Registration</h2>
      <form method="post" class="justify-content-center d-flex" action="" enctype="multipart/form-data">
    <div class="row container">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profile_image" name="profile_image" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</form>

    </section>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>