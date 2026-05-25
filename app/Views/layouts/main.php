<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="/">Task Manager</a>
</nav>

<div class="container mt-4">

    <?= $content ?? '' ?>

</div>

</body>
</html>