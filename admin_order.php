<?php

    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)) {
        header('location:login.php');
    }

    if (isset($_POST['logout'])) {
       session_destroy();
       header('location:login.php');
    }
  
     //delete products from database
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
       
        mysqli_query($conn, "DELETE FROM `order` WHERE id = '$delete_id'") or die('query failed');
        $message[]='user removed successfully';
        header('location:admin_order.php');
    }
    //updating payment status

  

?>
<style type="text/css">
    <?php 
        include 'admin_style.css';
    ?>

 body {
   background-color: #d6efff;
   background-image: linear-gradient(43deg, #d6efff 0%, #1f1313 46%, #ef9c1c 100%);
   font-family: Arial, sans-serif;  
   
 }

 h1{
    color:aliceblue
 }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----- box icon link----->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>admin - order page</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <?php
            if (isset($message)) {
                foreach ($message as $message) { 
                    echo '
                        <div class="message">
                            <span>'.$message.'</span>
                            <i class="bx bxs-circle" onclick="this.parentElement.remove()"></i>
                        </div>
                    ';
                }
            }
    ?>

        <div class="line4"></div>
        <section class="order-container">
            <h1 class="title">Total Orders</h1>
            <div class="box-container">
                <?php 
                    $select_orders = mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
                    if (mysqli_num_rows($select_orders)>0) {
                        while ($fetch_orders = mysqli_fetch_assoc($select_orders)){

                ?>
                <div class="box">
                    <p>user name: <span><?php echo $fetch_orders['name']; ?></span></p>
                    
    
                    <p>number: <span><?php echo $fetch_orders['number']; ?></span></p>
                    <p>email: <span><?php echo $fetch_orders['email']; ?></span></p>
                    <p>total price: <span><?php echo $fetch_orders['total_price']; ?></span></p>
                    <p>method: <span><?php echo $fetch_orders['method']; ?></span></p>
                    <p>address: <span><?php echo $fetch_orders['address']; ?></span></p>
                    <p>total product: <span><?php echo $fetch_orders['total_products']; ?></span></p>
                    <from method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                       
                       
                        <a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>;" onclick="return confirm('delete this message');">delete</a>
                    </from>
                   
                </div>
                <?php 
                        }
                    }else{
                        echo '
                        <div class="empty">
                            <p>no order placed yet!</p>
                        </div>                            
                    ';
                    }
                ?>
            </div>
        </section>
       
    <script type="text/javascript" src="script.js"></script>
</body>
</html>