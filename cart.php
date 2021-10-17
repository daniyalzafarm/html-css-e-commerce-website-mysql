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
                    <h3 class="text-center secondary-color">CART ITEMS</h3>
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

                        <div class="table-responsive">
                            <?php

                            include 'config.php';
                            $sql = "SELECT * FROM product JOIN cart WHERE product.pid = cart.pid AND cart.cid=" . $_SESSION["customer_id"];
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

                            ?>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price / Rs.</th>
                                        <th>Quantity</th>
                                        <th>Total Price / Rs.</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr class="text-center">

                                                <td><?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" width="100px height="30px" ">' ?></td>
                                                <td><?php echo $row['pname']; ?></td>
                                                <?php
                                                $actualprice = "";
                                                if ($row['pfeatured'] != 3) {
                                                    $actualprice = $row['pprice'];
                                                } else {
                                                    $actualprice = $row['psprice'];
                                                }
                                                ?>
                                                <td><?php echo $actualprice; ?></td>
                                                <td><?php echo $row['cartquantity']; ?></td>
                                                <td><?php echo $row['cartquantity'] * $actualprice; ?></td>
                                                <td>
                                                    <a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>" class="text-danger m-3 product_action"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-lg-6 p-0">
                                    <?php
                                    if (mysqli_num_rows($result) == 0) {
                                        echo '<a href="shop.php" class="btn primary-bg-color secondary-color deal-btn mr-3">Continue Shopping</a>';
                                    } else {
                                        echo '<a href="shop.php" class="btn primary-bg-color secondary-color deal-btn mr-3">Continue Shopping</a>';
                                        echo '<a href="checkout.php" class="btn secondary-bg-color deal-btn">Checkout</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "./footer.php" ?>


</body>

</html>