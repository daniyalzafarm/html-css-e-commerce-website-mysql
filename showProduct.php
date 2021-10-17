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

    <!-- Product Display -->
    <section class="product">
        <div class="container py-5">
            <div class="row">
                <?php
                include 'config.php';
                $id = $_GET['id'];
                $sql = "SELECT * FROM product JOIN productcategory ON product.pcategory = productcategory.categid WHERE pid=" . $id;
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="col-lg-6">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="uploaded_Files/<?php echo $row['pmain_image']; ?>" style="height:500px ;">
                                    </div>
                                    <?php
                                    $gallery = explode(",", $row['gallery_images']);
                                    $i = 0;
                                    if (!empty($gallery)) {
                                        foreach ($gallery as $key => $image_name) {
                                            $actives = '';
                                            if ($i == 0) {
                                                $actives = 'active';
                                            }

                                    ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="gallery/<?php echo $image_name; ?>" style="height:500px ;">
                                            </div>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form action="savetoCart.php" id="cartform" class="form cart" method="POST" enctype="multipart/form-data">
                                <h2 class="prod-title m-0 text-truncate"><?php echo $row['pname']; ?></h2>

                                <?php
                                if ($row['pfeatured'] != 3) {
                                ?>
                                    <p class="prod-text m-0 secondary-color my-3"><?php echo "Rs. " . $row['pprice']; ?></p>
                                <?php
                                } else {
                                ?>
                                    <p class="prod-text m-0 secondary-color my-3"><s><?php echo "Rs. " . $row['pprice']; ?></s></p>
                                    <p class="prod-text m-0 text-success my-3"><?php echo "Rs. " . $row['psprice']; ?></p>
                                <?php
                                }
                                ?>
                                <div class="">
                                    <span class="prod-span">Category :</span>
                                    <p class="d-inline prod-text"><a href="" class="card-categ"><?php echo $row['categname']; ?></a></p>
                                </div>

                                <div class="mt-3">
                                    <span class="prod-span">Short Description</span>
                                    <p class="prod-text"><?php echo $row['psdescription']; ?></p>
                                </div>

                                <div class="">
                                    <span class="prod-span">Detailed Specifications</span>
                                    <p class="prod-text"><?php echo $row['pldescription']; ?></p>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <span class="prod-span ">Quantity: </span>
                                        <input type="number" class="" name="cart_quantity" id="" value="1" min="1" max="10" style="width: 50px;">
                                    </div>
                                    <div class="col-6 text-right">
                                        <input type="hidden" name="product_id" id="" value="<?php echo $row['pid']; ?>">
                                        <button type="submit" class="btn secondary-bg-color text-white card-btn "><i class="fa fa-shopping-bag" aria-hidden="true"> Add to Cart</i></button>
                                    </div>
                                </div>
                        </div>
                        </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="new_products p-0">
            <div class="insta-heading">
                <h2 class="text-center mt-5">YOU MAY ALSO LIKE</h2>
            </div>
            <div class="slider owl-carousel container">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM product JOIN productcategory ON product.pcategory = productcategory.categid group by pid";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="card d-inline-block">
                            <form action="savetoCart.php" id="cartform" class="form cart" method="POST" enctype="multipart/form-data">
                                <?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" ">' ?>
                                <div class="card-body">
                                    <a href="showProduct.php?id=<?php echo $row['pid']; ?>" class="card-title m-0  text-truncate"><?php echo $row['pname']; ?></a>
                                    <p class="card-text m-0 secondary-color"><?php echo "Rs. " . $row['pprice']; ?></p>
                                    <a href="" class="card-categ"><?php echo $row['categname']; ?></a>
                                    <p class="card-text text-truncate"><?php echo $row['psdescription']; ?></p>

                                    <!-- <span>Quantity: </span> -->
                                    <input type="hidden" name="cart_quantity" id="" value="1">
                                    <input type="hidden" name="product_id" id="" value="<?php echo $row['pid']; ?>">
                                    <button type="submit" class="btn secondary-bg-color text-white card-btn mr-3"><i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i> Add to Cart</button>
                                    <!-- <a href="" class="btn secondary-bg-color text-white card-btn"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a> -->
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
    <!-- Owl Carousel Script -->
    <script>
        $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeOut: 2000,
            autoplayHoverPause: true,
            responsive: {

                0: {
                    items: 1
                },
                700: {
                    items: 3
                },
                1300: {
                    items: 5
                }
            }
        });
    </script>
</body>

</html>