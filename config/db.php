<?php
$host = 'localhost';
$db   = 'student_portal';
$user = 'root'; // or your MySQL username
$pass = 'password';     // or your MySQL password
$port = '3307'; // or your MySQL port

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4", $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
