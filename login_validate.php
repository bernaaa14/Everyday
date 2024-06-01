<?php

/* Function for data validation */
function validateData($data) {
    $data = trim($data); // Remove whitespace from the start and end of the string
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Convert special characters to HTML entities
    return $data;
}

$servername = "localhost"; // Default servername is localhost
$username = "root"; // Default username is root
$password = ""; // Default password is empty
$dbname = "sk_acc"; // Change this to your database name according to your database name: Schema_name

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error) { // Check connection to the database
    die("Connection failed: " . $conn->connect_error);
}

 /* Login */
$login_input = validateData($_POST['username']); // Username or email
$password = validateData($_POST['password']);

// Check if the username/email and password fields are not empty
if (empty($login_input) || empty($password)) {
    header("Location: login.php?error=empty_field");
    exit();
}

// Select all columns from the account table where the username or email matches the entered value
$stmt = $conn->prepare("SELECT * FROM account WHERE username=? OR email=?");
$stmt->bind_param("ss", $login_input, $login_input); // "s" indicates the variable type is string
$stmt->execute();
$result = $stmt->get_result();


    // Check if a user with the given username/email and password exists
    if ($result->num_rows > 0) {
        // Retrieve the user's row from the result set
        $row = $result->fetch_assoc();
        // Verify the entered password against the hashed password in the database
        if (password_verify($password, $row['password'])) {
            // Start a new session
            session_start();
            // Store the username in the session
            $_SESSION['username'] = $row['username'];
            // Redirect the user to the home page
            header("Location: home.php");
            exit();
        } else {
            // Redirect the user to the login page with an error message
            header("Location: login.php?error=incorrect_password");
            exit();
        }
    } else {
        // Redirect the user to the login page with an error message
        header("Location: login.php?error=user_not_found");
        exit();
    }

    
    // Close the prepared statement
    // This is important to free up system resources
    // and prevent memory leaks
    // See: https://www.php.net/manual/en/mysqli-stmt.close.php
    $stmt->close();
$conn->close(); // Close the connection
?>
