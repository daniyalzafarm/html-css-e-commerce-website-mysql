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

    <!-- Hero Section -->

    <div class="container-fluid p-0">
        <!--==========================================-->
        <!--                Carousel                  -->
        <!--==========================================-->
        <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <!--Carousel item 1-->
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="./pics/p1-mi.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <a href="shop.php" class="btn secondary-bg-color deal-btn">Shop Now</a>
                    </div>
                </div>

                <!--Carousel item 2-->
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="./pics/p3-mi.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <a href="shop.php" class="btn secondary-bg-color deal-btn">Shop Now</a>
                    </div>
                </div>

                <!--Carousel item 3-->
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="./pics/p2-mi.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <a href="shop.php" class="btn secondary-bg-color deal-btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <!-- <div class="categories p-0">
        <div class="insta-heading">
            <h2 class="text-center mt-5">CATEGORIES</h2>
        </div>
        <div class="container p-0">
            <div class="row justify-content-between mb-6">
                <div class="col-3  categ-item" id="categ-1">
                    <div class="categ-inside-text">
                        <h5>
                            <a href="laptops.php">Laptops</a>
                        </h5>
                    </div>
                </div>
                <div class="col-3  categ-item" id="categ-2">
                    <div class="categ-inside-text">
                        <h5>
                            <a href="mobiles.php">Mobiles</a>
                        </h5>
                    </div>
                </div>
                <div class="col-3  categ-item" id="categ-3">
                    <div class="categ-inside-text">
                        <h5>
                            <a href="accessories.php">Accessories</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="featured p-0">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM product JOIN feature WHERE product.pfeatured = 1 group by product.pid LIMIT 6";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
        if (mysqli_num_rows($result) > 0) {
        ?>
            <div class="insta-heading">
                <a href="shop.php">
                    <h2 class="text-center mt-5">Featured Products</h2>
                </a>
            </div>
            <div class="products-display container text-center">
                <?php
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
                                    <p class="shop_card-text m-0 secondary-color"><?php echo "Rs. " . $row['pprice']; ?></p>
                                    <input type="hidden" name="cart_quantity" id="" value="1">
                                    <input type="hidden" name="product_id" id="" value="<?php echo $row['pid']; ?>">
                                    <button type="submit" class="btn shop_card-btn py-0 px-1"><i class="fa fa-shopping-bag text-white" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>


    <!-- Laptops -->

    <section class="laptops">
        <div class="container-fluid">
            <div class="row justify-content-center my-6">
                <!-- side-section -->
                <div class="col-md-3 side-section ml-md-4 mb-md-0 mb-5" id="laptop-sidebar">
                    <div class="inside-section">
                        <h3>Laptops</h3>
                        <h5>
                            <a href="laptops.php" class="text-white">Discover More</a>
                        </h5>
                    </div>
                </div>
                <!-- Card Carousel -->
                <div class="col-8">
                    <!-- <ul class="nav justify-content-center my-5">
                        <li class="nav-item mr-5"><a href="" class="nav-link active">Mac Books</a></li>
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hp Laptops</a></li>
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dell Laptops</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Other Brands</a></li>
                    </ul> -->
                    <!--==========================================-->
                    <!--            Product Carousel              -->
                    <!--==========================================-->
                    <div class="slider owl-carousel">
                        <?php
                        include 'config.php';
                        $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = productcategory.categid AND pcategory=1 group by pid";
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
            </div>
        </div>
    </section>


    <div class="new_products p-0">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = productcategory.categid LIMIT 6";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
        if (mysqli_num_rows($result) > 0) {
        ?>
            <div class="insta-heading">
                <a href="shop.php">
                    <h2 class="text-center mt-5">NEW ARRIVALS</h2>
                </a>
            </div>
            <div class="products-display container text-center">
                <?php
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
                                    <small class="badge badge-warning <?php echo $tag; ?>">Featured</small>
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

                ?>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- Deal of the Week -->

    <!-- <section class="deal">
        <div class="container deal-color py-5 my-6">
            <div class="row align-items-center">
                <div class="col-lg-6" id="deal-img">
                    <img class=" img-thumbnail my-4" src="./pics/deal-of-week.jpg" alt="">
                </div>
                <div class="col-lg-6 mr-0 text-center">
                    <div class="section-title mb-5">
                        <h1>Deal of the Week</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, ratione porro? Facilis et
                            recusandae, amet eos, voluptates minus voluptatum autem molestiae praesentium delectus
                            tempore!</p>
                        <div class="price">
                            <h5 class="secondary-color d-inline">Rs.999</h5>
                            <span>/piece</span>
                        </div>
                    </div>
                    <a href="./shop.html" class="btn secondary-bg-color deal-btn">Shop Now!</a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Mobile Phones -->

    <section class="mobiles">
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <!-- side-section -->
                <div class="col-md-3 side-section mr-md-4 mb-md-0 mb-5" id="mobile-sidebar">
                    <div class="inside-section">
                        <h3>Mobiles</h3>
                        <h5>
                            <a href="mobiles.php" class="text-white">Discover More</a>
                        </h5>
                    </div>
                </div>
                <!-- Card Carousel -->
                <div class="col-8">
                    <!-- <ul class="nav justify-content-center my-5">
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Apple</a></li>
                        <li class="nav-item mr-5"><a href="" class="nav-link active">Samsung</a></li>
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Huawei</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Other Brands</a></li>
                    </ul> -->
                    <!--==========================================-->
                    <!--            Product Carousel              -->
                    <!--==========================================-->
                    <div class="slider owl-carousel">
                        <?php
                        include 'config.php';
                        $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = productcategory.categid AND pcategory=2 group by pid";
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


            </div>
        </div>
    </section>

    <!-- Instagram Pictures -->
    <section class="instagram p-0">
        <div class="container p-0">
            <div class="insta-heading">
                <h2 class="text-center mt-5">INSTAGRAM</h2>
            </div>
            <div class="row mb-6 p-0">
                <div class="col-lg-3 insta-item" id="insta-1">
                    <div class="inside-text">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <h5>
                            <a href="http://instagram.com" target="_blank">My_Store.pk</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 insta-item" id="insta-2">
                    <div class="inside-text">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <h5>
                            <a href="http://instagram.com" target="_blank">My_Store.pk</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 insta-item" id="insta-3">
                    <div class="inside-text">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <h5>
                            <a href="http://instagram.com" target="_blank">My_Store.pk</a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 insta-item" id="insta-4">
                    <div class="inside-text">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <h5>
                            <a href="http://instagram.com">My_Store.pk</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Accessories -->

    <section class="accessories">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- side-section -->
                <div class="col-md-3 side-section ml-md-4 mb-md-0 mb-5" id="accessories-sidebar">
                    <div class="inside-section">
                        <h3>Accessories</h3>
                        <h5>
                            <a href="accessories.php" class="text-white">Discover More</a>
                        </h5>
                    </div>
                </div>
                <!-- Card Carousel -->
                <div class="col-8">
                    <!-- <ul class="nav justify-content-center my-5">
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Audio</a></li>
                        <li class="nav-item mr-5"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Camera & Visual</a></li>
                        <li class="nav-item mr-5"><a href="#" class="nav-link active">Gear & Devices</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Lifestyle</a></li>
                    </ul> -->
                    <!--==========================================-->
                    <!--            Product Carousel              -->
                    <!--==========================================-->
                    <div class="slider owl-carousel">
                        <?php
                        include 'config.php';
                        $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = productcategory.categid AND pcategory=3 group by pid";
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="card d-inline-block">
                                    <form action="savetoCart.php" id="cartform" class="form cart" method="POST" enctype="multipart/form-data">
                                        <?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" ">' ?>
                                        <div class="card-body">
                                            <a class="card-title m-0  text-truncate"><?php echo $row['pname']; ?></a>
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
            </div>
        </div>
    </section>



    <!-- Benefits -->

    <section class="benefit-section p-0 mt-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-4 benefit">
                    <i class="fa fa-truck mb-3" aria-hidden="true"></i>
                    <h3 class="">FREE SHIPPING</h3>
                    <p>On order above Rs.1000.00</p>
                </div>
                <div class="col-lg-4 benefit">
                    <i class="fa fa-clock-o mb-3" aria-hidden="true"></i>
                    <h3 class="">ON TIME DELIVERY</h3>
                    <p>If no problem occour</p>
                </div>
                <div class="col-lg-4 benefit">
                    <i class="fa fa-shield mb-3" aria-hidden="true"></i>
                    <h3 class="">SECURE PAYMENT</h3>
                    <p>100% Secure Payment</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    <?php include_once "footer.php" ?>


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
                    items: 2
                },
                1300: {
                    items: 4
                }
            }
        });
    </script>
</body>

</html>