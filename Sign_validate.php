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
$dbname = "test_accounts"; // Change this to your database name according to your database name: Schema_name

$conn = new mysqli($servername, $username, $password, $dbname); // establish connection to the database

if ($conn->connect_error) { // check if connection is successful
    die("Connection failed: " . $conn->connect_error);
}

/* Get data from form */
$username = validateData($_POST['username']);
$firstName = validateData($_POST['firstName']);
$lastName = validateData($_POST['lastName']);
$email = validateData($_POST['email']);
$password = validateData($_POST['password']);
$confirm_password = validateData($_POST['confirm_password']);

/* Check if any field is empty */
if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirm_password)) {
    /* Alert the user that there is an empty field */
    echo "<script>
    alert('Please fill up all fields!')
    window.location.href='Sign.php'
    </script>";
    exit("Please fill up all fields!");
} else {
    /* Check if password and confirm_password are the same */
    if ($password != $confirm_password) {
        /* Alert the user if the password is not match then return back to signup */
        echo "<script>
    alert('Password does not match!')
    window.location.href='Sign.php'
    </script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT); // hash the password
    }

    /* Check if username already exists */
    $sql = "SELECT * FROM account WHERE username='$username'";
    $result = $conn->query($sql); // execute the query to the database

    if ($result->num_rows > 0) { // check if the query has a result
        echo "<script>
    alert('Username already exists!')
    window.location.href='Sign.php'
    </script>";
        exit();
    }

    /* Check if email already exists */
    $sql = "SELECT * FROM account WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
    alert('Email already exists!')
    window.location.href='Sign.php'
    </script>";
        exit();
    }

    /* Insert data into account table */
    $sql = "INSERT INTO account (username, firstName, lastName, email, password) VALUES ('$username', '$firstName', '$lastName', '$email', '$password')";
    $conn->query($sql);

    echo "<script>alert('Sign up successful!')</script>";
    $conn->close(); // close the connection

    header("Location: Log.php"); // redirect to login page
}
?>