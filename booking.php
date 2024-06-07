<?php
session_start();
$loggedIn = isset($_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amusement Park Booking</title>
    <link href="static/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <Style>
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

    .ticket-selection {
        padding: 20px;
        background-color: #333;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .select-button {
        float: right;
        padding: 10px 20px;
        background-color: #F2E908;
        color: #6A4B8F;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .ticket-details.hidden,
    .ticket-table.hidden,
    .total-amount.hidden,
    .proceed-button.hidden {
        display: none;
    }

    .ticket-table {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ticket-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticket-name, .ticket-price, .ticket-quantity, .ticket-total {
        flex: 1;
        text-align: center;
        color: #fff;
    }

    .ticket-quantity {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .ticket-quantity button {
        background-color: #F2E908;
        color: #6A4B8F;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .total-amount {
        margin-top: 10px;
        text-align: right;
        font-size: 18px;
        color: #fff;
    }

    .proceed-button {
        float: right;
        padding: 10px 20px;
        background-color: #F2E908;
        color: #6A4B8F;
        border: none;
        border-radius: 5px;
        cursor: pointer;
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
    </Style>
</head>
<body>
    <?php include 'header.html'; ?>
    
    <div class="main-container">
        <div class="step-indicator">
            <div class="step active">Step 1: Choose your Tickets</div>
            <div class="step">Step 2: Review & Payment</div>
            <div class="step">Step 3: Complete</div>
        </div>

        <div class="ticket-selection">
            <p>Choose your tickets and select a date:</p>
            <p>Important: Please select the date for your visit.</p>
            <button class="select-button">SELECT</button>
            
            <div class="ticket-details hidden">
                <label for="select-date">SELECT A DATE</label>
                <input type="date" id="select-date" min="<?php echo date('Y-m-d'); ?>">

                <div class="ticket-table hidden">
                    <form id="bookingForm" action="revNpay.php" method="post">
                            <div class="ticket-row">
                                <div class="ticket-name">STUDENT TICKET
                                    <div class-="role">EXCLUSIVE!</div>
                                    <div class ="description">This promo is open to all students with most recent valid ID.</div>
                                </div>
                                <div class="ticket-price">₱980</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                            
                            <div class="ticket-row">
                                <div class="ticket-name">REGULAR DAY TICKET
                                    <div class ="description">Enjoy unlimited use of the Park’s rides (except for restriction of rides.)</div>
                                </div>
                                <div class="ticket-price">₱1200</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                            
                            <div class="ticket-row">
                                <div class="ticket-name">ALL DAY TICKET
                                    <div class ="description">Access to all rides. This pass allows priority access to favorite rides.</div>
                                </div>
                                <div class="ticket-price">₱2200</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                            <!-- Repeat for other tickets -->
                        </div>
                    </form>
                <div class="total-amount hidden">Total: ₱0</div>
                <button class="proceed-button hidden">PROCEED</button>
            </div>
        </div>
    </div>

    <div class="modal hidden">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Order Confirmation</h2>
            <p>Please confirm your Booking details Below.</p>
            <p>Date of Visit: <span id="modal-date"></span></p>
            <p>Tickets:</p>
            <div id="modal-tickets"></div>
            <p>TOTAL: <span id="modal-total"></span></p>
            <p>*You will not be charged yet. Click continue to proceed with payment.</p>
            <button class="back-button">BACK</button>
            <button class="continue-button">CONTINUE</button>
        </div>
    </div>

    <script>
        var loggedIn = <?php echo $loggedIn ? "true" : "false"; ?>;
    </script>
     <script src="static/js/script.js"></script>
</body>
</html>
