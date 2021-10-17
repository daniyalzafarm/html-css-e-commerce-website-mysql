<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mystore.pk</title>


    <?php include_once "./links.php" ?>
</head>

<body>


    <?php include_once "./admin_header.php" ?>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col my-4 text-center">
                    <h3 class="secondary-color d-inline">MANAGE PROFILE</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="profile container my-5" style="height: 100vh-50px;">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM customer WHERE cid=8";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result)
        ?>

                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="mb-0" id="customername"><?php echo $row['cfname'] . ' ' . $row['clname']; ?></h5>
                        <span class="pl-2" id="name"><?php echo 'Id : #' . $row['cid']; ?></span>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a href="logout.php" class="text-decoration-none profile_logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                    </div>
                </div>
                <p class="mt-5" id="name"><span>E-mail : </span><?php echo $row['cemail']; ?></p>
                <p class="" id="name"><span>Phone : </span><?php echo $row['cphone']; ?></p>
                <p class="" id="name"><span>Address : </span><?php echo $row['caddress'] . ', ' . $row['ccity'] . ', ' . $row['czip'] . ', ' . $row['ccountry']; ?></p>
                <div class="options my-lg-5">
                    <a href="index.php" class="btn primary-bg-color secondary-color profile-btn">HOME</a>
                    <a href="update_profile.php" class="btn secondary-bg-color profile-btn">UPDATE</a>
                </div>

        <?php
            }
        ?>


    </section>





    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./admin_footer.php" ?>
</body>

</html>