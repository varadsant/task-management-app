<?php 

/** @var array $user */

?>

<h2>User Profile</h2>

<form method="POST" action="/profile/update?id=<?= $user['id'] ?>">

    <div class="mb-3">
        <label>Name</label>
        <input
            type="text"
            name="name"
            class="form-control"
            value="<?= htmlspecialchars($user['name']) ?>"
            required
        >
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input
            type="email"
            name="email"
            class="form-control"
            value="<?= htmlspecialchars($user['email']) ?>"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>