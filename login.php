<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        font-family: Arial, sans-serif;
        color: #fff;
        background-color: #222;
        margin: 0;
        padding: 0;
      }

      .header {
        display: flex;
        justify-content: space-between;
        padding: 16px;
        background-color: #222222;
      }

      .logo-container {
        display: flex;
        align-items: center;
      }

      .logo {
        width: 108px;
        background-color: rgba(190, 210, 139, 0.05000000074505806);
        border-radius: 60px;
      }

      .logo img {
        width: 108px;
        border-radius: 60px;
      }

      .brand-name {
        font-size: 48px;
        color: #F2E908;
        font-family: 'Pacifico, cursive';
      }

      .brand-name2 {
        font-size: 48px;
        color: #6A4B8F;
        font-family: 'Pacifico, cursive';
      }

      .nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        background-color: rgba(217, 241, 158, 0.05000000074505806);
        border-radius: 24px;
        padding: 10px;
      }

      .nav a {
        padding: 10px 36px;
        background-color: #1e1e1e;
        color: #fff;
        text-transform: uppercase;
        border-radius: 24px;
        text-decoration: none;
        font-family: 'ba jamjuree';
        font-weight: bold;
      }


      .nav a:hover {
        background-color: #f2e908;
        color: #6a4b8f;
      }

      .book-button {
        padding: 11px 30px;
        background-color: #f2e908;
        color: #6a4b8f;
        border-radius: 24px;
      }

      .showcase {
        text-align: center;
        margin-top: 40px;
        font-family: 'roboto', 'mono';
      }

      .showcase h1 {
        font-size: 40px;
        font-weight: 400;
        font-family: 'roboto', 'mono';
      }

      .showcase h1 span.new {
        color: #f2e908;
        font-family: 'roboto', 'mono';
      }

      .showcase h1 span.highlight {
        color: #6a4b8f;
        font-family: 'roboto', 'mono';
      }

      .form {
        margin-top: 40px;
        padding: 20px;
      }

      .form-field {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
        align-items: center;
        justify-content: center;
        font-family: 'ba jamjuree';
      }

      .form-field label {
        font-weight: 700;
        font-size: 22px;
        margin-bottom: 10px;
      }

      .form-field input {
        height: 67px;
        border-radius: 60px;
        backdrop-filter: blur(17px);
        background-color: rgba(190, 210, 139, 0.05);
        border: none;
        padding: 0 20px;
        font-size: 16px;
      }

      .login-button {
        display: block;
        margin: 40px auto;
        padding: 9px 38px;
        background-color: #f2e908;
        color: #6a4b8f;
        border-radius: 24px;
        font-size: 22px;
        font-weight: 700;
      }

      /* Media Queries */
      @media (max-width: 991px) {
        .header {
          flex-wrap: wrap;
          padding: 10px;
        }

        .showcase h1 {
          font-size: 30px;
          font-family: 'roboto', 'mono';
        }

        .form {
          padding: 10px;
        }
      }
    </style>
  </head>
  <body>
    <header class="header">
      <div class="logo-container">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/18c3b6c15c2fd680223c68073a23fc9a0c2b49a28492dadd3dd7c88b88fb0dd8?apiKey=3955a215049b45728fdd47b5e4eefa70&" alt="Brand logo" class="logo">
        <div class="brand-name"> Star</div>
        <div class="brand-name2">  Kingdom</div>
      </div>
      <nav class="nav">
        <a href="#home">Home</a>
        <a href="#explore">Explore</a>
        <a href="#about-us">About Us</a>
        <a href="#book-now">Book Now</a>
      </nav>
    </header>
    <section class="showcase">
      <h1><span class="new">GLAD</span> TO <span class="highlight">SEE</span> YOU<br>AGAIN
      </h1>
    </section>
    <form class="form">
      <div class="form-field">
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Enter your username" />
      </div>
      <div class="form-field">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" />
      </div>
      <button type="submit" class="login-button">Login</button>
    </form>
  </body>
</html>