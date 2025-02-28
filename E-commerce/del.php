<?php

    session_start();

    include ("config.php");
    include ("function.php");
    if(isset($_POST['del'])) {
        # code...
        $id = $_SESSION['user_id'];

        $query = "DELETE FROM cart Where user_id = '$id'";
        $fire = mysqli_query($conn, $query);

        if ($fire) {
            # code...
            ?>
            <script>
                alert('Your All Cart Deleted Succesfully');
            </script>
            <?php
        }
        else {
            # code...
            ?>
            <script>
                alert('Something Went Wrong');
            </script>
            <?php
        }
    }



?>