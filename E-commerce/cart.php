<?php
    session_start();

    include ("config.php");
    include ("function.php");

    //addition of all cart product

    
    //addition of all cart product

    $userid = $_SESSION['user_id'];

    if ($_SESSION['user_id']) {
        # code...
            
        $query = "SELECT * from cart where user_id = '$userid'";
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
                                <hr id="indicator" style="transform: translateX(318px);  width: 36px;">
                            </ul>
                        </nav>
                        <img src="./Assets/png/118-1185597_free-shopping-cart-icon-png.png" width="30px" height="30px">
                        <div class="menu-icon"><i class="fa fa-bars" onclick="menutoggle()"></i></div>
                    </div>
                </div>
            </div>
            <!------------------Header Section------------->

            <!------------------Cart Items----------------->
            <div class="small-container cart-page">
            <form action="checkout.php" method="Post">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php while($row=mysqli_fetch_assoc($exec)){ ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <input type="hidden" name="cid" value="<?php echo $row['cid']?>">
                                    <img src="<?php echo $row['c_image']?>">
                                    <div>
                                        <p><?php echo $row['p_name'] ?></p>
                                        <small>Price: $<?php echo $row ['price'] ?> </small><small style="color:#1C7DFC;">50% discount</small>
                                        <br>
                                        <button name="remove" style="text-decoration:none;border: none; cursor:pointer; color:red;">Remove</button>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" style="width: 40px; height: 30px; padding: 5px;" name="" id="" value="<?php echo $row ['qnt'];?>"></td>
                            <td>$
                            <?php
                                $price = $row['price'];
                                $qnt = $row['qnt'];
                                $subtotal = ($price*$qnt);
                                echo $subtotal;
                            ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>

                <div class="total-price">
                    <?php
                        if ($no_of_records>0) {
                            # code...
                            ?>
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>$
                                        <?php   
                                            $sub_qry = "SELECT SUM(sub_total) AS subtotal from cart where user_id = '$userid'";
                                            $sub_result = mysqli_query($conn,$sub_qry);

                                            $no_of_records = mysqli_num_rows($sub_result);
                                            while ($total = mysqli_fetch_assoc($sub_result)) {
                                            $order_total = $total['subtotal'];
                                            
                                            $tax = $subtotal*10/100;
                                            $tax_total = $order_total+$tax; 

                                            if ($total>0) {
                                                # code...
                                                echo $order_total;  
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>$<?php echo $tax; ?></td>
                                </tr>
                                <tr style="border-top: 3px solid #ff523b;">
                                    <td>Total</td>
                                    <td>$<?php echo $tax_total; } }?></td>
                                </tr>
                                <tr>
                                    <form action="checkout.php" method="get">
                                        <td><button name="buy" class="btn" style="text-align: center;border: none; cursor:pointer;">Buy it All</button></button></td>
                                        
                                    </form>
                                    <form action="del.php" method="post">
                                        <td><button name="del" class="btn" style="text-align: center;border: none; background:gray; cursor:pointer;">Delete it All</button></td>
                                    </form>
                                </tr>
                            </table>

                            <?php
                        }
                        else {
                            # code...
                            ?>
                            <h1>
                                Sorry! You Have No Any Cart Yet
                            </h1>

                            <?php
                        }

                    ?>

                </div>
            </div>
            <!------------------Cart Items----------------->

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

        </body>
        </html>
        <?php
    }
    else {
        # code...
        ?>
            <script>
                alert ('You Need To Login First');
            </script>

        <?php
        header("Location: Account.php");
    }
?>
