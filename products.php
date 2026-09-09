<?php
session_start();
include 'connection.php';

// Fetch products from database
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - flower E-Commerce</title>
    <link rel="stylesheet" href="product.css">
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
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a></strong>
        <?php endif; ?>
    </nav>
</header>

 <!-- Product Section -->
 <section class="products" id="products">
    <h1 class="heading"> Our <span>Products</span></h1>
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()): ?>
                <div class="swiper-slide box">
                    <div class="product">
                        <img src="<?php echo $row['image']; ?>" alt="">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>₹<?php echo $row['price']; ?></p>
                        <a href="cart.php?add=<?php echo $row['id']; ?>" class="btn">Add to Cart</a>
                    </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>







</body>
</html>
<!-- SwiperJS Initialization -->
<script>
    var swiper = new Swiper(".product-slider", {
        loop: true,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });
</script>