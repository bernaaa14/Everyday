<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        padding: 0 40px;
      }

      .highlight-text {
        color: rgba(242, 233, 8, 1);
      }

      .bold-text {
        font-weight: 700;
      }

      .phrase-container {
        color: #ffffff;
        text-transform: uppercase;
        width: 100%;
        font: 40px 'Roboto Mono', sans-serif;
        margin-top: 80px;
        margin-left: 30px;
      }

      @media (max-width: 991px) {
        .phrase-container {
          max-width: 100%;
          font-size: 40px;
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

      .color {
        color: #6A4B8F;
        font-size: 40px;
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
        <a href="#account">View Account</a>
      </nav>
    </header>
    <section class="main-container">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="display: flex; flex-direction: column; align-items: flex-start;">
          <div class="phrase-container">
            <span>Hello,</span>
            <span class="color">user</span>
          </div>
        </div>
        <div style="display: flex; flex-direction: column; align-items: flex-end;">
          <div style="margin-top: 30px;">
            <span style="font-family: 'Roboto Mono', sans-serif; color: #6A4B8F; font-weight: 700; font-size: 40px;">Points: 1000</span>
          </div>
          <div style="margin-top: 20px;">
            <span style="font-family: 'Roboto Mono', sans-serif; color: #F2E908; font-weight: 700; font-size: 30px;">Refill points</span>
          </div>
        </div>
      </div>
    </section>
    
    <section>
      <div style="border-radius: 40px; background-color: #1d1d1d; padding: 50px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); margin: 675px;">
        <div class="div-2">
          <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300 300w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=500 500w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=600 600w" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300" class="img" style="width: 300px; height: auto;">
        </div>
        <div class="div-3">
          <br>
          <div class="div-4" style="font-family: 'Blooming Elegant Sans', sans-serif; font-weight: 700; font-size: 22px;">All day pass P600</div>
          <Br>
          <div class="div-5" style="font-family: 'Orev SemiLight', sans-serif; font-size: 20px;"> Inclusive of admission and unlimited use of the<br />  Park's major and kiddie rides </div>
          <Br>
          <button class="div-6" style="
            background-color: #F2E908;
            color: #6A4B8F;
            border-radius: 24px;
            padding: 9px 37px;
            font: 700 22px Bai Jamjuree, sans-serif;
            margin-left: 190px;
          ">Buy</button>
        </div>
      </div>
      </div>
    </section>
    
    <section>
      <div style="border-radius: 40px; background-color: #1d1d1d; padding: 50px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); margin: 675px;">
        <div class="div-2">
          <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300 300w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=500 500w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=600 600w" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300" class="img" style="width: 300px; height: auto;">
        </div>
        <div class="div-3">
          <<br>
          <div class="div-4" style="font-family: 'Blooming Elegant Sans', sans-serif; font-weight: 700; font-size: 22px;">All day pass P600</div>
          <Br>
          <div class="div-5" style="font-family: 'Orev SemiLight', sans-serif; font-size: 20px;"> Inclusive of admission and unlimited use of the<br />  Park's major and kiddie rides </div>
          <Br>
          <button class="div-6" style="
            background-color: #F2E908;
            color: #6A4B8F;
            border-radius: 24px;
            padding: 9px 37px;
            font: 700 22px Bai Jamjuree, sans-serif;
            margin-left: 190px;
          ">Buy</button>
        </div>
      </div>
      </div>
    </section>
    
    <section>
      <div style="border-radius: 40px; background-color: #1d1d1d; padding: 50px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); margin: 675px;">
        <div class="div-2">
          <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300 300w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=500 500w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=600 600w" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed3b557d784d877cbe8a68f50865649111b70ba538116b4667f7f8e4e5c62cdc?apiKey=3955a215049b45728fdd47b5e4eefa70&width=300" class="img" style="width: 300px; height: auto;">
        </div>
        <div class="div-3">
        <br>
          <div class="div-4" style="font-family: 'Blooming Elegant Sans', sans-serif; font-weight: 700; font-size: 22px;">All day pass P600</div>
          <Br>
          <div class="div-5" style="font-family: 'Orev SemiLight', sans-serif; font-size: 20px;"> Inclusive of admission and unlimited use of the<br />  Park's major and kiddie rides </div>
          <Br>
          <button class="div-6" style="
            background-color: #F2E908;
            color: #6A4B8F;
            border-radius: 24px;
            padding: 9px 37px;
            font: 700 22px Bai Jamjuree, sans-serif;
            margin-left: 190px;
          ">Buy</button>
        </div>
      </div>
      </div>
    </section>
    
    <div style="
    position: fixed;
    right: 20px;
    bottom: 20px;
    display: flex;
    justify-content: flex-end;
  ">
      <button class="diva" type="submit" name="logout" style="
      border-radius: 24px;
      background-color: #f20808;
      color: #fff;
      white-space: nowrap;
      padding: 9px 37px;
      font: 700 22px Bai Jamjuree, sans-serif;
    ">Logout</button>
    </div>
  </body>
</html>