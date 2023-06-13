<?php

$connect=mysqli_connect("localhost","root","","Fantastos");

// 1. Server name 2. Username 3. Password 4. Database Name

if($connect)
{
    echo "CONNECT SUCCESSFULLY";
}
else 
{
    //echo "ERROR!";
    die("COULD NOT CONNECTED".mysqli_error());  // IT WILL DISPLAYED IF WE CANNOT CONNECT
}

?>