<?php

/** @var array $task */
use \App\Core\Csrf;

?>

<h2>Edit Task</h2>

<div class="card shadow-sm">
<div class="card-body">

    <form method="POST" action="/tasks/update?id=<?= $task['id'] ?>">
        <input type="hidden" name="_token" value="<?= Csrf::token() ?>">

        <div class="mb-3">

            <label>Task Name</label>

            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($task['name']) ?>" required >

        </div>

        <div class="mb-3">

            <label>Due Date</label>

            <input type="date" name="due_date" class="form-control" value="<?= $task['due_date'] ?>" required >

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option
                    value="pending"
                    <?= $task['status'] === 'pending' ? 'selected' : '' ?>
                >
                    Pending
                </option>

                <option
                    value="completed"
                    <?= $task['status'] === 'completed' ? 'selected' : '' ?>
                >
                    Completed
                </option>

            </select>

        </div>

        <button class="btn btn-primary">
            Update Task
        </button>

    </form>
</div>
</div>