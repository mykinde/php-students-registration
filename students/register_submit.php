<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name  = trim($_POST['full_name']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $level      = $_POST['level'];
    $faculty_id = $_POST['faculty'];
    $dept_id    = $_POST['department'];
    $matric     = trim($_POST['matric']);
    $gender     = $_POST['gender'];
    $phone      = trim($_POST['phone']);

    // Basic validation
    if (empty($full_name) || empty($email) || empty($password) || empty($level) ||
        empty($faculty_id) || empty($dept_id) || empty($matric) || empty($gender) || empty($phone)) {
        die("All fields are required.");
    }

    // Check for duplicate email or matric number
    $check = $pdo->prepare("SELECT * FROM students WHERE email = ? OR matric_number = ?");
    $check->execute([$email, $matric]);

    if ($check->rowCount() > 0) {
        die("Email or Matriculation number already exists.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert
    $stmt = $pdo->prepare("INSERT INTO students 
        (full_name, email, password, level, faculty_id, department_id, matric_number, gender, phone)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt->execute([$full_name, $email, $hashed_password, $level, $faculty_id, $dept_id, $matric, $gender, $phone])) {
        echo "Registration successful. <a href='login.php'>Login here</a>.";
    } else {
        echo "Registration failed. Please try again.";
    }
} else {
    header("Location: register.php");
    exit;
}
