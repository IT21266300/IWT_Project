<?php

  $connection = mysqli_connect('localhost', 'root', '', 'onlineBanking');

  if($connection->connect_error){
    die('Database is not connected'. $connection->connect_error);
  }
?>