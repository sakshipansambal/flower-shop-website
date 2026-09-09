<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 used for simplicity; Use bcrypt in production

    $result = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if ($result->num_rows > 0) {
        $_SESSION['admin_id'] = $result->fetch_assoc()['id'];
        header("Location: manage_products.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - flower E-Commerce</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>

<header class="header">
    <h2>Admin Panel</h2>
</header>

<section class="login">
    <h1>Admin Login</h1>
    
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</section>

</body>
</html>
