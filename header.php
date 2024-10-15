<?php
// Start the session if it is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set the session variables if they are not already set
if (!isset($_SESSION['admin_name'])) {
    $_SESSION['admin_name'] = "";
}

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['admin_email'] = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!----- box icon link----->
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="admin_style.css">
    <title>Dashboard</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="admin_panel.php" class="logo"><img src="img/logo.png" width="100" height="100"></a>
            <nav class="navbar">
                <a href="admin_panel.php">home</a>
                <a href="admin_product.php">products</a>
                <a href="admin_order.php">orders</a>
                <a href="admin_user.php">users</a>
                <a href="admin_message.php">messages</a>
            </nav>
            <div class="icons">
                <i class="bx bxs-user" id="user-btn"></i>
                <i class="bx bxs-menu" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <from method="post">
                    <button type="submit" name="logout" class="logout-btn">log out</button>
                </from>
            </div>
        </div>
    </header>
    <div class="banner">
        <div class="detail">
            <h1>admin dashboard</h1>
           
        </div>
    </div>
    <div class="line"></div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>