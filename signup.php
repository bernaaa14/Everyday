<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/signup.css">
  </head>
  <body>
    <?php include 'header.html'; ?>
    <section class="showcase">
      <h1>LET'S START A <span class="bold-text highlight-text1">NEW</span><br>
        <span class="bold-text highlight-text2">JOURNEY...</span>
      </h1>
    </section>
    <form action="signup_validate.php" method="post">
      <div class="form-field">
        <input type="text" name="username" id="username" placeholder="Enter your username" required/>
      </div>
      <div class="form-field">
        <input type="email" name="email" id="email" placeholder="Enter your email" required/>
      </div>
      <div class="form-field">
        <label for="password">Password must contain:</label>
        <ul>
          <li>At least 8 characters</li>
          <li>At least 1 uppercase letter</li>
          <li>At least 1 special character</li>
        </ul>
        <div class="form-field">
          <input type="password" name="password" id="password" placeholder="Enter your password" required oninput="checkPasswordStrength()"/>
          <span class="showBtn" id="showBtn">SHOW</span>
        </div>
        <div class="indicator" id="indicator">
          <span class="weak"></span>
          <span class="medium"></span>
          <span class="strong"></span>
        </div>
        <div class="text" id="text"></div>
      </div>
      <div class="form-field">
        <input type="password" name="confirm_password" id="reenter-password" placeholder="Re-enter your password" required oninput="checkPasswordMatch()"/>
        <div class="error-message" id="password-error">Passwords do not match</div>
      </div>
      <button type="submit" class="signup-button">Signup</button>
    </form>
    <script src="static/js/signup.js"></script>
  </body>
</html>

