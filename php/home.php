<?php require_once'./connect.php'?>

<?php

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $message = $_POST['message'];

    /*

    $select = ($connection -> query("SELECT * from test where email = '".$email."'"));

    $newMess = '';

    if(mysqli_num_rows($select)){
      $newMess = "UPDATE test set comment = concat(comment, '$message')";
      $newMessage = $newMess;
    }
    else{
      $newMessage = $message;
    }
    */

    $sql = "INSERT INTO feedback(Email,comment) values('$email', '$message')";
  
    if($connection -> query($sql)){
      require_once'../html/home.html';
    }
  
    else{
      echo"failed";
    }
  }


?>

<?php $connection->close(); ?>