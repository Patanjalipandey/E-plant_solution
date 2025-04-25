<?php
    session_start();

    include ("config.php");
    include ("function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    
    
    
    <!---------------------Title------------->
        <title>E-Plant</title>
</head>

<body>
    <!------------------Header Section------------->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="./Assets/Untitled-4.png" width="175px" alt="">
                </div>
                <nav>
                    <ul id="menuitms">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="Account.php">Accounts</a></li>
                        
                        <?php
                            if(isset($_SESSION['user_id'])) {
                                # code...
                                ?>
                                <li><a href="./logout.php">logout</a></li>
                                <?php
                                
                            }
                            else {
                                # code...
                                ?>
                                <li><a href="./Account.php">login</a></li>
                                <?php
                            }
                        ?>
                        <hr id="indicator" style="transform: translateX(-5px);  width: 55px;">
                    </ul>
                </nav>
                <img src="./Assets/png/118-1185597_free-shopping-cart-icon-png.png" width="30px" height="30px">
                <div class="menu-icon"><i class="fa fa-bars" onclick="menutoggle()"></i></div>
            </div>
            <div class="row">
                <div class="col-2" data-aos="fade-up" data-aos-delay="100">
                    <h1>Save Nature<br>For future generation</h1>
                    <?php  
                        if(isset($_SESSION['user_id'])) {
                            # code...
                            $userid = $_SESSION['user_id'];
                    
                            $query = "SELECT * FROM users where user_id = '$userid' limit 1";
                            $result = mysqli_query($conn, $query);
                            if($result){
                                if($result && mysqli_num_rows($result) > 0){
                                    $user_data = mysqli_fetch_assoc($result);
                                    ?>
                                    <h3> Welcome <?php echo $user_data['user_name'] ?></h3>
                                    <?php
                                }
                            }
                        }
                    ?>
                    <p>We Give you the best solutions for every plants and crops
                    </p>
                    <a href="./product.php" class="btn">Explore</a>
                </div>
                <div class="col-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="./Assets/png/unnamed.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!------------------Header Section------------->

    <!------------------Category Section------------->
        <div class="categories">
            <div class="small-container">
                <h2 class="titli">Categories</h2>
                <div class="row">
                    <div class="col-3" data-aos="fade-right" data-aos-delay="200">
                        <a href="./seeds.php"><img src="./Assets/png/4448707.png" alt=""></a>
                    </div>
                    <div class="col-3" data-aos="fade" data-aos-delay="200">
                        <a href="./fertilizer.php"><img src="./Assets/png/pngtree-vector-fertilizer-icon-png-image_3760534.jpg" alt=""></a>
                    </div>
                    <div class="col-3" data-aos="fade-left" data-aos-delay="200">
                        <a href="./faqs.php"><img src="./Assets/png/Plant-Solutions-Logo.png" alt=""></a>
                    </div>

                </div>
            </div>

        </div>
    <!------------------Category Section------------->

    <!------------------Offer Zone------------------>
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2" data-aos="fade-right" data-aos-delay="300">
                    <img src="./Assets/png/offer.png" class="offer-img">
                </div>
                <div class="col-2" data-aos="fade-up" data-aos-delay="300">
                    <p>Exclusively Available on E-plant Solutions</p>
                    <h1>Fruit Plant Seeds</h1>
                    <small>Buy The Bundle of Baby Carrot, Sweet Corn, Radish & Carrot.</small><br>
                    <a href="#" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!------------------Offer Zone------------------>

    <!------------------Owl Carousel----------------->
    <div class="product">
        <div class="small-container">
            <h2 class="titl">Featured Products</h2>
            <div class="owl-carousel owl-theme product-post">
                <div class="product-content">
                    <a href="">
                        <img src="./Assets/fertilizers-pics/1.jpg" alt="post-1">
                        <div class="product-title">
                            <h4>Product Name</h4>
                            <div class="ratings">
                                $100.00 <br>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="product-content">
                    <a href="">
                        <img src="./Assets/fertilizers-pics/2.jpg" alt="post-1">
                        <div class="product-title">
                            <h4>Product Name</h4>
                            <div class="ratings">
                                $100.00 <br>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="product-content">
                    <a href="">
                        <img src="./Assets/fertilizers-pics/3.jpg" alt="post-1">
                        <div class="product-title">
                            <h4>Product Name</h4>
                            <div class="ratings">
                                $100.00 <br>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="product-content">
                    <a href="">
                        <img src="./Assets/fertilizers-pics/4.jpg" alt="post-1">
                        <div class="product-title">
                            <h4>Product Name</h4>
                            <div class="ratings">
                                $100.00 <br>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="product-content">
                    <a href="">
                        <img src="./Assets/fertilizers-pics/5.jpg" alt="post-1">
                        <div class="product-title">
                            <h4>Product Name</h4>
                            <div class="ratings">
                                $100.00 <br>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!------------------Owl Carousel----------------->

    <!------------------Testimonial------------------>
    <div class="testimonial">
        <div class="small-container">
            <h2 class="titli">Testimonials</h2>
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quibusdam laudantium odio quidem
                        pariatur dolorem, explicabo nulla placeat fugit, blanditiis commodi, autem corrupti recusandae
                        optio eum. Totam fugiat quia quis?</p>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <img src="./Assets/Unsplesh/patanjali.png"><br>
                    <h3>Patanjali Pandey</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quibusdam laudantium odio quidem
                        pariatur dolorem, explicabo nulla placeat fugit, blanditiis commodi, autem corrupti recusandae
                        optio eum. Totam fugiat quia quis?</p>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <img src="./Assets/Unsplesh/kunal.jpg"><br>

                    <h3>Kunal Singh</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quibusdam laudantium odio quidem
                        pariatur dolorem, explicabo nulla placeat fugit, blanditiis commodi, autem corrupti recusandae
                        optio eum. Totam fugiat quia quis?</p>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <img src="./Assets/Unsplesh/sudip.png"><br>

                    <h3>Sudipta Mandal</h3>
                </div>
            </div>
        </div>
    </div>
    <!------------------Testimonial------------------>

    <!------------------Brands------------------>
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <!------------------Brands------------------>

    <!------------------Footer------------------>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>You csn also download our app for android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="./Assets/logo/Google+Play+white.png" alt="">
                        <img src="./Assets/logo/appstore.png" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="./Assets/Untitled-4.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos maiores culpa corrupti a tempore
                        perferendis ipsam aliquam asperiores dolorem ratione!</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Contect Us</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Contact Our Sellers</li>
                        <li><a href="admin_login.php">Admin Login</a></li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</li>
                        <li><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</li>
                        <li><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copy">@Copyright 2021-Silli Polytechnic Project</p>
        </div>
    </div>
    <!------------------Footer------------------>

    <!--Java Script-->
    <script src="https://kit.fontawesome.com/ad5c468c22.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/aos.js"></script>
    <script src="./js/index.js"></script>
    <script>AOS.init();</script>
    <!--Java Script-->

</body>

</html>