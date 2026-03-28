<?php
require_once __DIR__ . "/utilities/loginNavbar.php";
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto bg-body-tertiary mt-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                    <h2 class="" style="line-height: 1;">Register</h2>
                    <i class="fa-solid fa-list-check" style="font-size: 1.5rem; line-height: 1;"></i>
                </div>
                <form action="/teste/signup" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="text-center">
                        <a href="/teste/login">Already have an account? Log in.</a>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once __DIR__ . "/utilities/footer.php";
