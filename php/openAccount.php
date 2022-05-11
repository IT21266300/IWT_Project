<?php require_once './connect.php' ?>

<?php

$errorMessage = '';

if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {


    $checkUser = ($connection->query("SELECT * from useraccount where Username = '$username'"));
    
    if (mysqli_num_rows($checkUser) > 0) {

      $errorMessage = 'Username is Already taken! Try another one';
      require_once './errorPage.php';

    } else {

      if ($password == $_POST['conPassword']) {

        $password = $_POST['conPassword'];

        if (!(strlen($password) >= 6)) {

          $errorMessage = 'Password is too short! Password must be have at least 6 characters';
          require_once './errorPage.php';

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
          else{
            $errorMessage = 'File Submission is Failed';
            require_once './errorPage.php';
          }
        }
      } else {
        $errorMessage = 'Passwords are not Matched! Try again';
        require_once './errorPage.php';
      }

    }
  } else {
    $errorMessage = 'Input fields are empty!';
    require_once './errorPage.php';
  }
}

?>

<?php $connection->close() ?>