<?php
if (!session_id()) {
    session_start();
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


    <section class="profile container my-5">
        <?php
        include 'config.php';

        $sql = "SELECT * FROM customer WHERE cid=" . $_SESSION["customer_id"];
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="mb-0" id="customername"><?php echo $row['cfname'] . ' ' . $row['clname']; ?></h5>
                    <span class="pl-2" id="name"><?php echo 'Id : #' . $row['cid']; ?></span>
                </div>
                <div class="col-lg-6 text-right">
                <a href="logout.php" class="text-decoration-none profile_logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </div>
            </div>
                
                <p class="mt-5" id="name"><span>E-mail : </span><?php echo $row['cemail']; ?></p>
                <p class="" id="name"><span>Phone : </span><?php echo $row['cphone']; ?></p>
                <p class="" id="name"><span>Address : </span><?php echo $row['caddress'] . ', ' . $row['ccity'] . ', ' . $row['czip'] . ', ' . $row['ccountry']; ?></p>
                <div class="options my-5">
                    <a href="index.php" class="btn primary-bg-color secondary-color profile-btn">HOME</a>
                    <a href="update_profile.php" class="btn secondary-bg-color profile-btn">UPDATE</a>
                </div>

                <div class="myorders">
                    <h3>My Orders</h3>
                    <div class="cart-table mt-5">
                        <div class="table-responsive">
                            <?php
                            include 'config.php';
                            $sql1 = "SELECT * FROM checkout WHERE cid=" . $_SESSION["customer_id"];
                            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful !");
                            ?>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Total Bill / Rs.</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            if($row1['order_status']== "Canceled"){
                                                $color="text-danger font-weight-bold";
                                            }elseif($row1['order_status']== "Delivered"){
                                                $color="text-success font-weight-bold";
                                            }
                                    ?>
                                            <tr class="text-center">
                                                <td><a href="showOrder.php?id=<?php echo $row1['checkout_id']; ?>" class="orderid"><?php echo '#' . $row1['checkout_id']; ?></a></td>
                                                <td><?php echo $row1['order_date']; ?></td>
                                                <td><?php echo $row1['totalbill']; ?></td>

                                                <td class="<?php echo $color ?>"><?php echo $row1['order_status'];
                                                    if ($row1['order_status'] == "Pending") {
                                                        echo '<a href="orderApprove.php?id=' . $row1['checkout_id'] . '&status=customercancel" class="badge badge-pill badge-danger p-1 ml-3">Cancel Order</a>';
                                                    }else if ($row1['order_status'] == "Waiting") {
                                                        echo '<a href="orderApprove.php?id=' . $row1['checkout_id'] . '&status=customerrecieve" class="badge badge-pill badge-success p-1 ml-3">Confirm Receive</a>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
        <?php
            }
        }
        ?>


    </section>


    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>