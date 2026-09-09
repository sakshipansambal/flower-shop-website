<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Calculate Total Price
$total = $conn->query("
    SELECT SUM(products.price * cart.quantity) AS total 
    FROM cart 
    JOIN products ON cart.product_id = products.id 
    WHERE cart.user_id = '$user_id'
")->fetch_assoc()['total'];

// Insert into Orders Table
$conn->query("INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$total')");

// Clear Cart
$conn->query("DELETE FROM cart WHERE user_id = '$user_id'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="checkout.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h2>Order Placed Successfully!</h2>
        <p>Total Amount: ₹<?php echo $total; ?></p>
        <a href='orders.php' class='btn'>View Orders</a>
    </div>
</body>
</html>