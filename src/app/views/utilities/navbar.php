<style>
    .user-icon {
        position: relative;
        top: 1px;
        /* ajuste fino: pode testar 1, 2 ou 3 */
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/teste/dashboard">
            Auth
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/teste/logout">Create</a>
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
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>