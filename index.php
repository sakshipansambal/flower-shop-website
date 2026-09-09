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
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower</title>

    <!--font awesome cdn link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!--custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--header section starts-->
    <header class="header">
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">flower<span>.</span></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="cart.php">Cart</a>
            <a href="orders.php">Orders</a>
            <a href="#review">review</a>
            <!-- <a href="#contact">contact</a> -->

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a></strong>
            <?php endif; ?>
        </nav>

        <!-- <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div> -->
    </header>

    <!--header section ends-->

    <!--home section starts-->

    <section class="home" id="home">

        <div class="content">
            <p class="h"><b>Fresh Flowers</b></p>
            <span style="color:#fa067c;font-size:3rem;"> Natural and beautiful flowers</span>
            <div class="para">
                <p> Welcome to Flower Shop, your one-stop destination for </p>
                <p>exquisite floral arrangements and personalized gifts! </p>
                <p> Nestled in the heart of Katraj, we pride ourselves on</p>
                <p>offering a stunning selection of fresh, locally-sourced flowers,</p>
                <p> meticulously crafted into breathtaking bouquets and</p>
                <p> unique designs for every occasion..</p>
            </div>
            <!-- <a href="#" class="btn">shop now</a> -->
        </div>
    </section>
    <!--home section ends-->

    <!--about section starts-->

    <section class="about" id="about">
        <h1 class="heading"> <span> about </span> us </h1>
        <div class="row">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bXlQ3Mw4uGc?si=53TFG1pIVrwlgmD6"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <h3>Best flower sellers</h3>
            </div>
            <div class="content">
                <h3>Why choose us ?</h3>
                <p>Welcome to Flower Fusion, where nature's beauty blossoms in every arrangement!
                    With a passion for floristry and an unwavering commitment to quality, we have been creating stunning
                    floral designs for 5 years.
                    Our team of talented florists hand-selects each bloom, ensuring that only the freshest and most
                    vibrant flowers are crafted into exquisite bouquets and arrangements tailored for every occasion.
                    Whether you’re celebrating a wedding, commemorating a special event, or simply brightening someone's
                    day, we are dedicated to making your floral dreams come true.
                    At Flower Fusion, we believe that flowers have the power to convey emotions and create lasting
                    memories.
                    Join us in celebrating the beauty of nature and let us help you express your thoughts and feelings
                    through the art of flowers!

                    <a href="#" class="btn">Learn more</a>
            </div>
        </div>
    </section>
    <!--about section ends-->

    <!--icons section starts-->
    <section class="icons-container">
        <div class="icons">
            <img src="free-delivery-icon-1.jpg" alt="">
            <div class="info">
                <h3>free delivery</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="" alt="">
            <div class="info">
                <h3>10 days returns</h3>
                <span>moneyback guarantee</span>
            </div>
        </div>

        <div class="icons">
            <img src="" alt="">
            <div class="info">
                <h3>offer & gifts</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="" alt="">
            <div class="info">
                <h3>secure paymens</h3>
                <span>protected by paypal</span>
            </div>
        </div>
    </section>
    <!--icons section ends-->

    <!--products section starts-->
    <!-- <section class="products" id="products">
        <h1 class="heading"> latest <span>products</span></h1>
        <div class="box-container">
            <div class="box"> -->
    <!-- <div class="image">
                    <img src="f_image1.jpeg.jpg" alt="">
                    <h3>flowers</h3>
                    <div class="price"> Rs. 200 </div>
                    <div class="icons">
                        <a href="cart.php" class="cart-btn">add to cart</a>
                    </div>
                </div>

                <div class="image">
                    <img src="f_image2.jpg.jpg" alt="">
                    <h3>flowers</h3>
                    <div class="price"> Rs. 200 </div>
                    <div class="icons">
                        <a href="cart.php" class="cart-btn">add to cart</a>
                    </div>
                </div> -->

    <section class="products" id="products">
        <h1 class="heading"> latest <span>products</span></h1>
        <div class="box-container">
            <div class="box">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()): ?>
                    <div class="image">
                        <div class="products">
                            <img src="<?php echo $row['image']; ?>" alt="">
                            <h3><?php echo $row['name']; ?></h3>
                            <p>₹<?php echo $row['price']; ?></p>
                            <a href="cart.php?add=<?php echo $row['id']; ?>" class="btn">Add to Cart</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="f_image2.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="Images/f_image3.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-20%</span>
                <div class="image">
                    <img src="Images/f_image4.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-17%</span>
                <div class="image">
                    <img src="Images/f_image5.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-3%</span>
                <div class="image">
                    <img src="Images/f_image6.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-18%</span>
                <div class="image">
                    <img src="Images/f_image7.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="Images/f_image8.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="Images/f_image9.jpg.jpg"alt="">
                    <div class="icons">
                        <a href="#"class="fas fa-heart"></a>
                        <a href="#"class="cart-btn">add to cart</a>
                        <a href="#"class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Flower pot</h3>
                    <div class="price">Rs.300<span>Rs.350</span></div>
                </div>
            </div>
        </div> -->

            <!-- Navigation Buttons -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    </section>
    <!--products section ends-->

    <!--review section starts-->
    <section class="review" id="review">
        <h1 class="heading">customer's <span>review</span></h1>
        <div class="box-container">
            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p> "I cannot say enough good things about Flower Fusion! I ordered a surprise bouquet for
                    my partner,
                    and they delivered it right on time. The flowers were vibrant and the arrangement was so
                    beautiful it took my breath away.
                    The customer service was outstanding—they helped me choose the perfect combination of
                    blooms.
                    This shop has definitely earned a loyal customer. I'll be back for all my floral needs!"
                </p>
                <div class="user">
                    <img src="pic-1" alt="">
                    <div class="user-info">
                        <h3>Shravani Mandake</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>
            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p> "I had an amazing experience with Flower Fusion! The arrangement I ordered was
                    absolutely breathtaking and exceeded my expectations.
                    The flowers were fresh and beautifully arranged, perfect for my sister’s birthday.
                    The staff was friendly and attentive, guiding me through the selection process.
                    I’ve received so many compliments on the bouquet! I highly recommend Flower Fusion for
                    anyone looking for quality flowers and
                    exceptional service."
                </p>
                <div class="user">
                    <img src="pic-2" alt="">
                    <div class="user-info">
                        <h3>Gayatri Ghodke</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>
            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"At Flower fusion, we take pride in creating stunning floral arrangements that bring joy
                    to every
                    occasion.Our customers rave about our fresh blooms and personalized service,making us
                    the go to
                    choice for special events in Katraj. Check out our testimonials to see how we can make
                    your
                    moments unforgettable !"
                <div class="user">
                    <img src="pic-3" alt="">
                    <div class="user-info">
                        <h3>Vaibhavi Kamthe</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>
        </div>
    </section>

    <!--review section ends-->

    <!--contact section starts-->

    <!-- <section class="contact" id="contact">
                    <h1 class="heading"><span> contact </span> us </h1>
                    <div class="row">
                        <form action="">
                            <input type="text" placeholder="name" class="box">
                            <input type="email" placeholder="email" class="box">
                            <input type="text" placeholder="number" class="box">
                            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="send message" class="btn">
                        </form>

                        <div class="image">
                            <img src="Images/cont_image.jpg.jpg" height="400px" width="350px" alt="">
                        </div>
                    </div>
                </section> -->

    <!--contact section ends-->

    <!--footer section starts-->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="about.php">about</a>
                <a href="products.php">products</a>
                <a href="#review">review</a>
                <!-- <a href="#contact">contact</a> -->
            </div>

            <!-- <div class="box">
                <h3>Extra links</h3>
                <a href="#">my accounts</a>
                <a href="#">my orders</a>
                <a href="#">my favorite</a>
            </div> -->

            <div class="box">
                <h3>Locations</h3>
                <a href="#">Katraj</a>
                <a href="#">Shivaji Nagar</a>

                <a href="#">Pimpari Chinchwad</a>
                <a href="#">Aakurdi</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#">+123-456-7890</a>
                <a href="#">example@gmail.com</a>
                <a href="#">Pune, India-411046</a>
                <img src="" alt="">
            </div>

        </div>
        <div class="credit">created by<span></span> | all rights reserved</div>

    </section>

    <!--footer section ends-->

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
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
    breakpoints: {
      640: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>
<!-- SwiperJS Initialization -->
<script>
  var swiper = new Swiper(".review-slider", {
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
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
    breakpoints: {
      640: { slidesPerView: 1 },
      1024: { slidesPerView: 3 } // Displays 2 reviews per frame on larger screens
    }
  });
</script>