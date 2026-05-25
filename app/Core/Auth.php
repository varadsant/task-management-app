<?php

namespace App\Core;

class Auth
{
    public static function check()
    {
        return isset($_SESSION['user_id']);
    }

    public static function userID()
    {
        return $_SESSION['user_id'] ?? null;
    }

    public static function userName()
    {
        return $_SESSION['user_name'] ?? null;
    }

    public static function requireAuth()
    {
        if(!self::check()){
            header('Location: /login');
            exit;
        }
    }

    public static function logout()
    {
        session_destroy();
    }


}