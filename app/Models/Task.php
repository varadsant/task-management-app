<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Task
{
    public static function allByUser(int $userId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY due_date DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}