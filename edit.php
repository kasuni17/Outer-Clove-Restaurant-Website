<?php include 'admin_header.php'; ?>

<?php
require 'config.php';

if(isset($_GET["id"])) {
 $id = $_GET["id"];

 $sql = "SELECT * FROM `products` WHERE id='$id'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<form action='update.php' method='post'>";
      echo "<label>Product Name :</label><br>";
      echo "<input type='text' name='product_name' value='".$row["product_name"]."'><br>";
      echo "<label>Price :</label><br>";
      echo "<input type='text' name='price' value='".$row["price"]."'><br>";
      echo "<label>Description :</label><br>";
      echo "<textarea name='description'>".$row["description"]."</textarea><br>";
      echo "<input type='hidden' name='id' value='".$row["id"]."'>";
      echo "<input type='submit' name='submit' value='Update'>";
      echo "</form>";
    }
 } else {
    echo "0 results";
 }

 $conn->close();
}
?>
<style type="text/css">
    <?php 
        include 'assets/css/edit.css';
    ?>
</style>