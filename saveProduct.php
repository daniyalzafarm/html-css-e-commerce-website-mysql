<?php
$prod_name = $_POST['pname'];
$prod_category = $_POST['pcateg'];
$prod_price = $_POST['pprice'];
$prod_saleprice = $_POST['psprice'];
$prod_quantity = $_POST['pquantity'];
$prod_feature = $_POST['pfeature'];
$prod_psdescription = $_POST['psdescription'];
$prod_pldescription = $_POST['pldescription'];


// Main-Image
$errors = array();
$mainImage_name = $_FILES['mainImage']['name'];
$mainImage_tmpname = $_FILES['mainImage']['tmp_name'];
$mainImage_type = $_FILES['mainImage']['type'];
$mainImage_size = $_FILES['mainImage']['size'];
$exp = explode('.', $mainImage_name);
$mainImage_extension = end($exp);

$extensions = array('jpg', 'jpeg', 'png');
if (in_array($mainImage_extension, $extensions) === false) {
        $errors[] = "This extension of Main Image is not allowed. Please select jpg/png image !";
}
if ($mainImage_size > 2097152) {
        $errors[] = "File size must be 2mb or lower !";
}
if (empty($errors)) {
        move_uploaded_file($mainImage_tmpname, "uploaded_Files/" . $mainImage_name);
} else {
        print_r($errors);
        die();
}


// Gallery-Images
$gallery = [];
foreach ($_FILES['galleryImages']['name'] as $key => $val) {
        $galleryerrors = array();
        $galleryImage_name = $_FILES['galleryImages']['name'];
        $galleryImage_tmpname = $_FILES['galleryImages']['tmp_name'];
        $galleryImage_type = $_FILES['galleryImages']['type'];
        $galleryImage_size = $_FILES['galleryImages']['size'];
        $exp = explode('.', $mainImage_name);
        $galleryImage_extension = end($exp);

        $galleryextensions = array('jpg', 'jpeg', 'png');
        if (in_array($galleryImage_extension, $galleryextensions) === false) {
                $galleryerrors[] = "This extension of Main Image is not allowed. Please select jpg/png image !";
        }
        if ($galleryImage_size > 2097152) {
                $galleryerrors[] = "File size must be 2mb or lower !";
        }
        if (empty($errors)) {
                array_push($gallery, $val);
                move_uploaded_file($_FILES['galleryImages']['tmp_name'][$key], './gallery/' . $val);
        } else {
                print_r($galleryerrors);
                die();
        }
}
$gallery_images = implode(",", $gallery);

include 'config.php';
$sql = "INSERT INTO product(pname,pcategory,pprice,psprice,pquantity,pfeatured,psdescription,pldescription,pmain_image,gallery_images)
        VALUES ('{$prod_name}','{$prod_category}','{$prod_price}','{$prod_saleprice}','{$prod_quantity}','{$prod_feature}','{$prod_psdescription}',
        '{$prod_pldescription}','{$mainImage_name}','{$gallery_images}')";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

header("Location: {$hostname}/delete_product.php");

mysqli_close($conn);
