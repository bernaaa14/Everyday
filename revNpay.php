<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Retrieve stored session variables
$tickets = isset($_SESSION['tickets']) ? $_SESSION['tickets'] : [];
$totalAmount = isset($_SESSION['totalAmount']) ? $_SESSION['totalAmount'] : 0;
$dateOfVisit = isset($_SESSION['select_date']) ? $_SESSION['select_date'] : '';

function formatDate($date) {
    return date('F j, Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review & Payment</title>
    <link rel="stylesheet" href="static/css/payment.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                // Loop through tickets and display each ticket's details
                if (!empty($tickets)) {
                    foreach ($tickets as $ticket) {
                        if ($ticket['quantity'] > 0) {
                            $subtotal = $ticket['price'] * $ticket['quantity'];
                            echo "<tr>";
                            echo "<td>{$ticket['ticket_name']}</td>";
                            echo "<td>₱{$ticket['price']} x {$ticket['quantity']}</td>";
                            echo "<td>₱{$subtotal}</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='3'>No tickets selected</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="total-amount">TOTAL AMOUNT: ₱<?php echo $totalAmount; ?></div>

        <h2>Guest Details</h2>
        <div>Booking Date: <?php echo $dateOfVisit ? formatDate($dateOfVisit) : 'N/A'; ?></div>

        <div class="guest-details">
            <div class="nav-container">
                <nav class="guest-nav">
                    <ul>
                        <?php
                        // Generate navigation for guest details sections
                        $guestCount = 0;
                        if (!empty($tickets)) {
                            foreach ($tickets as $ticket) {
                                for ($i = 1; $i <= $ticket['quantity']; $i++) {
                                    $guestCount++;
                                    echo "<li><a href=\"#guest$guestCount\">Guest $guestCount</a></li>";
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>

            <div class="guest-form-container">
                <?php
                // Display guest form for each ticket
                $guestCount = 0;
                if (!empty($tickets)) {
                    foreach ($tickets as $ticket) {
                        for ($i = 1; $i <= $ticket['quantity']; $i++) {
                            $guestCount++;
                            echo "<div id=\"guest$guestCount\" class=\"guest-form\">";
                            echo "<h3>Selected Ticket For Guest $guestCount</h3>";
                            echo "<p>{$ticket['ticket_name']}</p>";
                            echo "<p>Note: Please make sure that you enter the name exactly as it shown on your valid ID</p>";
                            echo "<label for=\"firstName$guestCount\">First Name:</label>";
                            echo "<input type=\"text\" id=\"firstName$guestCount\" name=\"firstName$guestCount\" required>";
                            echo "<label for=\"lastName$guestCount\">Last Name:</label>";
                            echo "<input type=\"text\" id=\"lastName$guestCount\" name=\"lastName$guestCount\" required>";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "<p>No guest details to display</p>";
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
            <p>You are now leaving Enchanted Kingdom website to complete your payment.</p>
        </div>
    </div>

    <script>
        // JavaScript to enable/disable place order button based on terms checkbox
        document.getElementById('terms').addEventListener('change', function () {
            document.getElementById('place-order-button').disabled = !this.checked;
        });

        // JavaScript to handle the cancel button
        document.getElementById('cancel-button').addEventListener('click', function () {
            window.location.href = 'cancel.php'; // Redirect to a cancel page
        });

        // JavaScript to handle the place order button
        document.getElementById('place-order-button').addEventListener('click', function () {
            window.location.href = 'place_order.php'; // Redirect to place order page
        });

        // JavaScript to handle the modal
        document.querySelector('.modal .close-button').addEventListener('click', function () {
            document.querySelector('.modal').classList.add('hidden');
        });
    </script>
</section>
</body>
</html>
