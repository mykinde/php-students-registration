<?php
session_start();
require_once '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check credentials
  //  $stmt = $pdo->prepare("SELECT * FROM students WHERE email = ?");
    $stmt = $pdo->prepare("
    SELECT students.*, 
               faculties.name AS faculty_name, 
               departments.name AS department_name
        FROM students
        JOIN faculties ON students.faculty_id = faculties.id
        JOIN departments ON students.department_id = departments.id
        WHERE students.email = ?
        LIMIT 1
    
    ");
    $stmt->execute([$email]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && password_verify($password, $student['password'])) {
        $_SESSION['student_id'] = $student['id'];
        $_SESSION['student_name'] = $student['full_name'];
        $_SESSION['student_email'] = $student['email'];
        $_SESSION['student_level'] = $student['level'];
        $_SESSION['student_phone'] = $student['phone'];
        $_SESSION['student_matric'] = $student['matric_number'];
        $_SESSION['student_faculty'] = $student['faculty_name']; // must be from JOIN
        $_SESSION['student_department'] = $student['department_name']; // must be from JOIN
        $_SESSION['student_gender'] = $student['gender'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<?php include '../includes/header2.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">Student Login</h2>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
