<?php


$connect = mysqli_connect("localhost","root","","chocolate");

if($connect)
{
  echo("Connect successfully!");
}
else
{
  echo("Unable to connect");
}

?>
