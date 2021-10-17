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
                    <h3 class="secondary-color d-inline">ADD PRODUCT</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="add-product">
        <div class="container-fluid">
            <form onsubmit="return validateProduct()" action="saveProduct.php" id="productform" class="form product" method="POST" enctype="multipart/form-data">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="row pt-5 mb-1">
                            <div class="col-lg-6 form-field">
                                <label for="pname">Product Name<span>*</span></label>
                                <input class="form-input" type="hidden" name="pid" id="pid">
                                <input class="form-input" type="text" name="pname" id="pname">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="pcateg">Category<span>*</span></label><br>
                                <select name="pcateg" id="pcateg" class="custom-select category">
                                    <option value="select" class="category" selected disabled>Select Category</option>
                                    <?php
                                    include 'config.php';
                                    $sql = "SELECT * FROM productcategory";
                                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['categid']; ?>" class="category"><?php echo $row['categname']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-6 form-field">
                                <label for="price">Price<span>*</span></label>
                                <input class="form-input" type="number" name="pprice" id="price" placeholder="Rs.">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="sale-price">Sale Price</label>
                                <input class="form-input" type="number" name="psprice" id="sale-price" placeholder="Optional">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-6 form-field">
                                <label for="quantity">Quantity<span>*</span></label>
                                <input class="form-input" type="number" name="pquantity" id="quantity" value="1" min="1" max="100">
                                <small>Error</small>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="feature">Feature / Sale Status<span>*</span></label><br>
                                <select name="pfeature" id="feature" class="custom-select category">
                                    <option value="select" class="category" selected disabled>Select</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "mystore.pk") or die("Database Connection Failed !");
                                    $sql = "SELECT * FROM feature";
                                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['fid']; ?>" class="category"><?php echo $row['fstatus']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="S-descrip">Short Description<span>*</span></label>
                                <input class="form-input" type="text" name="psdescription" id="S-descrip">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 form-field">
                                <label for="L-descrip">Long Description<span>*</span></label><br>
                                <textarea name="pldescription" id="L-descrip" cols="30" rows="5"></textarea>
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-6 form-field">
                                <label for="cover">Cover Image<span>*</span></label>
                                <input type="file" name="mainImage" class="form-field" id="cover"><br>
                                <span class="text-danger mt-3">Only jpg/jpeg/png images are allowed !</span>
                            </div>
                            <div class="col-lg-6 form-field">
                                <label for="galleryImg">Gallery Images</label>
                                <input type="file" name="galleryImages[]" class="" id="galleryImg" multiple="multiple"><br>
                                <span class="text-danger mt-3">Only jpg/jpeg/png images are allowed !</span>
                            </div>
                        </div>

                        <div class="row my-5">
                            <div class="col-12 text-lg-right">
                                <input type="submit" id="add-product" value="Add Product!" class="btn secondary-bg-color deal-btn  w-50">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script type="text/javascript" src="form-validation.js"></script>

    <?php include_once "admin_footer.php" ?>
</body>

</html>