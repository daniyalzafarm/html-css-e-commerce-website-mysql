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
                    <h3 class="text-center secondary-color">ORDER DETAILS</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Table -->
    <section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table my-5">

                        <?php
                        include 'config.php';
                        $checkout_id = $_GET['id'];
                        $order = "SELECT * FROM checkout WHERE checkout_id=" . $checkout_id;
                        $orderresult = mysqli_query($conn, $order) or die("Query Unsuccessful !");
                        $orderrow = mysqli_fetch_assoc($orderresult);
                        $ids = explode(",", $orderrow['products_id']);
                        $quan = explode(",", $orderrow['products_quan']);
                        $prices = explode(",", $orderrow['products_price']);
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>Order Id : #<?php echo $checkout_id; ?></h2>
                            </div>
                            <div class="col-lg-6 text-lg-right">
                            <h3>Status : <?php echo $orderrow['order_status']; ?></h3>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Price / Rs.</th>
                                        <th>Quantity</th>
                                        <th>Total Price / Rs.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ids as $key => $val) {
                                        $prod = "SELECT * FROM product where pid=$val";
                                        $prodresult = mysqli_query($conn, $prod) or die("Query Unsuccessful !");
                                        $prodrow = mysqli_fetch_assoc($prodresult)
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $prodrow['pid']; ?></td>
                                            <td><?php echo $prodrow['pname']; ?></td>
                                            <td><?php echo $prices[$key]; ?></td>
                                            <td><?php echo $quan[$key]; ?></td>
                                            <td><?php echo $prices[$key] * $quan[$key]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            echo  "<p class='total-bill'>Total Amount : Rs. " . $orderrow['totalbill'] . "</p>";
                            echo '';
                            echo '';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a href="shop.php" class="btn primary-bg-color secondary-color deal-btn mr-3 mb-3">Continue Shopping</a>
                    <a href="profile_customer.php" class="btn secondary-bg-color deal-btn mb-3">Back to Profile</a>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "./footer.php" ?>


</body>

</html>