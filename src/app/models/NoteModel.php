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
        $stmt = $this->db->prepare("
            INSERT INTO notes (noteTitle, noteContent, user_ID) 
            VALUES (:noteTitle, :noteContent, :user_ID)
        ");

        $stmt->execute([
            ':noteTitle'   => $noteTitle,
            ':noteContent' => $noteContent,
            ':user_ID'     => $noteUserID
        ]);

        return true;
    }

    public function countNotes(): array
    {
        $stmt = $this->db->prepare("
        SELECT 
            COUNT(*) AS writingsNotes,
            COALESCE(SUM(role = 'pending'), 0)   AS pendingNotes,
            COALESCE(SUM(role = 'completed'), 0) AS completedNotes
        FROM notes
        WHERE user_ID = :id
    ");

        $stmt->execute([':id' => $_SESSION['user']['userID']]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllByUser(int $userID): array
    {
        $stmt = $this->db->prepare("
            SELECT ID_notes, noteTitle, noteContent, role, created_at, user_ID 
            FROM notes 
            WHERE user_ID = :id
        ");

        $stmt->execute([':id' => $userID]);

        $notes = $stmt->fetchAll(\PDO::FETCH_FUNC, function ($id, $title, $content, $role, $createdAt, $userID) {
            return new NoteEntity((int)$id, $title, $content, $role, $createdAt, (int)$userID);
        });

        return $notes;
    }

    public function updateStatus(int $id, int $userID, string $status): bool
    {
        $stmt = $this->db->prepare("
            UPDATE notes 
            SET role = :role 
            WHERE ID_notes = :id AND user_ID = :userID
        ");

        return $stmt->execute([
            ':role'   => $status,
            ':id'     => $id,
            ':userID' => $userID,
        ]);
    }

    public function delete(int $id, int $userID): bool
    {
        $stmt = $this->db->prepare("
        DELETE FROM notes 
        WHERE ID_notes = :id AND user_ID = :userID
    ");

        return $stmt->execute([
            ':id'     => $id,
            ':userID' => $userID,
        ]);
    }
}
