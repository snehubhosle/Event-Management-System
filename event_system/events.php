<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Events | Sanjivani College</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body, html { margin: 0; padding: 0; min-height: 100%; font-family: 'Segoe UI', sans-serif; }
    .background-image { background: url('sanjivani_clg_img.webp') no-repeat center center fixed; background-size: cover; width: 100%; }
    .overlay { background-color: rgba(255, 255, 255, 0.8); padding: 30px 0; }
    .btn-primary { background-color: #900C3F !important; border: none; }
    .event-card img { height: 180px; object-fit: cover; }
    .event-card { margin-bottom: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.3); overflow: hidden; }
    .event-card .card-body { text-align: center; }
  
  </style>
</head>
<body>

  <!-- ✅ Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Background with overlay -->
  <div class="background-image">
    <div class="overlay">
      <div class="container animate__animated animate__fadeIn">
        <h2 class="text-center mb-5" style="color:#900C3F;">Upcoming College Events</h2>
        <div class="row">
          <?php
            $events = [
              ["Hackathon 2025","Aug 10, 9:00 AM","Seminar Hall A","https://www.shutterstock.com/image-photo/coding-hackathon-team-developers-working-260nw-2096237062.jpg"],
              ["Robotics Expo","Aug 15, 11:30 AM","Innovation Lab","https://img.freepik.com/premium-photo/robot-handshake-human-futuristic-digital-technology-ai-concept_34663-759.jpg"],
              ["Cultural Fest","Aug 20, 6:00 PM","Open Ground","https://img.freepik.com/premium-photo/stage-with-lighting-concert-dj-party_488220-14660.jpg"]
            ];
            foreach ($events as $event) {
              echo '<div class="col-md-4 col-sm-6 mb-4">
                      <div class="card event-card">
                        <img src="'.$event[3].'" class="card-img-top" alt="'.$event[0].'">
                        <div class="card-body">
                          <h5 class="card-title">'.$event[0].'</h5>
                          <p>Date: '.$event[1].'<br>Venue: '.$event[2].'</p>
                          <button class="btn btn-primary btn-sm register-btn" data-event="'.$event[0].'">Register</button>
                        </div>
                      </div>
                    </div>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Registration Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form method="POST" action="save_registration.php" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register for Event</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="event_name" id="event_name">
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit Registration</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).on('click', '.register-btn', function(){
      let eventName = $(this).data('event');
      $('#event_name').val(eventName);
      $('#registerModal').modal('show');
    });
  </script>
</body>
</html>
