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
                    <h3 class="secondary-color d-inline">WAITING AND DELIVERY</h3>
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
                    <div class="cart-table my-5" id="waiting">
                        <div class="insta-heading">
                            <h2 class="text-center mt-5">ORDERS TO BE DELIVER</h2>
                        </div>
                        <div class="table-responsive">
                            <?php

                            include 'config.php';
                            $sql1 = "SELECT * FROM checkout join customer on checkout.cid=customer.cid WHERE checkout.order_status='Waiting'";
                            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful !");
                            if (mysqli_num_rows($result1) > 0) {
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
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo "#" . $row1['checkout_id']; ?></td>
                                                <td><?php echo "#" . $row1['cid']; ?></td>
                                                <td><?php echo $row1['cfname'] . " " . $row1['clname'] ?></td>
                                                <td><?php echo $row1['totalbill']; ?></td>
                                                <td><?php echo $row1['order_status']; ?></td>

                                                <td>
                                                    <a href="orderApprove.php?id=<?php echo $row1['checkout_id']; ?>&status=2" class="text-success m-3 product_action"><i class="fa fa-truck" aria-hidden="true"></i></a>
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
                    <div class="cart-table my-5" id="DELIVERED">
                        <div class="insta-heading">
                            <h2 class="text-center mt-5">DELIVERED ORDERS</h2>
                        </div>
                        <div class="table-responsive">
                            <?php
                            $sql2 = "SELECT * FROM checkout join customer on checkout.cid=customer.cid WHERE checkout.order_status='Delivered'";
                            $result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful !");
                            if (mysqli_num_rows($result2) > 0) {
                            ?>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>Order ID</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Total Bill / Rs.</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo "#" . $row2['checkout_id']; ?></td>
                                                <td><?php echo "#" . $row2['cid']; ?></td>
                                                <td><?php echo $row2['cfname'] . " " . $row2['clname'] ?></td>
                                                <td><?php echo $row2['totalbill']; ?></td>
                                                <td class="text-success font-weight-bold"><?php echo $row2['order_status']; ?></td>

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