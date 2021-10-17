<?php
session_start();
include "config.php";
if (!isset($_SESSION["admin"])) {
    header("Location: {$hostname}/login.php");
}
?>


<header class="header-section">
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col my-4 text-center">
                    <h3 class="d-inline pt-3 text-white">ADMIN DASHBOARD</h3>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar  navbar-dark navbar-expand-lg primary-bg-color p-0">

        <div class="container p-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav justify-content-center mx-auto">
                    <li class="nav-item border-right"><a href="profile_admin.php" class="nav-link py-3">Manage Profile</a></li>
                    <li class="nav-item border-right dropdown">
                        <a href="" class="nav-link py-3 dropdown-toggle" data-toggle="dropdown">Product Operations</a>
                        <div class="dropdown-menu p-0 m-0 border-0">
                            <a href="add_product.php" class="dropdown-item nav-link">Add Product</a>
                            <a href="delete_product.php" class="dropdown-item nav-link">Search / Update / Delete Product</a>
                        </div>
                    </li>

                    <li class="nav-item border-right dropdown">
                        <a href="" class="nav-link py-3 dropdown-toggle" data-toggle="dropdown">Manage Orders</a>
                        <div class="dropdown-menu p-0 m-0 border-0">
                            <a href="manageOrders.php" class="dropdown-item nav-link">Approve Orders</a>
                            <a href="waiting&delivery.php" class="dropdown-item nav-link">Waiting & Delivery</a>
                            <a href="canceledOrders.php" class="dropdown-item nav-link">Canceled Orders</a>
                        </div>
                    </li>
                    <li class="nav-item border-right"><a href="manageCustomers.php" class="nav-link py-3">Manage Customers</a></li>
                    <li class="nav-item border-right dropdown">
                        <a href="" class="nav-link py-3 dropdown-toggle" data-toggle="dropdown">More Options</a>
                        <div class="dropdown-menu p-0 m-0 border-0">
                            <a href="showSuggestion.php" class="dropdown-item nav-link">Suggestions</a>
                        </div>
                    </li>
                    <li class=""><a href="logout.php" class="nav-link py-3">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>

</header>