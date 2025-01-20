

<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center">
      <a href="#" class="nav-link">Dashboard</a>
    </h4>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo ("../../user/dashboard.php"); ?>" class="nav-link active">Home</a>
      </li>
      <li>
        <a href="<?php echo"../user/components/registration.php"; ?>" class="nav-link">Registration</a>
      </li>


      
      <li>
        <a href="<?php echo"../user/components/submit_transaction.php"; ?>" class="nav-link">Payment</a>
      </li>

      <li>
        <a href="<?php echo"../user/components/trans_dashboard.php"; ?>" class="nav-link">
        Notification
      </a>
      </li>

      
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        
        <img src="<?php echo '/user/upload/' . $_SESSION['profile_image']; ?>" alt="Profile Image" width="32" height="32" class="rounded-circle me-2">


        <strong><?php echo $_SESSION["student_id"]; ?></strong>


        

      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="<?php echo "./components/profile.php";?>">Profile Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="nav-link" href="<?php echo "../user/logout.php";?>">Sign Out</a></li>
      </ul>
    </div>
  </div>


    <!-- Main Sidebar Container -->
   