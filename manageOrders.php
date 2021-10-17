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
                    <h3 class="secondary-color d-inline">APPROVE ORDERS</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="cart">
        <!-- <div class="container">
            <div class="row mt-5">
                <div class="col-12 search input-group justify-content-center">
                    <input class="search-text" type="text" name="" id="searchbar" placeholder="Search Orders ...">
                    <div class="input-group-append ">
                        <a href="" class="btn secondary-bg-color text-white">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Search
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table my-5" id="pending">
                        <!-- <div class="insta-heading">
                            <h2 class="text-center mt-5">PENDING ORDERS</h2>
                        </div> -->
                        <div class="table-responsive">
                            <?php

                            include 'config.php';
                            $sql = "SELECT * FROM checkout join customer on checkout.cid=customer.cid WHERE checkout.order_status='Pending'";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                            if (mysqli_num_rows($result) > 0) {
                            ?>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>Order ID</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Total Bill / Rs.</th>
                                            <th>Order Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo "#" . $row['checkout_id']; ?></td>
                                                <td><?php echo "#" . $row['cid']; ?></td>
                                                <td><?php echo $row['cfname'] . " " . $row['clname'] ?></td>
                                                <td><?php echo $row['totalbill']; ?></td>
                                                <td><?php echo $row['order_status']; ?></td>

                                                <td>
                                                    <a href="orderApprove.php?id=<?php echo $row['checkout_id']; ?>&status=1" class="text-success m-3 product_action"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                                                    <a href="orderApprove.php?id=<?php echo $row['checkout_id']; ?>&status=3" class="text-danger m-3 product_action"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
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