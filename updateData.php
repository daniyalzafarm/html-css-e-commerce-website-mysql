<?php 
$prod_id=$_POST['pid'];
$prod_name=$_POST['pname'];
$prod_category=$_POST['pcateg'];
$prod_price=$_POST['pprice'];
$prod_saleprice=$_POST['psprice'];
$prod_quantity=$_POST['pquantity'];
$prod_feature=$_POST['pfeature'];
$prod_psdescription=$_POST['psdescription'];
$prod_pldescription=$_POST['pldescription'];

include 'config.php';
$sql = "UPDATE product SET pname='{$prod_name}',pcategory='{$prod_category}',pprice='{$prod_price}',psprice='{$prod_saleprice}', pquantity='{$prod_quantity}',pfeatured='{$prod_feature}',psdescription='{$prod_psdescription}',pldescription='{$prod_pldescription}' WHERE pid='{$prod_id}'";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

header("Location: {$hostname}/delete_product.php");

mysqli_close($conn);
?>