<?php

namespace app\controllers;

use app\models\NoteModel;

class DashboardController
{
    private NoteModel $model;

    public function __construct()
    {
        $this->model = new NoteModel();
    }

    public function index()
    {
        $notes = $this->model->getAllByUser($_SESSION['user']['userID']);
        $counts = $this->model->countNotes();
        require_once __DIR__ . "/../views/dashboard.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $noteTitle   = $_POST['noteTitle'];
            $noteContent = $_POST['noteContent'];
            $noteUserID  = $_SESSION['user']['userID'];

            $note = $this->model->store($noteTitle, $noteContent, $noteUserID);

            if ($note) {
                header('Location: /teste/dashboard');
            }
        }
    }

    public function completeNote($id)
    {
        $userID = $_SESSION['user']['userID'];

        $updated = $this->model->updateStatus($id, $userID, 'completed');

        if ($updated) {
            header('Location: /teste/dashboard');
        }
    }

    public function revertNote($id)
    {
        $userID = $_SESSION['user']['userID'];

        $reverted = $this->model->updateStatus($id, $userID, 'pending');

        if ($reverted) {
            header('Location: /teste/dashboard');
        }
    }

    public function deleteNote($id)
    {
        $userID = $_SESSION['user']['userID'];

        $deleted = $this->model->delete($id, $userID);

        if ($deleted) {
            header('Location: /teste/dashboard');
        }
    }
}
