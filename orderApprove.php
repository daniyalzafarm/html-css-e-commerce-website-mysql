<?php 
$id=$_GET['id'];
$status=$_GET['status'];
include 'config.php';
if($status==1){
    $sql = "UPDATE checkout SET order_status='Waiting' WHERE checkout_id=$id";
}elseif($status==2){
    $sql = "UPDATE checkout SET order_status='Delivered' WHERE checkout_id=$id";
}elseif($status==3){
    $sql = "UPDATE checkout SET order_status='Canceled' WHERE checkout_id=$id";
}elseif($status=='customercancel'){
    $sql = "UPDATE checkout SET order_status='Canceled' WHERE checkout_id=$id";
}elseif($status=='customerrecieve'){
    $sql = "UPDATE checkout SET order_status='Delivered' WHERE checkout_id=$id";
}
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

if($status=='customercancel' || $status=='customerrecieve'){
    header("Location: {$hostname}/profile_Customer.php");
}else{
    header("Location: {$hostname}/manageOrders.php");
}

mysqli_close($conn);
?>