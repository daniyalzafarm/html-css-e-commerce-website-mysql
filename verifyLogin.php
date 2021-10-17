<?php

include_once "./links.php";
include 'config.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

$sql = "SELECT cid , cemail, cfname FROM customer WHERE cemail='{$email}' AND cpassword='{$password}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();


        if ($email == 'daniyalzafar40@gmail.com') {
            $_SESSION["admin"] = "admin";
            $_SESSION["admin_id"] = $row['cid'];
            header("Location: {$hostname}/index.php");
        } else {
            $_SESSION["name"] = $row['cfname'];
            $_SESSION["email"] = $row['cemail'];
            $_SESSION["customer_id"] = $row['cid'];
            header("Location: {$hostname}/index.php");
        }
    }
} else {
    $error="Invalid Email or Password!";
    header("Location: {$hostname}/login.php?error=".$error);
}
