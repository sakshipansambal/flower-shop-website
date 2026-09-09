<?php
session_start();
include 'connection.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    echo "Access Denied. <a href='admin_login.php'>Login as Admin</a>";
    exit();
}

// Handle Product Deletion
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id='$delete_id'");
    header("Location: manage_products.php");
    exit();
}

// Fetch Products
$result = $conn->query("SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products - Admin Panel</title>
    <link rel="stylesheet" href="manage_products.css">
</head>
<body>

<header class="header">
    <h2>Admin Panel</h2>
    <nav>
        <a href="add_product.php">Add Product</a>
        <a href="manage_products.php">Manage Products</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<section class="product-list">
    <h1>Manage Products</h1>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" width="80"></td>
                <td><?php echo $row['name']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                    <a href="manage_products.php?delete=<?php echo $row['id']; ?>" class="btn btn-delete">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</section>

</body>
</html>
