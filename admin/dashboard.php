

<?php
require_once '../includes/admin_session_check.php';
include '../includes/header.php';
?>

<div class="container mt-5">
    <h2>Welcome, Admin (<?= htmlspecialchars($_SESSION['admin_username']) ?>)</h2>
    <p>This is your dashboard.</p>
    <a href="../logout.php" class="btn btn-danger">Logout</a>
</div>

<?php include '../includes/footer.php'; ?>
