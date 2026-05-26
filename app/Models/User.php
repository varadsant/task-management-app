<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class User
{
    public static function findById(int $id)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}