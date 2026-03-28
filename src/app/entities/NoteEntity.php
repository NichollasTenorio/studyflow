<?php
namespace app\entities;

class NoteEntity
{
    public function __construct(
        private int    $noteID,
        private string $noteTitle,
        private string $noteContent,
        private string $role,
        private string $createdAt,   // <- adicionado
        private int    $user_ID
    ) {}

    public function getNoteID(): int          { return $this->noteID; }
    public function getNoteTitle(): string    { return $this->noteTitle; }
    public function getNoteContent(): string  { return $this->noteContent; }
    public function getNoteStatus(): string   { return $this->role; }
    public function getNoteCreatedAt(): string { return $this->createdAt; } // <- adicionado
    public function getrole(): string         { return $this->role; }
    public function getuser_ID(): int         { return $this->user_ID; }
}