<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventdb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_type = $_POST['login_type'];

    if ($login_type === "student") {
        // check in student_registrations
        $stmt = $conn->prepare("SELECT * FROM student_registrations WHERE email=? LIMIT 1");
    } elseif ($login_type === "admin") {
        // check in admins
        $stmt = $conn->prepare("SELECT * FROM admins WHERE email=? LIMIT 1");
    } else {
        die("Invalid login type!");
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $login_type === "student" ? $user['full_name'] : $user['admin_name'];
        $_SESSION['login_type'] = $login_type;

        if ($login_type === "student") {
            header("Location: main_page.php"); // student dashboard
        } else {
            header("Location: admin_dashboard.php"); // admin dashboard
        }
        exit;
    } else {
        echo "Invalid email or password!";
    }
}
?>
