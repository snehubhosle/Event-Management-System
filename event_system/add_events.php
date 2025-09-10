<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "eventdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];

    // File upload handling
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO events (title, date, venue, image_url, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $date, $venue, $targetFilePath, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Event added successfully!'); window.location='main_page.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Add New Event</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Event Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Event Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Venue</label>
        <input type="text" name="venue" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Event Image</label>
        <input type="file" name="image" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add Event</button>
</form>

</body>
</html>
