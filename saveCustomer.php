<?php
include 'config.php';

$customer_firstName=mysqli_real_escape_string($conn, $_POST['cfname']);
$customer_lastName=mysqli_real_escape_string($conn, $_POST['clname']);
$customer_email=mysqli_real_escape_string($conn, $_POST['cemail']);
$customer_phone=mysqli_real_escape_string($conn, $_POST['cphone']);
$customer_address=mysqli_real_escape_string($conn, $_POST['caddress']);
$customer_city=mysqli_real_escape_string($conn, $_POST['ccity']);
$customer_zipCode=mysqli_real_escape_string($conn, $_POST['czip']);
$customer_country=mysqli_real_escape_string($conn, $_POST['ccountry']);
$customer_password=mysqli_real_escape_string($conn, md5($_POST['cpassword']));

$sql = "SELECT cemail FROM customer WHERE cemail= '{$customer_email}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");

if(mysqli_num_rows($result) > 0){
    $error="$customer_email Already Exists !";
    header("Location: {$hostname}/register.php?error=".$error);
}else{
    $insert= "INSERT INTO customer(cfname, clname, cemail, cphone, caddress, ccity, czip, ccountry,cpassword)
                VALUES('$customer_firstName','$customer_lastName','$customer_email','$customer_phone',
                '$customer_address','$customer_city','$customer_zipCode','$customer_country',
                '$customer_password')";
    if(mysqli_query($conn,$insert)){
        header("Location: {$hostname}/login.php");
    }else{
        echo "Query Unsuccessful !";
    }
}
mysqli_close($conn);
