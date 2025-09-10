<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $reason = $_POST['reason'];

    $stmt = $conn->prepare("INSERT INTO organizers (name, email, phone, department, reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $department, $reason);

    if ($stmt->execute()) {
        echo "<script>alert('Your request has been submitted successfully!'); window.location.href='joinAsOrganizer.php';</script>";
    } else {
        echo "<script>alert('Error: Could not save your request.'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>
