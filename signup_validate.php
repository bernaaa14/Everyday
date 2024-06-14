<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';

/* Function for data Sign-up validation */
function validateData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get data from form
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])) {
    $username = validateData($_POST['username']);
    $password = validateData($_POST['password']);
    $confirm_password = validateData($_POST['confirm_password']);
    $email = validateData($_POST['email']);
} else {
    exit();
}

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
$sql = "INSERT INTO account (username, password, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $hashed_password, $email);
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
