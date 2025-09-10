<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventdb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form inputs
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    // hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // insert into DB
    $stmt = $conn->prepare("INSERT INTO student_registrations (full_name, email, password, department) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $passwordHash, $department);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $full_name;
        $_SESSION['profile_pic'] = "default.png";
        $_SESSION['login_type'] = "student";

        header("Location: main_page.php?registered=1");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
