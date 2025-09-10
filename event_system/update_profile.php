<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventdb");

// ✅ Ensure user logged in
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header("Location: login.php");
    exit;
}

// ✅ Fetch user info
$stmt = $conn->prepare("SELECT * FROM student_registrations WHERE id=?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// ✅ Profile completion calculation
$total_fields = 4; // phone, address, dob, profile_pic
$completed = 0;
if (!empty($user['phone'])) $completed++;
if (!empty($user['address'])) $completed++;
if (!empty($user['dob'])) $completed++;
if ($user['profile_pic'] != "default.png") $completed++;

$completion_percentage = ($completed / $total_fields) * 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
  <?php include 'navbar.php'; ?>
<body class="container mt-5">

  <h2 class="mb-3">Update Profile</h2>

  <!-- ✅ Profile completion bar -->
  <div class="mb-4">
    <label>Profile Completion</label>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" 
        style="width: <?php echo $completion_percentage; ?>%;" 
        aria-valuenow="<?php echo $completion_percentage; ?>" 
        aria-valuemin="0" aria-valuemax="100">
        <?php echo round($completion_percentage); ?>%
      </div>
    </div>
  </div>

  <!-- ✅ Update Form -->
  <form method="POST" action="save_profile.php" enctype="multipart/form-data">
    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" 
             value="<?php echo htmlspecialchars($user['phone']); ?>">
    </div>
    <div class="form-group">
      <label>Address</label>
      <input type="text" name="address" class="form-control" 
             value="<?php echo htmlspecialchars($user['address']); ?>">
    </div>
    <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" 
             value="<?php echo htmlspecialchars($user['dob']); ?>">
    </div>
    <div class="form-group">
      <label>Profile Picture</label><br>
      <img src="uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" 
           alt="Profile Pic" width="80" height="80" style="border-radius:50%;"><br><br>
      <input type="file" name="profile_pic" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Save Profile</button>
  </form>
  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>
</html>
