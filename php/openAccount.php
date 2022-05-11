<?php require_once './connect.php' ?>

<?php

$wrongPass = '';
$wrongUser = '';

if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {


    $checkUser = ($connection->query("SELECT * from useraccount where Username = '$username'"));
    
    if (mysqli_num_rows($checkUser) > 0) {
      $wrongUser = 'error';
    } else {
      if ($password == $_POST['conPassword']) {
        $password = $_POST['conPassword'];

        if (!(strlen($password) >= 6)) {
          $errorMess = "Password is too short.";
        } else {

          $sql = "INSERT INTO useraccount(
              First_Name,
              Last_Name,
              FULL_Name,
              NIC,
              PassportNO,
              Gender,
              Telephone,
              Email,
              MaritalStatus,
              Home,
              City,
              Province,
              AccountType,
              Username,
              Apassword
            ) VALUES(
        
              '$_POST[fName]',
              '$_POST[lName]',
              '$_POST[fullName]',
              '$_POST[NIC]',
              '$_POST[passport]',
              '$_POST[gender]',
              '$_POST[TPNumber]',
              '$_POST[email]',
              '$_POST[mariS]',
              '$_POST[address]',
              '$_POST[city]',
              '$_POST[province]',
              '$_POST[accountType]',
              '$_POST[username]',
              '$_POST[password]'
            )";

          if ($connection->query($sql)) {
            require_once '../html/home.html';
          }
        }
      }
    }
  } else {
    echo "Enter details";
  }
}

?>

<?php $connection->close() ?>