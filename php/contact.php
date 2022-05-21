<?php require_once'./connect.php'?>

<?php

  if(isset($_POST['submit'])){

    $email = $_POST['cEmail'];
    $name = $_POST['cName'];
    $message = $_POST['cMessage'];


    $sql = "INSERT INTO contact(Email,Cname,Comment) values('$email', '$name' , '$message')";
  
    if($connection -> query($sql)){
      require_once'./feedSucc.php';
    }
  
    else{
      echo"failed";
    }
  }


?>

<?php $connection->close(); ?>