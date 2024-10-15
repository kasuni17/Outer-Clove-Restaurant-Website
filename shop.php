
<!DOCTYPE html>
<html>
<head>
<style>
body {
 font-family: Arial, sans-serif;
 margin: 0;
 padding: 0;
 background-image: url("images/about-bg.jpg");
 background-repeat: no-repeat;
 background-size: cover;
}

.container {
 display: flex;
 flex-direction: column;
 align-items: center;
 padding: 50px;
}

h2 {
 color: #fff;
 margin-bottom: 30px;
}

table {
 font-family: Arial, sans-serif;
 border-collapse: collapse;
 width: 100%;
 margin-bottom: 50px;
}

 th {
 border: 2px solid #000;
 text-align: left;
 padding: 8px;
 background-color: #fff;
 
}

td {
 border: 2px solid #000;
 text-align: left;
 padding: 8px;
 
}

tr:nth-child(even) {
  background-color: #afac5d;
  background-image: linear-gradient(0deg, #afac5d 0%, #dfd8c8 100%);

}

form {
 display: inline-block;
}

input[type="submit"] {
 background-color: #000;
 color: white;
 padding: 8px 16px;
 border: none;
 cursor: pointer;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 font-size: 16px;
 margin: 4px 2px;
 transition-duration: 0.4s;
 border-radius: 12px;
}

input[type="submit"]:hover {
 background-color: #E26310;
}

.logo-img {
 position: absolute;
 top: -5px;
 left: 20px;
 width: 100px;
 height: 100px;
}

nav {
 display: flex;
 justify-content: space-around;
 width: 100%;
 background-color: #333;
 padding: 10px;
}

nav a {
 color: white;
 text-decoration: none;
 padding: 10px;
}

nav a:hover {
 background-color: #ddd;
 color: black;
 border-radius: 5px;
}
</style>
</head>
<body>

<div class="container">
<br>
<br>
<br>
 <nav>
    <a href="home.html">Home</a>
    <a href="about.html">About Us</a>
    <a href="contact.html">Contact</a>
    <a href="menu.html">Menus</a>
    <a href="shop.php">Order Online</a>
    <a href="gallery.html">Gallery</a>
    <a href="reservation.html">Find a Table </a>
    
    
 </nav>

 <img class="logo-img" src="img/logoblack.png" alt="Logo">

<h2>Online Order Page</h2>

<table>
 <tr>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Description</th>
    <th>Image</th>
    <th>Add to Cart</th>
 </tr>
 <?php
    // Database connection
    $host = 'localhost';
    $db = 'restaurant_db';
    $user = 'root';
    $password = '';
    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get product details
    $sql = "SELECT  product_name, price, description, image FROM `products`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["price"]. "</td><td>" . $row["description"]. "</td><td>" . $row["image"]. "</td><td><form method='post' action='add_to_cart.php'><input type='hidden' name='product_name' value='" . $row["product_name"] . "'><input type='submit' value='Add to Cart'></form></td></tr>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
 ?>
</table>

<h2>Shopping Cart</h2>

<table>
 <tr>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Remove from Cart</th>
 </tr>
 <?php
    // Database connection
    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get product details
    $sql = "SELECT p.product_name, p.price FROM `cart` c JOIN `products` p ON c.product_name = p.product_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["price"]. "</td><td><form method='post' action='remove_from_cart.php'><input type='hidden' name='product_name' value='" . $row["product_name"] . "'><input type='submit' value='Remove from Cart'></form></td></tr>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
 ?>
</table>

<h2>Order Online</h2>
<form method="post" action="order_online.php">
 <input type="submit" value="Order Online">
</form>
</div>
</body>
</html>