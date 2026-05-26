<?php 

use App\Core\Auth; 
use App\Core\Session;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="/">Task Management App</a>
    <div class="ms-auto">

        <?php if (Auth::check()): ?>

            <span class="text-white me-3">
                <a href="/profile" class="text-white text-decoration-none">
                    Welcome, <?= Auth::userName() ?>
                </a>
            </span>

            <a href="/logout" class="btn btn-danger btn-sm">
                Logout
            </a>
                
        <?php else: ?>

            <a href="/login" class="btn btn-outline-light btn-sm me-2">
                Login
            </a>

            <a href="/register" class="btn btn-primary btn-sm">
                Register
            </a>

        <?php endif; ?>

    </div>

</nav>

<?php if ($success = Session::getFlash('success')): ?>

    <div class="alert alert-success flash-message">
        <?= $success ?>
        <button onclick="this.parentElement.remove()">×</button>
    </div>

<?php endif; ?>

<?php if ($error = Session::getFlash('error')): ?>

    <div class="alert alert-danger flash-message">
        <?= $error ?>
        <button onclick="this.parentElement.remove()">×</button>
    </div>

<?php endif; ?>

<div class="container mt-4">

    <?= $content ?? '' ?>

</div>

<script>
    setTimeout(() => {
        document.querySelectorAll('.flash-message').forEach(el => el.remove());
    }, 3000);
</script>

</body>
</html>