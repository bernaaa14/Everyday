<?php
session_start();

// Include database connection file
require_once('db_connection.php');

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Retrieve session variables
$user_tickets = isset($_SESSION['tickets']) ? $_SESSION['tickets'] : [];
$totalAmount = 0;

// Calculate total ticket count
$ticket_count = 0;
foreach ($user_tickets as $ticket) {
    $ticket_count += $ticket['quantity'];
}

// Fetch ticket details from the database
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
            <span class="badge badge-danger"><?php echo $ticket_count; ?></span>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Order Summary</h2>
        <form action="update_order.php" method="post">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Ticket Name</th>
                        <th>Description</th>
                        <th>Unit Price / Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
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
                                echo "<td>₱{$ticketDetail['price']} x {$ticket['quantity']}</td>";
                               $totalAmount += $ticketDetail['price'] * $ticket['quantity'];
                                echo "<td>₱{$subtotal}</td>";
                                echo "<td><button type='submit' name='delete' value='$index' class='btn btn-danger'>Delete</button></td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>No tickets added to the order.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="total-amount">TOTAL AMOUNT: ₱<?php echo $totalAmount; ?></div>
            <button type="submit" name="update" value="update" class="btn btn-primary">Update Order</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
