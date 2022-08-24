<?php

namespace App\Models;

use PDO;
use Core\Model;

class Post extends Model
{

    /**
     * Get all the posts as an associative array
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("SELECT id, title, content FROM posts ORDER BY created_at DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
