<?php
/* Function for data Sign-up validation */
function validateData($data)
{ // Function to validate data / clean data
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servername = "localhost"; // default servername is localhost
$username = "root"; // default username is root
$password = ""; // default password is empty
$dbname = "sk_acc"; // Change this to your database name according to your database name: Schema_name

$conn = new mysqli($servername, $username, $password, $dbname); // establish connection to the database

if ($conn->connect_error) { // check if connection is successful
    die("Connection failed: " . $conn->connect_error);
}

/* Creates table for schema if not exist */
$sql_create_table = "CREATE TABLE IF NOT EXISTS account (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
$conn->query($sql_create_table);

/* Get data from form */
$username = validateData($_POST['username']);
$password = validateData($_POST['password']);
$confirm_password = validateData($_POST['confirm_password']);

/* Check if any field is empty */
if (empty($username) || empty($password) || empty($confirm_password)) {
    /* Alert the user that there is an empty field */
    header("Location: signup.php?error=empty_field");
    exit();
}

/* Check if password and confirm_password are the same */
if ($password != $confirm_password) {
    /* Alert the user if the password is not match then return back to signup */
    header("Location: signup.php?error=password_mismatch");
    exit();
} else if (strlen($password) < 8) {
    /* Alert the user if password is less than 8 characters */
    header("Location: signup.php?error=password_too_short");
    exit();
} else if (preg_match_all('/[A-Z]/', $password) < 1) {
    /* Alert the user if password does not contain at least one uppercase letter */
    header("Location: signup.php?error=password_no_uppercase");
    exit();
} else if (preg_match_all('/[^A-Za-z0-9]/', $password) < 1) {
    /* Alert the user if password does not contain at least one special character */
    header("Location: signup.php?error=password_no_special_char");
    exit();
} else {
    $password = password_hash($password, PASSWORD_DEFAULT); // hash the password
}

/* Check if username already exists */
$sql = "SELECT * FROM account WHERE username='$username'";
$result = $conn->query($sql); // execute the query to the database

if ($result->num_rows > 0) { // check if the query has a result
    header("Location: signup.php?error=username_already_exists");
    exit();
}

/* Insert data into account table */
$sql = "INSERT INTO account (username, password) VALUES ('$username', '$password')";
$conn->query($sql);

echo "<script>alert('Sign up successful!')</script>";
$conn->close(); // close the connection

header("Location: login.php"); // redirect to login page
?>

