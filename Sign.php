<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
       .card-header,.card-body {
            border: 3px solid #08842c;
            border-radius: 0.25rem;
            background-color: #f0ecec;
            color: #08842c;
        }
        .custom-border {
            border: 1px solid #08842c;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="text-center">Sign up</h2>
            </div>
            <div class="card-body">
                <form action="Sign_validate.php" method="post">
                    <!-- Sign up form -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control custom-border" required>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control custom-border" required>
                        </div>
                        <div class="col">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control custom-border" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control custom-border" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control custom-border" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control custom-border" required>
                    </div>
                    <input type="submit" value="Sign up" class="btn btn-success btn-block">
                    <p class="text-center mt-3">Already have an account? <a href="Log.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>