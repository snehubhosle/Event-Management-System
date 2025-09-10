<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<nav class="navbar navbar-expand-md navbar-dark">
  <a class="navbar-brand" href="main_page.php">Sanjivani College Event Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style>
    .navbar {
      background-color: #900C3F !important;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .navbar-nav .nav-link:hover {
      color: #ffc107 !important;
    }
  </style>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"><a class="nav-link" href="main_page.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
      <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
      <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
    </ul>

    <!-- Right side options -->
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "student"): ?>
      <!-- ✅ Student is logged in -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="studentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="uploads/<?php echo htmlspecialchars($_SESSION['profile_pic'] ?? 'default.png'); ?>" 
                 alt="Profile" 
                 style="width:30px; height:30px; border-radius:50%; margin-right:5px;">
            <?php echo htmlspecialchars($_SESSION['user_name']); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="studentDropdown">
            <a class="dropdown-item" href="certification.php">Certification</a>
            <a class="dropdown-item" href="update_profile.php">Update Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>

    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === "admin"): ?>
      <!-- ✅ Admin is logged in -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            👑 <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
            <a class="dropdown-item" href="admin_dashboard.php">Dashboard</a>
            <a class="dropdown-item" href="manage_events.php">Manage Events</a>
            <a class="dropdown-item" href="view_students.php">View Students</a>
            <a class="dropdown-item" href="view_organizers.php">Manage Organizers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>

    <?php else: ?>
      <!-- ❌ User not logged in -->
      <a href="login.php" class="btn btn-light btn-sm mr-2">Login</a>
      <a href="register.php" class="btn btn-warning btn-sm">Register</a>
    <?php endif; ?>
  </div>
</nav>
