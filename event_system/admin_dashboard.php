<?php
session_start();
if (!isset($_SESSION['admin_id']) || $_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container mt-5">
    <h2>Welcome Admin, <?php echo htmlspecialchars($_SESSION['admin_name']); ?> 👑</h2>
    <p>This is your <b>Admin Dashboard</b>.</p>
    
    <div class="list-group">
      <a href="manage_events.php" class="list-group-item list-group-item-action">📌 Manage Events</a>
      <a href="view_students.php" class="list-group-item list-group-item-action">👨‍🎓 View Registered Students</a>
      <a href="view_organizers.php" class="list-group-item list-group-item-action">🧑‍💼 Manage Organizers</a>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</body>
</html>
