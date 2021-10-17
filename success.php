<?php
if (!session_id()) {
    session_start();
}
include "config.php";
if (!isset($_SESSION["name"])) {
    header("Location: {$hostname}/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mystore.pk</title>


    <?php include_once "./links.php" ?>
</head>

<body>
    <?php include_once "./header.php" ?>


    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <h3 class="text-center secondary-color">CHECKOUT</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- form + receipt -->
    <section class="container success text-center">
        <div class="row my-6">
            <div class="col-4 mx-auto text-center">
                <div class="mark mx-auto">
                    <i class="fa fa-check-circle-o successlogo text-success mb-5" aria-hidden="true"></i>
                </div>
                <p class="congratulate mb-5">Congratulations ! <br> Your Order has been placed !<br>See status of your order in Profile Tab</p>
                <a href="profile_customer.php" class="btn primary-bg-color secondary-color deal-btn mr-3">Go to Profile</a>
                <a href="index.php" class="btn secondary-bg-color deal-btn">Go to Home</a>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>