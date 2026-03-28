<?php require_once __DIR__ . "/utilities/navbar.php"; ?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-left mt-4">
            <h3 class="mb-4">Olá <?= $_SESSION['user']['userName']; ?></h3>
            <!-- Card 1 -->
            <div class="col-12 col-md-4">
                <div class="card-body py-4 bg-primary text-white shadow p-3 mb-4 rounded">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa-solid fa-pencil"></i>
                        <h6 class="fw-bold mb-0">Notas Escritas</h6>
                    </div>
                    <p class="fw-bold mb-2"><?= $counts['writingsNotes']; ?></p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body py-4 bg-warning text-white rounded">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-hourglass-half"></i>
                            <h6 class="fw-bold mb-0">Notas Pendentes</h6>
                        </div>
                        <p class="fw-bold mb-2"><?= $counts['pendingNotes']; ?></p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body py-4 bg-success text-white rounded">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-circle-check"></i>
                            <h6 class="fw-bold mb-0">Notas Concluídas</h6>
                        </div>
                        <p class="fw-bold mb-2"><?= $counts['completedNotes']; ?></p>
                    </div>
                </div>
            </div>
            <h3>Entrada</h3>

            <?php foreach ($notes as $note): ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $note->getNoteTitle() ?></h5>
                        <p class="card-text"><?= $note->getNoteContent() ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</body>

</html>
<?php require_once __DIR__ . "/utilities/footer.php"; ?>