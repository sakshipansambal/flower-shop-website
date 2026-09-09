<?php
session_start();
include 'connection.php';
// 8554890623
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>user registration page</title>
</head>

<body>

    <section class="form-container">
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
              <div class="message">
              <span>' . $message . '</span>
              <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
              </div>
            ';
            }
        }
        ?>
        <form action="" method="post">
            <h3>login now</h3>

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Do not have an account? <a href="register.php">register now</a></p>
        </form>
    </section>
</body>

</html>



