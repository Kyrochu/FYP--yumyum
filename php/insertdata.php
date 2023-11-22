<?php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $file = "yumyum";
     
     $connect = mysqli_connect($host , $user , $pass , $file);


    $foodid = json_decode($_POST["id"]);
    print_r($foodid);

    $sql = mysqli_query($connect , "INSERT INTO cart(food_id, num_food) VALUES ('$foodid','1')");

?>