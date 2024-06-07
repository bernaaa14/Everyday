<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$tickets = isset($_SESSION['tickets']) ? $_SESSION['tickets'] : [];
$dateOfVisit = isset($_SESSION['dateOfVisit']) ? $_SESSION['dateOfVisit'] : '';

function formatDate($date) {
    return date('l, F j, Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review & Payment</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .review-payment {
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .review-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #fff;
        }

        .review-table th, .review-table td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: center;
        }

        .total-amount {
            margin-top: 10px;
            text-align: right;
            font-size: 18px;
            color: #fff;
        }

        .guest-details {
            margin-top: 20px;
            color: #fff;
        }

        .nav-container {
            margin-top: 20px;
        }

        .guest-nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            background-color: #6A4B8F;
            border-radius: 10px;
        }

        .guest-nav li {
            margin: 10px;
        }

        .guest-nav a {
            color: #fff;
            text-decoration: none;
        }

        .guest-form-container {
            margin-top: 20px;
        }

        .guest-form {
            display: none;
        }

        .guest-form.active {
            display: block;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.5s;
        }

        .modal-content {
            background: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 400px;
            max-width: 90%;
        }

        .modal .close-button,
        .modal .back-button,
        .modal .continue-button {
            background-color: #F2E908;
            color: #6A4B8F;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal .close-button {
            float: right;
        }

        .modal.hidden {
            visibility: hidden;
            opacity: 0;
        }

        .modal:not(.hidden) {
            visibility: visible;
            opacity: 1;
        }

        .buttons {
            margin-top: 20px;
            text-align: center;
        }

        .buttons button {
            padding: 10px 20px;
            background-color: #F2E908;
            color: #6A4B8F;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        .buttons button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<?php include "header.html"; ?>

<section class="main-container">
    <div class="step-indicator">
        <div class="step">Step 1: Choose your Tickets</div>
        <div class="step active">Step 2: Review</div>
        <div class="step">Step 3: Complete</div>
    </div>

    <div class="review-payment">
    <h2>Review Your Order</h2>
    <table class="review-table">
        <thead>
            <tr>
                <th>Ticket Name</th>
                <th>Unit Price / Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalAmount = 0;
            foreach ($tickets as $ticket) {
                $subtotal = $ticket['price'] * $ticket['quantity'];
                $totalAmount += $subtotal;
                echo "<tr>";
                echo "<td>{$ticket['name']}</td>";
                echo "<td>₱{$ticket['price']} x {$ticket['quantity']}</td>";
                echo "<td>₱{$subtotal}</td>";
                echo "</tr>";
            }
           ?>
        </tbody>
    </table>
    <div class="total-amount">TOTAL AMOUNT: ₱<?php echo $totalAmount;?></div>

    <h2>Guest Details</h2>
    <div>Booking Date: <?php echo formatDate($dateOfVisit);?></div>

    <div class="guest-details">
        <div class="nav-container">
            <nav class="guest-nav">
                <ul>
                    <?php
                    $guestCount = 0;
                    foreach ($tickets as $ticket) {
                        for ($i = 1; $i <= $ticket['quantity']; $i++) {
                            $guestCount++;
                            echo "<li><a href=\"#guest$guestCount\">Guest $guestCount</a></li>";
                        }
                    }
                   ?>
                </ul>
            </nav>
        </div>

        <div class="guest-form-container">
            <?php
            $guestCount = 0;
            foreach ($tickets as $ticket) {
                for ($i = 1; $i <= $ticket['quantity']; $i++) {
                    $guestCount++;
                    echo "<div id=\"guest$guestCount\" class=\"guest-form\">";
                    echo "<h3>Selected Ticket For Guest $guestCount</h3>";
                    echo "<p>{$ticket['name']}</p>";
                    echo "<p>Note: Please make sure that you enter the name exactly as it shown on your valid ID</p>";
                    echo "<label for=\"firstName$guestCount\">First Name:</label>";
                    echo "<input type=\"text\" id=\"firstName$guestCount\" name=\"firstName$guestCount\" required>";
                    echo "<label for=\"lastName$guestCount\">Last Name:</label>";
                    echo "<input type=\"text\" id=\"lastName$guestCount\" name=\"lastName$guestCount\" required>";
                    echo "</div>";
                }
            }
           ?>
            </div>

        </div>

        <h2>How to use your ticket</h2>
        <p>Instructions on how to use the ticket...</p>

        <h2>Friendly reminders</h2>
        <ul>
            <li>Reminder 1</li>
            <li>Reminder 2</li>
            <li>Reminder 3</li>
        </ul>

        <h2>Payment Option</h2>
        <label><input type="radio" name="paymentOption" value="Credit Card"> Credit Card</label><br>
        <label><input type="radio" name="paymentOption" value="GCASH"> GCASH</label><br>
        <label><input type="radio" name="paymentOption" value="PAYPAL"> PAYPAL</label><br><br>

        <label><input type="checkbox" id="terms" name="terms"> I have read and agree to the terms and conditions.</label>

        <div class="buttons">
            <button id="cancel-button" type="button">Cancel</button>
            <button id="place-order-button" type="button" disabled>Place Order</button>
        </div>
    </div>

    <div class="modal hidden">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Important Reminder</h2>
            <p>You are now leaving Enchanted Kingdom's online store and will be redirected to our partner payment gateway.</p>
            <p>Kindly wait for a few seconds...</p>
            <button class="back-button">Go Back</button>
            <button class="continue-button">Continue</button>
        </div>
    </div>
</section>
<script src="static/js/rev.js"></script>

</body>
</html>
