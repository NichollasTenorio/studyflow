<style>
    .user-icon {
        position: relative;
        top: 1px;
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/teste/dashboard">
            Auth
        </a>
        <but class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </but>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create Note
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Read</a>
                </li>
            </ul>
            <div class="dropdown ms-auto">
                <a class="btn dropdown-toggle align-items-center gap-2"
                    href="#" role="button" data-bs-toggle="dropdown">

                    <i class="fa-solid fa-user user-icon"></i>
                    <?= $_SESSION['user']['userEmail']; ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="/teste/logout">
                            <i class="fa-solid fa-right-from-bracket me-1"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <form action="/teste/storeNote" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog -lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Create Note</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="noteTitle">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea2" name="noteContent" style="height: 150px"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>