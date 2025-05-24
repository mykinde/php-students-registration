<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Registration System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/index.php">StudentRegsitrationSystem</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['student_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="../students/dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/logout.php">Logout</a></li>
        <?php elseif (isset($_SESSION['admin_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="../students.php">Students List</a></li>
          <li class="nav-item"><a class="nav-link" href="../../admin/dashboard.php">Admin Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="../../logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="../students/login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="../students/register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="../students/login.php">Admin</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
