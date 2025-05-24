<?php
session_start();
include 'includes/header.php';
?>

<div class="text-center mt-5">
    <h1 class="display-4 fw-bold mb-3">Welcome to Student Registration System</h1>
    <p class="lead mb-4">Register, manage, and track student records with ease.</p>

    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995479.png" alt="Student Registration" class="img-fluid" style="max-width: 300px;">

    <div class="mt-4">
        <?php if (!isset($_SESSION['student_id']) && !isset($_SESSION['admin_id'])): ?>
            <a href="/students/register.php" class="btn btn-primary btn-lg me-3">Register</a>
            <a href="/students/login.php" class="btn btn-outline-primary btn-lg">Login</a>
        <?php elseif (isset($_SESSION['student_id'])): ?>
            <a href="/students/dashboard.php" class="btn btn-success btn-lg">Go to Dashboard</a>
        <?php elseif (isset($_SESSION['admin_id'])): ?>
            <a href="admin/dashboard.php" class="btn btn-success btn-lg">Go to Admin Panel</a>
        <?php endif; ?>
    </div>
</div>

<?php
include 'includes/footer.php';
