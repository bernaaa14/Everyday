<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>Login</h2>
                        </div>
                        <div class="card-body">
                            <form action="Log_validate.php" method="post" target="_self">
                                <div class="form-group">
                                    <label for="username" style="color: green;">Username:</label>
                                    <input type="text" id="username" name="username" class="form-control custom-border" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" style="color: green;">Password:</label>
                                    <input type="password" id="password" name="password"  class="form-control custom-border" required>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" aria-label="Remember me">
                                    <label class="form-check-label" for="remember"style="color: green;">Remember me</label>
                                </div>

                                <button type="submit" class="btn btn-success" name="login">Login</button>
                                <p class="mt-3" style="color: green;">Don't have an account? <a href="Sign.php">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
