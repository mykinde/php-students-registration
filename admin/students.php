<?php
require_once '../includes/admin_session_check.php';
require_once '../config/db.php';

// Pagination Setup
$limit = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Filters
$search = $_GET['search'] ?? '';
$level = $_GET['level'] ?? '';
$faculty = $_GET['faculty'] ?? '';
$department = $_GET['department'] ?? '';

// Base query
$query = "SELECT s.*, f.name AS faculty_name, d.name AS department_name
          FROM students s
          JOIN faculties f ON s.faculty_id = f.id
          JOIN departments d ON s.department_id = d.id
          WHERE 1";

// Add filters
$params = [];
if ($search) {
    $query .= " AND (s.full_name LIKE ? OR s.email LIKE ? OR s.matric_number LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if ($level) {
    $query .= " AND s.level = ?";
    $params[] = $level;
}
if ($faculty) {
    $query .= " AND s.faculty_id = ?";
    $params[] = $faculty;
}
if ($department) {
    $query .= " AND s.department_id = ?";
    $params[] = $department;
}

$count_query = $pdo->prepare($query);
$count_query->execute($params);
$total_students = $count_query->rowCount();

$query .= " ORDER BY s.full_name ASC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all faculties and departments for filters
$faculties = $pdo->query("SELECT * FROM faculties")->fetchAll(PDO::FETCH_ASSOC);
$departments = $pdo->query("SELECT * FROM departments")->fetchAll(PDO::FETCH_ASSOC);

include '../includes/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4">Manage Students</h2>

    <form class="row g-3 mb-4" method="get">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-2">
            <select name="level" class="form-select">
                <option value="">All Levels</option>
                <option <?= $level == '100' ? 'selected' : '' ?>>100</option>
                <option <?= $level == '200' ? 'selected' : '' ?>>200</option>
                <option <?= $level == '300' ? 'selected' : '' ?>>300</option>
                <option <?= $level == '400' ? 'selected' : '' ?>>400</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="faculty" class="form-select">
                <option value="">All Faculties</option>
                <?php foreach ($faculties as $fac): ?>
                    <option value="<?= $fac['id'] ?>" <?= $faculty == $fac['id'] ? 'selected' : '' ?>><?= $fac['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="department" class="form-select">
                <option value="">All Departments</option>
                <?php foreach ($departments as $dep): ?>
                    <option value="<?= $dep['id'] ?>" <?= $department == $dep['id'] ? 'selected' : '' ?>><?= $dep['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Matric</th>
                <th>Level</th>
                <th>Faculty</th>
                <th>Department</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($students): ?>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['full_name']) ?></td>
                    <td><?= htmlspecialchars($s['email']) ?></td>
                    <td><?= htmlspecialchars($s['matric_number']) ?></td>
                    <td><?= htmlspecialchars($s['level']) ?></td>
                    <td><?= htmlspecialchars($s['faculty_name']) ?></td>
                    <td><?= htmlspecialchars($s['department_name']) ?></td>
                    <td><?= htmlspecialchars($s['gender']) ?></td>
                    <td><?= htmlspecialchars($s['phone']) ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="reset_password.php?id=<?= $s['id'] ?>" class="btn btn-sm btn-secondary">Reset Password</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9" class="text-center">No students found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php
    $total_pages = ceil($total_students / $limit);
    if ($total_pages > 1):
    ?>
    <nav>
        <ul class="pagination">
            <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                <li class="page-item <?= $page == $p ? 'active' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $p])) ?>"><?= $p ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
