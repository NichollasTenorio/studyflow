<?php
namespace app\entities;

class UserEntity
{
    public function __construct(
        private int $userID,
        private string $userEmail,
        private string $userName
    )
    {}

    public function getUserID():int
    {
        return $this->userID;
    }

    public function getUserEmail():string
    {
        return $this->userEmail;
    }

    public function getUserName():string
    {
        return $this->userName;
    }
}