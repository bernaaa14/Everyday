<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="static/css/style.css">
  </head>
  <body>
<?php

include 'header.html';

?>
    <section class="showcase">
      <h1>LET'S START A <span class="bold-text highlight-text1">NEW</span><br>
        <span class="bold-text highlight-text2">JOURNEY...</span>
      </h1>
    </section>
    <form class="form">
      <div class="form-field">
        <input type="text" id="username" placeholder="Enter your username" />
      </div>
      <div class="form-field">
        <label for="password">Password must contain:</label>
        <ul>
          <li>At least 8 characters</li>
          <li>At least 1 uppercase letter</li>
          <li>At least 1 special character</li>
        </ul>
        <input type="password" id="password" placeholder="Enter your password" />
      </div>
      <div class="form-field">
        <input type="password" id="reenter-password" placeholder="Re-enter your password" />
      </div>
      <button type="submit" class="signup-button">Signup</button>
    </form>
  </body>
</html>
