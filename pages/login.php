<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | Login</title>
    <link rel="stylesheet" href="../css/login_style.css">
    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>



    <section class="login_bg d-flex align-items-center justify-content-center vh-100 p-2">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-8 col-12">
                    <div class="card p-4">
                        <div class="text-center">
                            <h1 class="fw-bolder"><span class="text-danger">Serv</span><span class="text-primary">ify</span></h1>
                            <h3>Welcome Back!</h3>

                            <div class="d-flex flex-column">
                                <span class="text-muted">Glad to see you again</span>
                                <span class="text-muted">Login to your account below.</span>
                            </div>
                        </div>
                        <form id="loginForm" action="/login/submit" method="POST" class="row mt-5">


                            <div class="mb-3">
                                <div class="validation text-danger text-center"></div>
                                <script src="../js/login.js"></script>

                                <label for="email" class="form-label visually-hidden">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill text-primary"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="current-password" class="form-label visually-hidden">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    <span class="input-group-text toggle-password" style="cursor: pointer;">
                                        <i class="fas fa-eye text-primary"></i>
                                    </span>
                                    <div class="invalid-feedback">
                                        Please input current password.
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <div class="ms-1">
                                    <input type="checkbox" name="remember_me" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                                <a href="#" class="text-decoration-none text-end pe-1">Forgot Password</a>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" id="login-button" class="btn btn-primary px-5">Sign in</button>
                            </div>
                        </form>

                        <div class="my-3 text-center form">
                            <p>Don't have an account? <a href="/signup" class="text-danger text-decoration-none">Sign Up!</a></p>
                        </div>

                        <div class="">
                            <img src="../img/HANDS.png" alt="Hands" class="img-fluid loginHands">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>



    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function() {
                const input = this.previousElementSibling; // Selects the input field
                const icon = this.querySelector('i'); // Selects the eye icon

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        });

        // REMEMBER ME FUNCTIONALITY
        document.addEventListener("DOMContentLoaded", function() {
            const emailField = document.getElementById("email");
            const passwordField = document.getElementById("password");
            const rememberMeCheckbox = document.getElementById("remember_me");

            // Load saved email & password if 'remember_me' was checked before
            if (localStorage.getItem("rememberMe") === "true") {
                emailField.value = localStorage.getItem("email") || "";
                passwordField.value = atob(localStorage.getItem("password") || ""); // Decode password
                rememberMeCheckbox.checked = true;
            }

            document.getElementById("loginForm").addEventListener("submit", function(event) {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem("rememberMe", "true");
                    localStorage.setItem("email", emailField.value);
                    localStorage.setItem("password", btoa(passwordField.value)); // Encode password
                } else {
                    localStorage.removeItem("rememberMe");
                    localStorage.removeItem("email");
                    localStorage.removeItem("password");
                }
            });
        });
    </script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>