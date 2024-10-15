<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----- box icon link----->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin_style.css">
    
    <title>admin - product page</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <style>
 body {
   background-color: #d6efff;
   background-image: linear-gradient(43deg, #d6efff 0%, #1f1313 46%, #ef9c1c 100%);
   font-family: Arial, sans-serif;  
   
 }

.section {
 background-color: #e4e3de;
 background-image: linear-gradient(62deg, #e4e3de 0%, #F7CE68 100%);
 max-width: 600px;
 margin: 50px auto;
 padding: 20px;
 border: 1px solid #ddd;
 border-radius: 5px;
 box-shadow: 0 0 10px #ddd;
 animation: formAnimation 2s;
 background-color: #0000;

 
}
h2{
   text-align: center;
   font-size: 40px;
   color: #e4e3de;
}
h3{
   text-align: center;
   font-size: 40px;
   color: #1f1313;
}

/* Add a nice shadow on the form */
.section:hover {
 box-shadow: 0 0 20px #ddd;
}

/* Animate the form */
@keyframes formAnimation {
  0% {
    transform: translateY(-50px);
    opacity: 0;
 }
  100% {
    transform: translateY(0);
    opacity: 1;
 }
}

/* Style the form inputs */
.section input[type="text"], .section textarea, .section input[type="file"] {
 width: 100%;
 padding: 10px;
 margin: 10px 0;
 border: 1px solid #ddd;
 border-radius: 5px;
 box-sizing: border-box;
 transition: 0.3s;
 background-color: grey;
}

/* Add a hover effect on the form inputs */
.section input[type="text"]:hover, .section textarea:hover, .section input[type="file"]:hover {
 border-color: #aaa0aa;
}

/* Style the form submit button */
.section input[type="submit"] {
 background-color: olive;
 color: white;
 cursor: pointer;
 width: 100%;
 padding: 10px;
 margin: 10px 0;
 border: none;
 border-radius: 5px;
 transition: 0.3s;
}


.section input[type="submit"]:hover {
 background-color: #45a049;
}
table {
    width: 50%;
    border-collapse: collapse;
    background-color: #fdffa9;
background-image: linear-gradient(180deg, #fdffa9 0%, #ffd3bb 100%);

    margin: 0 auto;
    
}
.table-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

th, 
td {
    border: 1px solid white;
    padding: 8px;
    text-align: left;
    color: black;
}

th {
    background-color: #f2f2f2;
}


.edit-delete-button:hover {
 background-color: #f0f0f0;
}


.edit-delete-button {
 background-color: #ddd;
 border: none;
 color: black;
 padding: 5px 10px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 font-size: 16px;
 margin: 4px 2px;
 cursor: pointer;
}
</style>
   
<br>
<h2>Product Database</h2><br>

<table>
 <tr>
    <th>Product Name</th>
    <th>Price</th>
    <th>Image</th>
    <th>Description</th>
    <th>Action</th>
 </tr>
 <?php
    require 'connection.php';

    $sql = "SELECT * FROM `products`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["product_name"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td><img src='".$row["image"]."' width='50' height='50'></td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td><a href='edit.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No Products found...</td></tr>";
    }

    $conn->close();
 ?>
</table><br>
<br>
<div class="section">
  <h3>Add Product</h3>
  <form action="add.php" method="post" enctype="multipart/form-data">
  Product Name:
  <input type="text" name="product_name" required><br>
  Price:
  <input type="text" name="price" required><br>
  Select Image:
  <input type="file" name="image" required><br>
  Description:
  <textarea name="description" required></textarea><br>
  <input type="submit" value="Add Product" name="submit">
  </form>
</div>

</body>
</html>