<?php
if (!session_id()) {
    session_start();
}
include "config.php";

$customer_id = $_SESSION["customer_id"];
$bill = $_POST['total_bill'];
$ids = $_POST['ids'];
$quan = $_POST['quan'];
$prices = $_POST['prices'];
date_default_timezone_set("Asia/Karachi");
$date = date('d/m/Y h:i:s A');
$sql2 = "INSERT INTO checkout(cid,products_id,products_quan,products_price,totalbill,order_status,order_date)
    VALUES ('{$customer_id}','{$ids}','{$quan}','{$prices}','{$bill}','Pending','{$date}')";


$result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful !");

$delete = "DELETE FROM cart";
$deleteresult = mysqli_query($conn, $delete) or die("Query Unsuccessful !");
header("Location: {$hostname}/success.php");

mysqli_close($conn);
