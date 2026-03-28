<?php require_once __DIR__ . "/utilities/navbar.php"; ?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>

        body {
            background-color: #0a0e14 !important;
            background-image: radial-gradient(
                ellipse 80% 50% at 50% -10%,
                rgba(24, 95, 165, 0.12),
                transparent
            );
            background-attachment: fixed;
        }

        /* ── Stat Cards ─────────────────────────────────── */
        .stat-card {
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
        }
        .stat-card .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .stat-card .stat-count {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.25rem;
        }
        .stat-card .stat-label {
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            opacity: 0.8;
        }

        /* ── Seções de notas ─────────────────────────────── */
        .notes-section-title {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1rem;
        }
        .notes-section-count {
            font-size: 11px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.4);
            padding: 2px 8px;
            border-radius: 20px;
        }
        .notes-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin: 0.5rem 0 1.5rem;
        }
        .notes-empty {
            border: 1px dashed rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.2);
        }

        /* ── Note Cards ──────────────────────────────────── */
        .notes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 10px;
        }
        .note-card {
            background: #161b22;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            padding: 1rem 1.1rem;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            transition: border-color 0.15s, transform 0.15s;
        }
        .note-card:hover {
            border-color: rgba(255, 255, 255, 0.18);
            transform: translateY(-2px);
        }
        .note-card.accent-pending {
            border-left: 3px solid #854F0B;
        }
        .note-card.accent-done {
            border-left: 3px solid #0F6E56;
            opacity: 0.65;
        }
        .note-card.accent-done .note-title {
            text-decoration: line-through;
            color: rgba(255, 255, 255, 0.4);
        }

        /* ── Área clicável da nota ───────────────────────── */
        .note-clickable {
            cursor: pointer;
            flex: 1;
        }
        .note-clickable:hover .note-title {
            color: #7bbdff;
        }
        .note-title {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            margin: 0;
            transition: color 0.15s;
        }
        .note-text {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.45);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .note-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.2rem;
            gap: 8px;
        }
        .note-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .note-time {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.25);
        }

        /* ── Botão Concluir ──────────────────────────────── */
        .btn-complete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.35);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }
        .btn-complete:hover {
            background: rgba(15, 110, 86, 0.15);
            color: #5DCAA5;
            border-color: rgba(15, 110, 86, 0.3);
        }

        /* ── Botão Desfazer ──────────────────────────────── */
        .btn-revert {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 6px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }
        .btn-revert:hover {
            background: rgba(186, 117, 23, 0.12);
            color: #FAC775;
            border-color: rgba(186, 117, 23, 0.25);
        }

        /* ── Botão Excluir ───────────────────────────────── */
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.25);
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            flex-shrink: 0;
        }
        .btn-delete:hover {
            background: rgba(244, 112, 103, 0.12);
            color: #f47067;
            border-color: rgba(244, 112, 103, 0.3);
        }

        /* ── Modal base ──────────────────────────────────── */
        .modal-content {
            background: #161b22;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
        }
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            padding: 1.1rem 1.5rem;
        }
        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            padding: 0.9rem 1.5rem;
            gap: 8px;
        }
        .btn-modal-cancel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.65);
            border-radius: 7px;
            font-size: 13px;
            padding: 6px 14px;
            transition: background 0.15s;
            cursor: pointer;
        }
        .btn-modal-cancel:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .btn-modal-delete {
            background: rgba(244, 112, 103, 0.15);
            border: 1px solid rgba(244, 112, 103, 0.3);
            color: #f47067;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 500;
            padding: 6px 16px;
            transition: background 0.15s;
            cursor: pointer;
        }
        .btn-modal-delete:hover {
            background: rgba(244, 112, 103, 0.25);
        }

        /* ── Modal de visualização de nota ──────────────── */
        #viewNoteModal .modal-content {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        #viewNoteModal .modal-header {
            padding: 1.25rem 1.5rem 1rem;
        }
        .view-note-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
        }
        .view-note-badge.pending {
            background: rgba(133, 79, 11, 0.2);
            color: #FAC775;
            border: 1px solid rgba(133, 79, 11, 0.35);
        }
        .view-note-badge.completed {
            background: rgba(15, 110, 86, 0.2);
            color: #5DCAA5;
            border: 1px solid rgba(15, 110, 86, 0.35);
        }
        .view-note-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #e8edf3;
            margin: 0;
            line-height: 1.3;
        }
        .view-note-meta {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.25);
        }
        .view-note-body {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.75;
            white-space: pre-wrap;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 10px;
            padding: 1rem 1.1rem;
            margin: 0;
            min-height: 80px;
        }
        .view-note-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-4 py-4">

        <!-- Saudação -->
        <h4 class="mb-4 fw-semibold">
            Olá, <?= htmlspecialchars($_SESSION['user']['userName']); ?> 👋
        </h4>

        <!-- ── Stat Cards ── -->
        <div class="row g-3 mb-5">
            <div class="col-12 col-md-4">
                <div class="stat-card" style="background: #185FA5;">
                    <div class="stat-icon">
                        <i class="fa-solid fa-pencil"></i>
                    </div>
                    <div class="stat-count"><?= $counts['writingsNotes']; ?></div>
                    <div class="stat-label">Notas Escritas</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="stat-card" style="background: #854F0B;">
                    <div class="stat-icon">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div class="stat-count"><?= $counts['pendingNotes']; ?></div>
                    <div class="stat-label">Notas Pendentes</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="stat-card" style="background: #0F6E56;">
                    <div class="stat-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-count"><?= $counts['completedNotes']; ?></div>
                    <div class="stat-label">Notas Concluídas</div>
                </div>
            </div>
        </div>

        <?php
            $pendingNotes   = array_filter($notes, fn($n) => $n->getNoteStatus() === 'pending');
            $completedNotes = array_filter($notes, fn($n) => $n->getNoteStatus() === 'completed');
        ?>

        <!-- ── Notas Pendentes ── -->
        <div class="d-flex align-items-center gap-2 notes-section-title">
            <i class="fa-solid fa-hourglass-half" style="color:#FAC775; font-size:13px;"></i>
            Pendentes
            <span class="notes-section-count"><?= count($pendingNotes); ?></span>
        </div>
        <?php if (empty($pendingNotes)): ?>
            <div class="notes-empty">todas as notas foram concluídas 🎉</div>
        <?php else: ?>
            <div class="notes-grid">
                <?php foreach ($pendingNotes as $note): ?>
                    <div class="note-card accent-pending">
                        <!-- Área clicável -->
                        <div class="note-clickable"
                            data-bs-toggle="modal"
                            data-bs-target="#viewNoteModal"
                            data-note-title="<?= htmlspecialchars($note->getNoteTitle()); ?>"
                            data-note-content="<?= htmlspecialchars($note->getNoteContent()); ?>"
                            data-note-status="pending"
                            data-note-date="<?= date('d/m/Y \à\s H:i', strtotime($note->getNoteCreatedAt())); ?>">
                            <p class="note-title"><?= htmlspecialchars($note->getNoteTitle()); ?></p>
                            <p class="note-text"><?= htmlspecialchars($note->getNoteContent()); ?></p>
                        </div>
                        <div class="note-footer">
                            <span class="note-time">
                                <?= date('d/m/Y H:i', strtotime($note->getNoteCreatedAt())); ?>
                            </span>
                            <div class="note-actions">
                                <!-- Concluir -->
                                <form action="/teste/completeNote/<?= $note->getNoteID(); ?>" method="post" class="m-0">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button type="submit" class="btn-complete">
                                        <i class="fa-solid fa-check" style="font-size:10px;"></i>
                                        Concluir
                                    </button>
                                </form>
                                <!-- Excluir -->
                                <button type="button" class="btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-note-id="<?= $note->getNoteID(); ?>"
                                    data-note-title="<?= htmlspecialchars($note->getNoteTitle()); ?>"
                                    title="Excluir nota">
                                    <i class="fa-solid fa-trash" style="font-size:10px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <hr class="notes-divider">

        <!-- ── Notas Concluídas ── -->
        <div class="d-flex align-items-center gap-2 notes-section-title">
            <i class="fa-solid fa-circle-check" style="color:#5DCAA5; font-size:13px;"></i>
            Concluídas
            <span class="notes-section-count"><?= count($completedNotes); ?></span>
        </div>

        <?php if (empty($completedNotes)): ?>
            <div class="notes-empty">nenhuma nota concluída ainda</div>
        <?php else: ?>
            <div class="notes-grid">
                <?php foreach ($completedNotes as $note): ?>
                    <div class="note-card accent-done">
                        <!-- Área clicável -->
                        <div class="note-clickable"
                            data-bs-toggle="modal"
                            data-bs-target="#viewNoteModal"
                            data-note-title="<?= htmlspecialchars($note->getNoteTitle()); ?>"
                            data-note-content="<?= htmlspecialchars($note->getNoteContent()); ?>"
                            data-note-status="completed"
                            data-note-date="<?= date('d/m/Y \à\s H:i', strtotime($note->getNoteCreatedAt())); ?>">
                            <p class="note-title"><?= htmlspecialchars($note->getNoteTitle()); ?></p>
                            <p class="note-text"><?= htmlspecialchars($note->getNoteContent()); ?></p>
                        </div>
                        <div class="note-footer">
                            <span class="note-time">
                                <?= date('d/m/Y H:i', strtotime($note->getNoteCreatedAt())); ?>
                            </span>
                            <div class="note-actions">
                                <!-- Desfazer -->
                                <form action="/teste/revertNote/<?= $note->getNoteID(); ?>" method="post" class="m-0">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button type="submit" class="btn-revert">
                                        <i class="fa-solid fa-rotate-left" style="font-size:10px;"></i>
                                        Desfazer
                                    </button>
                                </form>
                                <!-- Excluir -->
                                <button type="button" class="btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-note-id="<?= $note->getNoteID(); ?>"
                                    data-note-title="<?= htmlspecialchars($note->getNoteTitle()); ?>"
                                    title="Excluir nota">
                                    <i class="fa-solid fa-trash" style="font-size:10px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <!-- ── Modal de visualização da nota ── -->
    <div class="modal fade" id="viewNoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column gap-2 w-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <span id="viewNoteBadge" class="view-note-badge"></span>
                            <button type="button" class="btn-close btn-close-white opacity-25" data-bs-dismiss="modal" style="font-size: 0.75rem;"></button>
                        </div>
                        <h5 id="viewNoteTitle" class="view-note-title"></h5>
                        <span id="viewNoteDate" class="view-note-meta"></span>
                    </div>
                </div>
                <div class="modal-body" style="padding: 1.25rem 1.5rem;">
                    <pre id="viewNoteContent" class="view-note-body"></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Modal de confirmação de exclusão ── -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title d-flex align-items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation" style="color:#f47067; font-size:14px;"></i>
                        Excluir nota
                    </h6>
                </div>
                <div class="modal-body" style="font-size:13px; color:rgba(255,255,255,0.55); padding: 0.75rem 1.5rem 1.25rem;">
                    Tem certeza que deseja excluir <strong id="deleteNoteTitle" style="color:#fff;"></strong>?
                    Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" action="" method="post" class="m-0">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn-modal-delete">
                            <i class="fa-solid fa-trash" style="font-size:11px;"></i>
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal de visualização da nota
        document.getElementById('viewNoteModal').addEventListener('show.bs.modal', function (e) {
            const trigger  = e.relatedTarget;
            const title    = trigger.getAttribute('data-note-title');
            const content  = trigger.getAttribute('data-note-content');
            const status   = trigger.getAttribute('data-note-status');
            const date     = trigger.getAttribute('data-note-date');

            document.getElementById('viewNoteTitle').textContent   = title;
            document.getElementById('viewNoteContent').textContent = content;
            document.getElementById('viewNoteDate').textContent    = 'Criada em ' + date;

            const badge = document.getElementById('viewNoteBadge');
            if (status === 'pending') {
                badge.className = 'view-note-badge pending';
                badge.innerHTML = '<i class="fa-solid fa-hourglass-half" style="font-size:10px;"></i> Pendente';
            } else {
                badge.className = 'view-note-badge completed';
                badge.innerHTML = '<i class="fa-solid fa-circle-check" style="font-size:10px;"></i> Concluída';
            }
        });

        // Modal de exclusão
        document.getElementById('deleteModal').addEventListener('show.bs.modal', function (e) {
            const btn       = e.relatedTarget;
            const noteID    = btn.getAttribute('data-note-id');
            const noteTitle = btn.getAttribute('data-note-title');

            document.getElementById('deleteNoteTitle').textContent = noteTitle;
            document.getElementById('deleteForm').action = '/teste/deleteNote/' + noteID;
        });
    </script>
</body>
</html>

<?php require_once __DIR__ . "/utilities/footer.php"; ?>