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

$faculties = $pdo->query("SELECT * FROM faculties")->fetchAll(PDO::FETCH_ASSOC);
$departments = $pdo->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $matric_number = trim($_POST['matric_number']);
    $level = $_POST['level'];
    $faculty_id = $_POST['faculty_id'];
    $department_id = $_POST['department_id'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE students SET full_name=?, matric_number=?, level=?, faculty_id=?, department_id=?, gender=?, phone=? WHERE id=?");
    $stmt->execute([$full_name, $matric_number, $level, $faculty_id, $department_id, $gender, $phone, $id]);

    header("Location: students.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Edit Student: <?= htmlspecialchars($student['full_name']) ?></h2>
    <form method="POST">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($student['full_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Matric Number</label>
            <input type="text" name="matric_number" class="form-control" value="<?= htmlspecialchars($student['matric_number']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Level</label>
            <select name="level" class="form-select" required>
                <option value="100" <?= $student['level'] == '100' ? 'selected' : '' ?>>100</option>
                <option value="200" <?= $student['level'] == '200' ? 'selected' : '' ?>>200</option>
                <option value="300" <?= $student['level'] == '300' ? 'selected' : '' ?>>300</option>
                <option value="400" <?= $student['level'] == '400' ? 'selected' : '' ?>>400</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Faculty</label>
            <select name="faculty_id" class="form-select" required>
                <?php foreach ($faculties as $fac): ?>
                    <option value="<?= $fac['id'] ?>" <?= $student['faculty_id'] == $fac['id'] ? 'selected' : '' ?>><?= $fac['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-select" required>
                <?php foreach ($departments as $dep): ?>
                    <option value="<?= $dep['id'] ?>" <?= $student['department_id'] == $dep['id'] ? 'selected' : '' ?>><?= $dep['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select" required>
                <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($student['phone']) ?>" required>
        </div>

        <button class="btn btn-primary">Update Student</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
