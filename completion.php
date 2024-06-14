<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Complete</title>
    <link href="static/css/style.css" rel="stylesheet">
    <style>
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .step {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-bottom: 2px solid #6A4B8F;
            color: #fff;
        }

        .step.active {
            border-bottom: 2px solid #F2E908;
        }

        .complete-message {
            text-align: center;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            color: #fff;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }

        .complete-message h2 {
            color: #F2E908;
        }

        .complete-message p {
            margin: 10px 0;
        }

        .my-orders-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #F2E908;
            color: #6A4B8F;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'header.html'; ?>

    <div class="main-container">
        <div class="step-indicator">
            <div class="step">Step 1: Choose your Tickets</div>
            <div class="step">Step 2: Review & Payment</div>
            <div class="step active">Step 3: Complete</div>
        </div>

        <div class="complete-message">
            <h2>Order Complete!</h2>
            <p>Thank you for your purchase. Your order has been completed successfully.</p>
            <p>We have sent a confirmation email to your registered email address with the details of your order.</p>
            <p>You can view your order history by clicking the button below.</p>
            <a class="my-orders-button" href="my_orders.php">My Orders</a>
        </div>
    </div>
</body>
</html>
