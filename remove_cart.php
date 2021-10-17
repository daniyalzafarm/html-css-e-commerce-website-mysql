<?php 
$id=$_GET['id'];

include 'config.php';

$sql = "DELETE FROM cart WHERE cart_id={$id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

header("Location: {$hostname}/cart.php");

mysqli_close($conn);
?>