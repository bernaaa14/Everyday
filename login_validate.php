<?php

/* Function for data validation */
function validateData($data) {
     $data = trim($data); // Remove whitespace from the start and end of the string
     $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Convert special characters to HTML entities
    return $data;
}

 // The database server we are connecting to
 $servername = "localhost"; // default servername is localhost
 $username = "root"; // default username is root
 $password = ""; // default password is empty
 $dbname = "sk_acc"; // Change this to your database name according to your database name: Schema_name

 $conn = new mysqli($servername, $username, $password, $dbname); // Create connection

 if ($conn->connect_error) { // Check connection to the database
    die("Connection failed: " . $conn->connect_error);
}

 /* Login */
$username = validateData($_POST['username']);
$password = validateData($_POST['password']);

// Check if the username and password fields are not empty
if (empty($username) || empty($password)) {
    header("Location: login.php?error=empty_field");
    exit();
}

 // Select all columns from the account table where the username matches the entered username
 $sql = "SELECT * FROM account WHERE username='$username'";
 $result = $conn->query($sql); // Execute the query to the database

 if ($result->num_rows > 0) { // Check if the query has a result
     $row = $result->fetch_assoc(); // Fetch the result as an associative array
     if (password_verify($password, $row['password'])) { // Check if the password is correct using password_verify()
        session_start();
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php?error=incorrect_password");
        exit();
    }
} else {
    header("Location: login.php?error=user_not_found");
    exit();
}


 $conn->close(); // Close the connection
?>
