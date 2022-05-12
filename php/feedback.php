<?php require_once'./connect.php'?>

<?php

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql = "INSERT INTO feedback(Email,comment) values('$email', '$message')";
  
    if($connection -> query($sql)){
      require_once'./feedSucc.php';
    }
  
    else{
      echo"failed";
    }
  }


?>

<?php $connection->close(); ?>