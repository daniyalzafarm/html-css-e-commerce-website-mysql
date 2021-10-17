<?php
if (!session_id()) {
    session_start();
}
include 'config.php';

$customer_firstName = mysqli_real_escape_string($conn, $_POST['cfname']);
$customer_lastName = mysqli_real_escape_string($conn, $_POST['clname']);
$customer_phone = mysqli_real_escape_string($conn, $_POST['cphone']);
$customer_address = mysqli_real_escape_string($conn, $_POST['caddress']);
$customer_city = mysqli_real_escape_string($conn, $_POST['ccity']);
$customer_zipCode = mysqli_real_escape_string($conn, $_POST['czip']);
$customer_country = mysqli_real_escape_string($conn, $_POST['ccountry']);

$customerid;
if (isset($_SESSION["customer_id"])) {
    $customerid = $_SESSION["customer_id"];
}
if (isset($_SESSION["admin_id"])) {
    $customerid = $_SESSION["admin_id"];
}
// $sql = "SELECT * FROM customer WHERE cid=" . $customerid;
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

$update = "UPDATE customer SET cfname='$customer_firstName', clname='$customer_lastName', cphone='$customer_phone', caddress='$customer_address', ccity = '$customer_city', czip='$customer_zipCode', ccountry='$customer_country'
            WHERE cid=" . $customerid;
$result = mysqli_query($conn, $update) or die("Query Unsuccessful !");

if (isset($_SESSION["customer_id"])) {
    header("Location: {$hostname}/profile_customer.php");
}
if (isset($_SESSION["admin_id"])) {
    header("Location: {$hostname}/profile_admin.php");
}

mysqli_close($conn);
