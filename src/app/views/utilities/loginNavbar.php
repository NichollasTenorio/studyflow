<style>
    .navbar-custom {
        background-color: #0d1117 !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        padding: 0 1.5rem;
        height: 54px;
    }

    /* Brand */
    .navbar-custom .navbar-brand {
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .navbar-custom .navbar-brand::before {
        content: '';
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #378ADD;
        display: inline-block;
        flex-shrink: 0;
    }

    /* Links */
    .navbar-custom .nav-link {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.5) !important;
        padding: 5px 10px !important;
        border-radius: 6px;
        transition: background 0.15s, color 0.15s;
    }
    .navbar-custom .nav-link:hover {
        background: rgba(255, 255, 255, 0.07);
        color: #fff !important;
    }

    /* Dropdown do usuário */
    .navbar-custom .user-dropdown-btn {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.7);
        font-size: 13px;
        padding: 4px 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: border-color 0.15s, background 0.15s, color 0.15s;
    }
    .navbar-custom .user-dropdown-btn:hover,
    .navbar-custom .user-dropdown-btn:focus,
    .navbar-custom .user-dropdown-btn.show {
        background: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.2) !important;
        color: #fff !important;
        box-shadow: none !important;
    }
    .navbar-custom .user-avatar {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: #185FA5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        color: #fff;
        flex-shrink: 0;
    }

    /* Dropdown menu */
    .navbar-custom .dropdown-menu {
        background: #161b22;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 6px;
        min-width: 160px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    }
    .navbar-custom .dropdown-item {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.65);
        border-radius: 6px;
        padding: 7px 10px;
        transition: background 0.15s, color 0.15s;
    }
    .navbar-custom .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.07);
        color: #fff;
    }
    .navbar-custom .dropdown-item.text-danger {
        color: #f47067 !important;
    }
    .navbar-custom .dropdown-item.text-danger:hover {
        background: rgba(244, 112, 103, 0.1);
        color: #f47067 !important;
    }

    /* Modal */
    .modal-content {
        background: #161b22;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 14px;
    }
    .modal-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        padding: 1.1rem 1.5rem;
    }
    .modal-title {
        font-size: 15px;
        font-weight: 600;
    }
    .modal-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.07);
        padding: 0.9rem 1.5rem;
        gap: 8px;
    }
    .modal-body .form-label {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 6px;
    }
    .modal-body .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        font-size: 14px;
        transition: border-color 0.15s;
    }
    .modal-body .form-control:focus {
        background: rgba(255, 255, 255, 0.07);
        border-color: #378ADD;
        box-shadow: 0 0 0 3px rgba(55, 138, 221, 0.15);
        color: #fff;
    }
    .modal-body .form-control::placeholder {
        color: rgba(255, 255, 255, 0.25);
    }
    .btn-modal-close {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.65);
        border-radius: 7px;
        font-size: 13px;
        padding: 6px 14px;
        transition: background 0.15s;
    }
    .btn-modal-close:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    .btn-modal-submit {
        background: #185FA5;
        border: none;
        color: #fff;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 500;
        padding: 6px 16px;
        transition: background 0.15s;
    }
    .btn-modal-submit:hover {
        background: #378ADD;
        color: #fff;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/teste/dashboard">StudyFlow</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
              <a class="nav-link" href="/teste/login">Login</a>
              <a class="nav-link" href="/teste/signup">Signup</a>
            </ul>
        </div>
    </div>
</nav>
