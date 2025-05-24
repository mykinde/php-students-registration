<?php
require_once '../includes/session_check.php';
include '../includes/header.php';
?>

<div class="container mt-5">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['student_name']) ?>!</h2>
    <p>You are successfully logged in.</p>


    <div class="card">
        <div class="card-header">
            <strong>Student Details</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td><?= htmlspecialchars($_SESSION['student_name']) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($_SESSION['student_email']) ?></td>
                </tr>
               <tr>
                    <th>Matriculation Number</th>
                    <td><?= htmlspecialchars($_SESSION['student_matric']) ?></td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td><?= htmlspecialchars($_SESSION['student_level']) ?></td>
                </tr>
                <tr>
                    <th>Faculty Code</th>
                    <td><?= htmlspecialchars($_SESSION['student_faculty']) ?></td>
                </tr>
                <tr>
                    <th>Department Code</th>
                    <td><?= htmlspecialchars($_SESSION['student_department']) ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= htmlspecialchars($_SESSION['student_gender']) ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?= htmlspecialchars($_SESSION['student_phone']) ?></td>
                </tr> 
            </table>
        </div>
    </div>
</div>


    <a href="../logout.php" class="btn btn-danger">Logout</a>
</div>

<?php include '../includes/footer.php'; ?>


