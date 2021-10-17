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
                    <h3 class="secondary-color d-inline">LOGIN to </h3>
                    <img class="ml-2 pb-3" src="./pics/white-logo.png" alt="MyStore.pk">
                </div>
            </div>
        </div>
    </section>


    <section class="login">
        <div class="container">
            <form action="verifyLogin.php" id="loginform" class="form login"  method="POST">
            <!-- onsubmit="return validateLogin()" -->
                <div class="row my-5 justify-content-center" id="fields">
                    <div class="col-lg-6">
                        <div class="login_error">
                            <?php
                            if(isset($_GET['error'])){
                                echo '<i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>'.$_GET['error'];
                            }
                            ?>
                        </div>
                        <div class="row py-2">
                            <div class="col-12 form-field">
                                <label for="email">Email Address<span>*</span></label>
                                <input class="form-input" type="text" name="email" id="email">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-12 form-field">
                                <label for="password">Password<span>*</span></label>
                                <input class="form-input" type="password" name="password" id="password">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-12">
                                <input type="submit" name="login" value="LOGIN!" class="btn secondary-bg-color deal-btn w-100"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            

            <div class="acc">
                <div class="row mb-5 justify-content-center">
                    <div id="registerLink" class="col-lg-6 text-center">
                        Haven't an account ? <a href="register.php">Click Here to Register!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>