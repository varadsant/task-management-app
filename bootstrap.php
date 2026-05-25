<?php

require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;

session_start();

// var_dump($_SESSION);
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>