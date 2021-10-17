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
    <div class="insta-heading">
                <h2 class="text-center mt-5">MOBILES</h2>
            </div>

    <!-- Products -->
    <section class="products">
        <div class="container text-center">
            <div class="products-display">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = 2 group by pid";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="shop_card border shadow-sm ml-md-4 mb-4 d-inline-block">
                            <form action="savetoCart.php" id="cartform" class="form cart" method="POST" enctype="multipart/form-data">
                                <?php echo '<img class"img-fluid img-thumbnail" src="uploaded_Files/' . $row['pmain_image'] . '" ">' ?>
                                <div class="shop_card-body p-1">
                                    <div class="title">
                                        <a href="showProduct.php?id=<?php echo $row['pid']; ?>" class="shop_card-title m-0"><?php echo $row['pname']; ?></a>
                                    </div>
                                    <div class="d-block">
                                        <?php
                                        $tag = "";
                                        if ($row['pfeatured'] != 1) {
                                            $tag = "tag";
                                        }
                                        ?>
                                        <small class="badge badge-warning <?php echo $tag ?>">Featured</small>
                                        <?php
                                        if ($row['pfeatured'] != 3) {
                                        ?>
                                            <p class="shop_card-text m-0 secondary-color"><?php echo "Rs. " . $row['pprice']; ?></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="shop_card-text m-0 text-success"><?php echo "Rs. " . $row['psprice']; ?></p>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="cart_quantity" id="" value="1">
                                        <input type="hidden" name="product_id" id="" value="<?php echo $row['pid']; ?>">
                                        <button type="submit" class="btn shop_card-btn py-0 px-1"><i class="fa fa-shopping-bag text-white" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <?php include_once "./footer.php" ?>
</body>

</html>