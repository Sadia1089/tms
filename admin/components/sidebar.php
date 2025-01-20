
<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center">
      <a href="<?php echo "./dashboard.php"?>" class="nav-link">Admin</a>
    </h4>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../../../tms/admin/dashboard.php" class="nav-link active">Home</a>
      </li>
      <li>
        <a href="../../../tms/admin/components/stu-register.php" class="nav-link">Student Registration</a>
      </li>
      
      <li>
        <a href="../../../tms/admin/components/transport-reg.php" class="nav-link">Transportation Registration</a>
      </li>

      <li>
        <a href="../../../tms/admin/components/admin_control.php" class="nav-link">Payment List</a>
      </li>
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://via.placeholder.com/40" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="<?php echo "./components/profile.php";?>">Profile Settings</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="nav-link" href="../../../tms/admin/logout.php">Sign Out</a></li>
      </ul>
    </div>
  </div>


    <!-- Main Sidebar Container -->
   