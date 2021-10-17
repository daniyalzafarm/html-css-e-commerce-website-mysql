<?php
include 'config.php';

$firstName=mysqli_real_escape_string($conn, $_POST['firstname']);
$lastName=mysqli_real_escape_string($conn, $_POST['lastname']);
$suggestion=mysqli_real_escape_string($conn, $_POST['message']);

$sql = "INSERT INTO suggestion(fname, lname, suggestion) VALUES('$firstName','$lastName','$suggestion')";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
header("Location: {$hostname}/contact.php");
mysqli_close($conn);
