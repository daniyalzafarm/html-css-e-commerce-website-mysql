<?php
session_start();
include 'config.php';

if(!isset($_SESSION["name"])){
    header("Location: {$hostname}/login.php");
}else{

    $customer_id = $_SESSION["customer_id"];
    $prod_id = $_POST['product_id'];
    $cart_quantity = $_POST['cart_quantity'];

    $sql = "SELECT * FROM cart where cart.pid=$prod_id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
 

    if (mysqli_num_rows($result) == 0) {

    $sql1 = "SELECT * FROM product where pid=$prod_id";
    $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful !");
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "INSERT INTO cart(cid,pid,cartQuantity)
    VALUES ('{$customer_id}','{$prod_id}','{$cart_quantity}')";
    $result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful !");

    } else {
    $row = mysqli_fetch_assoc($result);
    $quan=$cart_quantity+$row['cartquantity'];
    $sql = "UPDATE cart SET cartquantity={$quan} WHERE cart.pid=$prod_id";
    
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    }
    
    
    header("Location: {$hostname}/shop.php");

}

mysqli_close($conn);
