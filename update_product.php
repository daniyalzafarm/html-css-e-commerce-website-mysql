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
                    <h3 class="secondary-color d-inline">UPDATE PRODUCT</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Page Content -->
    <section class="update-product">
        <div class="container-fluid">

            <?php

            include 'config.php';
            $productid = $_GET['id'];
            $sql = "SELECT * FROM product WHERE pid = {$productid}";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");


            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result)
            ?>
                <form action="updateData.php" id="updateProductform" class="form updateProduct" onsubmit="return validateProduct()" method="POST">
                    <div class="row mb-5 justify-content-center">
                        <div class="col-6">
                            <div class="row pt-5 mb-1">
                                <div class="col-6 form-field">
                                    <label for="pname">Product Name<span>*</span></label>
                                    <input class="form-input" type="hidden" name="pid" id="pid" value="<?php echo $row['pid']; ?>">
                                    <input class="form-input" type="text" name="pname" id="pname" value="<?php echo $row['pname']; ?>">
                                    <small>Error</small>
                                </div>
                                <div class="col-6 form-field">
                                    <label for="categ">Category<span>*</span></label><br>
                                    <?php
                                    $sql1 = "SELECT * FROM productcategory";
                                    $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful !");
                                    if (mysqli_num_rows($result1) > 0) {
                                        echo "<select name='pcateg' id='categ' class='custom-select category'>
                                            <option value='select' class='category'>Select Category</option>";
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            if ($row['pcategory'] == $row1['categid']) {
                                                $select = 'selected';
                                            } else {
                                                $select = '';
                                            }
                                            echo "<option {$select} value='{$row1['categid']}' class='category'>{$row1['categname']}</option>";
                                        }
                                        echo '</select>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-6 form-field">
                                    <label for="price">Price<span>*</span></label>
                                    <input class="form-input" type="number" name="pprice" id="price" value="<?php echo $row['pprice']; ?>">
                                    <small>Error</small>
                                </div>
                                <div class="col-6 form-field">
                                    <label for="sale-price">Sale Price</label>
                                    <input class="form-input" type="number" name="psprice" id="sale-price" value="<?php echo $row['psprice']; ?>">
                                    <small>Error</small>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-6 form-field">
                                    <label for="quantity">Quantity<span>*</span></label>
                                    <input class="form-input" type="number" name="pquantity" id="quantity" value="<?php echo $row['pquantity']; ?>">
                                    <small>Error</small>
                                </div>
                                <div class="col-6 form-field">
                                    <label for="feature">Feature / Sale Status<span>*</span></label><br>
                                    <?php
                                    $sql2 = "SELECT * FROM feature";
                                    $result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful !");
                                    if (mysqli_num_rows($result2) > 0) {
                                        echo "<select name='pfeature' id='feature' class='custom-select category'>
                                            <option value='select' class='category'>Select</option>";
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            if ($row['pfeatured'] == $row2['fid']) {
                                                $select = 'selected';
                                            } else {
                                                $select = '';
                                            }
                                            echo "<option {$select} value='{$row2['fid']}' class='category'>{$row2['fstatus']}</option>";
                                        }
                                        echo '</select>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-12 form-field">
                                    <label for="S-descrip">Short Description<span>*</span></label>
                                    <input class="form-input" type="text" name="psdescription" id="S-descrip" value="<?php echo $row['psdescription']; ?>">
                                    <small>Error</small>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-12 form-field">
                                    <label for="L-descrip">Long Description<span>*</span></label><br>
                                    <textarea name="pldescription" id="L-descrip" cols="30" rows="5"><?php echo $row['pldescription']; ?></textarea>
                                    <small>Error</small>
                                </div>
                            </div>
                            <!-- <div class="row my-1">
                                <div class="col-6 form-field">
                                    <label for="crt-pass">Cover Image<span>*</span></label>
                                    <input type="file" name="mainImage" class="form-field" id="cover" value="<?php echo $row['pldescription']; ?>"><br>
                                    <span class="text-danger mt-3">Only jpg/jpeg/png images are allowed !</span>
                                </div>
                                <div class="col-6 form-field">
                                    <label for="cnf-pass">Gallery Images</label>
                                    <input type="file" name="galleryImages" class="" id="galleryImg" multiple="multiple"><br>
                                    <span class="text-danger mt-3">Only jpg/jpeg/png images are allowed !</span>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-12 text-right">
                                    <input type="submit" id="add-product" value="Update Product!" class="btn secondary-bg-color deal-btn w-25">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </section>


    <script type="text/javascript" src="./form-validation.js"></script>

    <footer class="footer-section primary-bg-color">
        <div class="rights border-top">
            <div class="container">
                <div class="row">
                    <div class="text my-3">
                        Copyright &#169 2020 All Rights Reserved | Made by <a class="secondary-color" href="">Daniyal
                            Zafar</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>