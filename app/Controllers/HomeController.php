<?php 

namespace App\Controllers;
use App\Core\View;

class HomeController
{
    public function index()
    {

        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        View::render('home/index', [
            'title_name' => 'Welcome to Dedalus Task Management App',
        ]);
    }
}

?>