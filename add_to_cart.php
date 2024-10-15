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

$sql = "INSERT INTO `cart` (product_name) VALUES ('$product_name')";

if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: shop.php");
exit();
?>