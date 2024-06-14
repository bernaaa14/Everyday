<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'db_connection.php'; // Ensure this file sets up $conn

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Retrieve account_id from database using username
$username = $_SESSION["username"];
$sql = "SELECT id FROM account WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($account_id);
$stmt->fetch();
$stmt->close();

$acc_id = $account_id; // Assign the fetched account_id to $acc_id

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $select_date = $_POST['select_date'];
    $student_qty = (int)$_POST['student_qty'];
    $kiddie_qty = (int)$_POST['kiddie_qty'];
    $all_day_qty = (int)$_POST['all_day_qty'];
    $senior_qty = (int)$_POST['senior_qty'];

    $tickets = [
        ['ticket_name' => 'STUDENT TICKET', 'description' => 'This promo is open to all students with most recent valid ID.', 'price' => 980, 'quantity' => $student_qty],
        ['ticket_name' => 'KIDDIE TICKET', 'description' => 'Enjoy unlimited use of the Park’s rides (except for restriction of rides.)', 'price' => 840, 'quantity' => $kiddie_qty],
        ['ticket_name' => 'ALL DAY TICKET', 'description' => 'Access to all rides. This pass allows priority access to favorite rides.', 'price' => 2200, 'quantity' => $all_day_qty],
        ['ticket_name' => 'SENIOR CITIZEN | PWD TICKET', 'description' => 'Applicable upon presentation of valid id upon entering', 'price' => 840, 'quantity' => $senior_qty],
    ];

    $totalAmount = 0;
    foreach ($tickets as $ticket) {
        if ($ticket['quantity'] > 0) {
            $total_price = $ticket['quantity'] * $ticket['price'];
            $totalAmount += $total_price;

            // Insert into ticket table
            $stmt = $conn->prepare("INSERT INTO ticket (ticket_name, description, price) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $ticket['ticket_name'], $ticket['description'], $ticket['price']);
            $stmt->execute();
            $ticket_id = $stmt->insert_id;

            // Debugging: Check if ticket data is inserted
            if ($stmt->affected_rows > 0) {
                echo "Ticket inserted successfully: ticket_id = $ticket_id, ticket_name = {$ticket['ticket_name']}, description = {$ticket['description']}, price = {$ticket['price']}<br>";
            } else {
                echo "Failed to insert ticket: {$conn->error}<br>";
            }

            // Insert into user_ticket table
            $stmt_user_ticket = $conn->prepare("INSERT INTO user_ticket (ticket_id, account_id, qty, ticket_total_price, visit_date) VALUES (?, ?, ?, ?, ?)");
            $stmt_user_ticket->bind_param("iiiis", $ticket_id, $acc_id, $ticket['quantity'], $total_price, $select_date);
            $stmt_user_ticket->execute();

            // Debugging: Check if user_ticket data is inserted
            if ($stmt_user_ticket->affected_rows > 0) {
                echo "User ticket inserted successfully: ticket_id = $ticket_id, account_id = $acc_id, quantity = {$ticket['quantity']}, total_price = $total_price, visit_date = $select_date<br>";
            } else {
                echo "Failed to insert user ticket: {$conn->error}<br>";
            }
        }
    }

    // Store ticket and total amount details in session for review page
    $_SESSION['tickets'] = $tickets;
    $_SESSION['totalAmount'] = $totalAmount;
    $_SESSION['select_date'] = $select_date;

    // Redirect to review page
    header('Location: revNpay.php');
    exit();
}
?>
