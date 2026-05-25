<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Task
{
    public static function allByUser(int $userId, string $status = null)
    {
        $db = Database::connect();
        $sql = "SELECT * FROM tasks WHERE user_id = ? ";
        if ($status) {
            $sql .= "AND status = '". $status ."'";
        }

        $stmt = $db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id, int $userId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}