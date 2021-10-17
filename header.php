<?php
if (!session_id()) {
    session_start();
}
?>
<header class="header-section">

    <!-- Header Top -->
    <div class="header-top primary-bg-color p-0" id="top-header">
        <div class="container p-0">
            <div class="row text-white py-2">
                <div class="col-6 text-left p-0">
                    <div class="mail d-inline p-0 mr-3">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        mystore@gmail.com
                    </div>
                    <div class="number d-inline pl-3 border-left  ">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +92-300-1234567
                    </div>
                </div>
                <div class="col-6 text-right p-0">
                    <div class="sociallinks d-inline border-right">
                        <a href="https://www.facebook.com/" target="_blank" class="px-2 text-white"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/" target="_blank" class="px-2 text-white"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://pk.linkedin.com/" target="_blank" class="px-2 text-white"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="https://www.pinterest.com/" target="_blank" class="pl-2 pr-3 text-white"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                    <div class="login d-inline ml-3">

                        <?php
                        if (!isset($_SESSION["email"]) && !isset($_SESSION["admin"])) {
                            echo '<a href="login.php" class="signin"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>Login</a>';
                        } else {
                            echo '<a href="logout.php" class="signout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inner Header -->
    <div class="container p-0">
        <div class="inner-header">
            <div class="row">
                <div class="col-md-2 logo pb-md-5 pt-5 mr-md-5 text-center">
                    <a href="./index.php">
                        <img src="./pics/logo.png" alt="MyStore.pk">
                    </a>
                </div>
                <div class="col-md-7 p-0">
                    <form action="search_product.php" id="search" class="form search" method="POST" enctype="multipart/form-data">
                        <div class="search input-group py-5 mx-auto" id="search-section">
                            <input class="search-text w-100" type="text" name="search" id="searchbar" placeholder="Search in Products...">
                            <!-- <div class="input-group-append ">
                            <a href="" class="btn secondary-bg-color text-white">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Search
                            </a>
                        </div> -->
                        </div>
                    </form>
                </div>
                <div class="col-md-2 p-0" id="header-cart-btn">
                    <ul class="cart list-unstyled py-5 text-center m-0">
                        <li class="d-inline ml-5">
                            <a href="cart.php" class="btn secondary-bg-color text-white card-btn mr-3"><i class="fa fa-shopping-bag" aria-hidden="true"><span class="ml-3 font-weight-bolder">Cart</span></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Navigation Bar -->

    <nav class="navbar  navbar-dark navbar-expand-lg primary-bg-color p-0">

        <div class="container p-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav justify-content-center mx-auto">
                    <li class="nav-item border-right"><a href="./index.php" class="nav-link nav-padding">Home</a>
                    </li>
                    <li class="nav-item border-right dropdown">
                        <a href="./shop.php" class="nav-link nav-padding dropdown-toggle" data-toggle="dropdown">Collection</a>
                        <div class="dropdown-menu p-0 m-0 border-0">
                            <a href="shop.php" class="dropdown-item nav-link" id="allproducts">All Products</a>
                            <a href="laptops.php" class="dropdown-item nav-link">Laptops</a>
                            <a href="mobiles.php" class="dropdown-item nav-link">Mobiles</a>
                            <a href="accessories.php" class="dropdown-item nav-link">Accessories</a>
                            <a href="other_items.php" class="dropdown-item nav-link">Other Items</a>
                        </div>
                    </li>
                    <li class="nav-item border-right"><a href="./cart.php" class="nav-link nav-padding">Cart</a></li>
                    <li class="nav-item border-right"><a href="./contact.php" class="nav-link nav-padding">Contact</a></li>
                    <?php
                    if (!isset($_SESSION["email"]) && !isset($_SESSION["admin"])) {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link nav-padding">Login</a></li>';
                    } elseif (isset($_SESSION["admin"])) {
                        echo '<li class="nav-item"><a href="profile_admin.php" class="nav-link nav-padding">ADMIN</a></li>';
                    } elseif (isset($_SESSION["email"])) {
                        echo '<li class="nav-item"><a href="profile_customer.php" class="nav-link nav-padding">Hello <b>' . $_SESSION["name"] . ' !</b></a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>


    <!-- 
    <div class="navbar primary-bg-color p-0">

        <div class="container p-0">
            <div class="row mx-auto">
                <div class="col">
                    <ul class="nav justify-content-center">
                        <li class="border-right"><a href="./index.php" class="nav-link nav-padding">Home</a>
                        </li>
                        <li class="border-right nav-item dropdown">
                            <a href="./shop.php" class="nav-link nav-padding dropdown-toggle" data-toggle="dropdown">Collection</a>
                            <div class="dropdown-menu p-0 m-0 border-0">
                                <a href="shop.php" class="dropdown-item nav-link">All Products</a>
                                <a href="laptops.php" class="dropdown-item nav-link">Laptops</a>
                                <a href="mobiles.php" class="dropdown-item nav-link">Mobiles</a>
                                <a href="accessories.php" class="dropdown-item nav-link">Accessories</a>
                                <a href="other_items.php" class="dropdown-item nav-link">Other Items</a>
                            </div>
                        </li>
                        <li class="border-right"><a href="./cart.php" class="nav-link nav-padding">Cart</a></li>
                        <li class="border-right"><a href="./contact.php" class="nav-link nav-padding">Contact</a></li>
                        <?php
                        // if (!isset($_SESSION["email"]) && !isset($_SESSION["admin"]) ) {
                        //     echo '<li class=""><a href="login.php" class="nav-link nav-padding">Login</a></li>';
                        // } elseif(isset($_SESSION["admin"])) {
                        //     echo '<li class=""><a href="profile_admin.php" class="nav-link nav-padding">ADMIN</a></li>';
                        // } elseif(isset($_SESSION["email"])) {
                        //     echo '<li class="profile_customer.php"><a href="profile_customer.php" class="nav-link nav-padding">Hello <b>' . $_SESSION["name"] . ' !</b></a></li>';
                        // }
                        ?>


                        <li class="nav-item dropdown">
                            <a href="" class="nav-link nav-padding dropdown-toggle" data-toggle="dropdown">More</a>
                            <div class="dropdown-menu p-0 m-0 border-0">
                                <a href="./register.php" class="dropdown-item nav-link">Register</a>
                                <a href="./login.php" class="dropdown-item nav-link">Login</a>
                                <a href="./checkout.php" class="dropdown-item nav-link">Checkout</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div> -->
</header>