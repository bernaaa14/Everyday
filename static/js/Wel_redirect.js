function redirectToLogin() {
    // Redirect based on whether the user is logged in or not
    if (loggedIn) {
        window.location.href = 'home.php';
    } else {
        window.location.href = 'login.php';
    }
}

function redirectToSignup() {
    // Redirect based on whether the user is logged in or not
    if (loggedIn) {
        window.location.href = 'home.php';
    } else {
        window.location.href = 'signup.php';
    }
}
