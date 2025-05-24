<?php require_once '../config/db.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Admin Registration</h2>
    <form action="register_submit.php" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
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
         

       

       


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>


<?php include '../includes/footer.php'; ?>
