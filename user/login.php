<?php
include('../config/connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = :student_id");
    $stmt->bindParam(':student_id', $student_id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && password_verify($password, $student['password'])) {
        $_SESSION['student_id'] = $student['id'];
        $_SESSION['profile_image'] = $student['profile_image'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="/tms/dist/CSS/admin-login.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


	<img class="wave" src="/tms/dist/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="/tms/dist/img/bg.svg">
		</div>
		<div class="login-content">
			<form form action="" method="post">
				<img src="https://baiust.ac.bd/wp-content/uploads/2023/11/Untitled-design-150x150.png">
				<h2 class="title">STUDENT</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Student ID</h5>
           		   		<input type="text" name="student_id" id="email" class="input" required>
                    
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" id="password" class="input" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
        

    <script type="text/javascript" src="/tms/dist/JS/admin-login.js"></script>
</body>
</html>

