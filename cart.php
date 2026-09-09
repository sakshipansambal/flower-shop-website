<?php
session_start();
include 'connection.php';

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Add to Cart
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];

    // Check if item already in cart
    $check = $conn->query("SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");

    if ($check->num_rows > 0) {
        // Update quantity if product already exists in cart
        $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE user_id='$user_id' AND product_id='$product_id'");
    } else {
        // Add new product to cart
        $conn->query("INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)");
    }
    header("Location: cart.php");
    exit();
}

// Remove from Cart
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $conn->query("DELETE FROM cart WHERE user_id='$user_id' AND product_id='$remove_id'");
    header("Location: cart.php");
    exit();
}

// Fetch Cart Items
$cart_items = $conn->query("
    SELECT products.id, products.name, products.price, products.image, cart.quantity 
    FROM cart 
    JOIN products ON cart.product_id = products.id 
    WHERE cart.user_id = '$user_id'
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>complete responsive flower website design</title>
    <link rel="stylesheet" href="carts.css">
</head>

<body>

    <header class="header">
        <!-- <img src="logo.png" alt=""> -->
        <!-- <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label> -->
        <!-- <a href="#" class="logo">flower<span>.</span></a> -->

        <nav class="navbar"><strong>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
            <a href="orders.php">Orders</a>
            <!-- <a href="#review">Review</a> -->
            <!-- <a href="#contact">Contact</a> -->
            <a href="logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a></strong>
        </nav>
    </header>

    <section class="cart">
        <h1 class="heading">Your <span>Cart</span></h1>
        <div class="cart-container">
        <!-- cart-container -->
            <?php $total = 0; ?>
            <?php while ($item = $cart_items->fetch_assoc()): ?>
                <div class="cart-item">
                    <img src="<?php echo $item['image']; ?>" alt=""><br>
                    <h3><?php echo $item['name']; ?></h3><br>
                    <p>₹<?php echo $item['price']; ?> x <?php echo $item['quantity']; ?></p>
                    <a href="cart.php?remove=<?php echo $item['id']; ?>" class="btn">Remove</a>
                </div>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endwhile; ?>
        </div>

        <h2>Total: ₹<?php echo $total; ?></h2>
        <a href="checkout.php" class="btn">Proceed to Checkout</a>
    </section>

</body>

</html>