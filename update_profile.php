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
                    <h3 class="secondary-color d-inline">UPDATE YOUR PROFILE</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="register">
        <div class="container-fluid">
            <?php
            include 'config.php';
            $customerid="";
            if(isset($_SESSION["customer_id"])){
                $customerid = $_SESSION["customer_id"];
            }
            if(isset($_SESSION["admin_id"])){
                $customerid = $_SESSION["admin_id"];
            }
            $sql = "SELECT * FROM customer WHERE cid = {$customerid}";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="saveupdateCustomer.php" id="updateform" onsubmit="return validateUpdateRegister()" class="form register" method="POST">
                <!--  -->
                <div class="row mb-5 justify-content-center">
                    <div class="col-6">
                        <div class="row pt-5 mb-1">
                            <div class="col-6 form-field">
                                <label for="first">First Name<span>*</span></label>
                                <input class="form-input" type="text" name="cfname" id="ufirst" value="<?php echo $row['cfname']; ?>">
                                <small>Error</small>
                            </div>
                            <div class="col-6 form-field">
                                <label for="last">Last Name<span>*</span></label>
                                <input class="form-input" type="text" name="clname" id="ulast" value="<?php echo $row['clname']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 form-field">
                                <label for="registerEmail">Email Address<span>*</span></label>
                                <input class="form-input" type="text" name="cemail" id="uregisterEmail" disabled value="<?php echo $row['cemail']; ?>">
                                <small>Error</small>
                            </div>
                            <div class="col-6 form-field">
                                <label for="phone">Phone<span>*</span></label>
                                <input class="form-input" type="number" name="cphone" id="uphone" value="<?php echo $row['cphone']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="add">Street Address<span>*</span></label>
                                <input class="form-input" type="text" name="caddress" id="uadd" value="<?php echo $row['caddress']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="city">City<span>*</span></label>
                                <input class="form-input" type="text" name="ccity" id="ucity" value="<?php echo $row['ccity']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="code">Postcode / Zip (Optional)</label>
                                <input class="form-input" type="text" name="czip" id="ucode" value="<?php echo $row['czip']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="country">Country<span>*</span></label>
                                <input class="form-input" type="text" name="ccountry" id="ucountry" value="<?php echo $row['ccountry']; ?>">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12">
                                <a href="profile_customer.php" class="btn primary-bg-color secondary-color deal-btn w-25">BACK TO PROFILE</a>
                                <input type="submit" id="update_customer" value="UPDATE!" class="btn secondary-bg-color deal-btn w-25">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                }
            }
            ?>
            <script type="text/javascript" src="./form-validation.js"></script>
        </div>
    </section>



    <?php include_once "./footer.php" ?>
</body>

</html>