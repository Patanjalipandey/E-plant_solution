<?php
    session_start();

    include ("config.php");
    include ("function.php");

//-------------Login-------------------//
    if(isset($_POST['login'])){
        $user_nm = $_POST['user_nm'];
        $pass_word = $_POST['user_pwd'];

        if(!empty($user_nm) && !empty($pass_word) && !is_numeric($user_nm)){

            $query = "SELECT * FROM users where user_name = '$user_nm' limit 1";

            $result = mysqli_query($conn, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    $pass = $user_data['password'];

                    $verify = password_verify($pass_word, $pass);
                    
                    if ($verify) {
                        # code...
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;

                    }
                }
            }
            ?><script>
            alert("Please Enter a valid Usermane or Password");
            window.location.href ="Account.php";
            </script><?php

        }
        else{
            echo "Please Enter name";
        }
    }

    //-------------Login-------------------//

?>