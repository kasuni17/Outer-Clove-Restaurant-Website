<?php
require 'config.php';

if(isset($_POST["submit"])) {
 $product_name = $_POST["product_name"];
 $price = $_POST["price"];
 $description = $_POST["description"];
 $id = $_POST["id"];

 $sql = "UPDATE `products` SET product_name='$product_name', price='$price', description='$description' WHERE id='$id'";

 if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
}
?>