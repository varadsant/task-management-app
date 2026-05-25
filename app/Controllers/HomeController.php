<?php 

namespace App\Controllers;
use App\Core\View;
use App\Core\Auth;

class HomeController
{
    public function index()
    {

        Auth::requireAuth();

        View::render('home/index', [
            'title_name' => 'Welcome to Dedalus Task Management App',
        ]);
    }
}

?>