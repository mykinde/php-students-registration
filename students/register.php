<?php require_once '../config/db.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Student Registration</h2>
    <form action="register_submit.php" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="col">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="level" class="form-select" required>
                    <option value="">Select Level</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="faculty" class="form-label">Faculty</label>
                <select name="faculty" id="faculty" class="form-select" required>
                    <option value="">Select Faculty</option>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM faculties");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <label for="department" class="form-label">Department</label>
                <select name="department" id="department" class="form-select" required>
                    <option value="">Select Department</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="matric" class="form-label">Matriculation Number</label>
                <input type="text" name="matric" id="matric" class="form-control" required>
            </div>
            <div class="col">
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Female" required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script src="../js/fetch_departments.js"></script>
<?php include '../includes/footer.php'; ?>
