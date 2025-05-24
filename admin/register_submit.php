<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username  = trim($_POST['username']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];


    // Basic validation
    if (empty($username) || empty($email) || empty($password) ) {
        die("All fields are required.");
    }

    // Check for duplicate email or matric number
    $check = $pdo->prepare("SELECT * FROM admins WHERE username = ? ");
    $check->execute([$username]);

    if ($check->rowCount() > 0) {
        die("Username number already exists.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert
    $stmt = $pdo->prepare("INSERT INTO admins 
        (username, email, password)
        VALUES (?, ?, ?)");

    if ($stmt->execute([$username, $email, $hashed_password,])) {
        echo "Registration successful. <a href='login.php'>Login here</a>.";
    } else {
        echo "Registration failed. Please try again.";
    }
} else {
    header("Location: register.php");
    exit;
}
