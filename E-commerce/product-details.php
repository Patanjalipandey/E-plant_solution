<?php
    session_start();

    include ("config.php");
    include ("function.php");

    if(isset($_GET['pid'])){
        extract($_GET);
    }
    else
    {
        header("Location: index.php");
    }

    $query = "SELECT * from product WHERE pid = '$pid'";
    $exec = mysqli_query($conn,$query);

    $no_of_records = mysqli_num_rows($exec);


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
                    </ul>
                </nav>
                <img src="./Assets/png/118-1185597_free-shopping-cart-icon-png.png" width="30px" height="30px">
                <div class="menu-icon"><i class="fa fa-bars" onclick="menutoggle()"></i></div>
            </div>
        </div>
    </div>
    <!------------------Header Section------------->

    <!------------------Product-Details------------>
    <div class="small-container product-details">
        <div class="row">
        <?php
            if($no_of_records>0)
            {
                
                $row=mysqli_fetch_array($exec);
        ?>
        
            <div class="col-2">
                    <img src="<?php echo $row['p_image']; ?>" width="80%" id="product-img">
            </div>
            <form method="get">
                <input type="hidden" name="pid" value ="<?php echo $pid ?>">
            </form>
            <div class="col-2">
                <form method="post" action="">
                    <p>Home / fertilizer</p>
                    <h1><?php echo $row['p_name']; ?></h1>
                    <h4>$<?php echo $row['p_price']; ?></h4>
                    <select name="" id="">
                        <option value="">Select Net Weight</option>
                        <option value="">100g</option>
                        <option value="">500g</option>
                        <option value="">1kg</option>
                        <option value="">2kg</option>
                        <option value="">5kg</option>
                    </select>
                    <input type="number" name="qnt" id="" value="1">
                    <button name="add" class="btn" style="text-align: center;">Add to Cart</button></form>
                    <form action="buy.php" method="post">
                    <button name="buy" class="btn" style="text-align: center; background:gray;">Buy Now</button>
                    </form>
                    
                    <h3>Product Details <i class="fa fa-indent"></i></h3><br>
                    <p><?php echo $row['p_details']; } ?></p>
                
                <?php
                if ($_SESSION['user_id']) {
                    # code...
                
                    if (isset($_POST['add'])) {
                        # code...
                        $userid = $_SESSION['user_id'];
                        $p_image = $row['p_image'];
                        $p_name = $row['p_name'];

                        $original_price = $row['p_price'];
                        $qnt = $_POST['qnt'];
                        $p_price = $original_price*$qnt;
                        
                        $qry = "INSERT into cart(cid,user_id,c_image,p_name,price,sub_total,qnt) values('0','$userid','$p_image','$p_name','$original_price','$p_price','$qnt')";
                        $fire = mysqli_query($conn, $qry);

                        if ($fire) {
                            # code...
                            ?>
                                <script>
                                    alert("Your Product Added Succesfully");
                                </script>
                            <?php
                        }
                        else{
                            ?>
                                <script>
                                    alert("Something Went Wrong");
                                </script>
                            <?php
                        }  
                    }

                    


                }
                else {
                    # code...
                    ?>
                    <script>
                        alert ('Please Login');
                    </script>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!------------------Product-Details------------>

    <!------------------Title------------>
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>
    <!------------------Title------------>

    <!------------------All Products----------------->
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <a href="">
                    <img src="<?php echo $row['p_image']; ?>" alt="post-1">
                    <div class="product-title">
                        <h4><?php echo $row['p_name']; ?></h4>
                        <div class="ratings">
                            $<?php echo $row['p_price']; ?><br>
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
    <!------------------All prooducts----------------->

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
                        <li><a href="#">Admin</a></li>
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

</body>

</html>