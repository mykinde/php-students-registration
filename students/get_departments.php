<?php
require_once '../config/db.php';

if (isset($_GET['faculty_id'])) {
    $faculty_id = $_GET['faculty_id'];
    $stmt = $pdo->prepare("SELECT id, name FROM departments WHERE faculty_id = ?");
    $stmt->execute([$faculty_id]);
    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($departments);
}
