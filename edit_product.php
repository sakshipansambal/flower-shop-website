<?php
session_start();
include 'connection.php';

// Check admin login
if (!isset($_SESSION['admin_id'])) {
    echo "Access Denied. <a href='admin_login.php'>Login as Admin</a>";
    exit();
}

$product_id = $_GET['id'];

// Fetch existing product details
$product = $conn->query("SELECT * FROM products WHERE id='$product_id'")->fetch_assoc();

// Handle Product Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle Image Upload (Optional)
    if ($_FILES['image']['name']) {
        $target_dir = "uploaded/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_update = ", image='$target_file'";
    } else {
        $image_update = "";
    }

    // Update Database
    $conn->query("UPDATE products SET name='$name', description='$description', price='$price' $image_update WHERE id='$product_id'");

    echo "<p>Product updated successfully! <a href='manage_products.php'>Back to Products</a></p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product - Admin Panel</title>
    <link rel="stylesheet" href="edit_product.css">
</head>
<body>

<header class="header">
    <h2>Admin Panel</h2>
</header>

<section class="edit-product">
    <h1>Edit Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        <textarea name="description" required><?php echo $product['description']; ?></textarea>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>
        <input type="file" name="image">
        <button type="submit">Update Product</button>
    </form>
</section>

</body>
</html>
