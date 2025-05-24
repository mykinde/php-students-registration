<?php
require_once '../includes/admin_session_check.php';
require_once '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: students.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Student not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $hash = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE students SET password=? WHERE id=?");
    $stmt->execute([$hash, $id]);

    header("Location: students.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Reset Password for: <?= htmlspecialchars($student['full_name']) ?></h2>
    <form method="POST">
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <button class="btn btn-warning">Reset Password</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
