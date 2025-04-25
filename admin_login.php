<?php
    session_start();

    include ("config.php");

    function check_login($conn){

        if(isset($_SESSION['admin_id'])){
    
            $id = $_SESSION['admin_id'];
            
            $query = "select * from admin where aid = '$id' limit 1";
    
            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
    
        header("Location: Account.php");
        die;
    }

//-------------Login-------------------//
    if(isset($_POST['getin'])){

        $user_nm = $_POST['user_mail'];
        $pass_word = $_POST['user_pwd'];

        if(!empty($user_nm) && !empty($pass_word) && !is_numeric($user_nm)){

            $query = "SELECT * FROM admin where email = '$user_nm' limit 1";

            $result = mysqli_query($conn, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    
                    if ($user_data['password']==$pass_word) {
                        # code...
                        $_SESSION['admin_id'] = $user_data['aid'];
                        header("Location: admin_index.php");
                        die;

                    }
                }
            }
            ?><script>
            alert("Please Enter a valid Usermane or Password");
            window.location.href ="admin_login.php";
            </script><?php

        }
        else{
            echo "Please Enter name";
        }
    }

    //-------------Login-------------------//

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Admin Panel</title>
  </head>
  <body class="text-center">
    <form style="margin: 0  550px;" method="POST">
        <img class="mb-4" src="./Assets/Untitled-4.png" style="margin-top:50px;" alt="" width="100%" height="100%">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
        <input type="email" class="form-control" name="user_mail" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" name="user_pwd" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <input type="submit" class="w-100 btn btn-lg btn-primary" name="getin" value="Sign in">
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>