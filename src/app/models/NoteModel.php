<?php

namespace app\models;

use core\database\Database;
use app\entities\NoteEntity;

class NoteModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::run();
    }

    public function store(string $noteTitle, string $noteContent, int $noteUserID): bool
    {
        $stmt = $this->db->prepare("INSERT INTO notes (noteTitle, noteContent, user_ID) VALUES (:noteTitle, :noteContent, :user_ID)");

        $stmt->execute([
            ':noteTitle' => $noteTitle,
            ':noteContent' => $noteContent,
            ':user_ID' => $noteUserID
        ]);

        return true;
    }

    public function countNotes()
    {
        $stmt = $this->db->prepare("
            SELECT 
                COUNT(*) AS writingsNotes,
                SUM(role = 'pending') AS pendingNotes,
                SUM(role = 'completed') AS completedNotes
            FROM notes
            WHERE user_ID = :id
        ");

        $stmt->execute([
            ':id' => $_SESSION['user']['userID']
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllByUser(int $userID)
    {
        $stmt = $this->db->prepare("
        SELECT noteTitle, noteContent, role, user_ID 
        FROM notes 
        WHERE user_ID = :id");
        $stmt->execute([
            ':id' => $userID
        ]);

        $notes = $stmt->fetchAll(\PDO::FETCH_FUNC, function ($title, $content, $role, $userID) {
            return new NoteEntity($title, $content, $role, (int)$userID);
        });

        return $notes;

    }
}
