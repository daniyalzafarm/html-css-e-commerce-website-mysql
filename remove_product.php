<?php 
$prod_id=$_GET['id'];

include 'config.php';


$sql = "DELETE FROM product WHERE pid={$prod_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

header("Location: {$hostname}/delete_product.php");

mysqli_close($conn);
