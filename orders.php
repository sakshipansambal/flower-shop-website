<?php
session_start();
include 'connection.php';

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch User Orders
$orders = $conn->query("
    SELECT id, total_price, created_at 
    FROM orders 
    WHERE user_id = '$user_id' 
    ORDER BY created_at DESC
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Orders - flower E-Commerce</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>

<header class="header">
    <img src="veeda_images/veedaLogo.png" alt="">
    <nav class="navbar"><strong>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.php">Cart</a>
        <a href="orders.php">Orders</a>
        <a href="about.php">About</a>
        <a href="logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a></strong>
    </nav>
</header>

<section class="orders">
    <h1 class="heading">Your <span>Orders</span></h1>
    <div class="order-container">
        <?php while ($order = $orders->fetch_assoc()): ?>
            <div class="order">
                <h3>Order #<?php echo $order['id']; ?></h3>
                <p>Total: ₹<?php echo $order['total_price']; ?></p>
                <p>Placed on: <?php echo $order['created_at']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

</body>
</html>
