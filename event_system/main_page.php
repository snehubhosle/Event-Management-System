<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Management System</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
    }

    .background-image {
      background: url('sanjivani_clg_img.webp') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      position: relative;
    }

    .overlay {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px 0;
      min-height: 100vh;
    }

    .card {
      margin-bottom: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      overflow: hidden;
    }

    .card img {
      height: 180px;
      object-fit: cover;
    }

    footer {
      background-color: #900C3F;
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    footer .footer-links a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: 500;
    }

    footer .footer-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- ✅ Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Background with overlay -->
  <div class="background-image">
    <div class="overlay">
      <div class="container animate__animated animate__fadeIn">
        <h2 class="text-center mb-5" style="color:#900C3F;">Welcome to Sanjivani College Event Management System</h2>
        <p class="text-center">Explore, Register and Participate in College Events Easily</p>
        <div class="row">

          <!-- Event 1 -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
              <img src="hackathon.jpg" class="card-img-top" alt="Hackathon">
              <div class="card-body">
                <h5 class="card-title">Hackathon</h5>
                <p>Date: July 15<br>Time: 10:00 AM<br>Venue: Hall A</p>
                <a href="#" class="btn btn-primary btn-sm">View More</a>
              </div>
            </div>
          </div>

          <!-- Event 2 -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
              <img src="robotics.jpg" class="card-img-top" alt="Robotics Expo">
              <div class="card-body">
                <h5 class="card-title">Robotics Expo</h5>
                <p>Date: July 20<br>Time: 11:00 AM<br>Venue: Lab 5</p>
                <a href="#" class="btn btn-primary btn-sm">View More</a>
              </div>
            </div>
          </div>

          <!-- Event 3 -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
              <img src="tech_conf.jpg" class="card-img-top" alt="Tech Conference">
              <div class="card-body">
                <h5 class="card-title">Tech Conference</h5>
                <p>Date: July 25<br>Time: 1:00 PM<br>Venue: Auditorium</p>
                <a href="#" class="btn btn-primary btn-sm">View More</a>
              </div>
            </div>
          </div>

          <!-- Event 4 -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
              <img src="cultural.jpg" class="card-img-top" alt="Cultural Fest">
              <div class="card-body">
                <h5 class="card-title">Cultural Fest</h5>
                <p>Date: July 30<br>Time: 6:00 PM<br>Venue: Ground</p>
                <a href="#" class="btn btn-primary btn-sm">View More</a>
              </div>
            </div>
          </div>

        </div>

        <hr>

        <!-- About Us & Contact -->
        <div class="row mt-5">
          <div class="col-md-6">
            <h4>About Us</h4>
            <p>Sanjivani College Event Management System helps students and staff to efficiently manage and participate in all campus events. We aim to simplify event registrations, updates, and tracking for everyone.</p>
          </div>
          <div class="col-md-6">
            <h4>Contact Us</h4>
            <p>Email: info@sanjivanicollege.edu.in</p>
            <p>Phone: +91-1234567890</p>
            <p>Address: Kopargaon, Maharashtra</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Footer -->
 <?php include 'footer.php'; ?>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
