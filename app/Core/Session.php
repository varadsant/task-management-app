<?php

namespace App\Core;

class Session
{
    public static function flash($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlash($key)
    {
        if (!isset($_SESSION['flash'][$key])) {
            return null;
        }

        $message = $_SESSION['flash'][$key];

        unset($_SESSION['flash'][$key]);

        return $message;
    }
}