<?php

  $connection = mysqli_connect("localhost","root","","inventory");

  if(!$connection){
    echo"We are not connected";
  }
?>