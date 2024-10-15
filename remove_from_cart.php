<?php
session_start();
   $host = 'localhost';
    $db = 'restaurant_db';
    $user = 'root';
    $password = '';
    $conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];

$sql = "DELETE FROM `cart` WHERE product_name='$product_name'";

if ($conn->query($sql) === TRUE) {
 echo "Record deleted successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: shop.php");
exit();
?>