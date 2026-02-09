<?php
require_once '../includes/config.php';

// Log activity before destroying session
if (is_logged_in()) {
    $user_id = $_SESSION['user_id'];
    $log_query = "INSERT INTO activity_logs (user_id, action, details, ip_address) VALUES (?, 'Logout', 'User logged out', ?)";
    $stmt = mysqli_prepare($conn, $log_query);
    $ip = $_SERVER['REMOTE_ADDR'];
    mysqli_stmt_bind_param($stmt, "is", $user_id, $ip);
    mysqli_stmt_execute($stmt);
}

// Destroy session
session_destroy();

// Redirect to login
header("Location: ../login.php?logout=success");
exit();
?>
