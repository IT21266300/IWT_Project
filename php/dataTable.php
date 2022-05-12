<?php require_once './connect.php' ?>

<?php session_start(); ?>

 
<?php

    $aNo = $_SESSION['accountNo'];

    $sql = "SELECT FirstName, LastName, FullName, NIC, Telephone, AccountType, Username, AccountNo
    FROM useraccount where AccountNo = '$aNo'";

    $result = mysqli_query($connection,$sql);

    if($result){
        // echo mysqli_num_rows($result).

        while($row = mysqli_fetch_assoc($result)){
            $fname = $row['FirstName'];
            $lname = $row['LastName'];
            $fullName =  $row['FullName'];
            $NIC =  $row['NIC'];
            $TP =  $row['Telephone'];
            $accountType =  $row['AccountType'];
            $username =  $row['Username'];
            $accountNo =  $row['AccountNo'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common-style.css">
    <link rel="stylesheet" href="../css/dataTable.css">
</head>
<body>


    <section class="temp-data-container">
        <a href="../html/home.html" class="home-link">Go to Home</a>
        <div class="data-content">
            <h1><?php echo $fname. " " . $lname . " "?>,Welcome to Local Trust Family</h1>
            <h2>Your Account Details</h2>
            <table class="data-table">
                <tr id="data-row">
                    <td id="data-name">Account Number:</td>
                    <td id="data-value"><?php echo $accountNo ?></td>
                </tr>
                <tr id="data-row">
                    <td id="data-name">Username:</td>
                    <td id="data-value"><?php echo $username ?></td>
                </tr>
                <tr id="data-row">
                    <td id="data-name">Account Type</td>
                    <td id="data-value"><?php echo $accountType ?></td>
                </tr>
                <tr id="data-row">
                    <td id="data-name">Full Name</td>
                    <td id="data-value"><?php echo $fullName ?></td>
                </tr>
                <tr id="data-row">
                    <td id="data-name">NIC Number</td>
                    <td id="data-value"><?php echo $NIC ?></td>
                </tr>
                <tr id="data-row">
                    <td id="data-name">Telephone</td>
                    <td id="data-value">+94<?php echo $TP ?></td>
                </tr>
            </table>
        </div>
    </section>
    <footer>
      <p class="copy-right">&copy;copyright &copy;Local Trust Bank(PVT).LTD <span id="cpy-date"></span> .All rights reserved</p>
    </footer>
    
    <script>
        const cpyDate = document.getElementById("cpy-date");
        cpyDate.innerHTML = new Date().getFullYear();
    </script>
</body>
</html>

<?php session_destroy() ?>
<?php $connection->close() ?>
