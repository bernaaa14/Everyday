<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require  'db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$user_tickets = isset($_SESSION['tickets']) ? $_SESSION['tickets'] : [];
$totalAmount = 0;

// Include database connection file if needed
// require_once('db_connection.php');

// Fetch ticket details from the database if necessary
$ticketDetails = [];
if (!empty($user_tickets)) {
    $ticketIds = implode(',', array_column($user_tickets, 'ticket_id'));
    $sql = "SELECT * FROM ticket WHERE id IN ($ticketIds)";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ticketDetails[$row['id']] = $row;
        }
    }
}

// Calculate total amount
foreach ($user_tickets as $ticket) {
    if (isset($ticketDetails[$ticket['ticket_id']])) {
        $totalAmount += $ticketDetails[$ticket['ticket_id']]['price'] * $ticket['quantity'];
    }
}

// Handle form submission to update ticket quantities
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $newQuantities = $_POST['quantity'];

    // Validate and update session with new quantities
    foreach ($newQuantities as $index => $newQuantity) {
        if (isset($user_tickets[$index])) {
            // Ensure quantity is a valid integer and not negative
            $newQuantity = (int)$newQuantity;
            if ($newQuantity >= 0) {
                $user_tickets[$index]['quantity'] = $newQuantity;
            }
        }
    }

    // Update session variable
    $_SESSION['tickets'] = $user_tickets;

    // Redirect back to the order summary page (refresh)
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/home.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="container mt-5">
        <div class="badge-over-image">
            <img src="static/images/ticket.png" alt="Ticket Image" width="80px" class="img-fluid">
            <span class="badge badge-danger"><?php echo count($user_tickets); ?></span>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Order Summary</h2>
        
        <form action="order_summary.php" method="post">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Ticket Name</th>
                        <th>Description</th>
                        <th>Current Quantity</th>
                        <th>New Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($user_tickets)) {
                        foreach ($user_tickets as $index => $ticket) {
                            if ($ticket['quantity'] > 0 && isset($ticketDetails[$ticket['ticket_id']])) {
                                $ticketDetail = $ticketDetails[$ticket['ticket_id']];
                                $subtotal = $ticketDetail['price'] * $ticket['quantity'];
                                echo "<tr>";
                                echo "<td>{$ticketDetail['ticket_name']}</td>";
                                echo "<td>{$ticketDetail['description']}</td>";
                                echo "<td>{$ticket['quantity']}</td>";
                                echo "<td><input type='number' name='quantity[$index]' value='{$ticket['quantity']}' min='0'></td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='4'>No tickets added to the order.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="total-amount">TOTAL AMOUNT: ₱<?php echo $totalAmount; ?></div>
            <button type="submit" name="update" value="update" class="btn btn-primary">Update Quantities</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
