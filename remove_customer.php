<?php 
$customer_id=$_GET['id'];

include 'config.php';

$sql = "DELETE FROM customer WHERE cid={$customer_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

header("Location: {$hostname}/manageCustomers.php");

mysqli_close($conn);
?>