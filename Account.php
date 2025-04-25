<?php
    session_start();

    include ("config.php");
    include ("function.php");

    //-------------Signup-------------------//

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone_no = $_POST['ph_no'];
        $password = $_POST['pwd'];
        $hash = password_hash($password,
                PASSWORD_DEFAULT);


        if(!empty($user_name) && !empty($email) && !empty($phone_no) && !empty($password) && !is_numeric($user_name)){

            $user_id = random_num(10);
            $query = "INSERT INTO users (user_id,user_name,email,phone_no,password) values ('$user_id','$user_name','$email','$phone_no','$hash')";

            mysqli_query($conn, $query);

            ?>
            <script>
                alert('your account has been created succesfully');
                window.location.href = "./Account.php";
            </script>
             <?php

           die;
        }
        else{
            echo "Please Enter Some Valid Information";
        }
    }

    //-------------Signup-------------------//
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <title>E-Plant</title>
</head>
<?php
    if(isset($_SESSION['user_id'])) {
        ?>
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
                                    <hr id="indicators" style=" width: 100px;
                                    border: none;
                                    background: #ff523b;
                                    height: 3px;
                                    margin-top: 8px;
                                    transform: translateX(375px);  
                                    width: 78px;">
                            </ul>
                        </nav>
                        <img src="./Assets/png/118-1185597_free-shopping-cart-icon-png.png" width="30px" height="30px">
                        <div class="menu-icon"><i class="fa fa-bars" onclick="menutoggle()"></i></div>
                    </div>
                    <div class="row">
                        <div class="col-2" data-aos="fade-up" data-aos-delay="100">
                            <h1>You Have<br>Already Loged in</h1>
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

        <?php
        
    }
    else {
        ?>
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
                        <hr id="indicators" style=" width: 100px;
                                                    border: none;
                                                    background: #ff523b;
                                                    height: 3px;
                                                    margin-top: 8px;
                                                    transform: translateX(375px);  
                                                    width: 78px;">
                    </ul>
                </nav>
                <img src="./Assets/png/118-1185597_free-shopping-cart-icon-png.png" width="30px" height="30px">
                <div class="menu-icon"><i class="fa fa-bars" onclick="menutoggle()"></i></div>
            </div>
        </div>
    </div>
    <!------------------Header Section------------->

    <!------------------Account-page--------------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./Assets/png/unnamed.png" alt="" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container"   style="background: #fff;
                                                        width: 300px;
                                                        height: 400px;
                                                        position: relative;
                                                        text-align: center;
                                                        padding: 30px 0;
                                                        margin: auto;
                                                        box-shadow: 0 0 20px 0px rgba(0,0,0,0.4);
                                                        overflow: hidden;">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="regestor()">SignUp</span>
                            <hr id="indicator">
                        </div>
                        <form action="login.php" method="POST" id="login">
                            <input type="text" name="user_nm" id="" placeholder="Username">
                            <input type="password" name="user_pwd" id="" placeholder="Password">
                            <button type="submit" class="btn" name="login">Login</button>
                            <a href="">Forgot Password</a>
                        </form>
                        <form method="POST" id="regestrastion">
                            <input type="text" name="user_name" placeholder="Username">
                            <input type="email" name="email" placeholder="Email">
                            <input type="number" name="ph_no" placeholder="Contact No.">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" class="btn" name="signup">SignUp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------Account-page--------------->

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
                    <img src="./Assets/Unsplesh/paresh.jpg"><br>
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
                    <img src="./Assets/Unsplesh/paresh.jpg"><br>

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
                    <img src="./Assets/Unsplesh/paresh.jpg"><br>

                    <h3>Patanjali Pandey</h3>
                </div>
            </div>
        </div>
    </div>
    <!------------------Testimonial------------------>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/index.js"></script>
    <!--Java Script-->
    <script>
        /**--------------Login & Regester------- */
        var loginform = document.getElementById("login");
        var regform = document.getElementById("regestrastion");
        var indicator = document.getElementById("indicator");

        function regestor() {
            regform.style.transform = "translateX(0px)";
            loginform.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(153px)";
        }

        function login() {
            regform.style.transform = "translateX(300px)";
            loginform.style.transform = "translateX(300px)";
            indicator.style.transform = "translateX(50px)";
        }
        /**--------------Login & Regester------- */
    </script>

</body>

        <?php
    }
?>


</html>