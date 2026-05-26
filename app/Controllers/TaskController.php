<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\View;
use App\Models\Task;

error_reporting(E_ALL);


class TaskController
{
    public function index()
    {
        Auth::requireAuth();

        $status = $_GET['status'] ?? null;

        $tasks = Task::allByUser($_SESSION['user_id'], $status);

        if(empty($tasks)) {
            View::render('tasks/index', [
                'message' => 'No tasks found.',
                'currentStatus' => $status,
            ]);
            return;
        }

        View::render('tasks/index', [
            'tasks' => $tasks,
            'message' => null,
            'currentStatus' => $status
        ]);

    }

    public function create()
    {
        Auth::requireAuth();

        View::render('tasks/create');
    }

    public function store()
    {
        Auth::requireAuth();

        \App\Core\Csrf::verify();

        $db = \App\Core\Database::connect();

        if (empty($_POST['name'])) {

            \App\Core\Session::flash(
                'error',
                'Task name is required'
            );

            header('Location: /tasks/create');
            exit;
        }
        

        $name = $_POST['name'] ?? '';
        $due_date = $_POST['due_date'] ?? '';
        $status = $_POST['status'] ?? 'pending';

        $stmt = $db->prepare("INSERT INTO tasks (user_id, name, due_date, status)
        VALUES (?,?,?,?) ");

        $stmt->execute([
            $_SESSION['user_id'],
            $name,
            $due_date,
            $status
        ]);

        \App\Core\Session::flash(
            'success',
            'Task created successfully'
        );

        header('Location: /tasks');
        exit;
    }

    public function edit()
    {
        Auth::requireAuth();

        $id = $_GET['id'] ?? null;
        if(!$id) {
            header('Location: /tasks');
            exit;
        }

        $task = Task::findById($id, $_SESSION['user_id']);
        if(!$task) {
            header('Location: /tasks');
            exit;
        }

        View::render('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update()
    {
        Auth::requireAuth();
        
        \App\Core\Csrf::verify();
        
        $db = \App\Core\Database::connect();

        $stmt = $db->prepare("
            UPDATE tasks
            SET
                name = ?,
                due_date = ?,
                status = ?
            WHERE id = ?
            AND user_id = ?
        ");

        $stmt->execute([
            $_POST['name'],
            $_POST['due_date'],
            $_POST['status'],
            $_GET['id'],
            Auth::userId()
        ]);

        \App\Core\Session::flash(
            'success',
            'Task updated successfully'
        );

        header('Location: /tasks');

        exit;
    }

    public function delete()
    {
        Auth::requireAuth();
        \App\Core\Csrf::verify();

        $db = \App\Core\Database::connect();

        $stmp_bkup = $db->prepare("INSERT INTO tasks_delete_bkup SELECT * FROM tasks WHERE id = ? AND user_id = ?");

        $stmp_bkup->execute([
            $_POST['id'],
            Auth::userId()
        ]);


        $stmt = $db->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([
            $_POST['id'],
            Auth::userId()
        ]);

        \App\Core\Session::flash(
            'success',
            'Task deleted successfully'
        );

        header('Location: /tasks');
        exit;

    }
}