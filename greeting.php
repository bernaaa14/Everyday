<?php
session_start();



$greeting = "Hello, Guest";
if (isset($_SESSION["username"])) {
    $greeting =
        "Hello, " .
        htmlspecialchars($_SESSION["username"], ENT_QUOTES, "UTF-8");
}
?>
<html>
<div class="container mt-5">
    <!-- Greeting -->
    <div class="row">
        <div class="col-12 mb-3">
            <h3>
                <span class="greeting-prefix">Hello,</span>
                <span class="username">
                    <?php echo isset($_SESSION["username"])
                        ? htmlspecialchars(
                            $_SESSION["username"],
                            ENT_QUOTES,
                            "UTF-8"
                        )
                        : "Guest"; ?>
                </span>
            </h3>
        </div>
    </div>

<html>
