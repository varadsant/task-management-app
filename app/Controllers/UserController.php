<?php

namespace App\Controllers;
use App\Core\Auth;
use App\Core\View;
use App\Models\User;

class UserController
{
    public function index()
    {
        Auth::requireAuth();

        $uid = Auth::userID();

        $userData = User::findById($uid);

        View::render('profile/index', [
            'user' => $userData
        ]);

    }

    public function update()
    {
        Auth::requireAuth();

        $uid = Auth::userID();

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        $database = \App\Core\Database::connect();

        $stmt = $database->prepare("select * from users where email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();

        if($existingUser && $existingUser['id'] != $uid) {
            \App\Core\Session::flash('error', 'Email is already taken by another user.');
            header('Location: /profile');
            exit;
        }

        $stmt = $database->prepare("update users set name = ?, email = ? where id = ?");
        $stmt->execute([
            $name,
            $email,
            $uid
        ]);


        \App\Core\Session::flash('success', 'Profile updated successfully.');
        header('Location: /profile');
        exit;
    }
}