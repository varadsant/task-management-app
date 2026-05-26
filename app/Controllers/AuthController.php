<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class AuthController
{

    public function showLogin()
    {
        View::render('auth/login');
    }

    public function login()
    {

        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);    

        if(!$user || !password_verify($password, $user['password'])) {
            \App\Core\Session::flash(
                'error',
                'Invalid email or password'
            );
            header('Location: /login');
            exit;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];

        \App\Core\Session::flash(
            'success',
            'Welcome back!'
        );

        header('Location: /');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function showRegister()
    {
        View::render('auth/register');
    }

    public function register()
    {
        \App\Core\Csrf::verify();

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($name) || empty($email) || empty($password))
        {
            \App\Core\Session::flash(
                'error',
                'All fields are required'
            );

            header('Location: /register');
            exit;
        }

        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT id FROM users
            WHERE email = ?
        ");

        $stmt->execute([$email]);

        if ($stmt->fetch()) {

            \App\Core\Session::flash(
                'error',
                'Email already exists'
            );

            header('Location: /register');
            exit;
        }

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $db->prepare("
            INSERT INTO users (
                name,
                email,
                password
            )
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
            $name,
            $email,
            $hashedPassword
        ]);

        $_SESSION['user_id'] = $db->lastInsertId();

        $_SESSION['user_name'] = $name;

        \App\Core\Session::flash(
            'success',
            'Account created successfully'
        );

        header('Location: /tasks');
        exit;
    }
}

?>