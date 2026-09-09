<?php
    // About page information
    $ownerName = "Prajwal Patil";
    $ownerBio = "Welcome to our flower fusion Shop, our mission is to brighten your day with beautiful,fresh flowers for every occasion.";
    $shopName = "Flower Fusion Shop";
    $shopAddress = "Sr No.42 , Shankar Parvati Apartment, BVP Dattanagar, Ambegaon BK, Pune, 411046, India";
    $shopPhone = "+91 1234567891";
    $shopEmail = "example@gmail.com";
    
    $backgroundImage = "backgroundimg.jpg"; // Background image path
    

    // "veeda_paan_official_"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css"> <!-- Link your CSS file -->
    <title>About Us</title>
</head>
<body style="background-image: url('<?php echo $backgroundImage; ?>');">
<header class="header">
    <!-- <img src="veeda_images/veedaLogo.png" alt=""> -->
    <nav class="navbar"><strong>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.php">Cart</a>
        <a href="orders.php">Orders</a>
        <a href="about.php">About</a>
        <a href="logout.php">Logout </a></strong>
    </nav>
</header>

    <div class="about">
        <!-- <div class="owner-profile"> -->
            
            <h2><?php echo $ownerName; ?></h2>
            <p><?php echo $ownerBio; ?></p>
            <!-- <h2><?php echo $instaId; ?></h2> -->
        <!-- </div> -->
        <div class="shop-info">
            <h3>About the Shop</h3>
            <p><strong>Shop Name:</strong> <?php echo $shopName; ?></p>
            <p><strong>Address:</strong> <?php echo $shopAddress; ?></p>
            <p><strong>Phone:</strong> <?php echo $shopPhone; ?></p>
            <p><strong>Email:</strong> <a href="mailto:<?php echo $shopEmail; ?>"><?php echo $shopEmail; ?></a></p>
            
        </div>
    </div>

</body>
</html>