<?php



include "../../config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $department = $_POST['department'];
    $level_term = $_POST['level_term'];
    $destination = $_POST['destination'];
    $payment_number = $_POST['payment_number'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    // Handling the image upload
    $image = $_FILES['image']['name'];
    $target_dir = "../../../tms/user/uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $sql = "INSERT INTO registrations (student_id, full_name, department, level_term, destination, payment_number, image, created_at) 
            VALUES ('$student_id', '$full_name', '$department', '$level_term', '$destination', '$payment_number', '$target_file', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>alert('Registration successful!')</script>";
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transport Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Transport Registration Form</h2>
    <form method="post" action="../../user/components/registration.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="student_id">Student ID:</label>
        <input type="text" class="form-control" id="student_id" name="student_id" required>
      </div>

      <div class="form-group">
        <label for="full_name">Full Name:</label>
        <input type="text" class="form-control" id="full_name" name="full_name" required>
      </div>

      <div class="form-group">
        <label for="department">Department:</label>
        <input type="text" class="form-control" id="department" name="department" required>
      </div>

      <div class="form-group">
        <label for="level_term">Level/Term:</label>
        <input type="text" class="form-control" id="level_term" name="level_term" required>
      </div>

      <div class="form-group">
                <label for="destination">Destination:</label>
                <select class="form-control" id="destination" name="destination" required>
                    <option value="">Select Destination</option>
                    <option value="কান্দিরপাড়/ঈদ্গাহ--নোয়াপাড়া--আলেখার চর--ক্যাম্পাস">কান্দিরপাড়/ঈদ্গাহ -- নোয়াপাড়া -- আলেখার চর -- ক্যাম্পাস</option>
                    <option value="টমসম ব্রিজ--পদুয়ার-বাজার-বিশ্বরোড--আলেখার-চর-- ক্যাম্পাস">টমসম ব্রিজ -- পদুয়ার বাজার বিশ্বরোড -- আলেখার চর -- ক্যাম্পাস</option>
                    <option value="ঝাগুরঝুলি-বিশ্বরোড--আলেখার-চর--ক্যাম্পাস">ঝাগুরঝুলি বিশ্বরোড -- আলেখার চর -- ক্যাম্পাস</option>

                    <option value="ক্যান্টনমেন্ট/টিপরা-বাজার--ক্যাম্পাস">ক্যান্টনমেন্ট/টিপরা বাজার -- ক্যাম্পাস</option>
                    <option value="ঈদগাহ-সম্মুখ-পুলিশ লাইন-নোয়াপাড়া-ক্যাম্পাস">ঈদগাহ সম্মুখ - পুলিশ লাইন - নোয়াপাড়া - ক্যাম্পাস</option>
                </select>
            </div>

      <div class="form-group">
        <label for="payment_number">Payment Number:</label>
        <input type="text" class="form-control" id="payment_number" name="payment_number" required>
      </div>

      <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
  
  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

