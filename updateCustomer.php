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
                <div class="col my-4 text-center">
                    <h3 class="secondary-color d-inline">SIGN-UP for </h3>
                    <img class="ml-2 pb-3" src="./pics/white-logo.png" alt="MyStore.pk">
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="register">
        <div class="container-fluid">
            <div class="row mt-5 justify-content-center">
                <div class="col-6">
                    <div class="login-btn">
                        <a href="./login.php" class="btn secondary-bg-color deal-btn w-100">Go to Login Page</a>
                    </div>
                </div>
            </div>
            <?php

            include 'config.php';
            $customerid = $_GET['id'];
            $sql = "SELECT * FROM customer WHERE cid = {$customerid}";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <form action="saveCustomer.php" id="registerform" class="form register" onsubmit="return validateRegister()" method="POST">
                        <div class="row mb-5 justify-content-center">
                            <div class="col-6">
                                <div class="row pt-5 mb-1">
                                    <div class="col-6 form-field">
                                        <label for="first">First Name<span>*</span></label>
                                        <input class="form-input" type="hidden" name="cid" id="customer_id" value="<?php echo $row['cid']; ?>">
                                        <input class="form-input" type="text" name="cfname" id="first" value="<?php echo $row['cfname']; ?>">
                                        <small>Error</small>
                                    </div>
                                    <div class="col-6 form-field">
                                        <label for="last">Last Name<span>*</span></label>
                                        <input class="form-input" type="text" name="clname" id="last" value="<?php echo $row['clname']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-6 form-field">
                                        <label for="registerEmail">Email Address<span>*</span></label>
                                        <input class="form-input" type="text" name="cemail" id="registerEmail" value="<?php echo $row['cemail']; ?>">
                                        <small>Error</small>
                                    </div>
                                    <div class="col-6 form-field">
                                        <label for="phone">Phone<span>*</span></label>
                                        <input class="form-input" type="number" name="cphone" id="phone" value="<?php echo $row['cphone']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-12 form-field">
                                        <label for="add">Street Address<span>*</span></label>
                                        <input class="form-input" type="text" name="caddress" id="add" value="<?php echo $row['caddress']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-12 form-field">
                                        <label for="city">City<span>*</span></label>
                                        <input class="form-input" type="text" name="ccity" id="city" value="<?php echo $row['ccity']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-12 form-field">
                                        <label for="code">Postcode / Zip (Optional)</label>
                                        <input class="form-input" type="text" name="czip" id="code" value="<?php echo $row['czip']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-12 form-field">
                                        <label for="country">Country<span>*</span></label>
                                        <input class="form-input" type="text" name="ccountry" id="country" value="<?php echo $row['ccountry']; ?>">
                                        <small>Error</small>
                                    </div>
                                </div>
                                <!-- <div class="row my-1">
                            <div class="col-6 form-field">
                                <label for="crt-pass">Change Password<span>*</span></label>
                                <input class="form-input" type="password" name="cpassword" id="crt-pass" value="">
                                <small>Error</small>
                            </div>
                            <div class="col-6 form-field">
                                <label for="cnf-pass">Confirm Password<span>*</span></label>
                                <input class="form-input" type="password" name="cnfpassword" id="cnf-pass" value="">
                                <small>Error</small>
                            </div>
                        </div> -->

                                <div class="row my-5">
                                    <div class="col-12">
                                        <input type="submit" id="register" value="REGISTER!" class="btn secondary-bg-color deal-btn w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </section>


    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>