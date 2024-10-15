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
        
       
        mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   
        header('location:admin_message.php');
    }

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
    
    <title>admin - message page</title>
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
        <section class="message-container">
            <h1 class="title">Unread Message</h1>
            <div class="box-container">
                <?php 
                    $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                    if (mysqli_num_rows($select_message)>0) {
                        while ($fetch_message = mysqli_fetch_assoc($select_message)){

                ?>
                <div class="box">
                    <p>user id: <span><?php echo $fetch_message['id']; ?></span></p>
                    <p>name: <span><?php echo $fetch_message['name']; ?></span></p>
                    <p>email: <span><?php echo $fetch_message['email']; ?></span></p>
                    <p><?php echo $fetch_message['message']; ?></p>
                    <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>;" onclick="return confirm('delete this message');">delete</a>
                </div>
                <?php 
                        }
                    }else{
                        echo '
                        <div class="empty">
                            <p>no products added yet!</p>
                        </div>                            
                    ';
                    }
                ?>
            </div>
        </section>
       
    <script type="text/javascript" src="script.js"></script>
</body>
</html>