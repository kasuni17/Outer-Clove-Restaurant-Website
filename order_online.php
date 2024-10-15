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

$sql = "SELECT c.product_name, p.product_name, p.price FROM `cart` c JOIN `products` p ON c.product_name = p.product_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 // Output data of each row
 $total_price = 0;
 while($row = $result->fetch_assoc()) {
   $total_price += $row["price"];
 }

 // Check if the 'order_total' column exists in the 'order' table
 $sql = "SHOW COLUMNS FROM `order` LIKE 'order_total'";
 $result = $conn->query($sql);

 if ($result->num_rows == 0) {
   // Create the 'order_total' column in the 'order' table if it does not exist
   $sql = "ALTER TABLE `order` ADD `order_total` DECIMAL(10,2)";
   $conn->query($sql);
 }

 $sql = "INSERT INTO `order` (order_total) VALUES ('$total_price')";

 if ($conn->query($sql) === TRUE) {
   echo "Order placed successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
} else {
 echo "0 results";
}

$conn->close();

header("Location: shop.php");
exit();
?>