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
    <section class="checkout">
        <div class="container">

            <div class="row my-5">
                <!-- <div class="col-6">
                    <form action="#" class="form checkout" onsubmit="return validateCheckout()" method="POST">
                        <div class="login-btn">
                            <a href="./login.html" class="btn secondary-bg-color deal-btn w-100">Click Here to Login</a>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h4 class="order">Billing Details</h4>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6 form-field">
                                <label for="checkoutFirst">First Name<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutFirst">
                                <small>Error</small>
                            </div>
                            <div class="col-6 form-field">
                                <label for="checkoutLast">Last Name<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutLast">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 form-field">
                                <label for="checkoutMail">Email Address<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutMail">
                                <small>Error</small>
                            </div>
                            <div class="col-6 form-field">
                                <label for="checkoutPhone">Phone<span>*</span></label>
                                <input class="form-input" type="number" name="first-name" id="checkoutPhone">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="checkoutAddress">Street Address<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutAddress">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="checkoutCity">City<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutCity">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="checkoutCode">Postcode / Zip (Optional)</label>
                                <input class="form-input" type="text" name="first-name" id="checkoutCode">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="checkoutCountry">Country<span>*</span></label>
                                <input class="form-input" type="text" name="first-name" id="checkoutCountry">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1 ml-2">
                            <div class="col-6 custom-control custom-checkbox">
                                <input id="music" type="checkbox" class="custom-control-input">
                                <label for="music" class="custom-control-label">Create an Account ? </label>
                            </div>
                            <div class="col-6">
                                <input type="submit" value="Checkout" id="checkout" class="btn secondary-bg-color deal-btn w-100">
                            </div>
                        </div>
                    </form>
                </div> -->
                <div class="col-12">
                    <form action="saveCheckout.php" id="checkoutform" class="form checkout" method="POST" enctype="multipart/form-data">
                        <div class="reciept">
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h2 class="order">Your Order</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="cart-table mt-5">

                                        <div class="table-responsive">
                                            <?php
                                            include 'config.php';
                                            $sql = "SELECT * FROM product JOIN cart WHERE product.pid = cart.pid AND cart.cid=" . $_SESSION["customer_id"];
                                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                                            ?>
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead class="thead-dark">
                                                    <tr class="text-center">
                                                        <th>ID</th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Price / Rs.</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price / Rs.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $cart_items = [];
                                                    $cart_quan = [];
                                                    $cart_price=[];
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $totalbill = 0;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            array_push($cart_items, $row['pid']);
                                                            array_push($cart_quan, $row['cartquantity']);
                                                    ?>
                                                            <tr class="text-center">
                                                                <td><?php echo '#' . $row['pid']; ?></td>
                                                                <td><?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" width="100px height="30px" ">' ?></td>
                                                                <td><?php echo $row['pname']; ?></td>
                                                                <?php
                                                                $actualprice = 0;
                                                                if ($row['pfeatured'] != 3) {
                                                                    $actualprice = $row['pprice'];
                                                                } else {
                                                                    $actualprice = $row['psprice'];
                                                                }
                                                                ?>
                                                                <td><?php echo $actualprice; ?></td>
                                                                <td><?php echo $row['cartquantity']; ?></td>
                                                                <td><?php echo $amount = $row['cartquantity'] * $actualprice; ?></td>
                                                                <?php
                                                                array_push($cart_price,$actualprice);
                                                                $totalbill+=$amount;
                                                                ?>
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
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-12 text-right">
                                <div class="total">
                                    <?php
                                    // $sumprice = "SELECT SUM(product.pprice*cart.cartquantity) AS Total FROM product JOIN cart on product.pid = cart.pid AND cart.cid=" . $_SESSION["customer_id"];

                                    // $sumresult = mysqli_query($conn, $sumprice) or die("Query Unsuccessful !");
                                    // while ($price = mysqli_fetch_assoc($sumresult)) {
                                        echo  "<p class='total-bill'>Total Amount : Rs. " . $totalbill . "</p>";
                                        echo '<input type="hidden" name="total_bill" id="" value="' . $totalbill . '">';
                                    // }
                                    ?>
                                </div>
                                <?php
                                $id_string = implode(",", $cart_items);
                                $quan_string = implode(",", $cart_quan);
                                $price_string = implode(",", $cart_price);
                                ?>
                                <input type="hidden" name="ids" value="<?php echo $id_string ?>">
                                <input type="hidden" name="quan" value="<?php echo $quan_string ?>">
                                <input type="hidden" name="prices" value="<?php echo $price_string?>">
                                <button type="submit" class="btn secondary-bg-color deal-btn mt-5 w-lg-25 w-md-50">Confirm Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>