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
            <div class="row mt-5  justify-content-center">
                <div class="col-lg-6 px-5">
                    <div class="login-btn">
                        <a href="./login.php" class="btn secondary-bg-color deal-btn w-100">Go to Login Page</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6 text-center">
                    <div class="login_error">
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>' . $_GET['error'];
                        }
                        ?>
                    </div>
                </div>
            </div>
            <form action="saveCustomer.php" id="registerform" onsubmit="return validateRegister()" class="form register" method="POST">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-6 px-5">
                        <div class="row pt-4 mb-1">
                            <div class="col-lg-6 form-field">
                                <label for="first">First Name<span>*</span></label>
                                <input class="form-input" type="text" name="cfname" id="first">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="last">Last Name<span>*</span></label>
                                <input class="form-input" type="text" name="clname" id="last">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-6 form-field">
                                <label for="registerEmail">Email Address<span>*</span></label>
                                <input class="form-input" type="text" name="cemail" id="registerEmail">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="phone">Phone<span>*</span></label>
                                <input class="form-input" type="number" name="cphone" id="phone">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="add">Street Address<span>*</span></label>
                                <input class="form-input" type="text" name="caddress" id="add">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="city">City<span>*</span></label>
                                <input class="form-input" type="text" name="ccity" id="city">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="code">Postcode / Zip (Optional)</label>
                                <input class="form-input" type="text" name="czip" id="code">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="country">Country<span>*</span></label>
                                <input class="form-input" type="text" name="ccountry" id="country">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-6 form-field">
                                <label for="crt-pass">Create Password<span>*</span></label>
                                <input class="form-input" type="password" name="cpassword" id="crt-pass">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="cnf-pass">Confirm Password<span>*</span></label>
                                <input class="form-input" type="password" name="cnfpassword" id="cnf-pass">
                                <small>Error</small>
                            </div>
                        </div>

                        <div class="row my-5">
                            <div class="col-12">
                                <input type="submit" id="register" value="REGISTER!" class="btn secondary-bg-color deal-btn w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>