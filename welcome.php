<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

      .main-container {
            display: flex;
            flex-direction: column;
            padding: 0 20px;
        }

        .highlight-text {
            color: rgba(242, 233, 8, 1);
        }

        .bold-text {
            font-weight: 700;
        }

        .phrase-container {
            color: #62439f;
            text-transform: uppercase;
            width: 100%;
            font: 400 75px 'Roboto Mono', sans-serif;
            margin-top: 220px;
        }

        @media (max-width: 991px) {
            .phrase-container {
            max-width: 100%;
            font-size: 40px;
            }
        }

        .actions-container {
            align-self: flex-end;
            display: flex;
            margin-top: 156px;
            width: 428px;
            max-width: 100%;
            gap: 20px;
            font-size: 22px;
            color: #6a4b8f;
            font-weight: 700;
            white-space: nowrap;
            justify-content: space-between;
        }

        @media (max-width: 991px) {
            .actions-container {
            flex-wrap: wrap;
            margin-top: 40px;
            white-space: initial;
            }
        }

        .button-primary,
        .button-secondary {
            display: flex;
            justify-content: center;
            border-radius: 24px;
            background-color: #f2e908;
            padding: 9px 38px;
            font-family: 'Bai Jamjuree', sans-serif;
            margin-top: 30px;
            margin-right: 10px;
            color: #6A4B8F;
            font-size: 22px;
            font-weight: 700;
        }

        .button-primary {
            padding: 9px 45px;
        }

        @media (max-width: 991px) {
            .button-primary,
            .button-secondary {
            white-space: initial;
            padding: 0 20px;
            }
        }
    </style>
  </head>
  <body>
    <header class="header">
      <div class="logo-container">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/18c3b6c15c2fd680223c68073a23fc9a0c2b49a28492dadd3dd7c88b88fb0dd8?apiKey=3955a215049b45728fdd47b5e4eefa70&" alt="Brand logo" class="logo">
        <div class="brand-name"> Star</div>
        <div class="brand-name2"> Kingdom</div>
      </div>
      <nav class="nav">
        <a href="#home">Home</a>
        <a href="#explore">Explore</a>
        <a href="#about-us">About Us</a>
        <a href="#book-now">Book Now</a>
      </nav>
    </header>
    <section class="main-container">
      <div class="phrase-container">
        <span class="bold-text">MOMENTS ARE</span>
        <span class="bold-text highlight-text">BETTER</span>
        <br />
        <span class="bold-text">SHARED WITH THE PEOPLE</span>
        <br />
        <span class="bold-text highlight-text">YOU LOVE.</span>
      </div>
      <div class="actions-container">
        <button class="button-primary">Login</button>
        <button class="button-secondary">Signup</button>
      </div>
    </section>
  </body>
</html>