<?php
    session_start();

    include ("config.php");
    include ("function.php");

    //-------------Signup-------------------//

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //-----------image details - 1 ---------//
        $image1 = $_FILES['image1'];


        $imagename1 = $_FILES['image1']['name'];
        $imagetmp_name1 = $_FILES['image1']['tmp_name'];
        $imagesize1 = $_FILES['image1']['size'];
        $imageerror1 = $_FILES['image1']['error'];
        $imagetype1 = $_FILES['image1']['type'];


        $productname = $_POST['product_name'];
        $productprice = $_POST['price'];
        $category = $_POST['category'];
        $Productdetails = $_POST['Product_details'];
        //-----------image details - 1 ---------//
                //-----------Main Query 1 ---------//
                $filext1 = explode('.', $imagename1);
                $imageactualext1 = strtolower(end($filext1));
                $allowed1 = array('jpg', 'jpeg', 'png');
                if (in_array($imageactualext1, $allowed1)) {
                    # code...
                    if ($imageerror1 === 0) {
                        # code...
                        if ($imagesize1 < 1000000) {
                            # code...
                            $imagenamenew1 = uniqid('', true).".".$imageactualext1;
                            $imagedest1 = 'Assets/uploads/'.$imagenamenew1;

                            $qry = "INSERT INTO product (pid,p_image,p_name,p_price,p_catogery,p_details) values ('0','$imagedest1','$productname','$productprice','$category','$Productdetails')";
                            mysqli_query($conn, $qry);
        
                            move_uploaded_file($imagetmp_name1, $imagedest1);
                            ?><script>
                            alert("Product Import Complete Succesfully");
                            </script><?php
                        }
                        else {
                            # code...
                            ?><script>
                            alert("Your file is to big!");
                            </script><?php
                        }
                    }
                    else {
                        # code...
                        ?><script>
                        alert("There was an error uploading the file");
                        </script><?php
                    }
                }
                else {
                    ?><script>
                    alert("you can not upload files of this type");
                    </script><?php
                }
                //-----------Main Query 1 ---------//
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
                        <li><a href="#">Contact</a></li>
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
                    <div class="form-container" style=" background: #fff;
                                                        width: 310px;
                                                        height: 480px;
                                                        position: relative;
                                                        text-align: center;
                                                        padding: 30px 0;
                                                        margin: auto;
                                                        box-shadow: 0 0 20px 0px rgba(0,0,0,0.4);
                                                        overflow: hidden;">
                        <div class="form-btn">
                            <span>Import Product</span>
                        </div>
                        <form method="POST" id="regestrastion" style="margin:-40px 0;" enctype="multipart/form-data" multiple>
                            <input type="file" style="border:none;" name="image1" placeholder="Upload the image">
                            <input type="text" name="product_name" placeholder="Product Name">
                            <input type="number" name="price" placeholder="Product Price">
                            <select name="category" id="">
                                <option value="category"><---------Select Category-----------></option>
                                <option value="seeds">Seeds</option>
                                <option value="fertilizer">Fertilizers</option>
                            </select><br>
                            <textarea name="Product_details" placeholder="Product Details" style="width:240px; height:100px; border-radius:10px;" ></textarea>
                            <button type="submit" class="btn" name="signup">Import</button>
                        </form>
                        <!-------php-------->
                        <?php
                            
                        ?>
                        <!-------php-------->
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

</html>