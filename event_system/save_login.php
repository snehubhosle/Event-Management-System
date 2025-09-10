<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbevent";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, full_name, password FROM student_registrations WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['full_name'];
            echo "<script>alert('Login Successful!'); window.location.href='main_page.php';</script>";
        } else {
            echo "<script>alert('Invalid Password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No account found with that email'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>
