<?php
session_start();
require 'db_connection.php'; // Ensure this file sets up $conn

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Retrieve account_id from session
$acc_id = $_SESSION['account_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $select_date = $_POST['select_date'];
    $student_qty = (int)$_POST['student_qty'];
    $kiddie_qty = (int)$_POST['kiddie_qty'];
    $all_day_qty = (int)$_POST['all_day_qty'];
    $senior_qty = (int)$_POST['senior_qty'];

    // Prepare statement for inserting into user_ticket table
    $insertUserTicketStmt = $conn->prepare("INSERT INTO user_ticket (ticket_id, account_id, qty, ticket_total_price, visit_date) VALUES (?, ?, ?, ?, ?)");

    // Array to store predefined data from the ticket table
    $tickets = [
        ['ticket_id' => 1, 'ticket_name' => 'STUDENT TICKET', 'price' => 980,'quantity' => $student_qty],  
        ['ticket_id' => 2, 'ticket_name' => 'KIDDIE TICKET', 'price' => 840,'quantity' => $kiddie_qty], 
        ['ticket_id' => 3, 'ticket_name' => 'ALL DAY TICKET', 'price' => 2200,'quantity' => $all_day_qty], 
        ['ticket_id' => 4, 'ticket_name' => 'SENIOR CITIZEN | PWD TICKET', 'price' => 840,'quantity' => $senior_qty], 
    ];

    foreach ($tickets as $ticket) {
        $ticket_id = $ticket['ticket_id'];
        $quantity = $ticket['quantity'];

        if ($quantity > 0) {
            // Retrieve price from ticket table based on ticket_id
            $stmt = $conn->prepare("SELECT price FROM ticket WHERE id = ?");
            $stmt->bind_param("i", $ticket_id);
            $stmt->execute();
            $stmt->bind_result($ticket_price);
            $stmt->fetch();
            $stmt->close();

            // Calculate total price
            $total_price = $quantity * $ticket_price;
            $totalAmount += $total_price;

            // Insert into user_ticket table
            $insertUserTicketStmt->bind_param("iiids", $ticket_id, $acc_id, $quantity, $total_price, $select_date);
            $insertUserTicketStmt->execute();
        }
    }

    // Close prepared statement
    $insertUserTicketStmt->close();

    // Store necessary details in session for revNpay page
    $_SESSION['select_date'] = $select_date;
    $_SESSION['tickets'] = $tickets;
    $_SESSION['totalAmount'] = $totalAmount;
  


    // Redirect 
    header('Location: revNpay.php');
    exit();
}
?>
