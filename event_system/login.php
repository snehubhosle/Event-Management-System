<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body { background: url('sanjivani_clg_img.webp') no-repeat center center fixed; background-size: cover; }
    .overlay { background-color: rgba(255, 255, 255, 0.7); height: 100vh; display: flex; align-items: center; justify-content: center; }
    .login-box { max-width: 350px; width: 90%; padding: 20px; background: rgba(255,255,255,0.9); border-radius: 10px; box-shadow: 3px 3px 10px black; text-align: center; }
    .navbar, .btn-primary { background-color: #900C3F !important; border: none; }
  </style>
</head>
<body>
   <?php include 'navbar.php'; ?>

  <!-- Login Form -->
  <div class="overlay">
    <div class="login-box">
      <h3 style="color:#900C3F;">Login</h3>
      <form method="POST" action="check_login.php">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <!-- Select Login Type -->
        <div class="form-group">
          <select name="login_type" class="form-control" required>
            <option value="">-- Select Login Type --</option>
            <option value="student">Login as Student</option>
            <option value="admin">Login as Admin</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>

   <?php include 'footer.php'; ?>
</body>
</html>
