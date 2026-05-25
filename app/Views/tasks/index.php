<?php
/**
 * @var string|null $message
 */

?>

<div class="d-flex justify-content-between mb-3">

    <h2>My Tasks</h2>

    <a href="/tasks/create" class="btn btn-primary">
        Create Task
    </a>

</div>

<?php if(empty($tasks)): ?>
    <tr>
        <td colspan="4" class="text-center">
            <?= $message ?>
        </td>
    </tr>

<?php else: ?>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Name</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

                <?php foreach ($tasks as $task): ?>

                <tr>

                    <td><?= htmlspecialchars($task['name']) ?></td>

                    <td><?= $task['due_date'] ?></td>

                    <td><?= ucfirst($task['status']) ?></td>

                    <td>

                        <a href="/tasks/edit?id=<?= $task['id'] ?>"
                        class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="/tasks/delete?id=<?= $task['id'] ?>"
                        class="btn btn-sm btn-danger">
                            Delete
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>