<?php
session_start();
require 'db_connection.php';
$loggedIn = isset($_SESSION["username"]); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amusement Park Booking</title>
    <link href="static/css/booking.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'header.html'; ?>
    
    <div class="main-container">
        <div class="step-indicator">
            <div class="step active" id="step1">Step 1: Choose your Tickets</div>
            <div class="step" id ="step2">Step 2: Review & Payment</div>
            <div class="step" id="step3">Step 3: Complete</div>
        </div>

        <div class="ticket-selection">
            <p>Choose your tickets and select a date:</p>
            <p>Important: Please select the date for your visit.</p>
            <button class="select-button">SELECT</button>
            
            <div class="ticket-details hidden">
                <label for="select-date">SELECT A DATE</label>
                <input type="date" id="select-date" min="<?php echo date('Y-m-d'); ?>">

<form id="bookingForm" action="process_booking.php" method="POST">
    <input type="hidden" id="select_date" name="select_date">
    <input type="hidden" id="student_qty_input" name="student_qty">
    <input type="hidden" id="kiddie_qty_input" name="kiddie_qty">
    <input type="hidden" id="all_day_qty_input" name="all_day_qty">
    <input type="hidden" id="senior_qty_input" name="senior_qty">

     <div class="ticket-table hidden">
                            <div class="ticket-row">
                                <div class="ticket-name">STUDENT TICKET
                                    <div class-="role">EXCLUSIVE!</div>
                                    <div class ="description">This promo is open to all students with most recent valid ID.</div>
                                </div>
                                <div class="ticket-price">₱980</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity" id="student_qty">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                            <br>
                            
                            <div class="ticket-row">
                                <div class="ticket-name">KIDDIE TICKET
                                    <div class ="description">Enjoy unlimited use of the Park’s rides (except for restriction of rides.)</div>
                                </div>
                                <div class="ticket-price">₱840</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity"id="kiddie_qty">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                           <br> 
                            <div class="ticket-row">
                                <div class="ticket-name">ALL DAY TICKET
                                    <div class ="description">Access to all rides. This pass allows priority access to favorite rides.</div>
                                </div>
                                <div class="ticket-price">₱2200</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity" id="all_day_qty">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                            <br>
                            <div class="ticket-row">
                                <div class="ticket-name">SENIOR CITIZEN | PWD TICKET
                                    <div class ="description">Applicable upon presentation of valid id upon entering</div>
                                </div>
                                <div class="ticket-price">₱840</div>
                                <div class="ticket-quantity">
                                    <button class="minus">-</button>
                                    <span class="quantity" id="senior_qty">0</span>
                                    <button class="plus">+</button>
                                </div>
                                <div class="ticket-total">₱0</div>
                            </div>
                        </div>

                <div class="total-amount hidden">Total: ₱0</div>
                <button type="button"class="proceed-button hidden">PROCEED</button>
            </div>
        </div>
    </div>
    </form>

    <div class="modal hidden">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Order Confirmation</h2>
            <p>Please confirm your Booking details Below.</p>
            <p>Date of Visit: <span id="modal-date"></span></p>
            <p>Tickets:</p>
            <div id="modal-tickets"></div>
            <br>
            <p>TOTAL: <span id="modal-total"></span></p>
            <p>*You will not be charged yet. Click continue to proceed with payment.</p>
            <button class="back-button">BACK</button>
            <button type="button" class="continue-button">CONTINUE</button>
        </div>
    </div>

    <script>
        var loggedIn = <?php echo $loggedIn ? "true" : "false"; ?>;
    </script>
     <script src="static/js/script.js"></script>
</body>
</html>
