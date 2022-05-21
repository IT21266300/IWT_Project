<?php require_once './connect.php' ?>


<?php

if (isset($_POST['submit'])) {

  session_start();

  if (!empty($_POST['fName']) && $_POST['lName']){

    $sql = "INSERT INTO useraccount(
        FirstName,
        LastName,
        FULLName,
        DateOFBirth,
        NIC,
        PassportNO,
        Gender,
        Telephone,
        Email,
        MaritalStatus,
        Home,
        City,
        Province,
        AccountType
      ) VALUES(
  
        '$_POST[fName]',
        '$_POST[lName]',
        '$_POST[fullName]',
        '$_POST[DOB]',
        '$_POST[NIC]',
        '$_POST[passport]',
        '$_POST[gender]',
        '$_POST[TPNumber]',
        '$_POST[email]',
        '$_POST[mariS]',
        '$_POST[address]',
        '$_POST[city]',
        '$_POST[province]',
        '$_POST[accountType]'
      )";

    if ($connection->query($sql)) {
      $accNO = ($connection->query("SELECT AccountNo FROM useraccount WHERE NIC = '$_POST[NIC]'"));
      if (mysqli_num_rows($accNO) > 0) {
        while($rowData = mysqli_fetch_array($accNO)){
            $_SESSION['accountNo'] = $rowData['AccountNo'];
        }
      }
      require_once '../html/register.html';
    }
    else{
      $errorMessage = 'File Submission is Failed';
      require_once './errorPage.php';
    }
  } 
  else {
    $errorMessage = 'Input fields are empty!';
    require_once './errorPage.php';
  }
}

?>

<?php $connection->close() ?>