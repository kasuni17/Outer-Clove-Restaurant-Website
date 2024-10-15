<?php
require 'connection.php';

if(isset($_POST["submit"])) {
 $product_name = $_POST["product_name"];
 $price = $_POST["price"];
 $description = $_POST["description"];

 $target_dir = "uploads";
 $target_file = $target_dir . basename($_FILES["image"]["name"]);

 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 if (!is_dir($target_dir)) {
    die("Upload directory does not exist.");
 }

 if (!is_writable($target_dir)) {
    die("Upload directory is not writable.");
 }

 if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
 }

 if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
 }

 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
 }

 if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
 } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }

 $sql = "INSERT INTO `products` (product_name, price, image, description) VALUES ('$product_name', '$price', '$image', '$description')";

 if ($conn->query($sql) === TRUE) {
    echo "New product added successfully";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
}
?>