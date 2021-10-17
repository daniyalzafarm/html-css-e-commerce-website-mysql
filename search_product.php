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
                    <h3 class="text-center secondary-color">SEARCH IN PRODUCTS</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section class="products">
        <div class="container">
            <div class="products-display">
                <?php
                include 'config.php';
                $name = $_POST['search'];
                $sql = "SELECT * FROM product join productcategory where pname like '%{$name}%' group by pid";
                // die();
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="card m-3 d-inline-block">
                            <form action="savetoCart.php" id="cartform" class="form cart" method="POST" enctype="multipart/form-data">
                                <?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" ">' ?>
                                <div class="card-body">
                                    <a href="showProduct.php?id=<?php echo $row['pid']; ?>" class="card-title m-0 text-truncate"><?php echo $row['pname']; ?></a>
                                    <p class="card-text m-0 secondary-color"><?php echo "Rs. " . $row['pprice']; ?></p>
                                    <p class="card-text text-truncate"><?php echo $row['psdescription']; ?></p>
                                    <input type="hidden" name="cart_quantity" id="" value="1">
                                    <input type="hidden" name="product_id" id="" value="<?php echo $row['pid']; ?>">
                                    <button type="submit" class="btn secondary-bg-color text-white card-btn mr-3 w-100"><i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i> Add to Cart</button>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="container" style="height: 50vh;">
                        <div class="row">
                            <div class="col text-danger py-5">
                                <h5>No Items Matched With Specified Search !</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pb-5">
                            <a href="shop.php" class="btn primary-bg-color secondary-color deal-btn mr-3">Continue Shopping</a>
                            <a href="index.php" class="btn secondary-bg-color deal-btn">Home</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <?php include_once "./footer.php" ?>
</body>

</html>