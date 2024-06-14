<?php
session_start();

// Check if the logout button is clicked
if (isset($_POST["logout"])) {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/css/home.css">
</head>

<body>
<?php include "header.html"; ?>
<?php include 'greeting.php'; ?>

<div class="container mt-4">
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="static/JungleLog.jpg" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First Slide Label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="static/SpaceShuttle.jpg" class="d-block w-100" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second Slide Label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="static/EKstreme.jpg" class="d-block w-100" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third Slide Label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <!-- Cards -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="static/ERA-00.jpg" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">All Day Pass Student</h4>
                    <p class="card-text">Inclusive of admission and unlimited use of the Park's major and kiddie rides with student discount.</p>
                    <a class="btn btn-primary float-right" href="booking.php">Buy</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="static/ERA-00.jpg" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">All Day Pass KIddie</h4>
                    <p class="card-text">Inclusive of admission and unlimited use of the Park's major and kiddie rides(restrictions may apply)</p>
                    <a class="btn btn-primary float-right" href="booking.php">Buy</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="static/ERA-00.jpg" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">All Day Pass</h4>
                    <p class="card-text">Inclusive of admission and unlimited use of the Park's major and kiddie rides.</p>
                    <a class="btn btn-primary float-right" href="booking.php">Buy</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- Display logout button only if user is logged in -->
<?php if (isset($_SESSION["username"])): ?>
    <form action="home.php" method="post" class="fixed_logout">
        <button class="diva" type="submit" name="logout">Logout</button>
    </form>
<?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
