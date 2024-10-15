<?php
require 'config.php';

if(isset($_GET["id"])) {
 $id = $_GET["id"];

 $sql = "DELETE FROM `products` WHERE id='$id'";

 if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
}
?>