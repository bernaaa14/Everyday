<?php
/* Function for data Sign-up validation */
function validateData($data)
{
    // Remove leading and trailing spaces
    $data = trim($data);
    // Remove slashes added by magic quotes
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sk_acc";

$conn = new mysqli($servername, $username, $password, $dbname);

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
$conn->query($sql_create_table);

// Get data from form
$username = validateData($_POST['username']);
$password = validateData($_POST['password']);
$confirm_password = validateData($_POST['confirm_password']);
$email = validateData($_POST['email']);

// Check if any field is empty
if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    header("Location: signup.php?error=empty_field");
    exit();
}

// Check if password and confirm_password are the same
if ($password != $confirm_password) {
    header("Location: signup.php?error=password_mismatch");
    exit();
} else if (strlen($password) < 8) {
    header("Location: signup.php?error=password_too_short");
    exit();
} else if (preg_match_all('/[A-Z]/', $password) < 1) {
    header("Location: signup.php?error=password_no_uppercase");
    exit();
} else if (preg_match_all('/[^A-Za-z0-9]/', $password) < 1) {
    header("Location: signup.php?error=password_no_special_char");
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username already exists
$sql = "SELECT * FROM account WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("Location: signup.php?error=username_already_exists");
    exit();
}
$stmt->close();

// Check if email already exists
$sql = "SELECT * FROM account WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("Location: signup.php?error=email_already_exists");
    exit();
}
$stmt->close();

// Insert data into account table
// Prepare the SQL statement
$sql = "INSERT INTO account (username, password, email) VALUES (?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
// s - string
// $username, $hashed_password, $email - values to be inserted
$stmt->bind_param("sss", $username, $hashed_password, $email);

// Execute the statement
$stmt->execute();

// Check if there was an error in executing the query
if ($stmt->errno) {
    echo "Error: " . $stmt->error;
} else {
    echo "<script>alert('Sign up successful!')</script>";
    header("Location: login.php");
    exit();
}

$stmt->close();
$conn->close();
?>

