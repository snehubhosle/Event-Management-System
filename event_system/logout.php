<?php
session_start();

// Destroy all session variables
$_SESSION = [];
session_unset();
session_destroy();

// Redirect to home page
header("Location: main_page.php");
exit;
?>
