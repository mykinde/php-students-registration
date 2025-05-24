<?php
session_start();

// If admin already logged in, redirect to dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

include '../includes/header.php';
?>

<div class="text-center mt-5">
    <h1 class="display-4 fw-bold mb-3">Admin Panel - Student Registration System</h1>
    <p class="lead mb-4">Manage student records efficiently and securely.</p>

    <a href="/admin/login.php" class="btn btn-primary btn-lg">Admin Login</a>
</div>

<?php
include '../includes/footer.php';
