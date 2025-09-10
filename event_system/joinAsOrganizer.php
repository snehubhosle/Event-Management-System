<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join as Organizer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body { background-color: #f9f9f9; }
    .btn-primary { background-color: #900C3F !important; border: none; }
    .background-image { background: url('sanjivani_clg_img.webp') no-repeat center center fixed; background-size: cover; min-height: 100vh; }
    .overlay { background-color: rgba(255, 255, 255, 0.7); width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center; }
    .organizer-container { max-width: 600px; background: rgba(255, 255, 255, 0.9); padding: 30px; border-radius: 15px; box-shadow: 3px 3px 10px black; }

  </style>
</head>
<body>

  <!-- ✅ Navbar from include -->
  <?php include 'navbar.php'; ?>

  <!-- Join as Organizer Form -->
  <div class="background-image">
    <div class="overlay">
      <div class="container organizer-container animate__animated animate__zoomIn">
        <h3 class="text-center mb-4">Join as Organizer</h3>
        <form method="POST" action="save_organizer.php">
          <div class="form-group">
            <label for="orgName">Full Name</label>
            <input type="text" name="name" class="form-control" id="orgName" placeholder="Enter your full name" required>
          </div>
          <div class="form-group">
            <label for="orgEmail">Email address</label>
            <input type="email" name="email" class="form-control" id="orgEmail" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="orgPhone">Phone Number</label>
            <input type="tel" name="phone" class="form-control" id="orgPhone" placeholder="Enter phone number" required>
          </div>
          <div class="form-group">
            <label for="orgDept">Department</label>
            <select class="form-control" name="department" id="orgDept" required>
              <option selected disabled>Select Department</option>
              <option>Computer Engineering</option>
              <option>IT</option>
              <option>Electronics</option>
              <option>Mechanical</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="orgReason">Why do you want to join as an organizer?</label>
            <textarea class="form-control" name="reason" id="orgReason" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
