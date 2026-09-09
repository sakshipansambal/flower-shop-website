<?php
session_start();
include 'connection.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    echo "Access Denied. <a href='admin_login.php'>Login as Admin</a>";
    exit();
}

// Handle Product Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle Image Upload
    $target_dir = "uploaded/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert Product into Database
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Product added successfully! <a href='products.php'>View Products</a></p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product - Veeda E-Commerce</title>
    <link rel="stylesheet" href="add_product.css">
</head>
<body>

<header class="header">
    <h2>Admin Panel</h2>
    <nav>
        <a href="add_product.php">Add Product</a>
        <a href="products.php">View Products</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<section class="add-product">
    <h1>Add New Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <input type="file" name="image" required>
        <button type="submit">Add Product</button>
    </form>
</section>

</body>
</html>
