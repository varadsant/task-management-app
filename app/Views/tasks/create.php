<h2>Create Task</h2>

<form method="POST" action="/tasks/store">

    <div class="mb-3">
        <label>Task Name</label>
        <input
            type="text"
            name="name"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input
            type="date"
            name="due_date"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <button class="btn btn-success">
        Save Task
    </button>

</form>