<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'bootstrap.php';
use App\Core\Database;


$db = Database::connect();
var_dump($db);

echo "DB connection successful!";

?>
