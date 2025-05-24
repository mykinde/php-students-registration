<?php
require_once '../includes/session_check.php';
include '../includes/header.php';
?>

<div class="container mt-5">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['student_name']) ?>!</h2>
    <p>You are successfully logged in.</p>
    <a href="../logout.php" class="btn btn-danger">Logout</a>
</div>

<?php include '../includes/footer.php'; ?>


