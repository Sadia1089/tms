<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    include "../../config/connection.php";

    try {
       
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the form data
        $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
        $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : '';
        $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
        $profile_image = isset($_FILES['profile_image']) ? $_FILES['profile_image'] : '';

        // Check if new passwords match
        if ($new_password !== $confirm_password) {
            echo "<script>alert('New passwords do not match.')</script>";
            exit;
        }

        // Check if student_id is set in the session
        if (isset($_SESSION['student_id'])) {
            $student_id = $_SESSION['student_id'];
            
            // Fetch the current password from the database
            $stmt = $conn->prepare("SELECT password FROM students WHERE id = :student_id");
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            $student = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student && password_verify($current_password, $student['password'])) {
                // Hash the new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Handle file upload
                $target_dir = "../../../tms/user/uploads/";
                $target_file = $target_dir . basename($profile_image["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is an actual image or fake image
                $check = getimagesize($profile_image["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }

                // Check file size
                if ($profile_image["size"] > 500000) {
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($profile_image["tmp_name"], $target_file)) {
                        // Update the student's profile information in the database
                        $stmt = $conn->prepare("UPDATE students SET full_name = :full_name, password = :password, profile_image = :profile_image WHERE id = :student_id");
                        $stmt->bindParam(':full_name', $full_name);
                        $stmt->bindParam(':password', $hashed_new_password);
                        $stmt->bindParam(':profile_image', $target_file);
                        $stmt->bindParam(':student_id', $student_id);

                        if ($stmt->execute()) {
                            echo "<script>alert('Profile updated successfully')</script>";
                        } else {
                            echo "Error updating profile: " . $stmt->errorInfo();
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "Student ID is not set in the session.";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Profile Settings</h2>
    <form action="profile.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
