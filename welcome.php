<?php
session_start();
$loggedIn = isset($_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>

<?php include "header.html"; ?>

<section class="main-container">
    <div class="phrase-container">
        <span class="bold-text">MOMENTS ARE</span>
        <span class="bold-text highlight-text1">BETTER</span>
        <br />
        <span class="bold-text">SHARED WITH THE PEOPLE</span>
        <br />
        <span class="bold-text highlight-text2">YOU LOVE.</span>
    </div>
    <div class="actions-container">
        <div class="inner">
            <button onclick="redirectToLogin()" type="button" class="login-button">Login</button>
            <button onclick="redirectToSignup()" type="button" class="signup-button">Signup</button>
        </div>
    </div>
</section>

<script>
    // Set a JavaScript variable to indicate whether the user is logged in or not
    var loggedIn = <?php echo $loggedIn ? "true" : "false"; ?>;
</script>
<script src="static/js/Wel_redirect.js"></script>
  </body>
</html>
