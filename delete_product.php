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
                    <h3 class="secondary-color d-inline">UPDATE / DELETE PRODUCT</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="cart">
        <!-- <div class="container">
            <div class="row mt-5">
                <div class="col-12 search input-group justify-content-center">
                    <form action="search_product.php" id="search" class="form search" method="POST" enctype="multipart/form-data">
                        <input class="search-text w-100" type="text" name="search" id="searchbar" placeholder="Search in Products...">
                    </form>
                </div>
            </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table my-5">

                        <div class="table-responsive">
                            <?php

                            include 'config.php';
                            $sql = "SELECT * FROM product JOIN productcategory WHERE product.pcategory = productcategory.categid";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                            if (mysqli_num_rows($result) > 0) {
                            ?>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price / Rs.</th>
                                            <th>Sale Price / Rs.</th>
                                            <th>Remaining Quantity</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo '#' . $row['pid']; ?></td>
                                                <td><?php echo '<img src="uploaded_Files/' . $row['pmain_image'] . '" width="100px height="30px" ">' ?></td>
                                                <td><?php echo $row['pname']; ?></td>
                                                <td><?php echo $row['categname']; ?></td>
                                                <td><?php echo $row['pprice']; ?></td>
                                                <td><?php echo $row['psprice']; ?></td>
                                                <td><?php echo $row['pquantity'] . ' pieces'; ?></td>
                                                <td>
                                                    <a href="update_product.php?id=<?php echo $row['pid']; ?>" class="text-info m-3 product_action"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <a href="remove_product.php?id=<?php echo $row['pid']; ?>" class="text-danger m-3 product_action"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            <?php
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript" src="./form-validation.js"></script>
    <?php include_once "admin_footer.php" ?>
</body>

</html>