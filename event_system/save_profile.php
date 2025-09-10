<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventdb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];

    $phone   = $_POST['phone'] ?? null;
    $address = $_POST['address'] ?? null;
    $dob     = $_POST['dob'] ?? null;

    $profile_pic = $_SESSION['profile_pic'] ?? "default.png";

    // ✅ Upload new profile picture if provided
    if (!empty($_FILES['profile_pic']['name'])) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["profile_pic"]["name"]);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile)) {
            $profile_pic = $fileName;
        }
    }

    // ✅ Update DB with new info
    $stmt = $conn->prepare("UPDATE student_registrations 
                            SET phone=?, address=?, dob=?, profile_pic=? 
                            WHERE id=?");
    $stmt->bind_param("ssssi", $phone, $address, $dob, $profile_pic, $userId);
    $stmt->execute();
    $stmt->close();

    // ✅ Update session
    $_SESSION['profile_pic'] = $profile_pic;

    // ✅ Redirect to profile page instead of back to update form
    header("Location: profile.php?updated=1");
    exit;
}
?>
