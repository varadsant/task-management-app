<?php
/**
 * @var string|null $message
 * @var string|null $currentStatus
 */

use App\Core\Csrf;

?>

<div class="d-flex justify-content-between mb-3">

    <h2>My Tasks</h2>

    <a href="/tasks/create" class="btn btn-primary">
        Create Task
    </a>

</div>


<form method="GET" action="/tasks" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-control">
                    <option value="">
                        All Tasks
                    </option>
                    <option
                        value="pending"
                        <?= $currentStatus === 'pending' ? 'selected' : '' ?>
                    >
                        Pending
                    </option>
                    <option
                        value="completed"
                        <?= $currentStatus === 'completed' ? 'selected' : '' ?>
                    >
                        Completed
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-secondary">
                    Filter
                </button>
            </div>
        </div>
    </form>


<?php if(empty($tasks)): ?>
    <tr>
        <td colspan="4" class="text-center text-muted py-4">
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

                    <td>
                        <?php if($task['status'] === 'completed'): ?>
                            <span class="badge bg-success">
                                Completed
                            </span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>

                        <a href="/tasks/edit?id=<?= $task['id'] ?>"
                        class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <!-- <a href="/tasks/delete?id=<?= $task['id'] ?>"
                        class="btn btn-sm btn-danger">
                            Delete
                        </a> -->

                        <form method="POST" action="/tasks/delete" style="display:inline;" >

                            <input type="hidden" name="_token" value="<?= Csrf::token() ?>" >

                            <input type="hidden" name="id" value="<?= $task['id'] ?>" >

                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')" >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>