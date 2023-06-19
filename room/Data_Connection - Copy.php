<?php

$connect=mysqli_connect("localhost","root","","hotel");

// 1. Server name 2. Username 3. Password 4. Database Name

if($connect)
{
    echo "";
}
else 
{
    //echo "ERROR!";
    die("COULD NOT CONNECTED".mysqli_connect_error());  // IT WILL DISPLAYED IF WE CANNOT CONNECT
}

?>