<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body { background-color: #f9f9f9; }
    .navbar, .btn-primary { background-color: #900C3F !important; border: none; }
    .register-container { max-width: 500px; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.2); }
    footer { background-color: #900C3F; color: white; text-align: center; padding: 10px 0; margin-top: 50px; }
    footer a { color: white; }
  </style>
</head>
<body>

<?php include 'navbar.php';?>

<div class="register-container">
  <h3 class="text-center mb-4">Student Registration</h3>
  <form method="POST" action="save_student.php">
    <div class="form-group">
      <label>Full Name</label>
      <input type="text" name="full_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email Address</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Department</label>
      <select name="department" class="form-control" required>
        <option disabled selected>Select Department</option>
        <option>Computer Engineering</option>
        <option>IT</option>
        <option>Electronics</option>
        <option>Mechanical</option>
        <option>Other</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Register</button>
  </form>
</div>

<? include 'footer.php';?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
