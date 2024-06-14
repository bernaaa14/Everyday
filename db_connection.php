<?php
$servername = '127.0.0.1'; // Default servername is localhost
$username = 'root'; // Default username is root
$password ='password' ; // Default password is password
$dbname = "StarKingdom"; // Change this to your database name according to your database name: Schema_name

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Create account table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS account (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
)";
$sql_create_ticket = "CREATE TABLE IF NOT EXISTS ticket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_name VARCHAR(50),
    description VARCHAR(255) NOT NULL,
    price INT
)";

$sql_create_user_ticket = "CREATE TABLE IF NOT EXISTS user_ticket (
    user_ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id INT,
    account_id INT,
    FOREIGN KEY (ticket_id) REFERENCES ticket(id),
    FOREIGN KEY (account_id) REFERENCES account(id),
    qty INT,
    ticket_total_price INT
)";
$order_id = uniqid();
$sql_create_order_summary = "CREATE TABLE IF NOT EXISTS order_summary (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT,
    FOREIGN KEY (account_id) REFERENCES account(id),
    ticket_id INT,
    FOREIGN KEY (ticket_id) REFERENCES ticket(id),
    quantity INT,
    ticket_total_price DECIMAL(10, 2)
)";
$conn->query($sql_create_table);
$conn->query($sql_create_ticket);
$conn->query($sql_create_user_ticket);
$conn->query($sql_create_order_summary);


