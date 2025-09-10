<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = ""; // default for XAMPP
$dbname = "eventdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $event_name = $_POST['event_name'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO event_registrations (event_name, name, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $event_name, $name, $email, $phone);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='events.php';</script>";
    } else {
        echo "<script>alert('Error: Could not save.'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>
