<?php
    session_start();

    include ("config.php");
    include ("function.php");
    if (isset($_POST['remove'])) {
      # code...
      $cid = $_POST['cid'];
      $delete_qry = "DELETE FROM cart WHERE cid = '$cid'";
      $fire = mysqli_query($conn, $delete_qry);

      if ($fire) {
        # code...
        ?>
        <script>
          window.location.href = 'cart.php';
        </script>
        <?php       
      }
      else {
        # code...
        ?>
        <script>
          alert ('Something Went Wrong');
        </script>
        <?php
      }  
    }

    $userid = $_SESSION['user_id'];
    $query = "SELECT * from cart where user_id = '$userid'";
    $exec = mysqli_query($conn,$query);
    $no_of_records = mysqli_num_rows($exec);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body class="bg-light">  
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-6" src="./Assets/Untitled-4.png" alt="" width="72" height="57">
        <h2>Checkout</h2>
        <p class="lead">Fill the given billing form and buy it your product</p>
      </div>
      <div class="row g-5">
        
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill"><?php echo $no_of_records ?></span>
          </h4>
          <ul class="list-group mb-3">
          <?php while($row=mysqli_fetch_assoc($exec)){ ?>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
              <input type="hidden" name="cid" value="<?php echo $row['cid']?>">
                <h6 class="my-0">Product name</h6>
                <small class="text-muted"><?php echo $row['p_name'] ?>(<?php echo $row['qnt'] ?>)</small>
              </div>
              <span class="text-muted">$
                <?php
                  $price = $row['price'];
                  $qnt = $row['qnt'];
                  $subtotal = ($price*$qnt);  
                  echo $subtotal; 
                  } 
                ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>GST (USD)</span>
              <strong>$
                <?php  

                $sub_qry = "SELECT SUM(sub_total) AS subtotal from cart where user_id = '$userid'";
                $sub_result = mysqli_query($conn,$sub_qry);

                $no_of_records = mysqli_num_rows($sub_result);
                while ($total = mysqli_fetch_assoc($sub_result)) {
                $order_total = $total['subtotal'];
                
                $tax = $subtotal*10/100;
                $tax_total = $order_total+$tax; 
                echo $tax;

                ?>
              </strong>
              <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$<?php  echo $tax_total; } ?></strong></li>
            </li>
          </ul>
        </div>

        <?php
          $data_qry = "SELECT * FROM users WHERE user_id ='$userid' limit 1";
          $data_fire = mysqli_query($conn, $data_qry);
          if ($user_data = mysqli_fetch_assoc($data_fire)) {
        ?>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <input type="hidden" name="">
          <form class="needs-validation" method="POST">
            <div class="row g-3">
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" name="username" class="form-control" id="username" value="<?php echo $user_data['user_name']; ?>">
                </div>
              </div>
  
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $user_data['email']; }?>">
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="add1" class="form-control" id="address" placeholder="1234 Main St" required="">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>
  
              <div class="col-12">
                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" name="add2" class="form-control" id="address2" placeholder="Apartment or suite">
              </div>
  
              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" name="country" id="country" required="">
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
  
              <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <select class="form-select" name="state" id="state" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="zip" class="form-label">Postal-code</label>
                <input type="text" name="zip" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
  
            <hr class="my-4">
  
            <div class="form-check">
              <input type="checkbox" name="check" class="form-check-input" id="save-info" value="Save this information for next time">
              <label class="form-check-label"  for="save-info">Save this information for next time</label>
            </div>
  
            <hr class="my-4">
  
            <h4 class="mb-3">Payment</h4>
  
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="form-check-label" for="paypal">BHIM UPI</label>
              </div>
            </div>
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>
    <?php
      if (isset($_POST['submit'])) {
        # code...
        $user_name = $user_data['user_name'];
        $email = $user_data['email'];
        $add1 = $_POST['add1'];
        $add2 = $_POST['add2'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $payment = $_POST['paymentMethod'];
        $order_query = "INSERT INTO order(oid,pid,user_name,email,add1,add2,country,state,zip,payment,total_fare)
                                    values('0','','$user_name','$email','$add1','$add2'.'$country','$state','$zip','','$tax_total')";
        $final_order = mysqli_query($conn, $order_query);

        if ($final_order) {
          # code...
          ?>
              <script>
                  alert("order succesfully completed");
              </script>
          <?php
        }
        else{
            ?>
                <script>
                    alert("Something Went Wrong! please try again");
                </script>
            <?php
        } 
      }
    ?>
  
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2018–2021 E-Plant Solutions</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
  
  
      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
        <script src="form-validation.js"></script>
    
  
  </body>
        
</html>