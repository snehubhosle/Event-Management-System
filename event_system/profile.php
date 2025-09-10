<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventdb");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user details
$stmt = $conn->prepare("SELECT full_name, email, department, phone, address, dob, profile_pic 
                        FROM student_registrations WHERE id=?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Calculate profile completion percentage
$totalFields = 6; // excluding id & password
$filled = 0;
foreach (['full_name','email','department','phone','address','dob'] as $field) {
    if (!empty($user[$field])) $filled++;
}
$completion = round(($filled / $totalFields) * 100);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body { background: #f9f9f9; font-family: 'Segoe UI', sans-serif; }
    .profile-card { max-width: 600px; margin: 40px auto; background: #fff; 
                    border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); overflow: hidden; }
    .profile-header { background: #900C3F; color: #fff; text-align: center; padding: 30px; }
    .profile-header img { width: 100px; height: 100px; border-radius: 50%; border: 3px solid #fff; margin-bottom: 10px; }
    .profile-body { padding: 20px; }
    .profile-body p { margin: 8px 0; font-size: 15px; }
    .progress { height: 20px; border-radius: 10px; }
    .btn-custom { background: #900C3F; color: #fff; border: none; }
    .btn-custom:hover { background: #70092f; }
  </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="profile-card">
  <div class="profile-header">
    <img src="uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture">
    <h3><?php echo htmlspecialchars($user['full_name']); ?></h3>
    <p><?php echo htmlspecialchars($user['department']); ?></p>
  </div>
  <div class="profile-body">
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone'] ?? 'Not added'); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address'] ?? 'Not added'); ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $user['dob'] ?? 'Not added'; ?></p>

    <hr>
    <p><strong>Profile Completion:</strong> <?php echo $completion; ?>%</p>
    <div class="progress">
      <div class="progress-bar bg-success" style="width: <?php echo $completion; ?>%"></div>
    </div>

    <div class="mt-4 text-center">
      <a href="update_info.php" class="btn btn-custom btn-sm">Update Information</a>
      <a href="update_profile.php" class="btn btn-secondary btn-sm">Change Picture</a>
    </div>
  </div>
</div>
  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>
</html>
