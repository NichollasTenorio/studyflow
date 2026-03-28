<?php
namespace app\entities;

class NoteEntity
{
    public function __construct(
        private string $noteTitle,
        private string $noteContent,
        private string $role,
        private int $user_ID
    )
    {}

    public function getNoteContent()
    {
        return $this->noteContent;
    }
    public function getNoteTitle()
    {
        return $this->noteTitle;
    }
    public function getuser_ID()
    {
        return $this->user_ID;
    }
    public function getrole()
    {
        return $this->role;
    }

}