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
            die('Invalid email or password');
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];

        header('Location: /');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function register()
    {
        View::render('auth/register');
    }
}

?>