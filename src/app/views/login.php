<?php
require_once __DIR__ . "/utilities/loginNavbar.php";
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<style>
    body {
        background-color: #0a0e14 !important;
        background-image: radial-gradient(ellipse 80% 50% at 50% -10%,
                rgba(24, 95, 165, 0.18),
                transparent);
        background-attachment: fixed;
        min-height: 100vh;
    }

    .auth-card {
        background: rgba(255, 255, 255, 0.04) !important;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px !important;
        box-shadow:
            0 0 0 1px rgba(24, 95, 165, 0.15),
            0 20px 60px rgba(0, 0, 0, 0.5),
            0 0 80px rgba(24, 95, 165, 0.06) !important;
        backdrop-filter: blur(12px);
        padding: 2rem 2.25rem !important;
    }

    .auth-title {
        font-size: 1.6rem;
        font-weight: 600;
        letter-spacing: -0.02em;
        color: #e8edf3;
    }

    .auth-icon {
        font-size: 1.4rem;
        color: #4a9eff;
        line-height: 1;
    }

    .form-label {
        font-size: 0.82rem;
        font-weight: 500;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: #8b98a8;
        margin-bottom: 0.4rem;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 10px !important;
        color: #e8edf3 !important;
        padding: 0.65rem 0.9rem;
        font-size: 0.93rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
    }

    .form-control:focus {
        background-color: rgba(74, 158, 255, 0.07) !important;
        border-color: rgba(74, 158, 255, 0.5) !important;
        box-shadow: 0 0 0 3px rgba(74, 158, 255, 0.12) !important;
        outline: none;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.2);
    }

    .form-text {
        font-size: 0.77rem;
        color: #5a6678;
        margin-top: 0.35rem;
    }

    .form-check-input {
        background-color: rgba(255, 255, 255, 0.07);
        border-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #1a6fc4;
        border-color: #1a6fc4;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 3px rgba(74, 158, 255, 0.15);
    }

    .form-check-label {
        font-size: 0.87rem;
        color: #8b98a8;
        cursor: pointer;
    }

    .auth-link {
        font-size: 0.85rem;
        color: #4a9eff;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .auth-link:hover {
        color: #7bbdff;
        text-decoration: underline;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a6fc4, #1458a0) !important;
        border: 1px solid rgba(74, 158, 255, 0.3) !important;
        border-radius: 10px !important;
        font-weight: 600;
        font-size: 0.92rem;
        letter-spacing: 0.02em;
        padding: 0.65rem;
        transition: all 0.2s ease;
        box-shadow: 0 4px 15px rgba(26, 111, 196, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2278d4, #1a6fc4) !important;
        box-shadow: 0 6px 20px rgba(26, 111, 196, 0.45);
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.07), transparent);
        margin: 1.25rem 0;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-4 mx-auto mt-5">
                <div class="auth-card shadow">
                    <div class="d-flex justify-content-center align-items-center gap-2 mb-4">
                        <h2 class="auth-title mb-0">Login</h2>
                        <i class="fa-solid fa-list-check auth-icon"></i>
                    </div>

                    <form action="/teste/login" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="you@example.com" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="••••••••" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>

                        <div class="divider"></div>

                        <div class="text-center mb-3">
                            <a href="/teste/signup" class="auth-link">Don't have an account? Sign up.</a>
                        </div>
                        <div class="d-grid">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once __DIR__ . "/utilities/footer.php";
?>