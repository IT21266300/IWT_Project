<?php require_once './connect.php'?>

<?php

    session_start();

    $getUser = $_SESSION['getAccount'];

    $sql = ($connection->query("SELECT * FROM loan WHERE AccountNo = '$getUser'"));

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){
            $loanAmount = $row['loanAmount'];
            $fullAmount = $row['loanFinalAmount'];
            $loanType = $row['loanType'];
            $interRate = $row['loanInterestRate'];
            $interPerMonth = $row['loanInterest'];
            $appliedDate = $row['loanApplyDate'];
            $expireDate =  $row['loanExpiresDate'];
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Result</title>
    <link rel="stylesheet" href="../css/common-style.css">
    <!-- fontawesome link for add icons in to web page  -->
    <script src="https://kit.fontawesome.com/4e05476d91.js" crossorigin="anonymous"></script>
    <style>
        body{
            width:100%;
            padding:3rem 10rem;
        }
        .l-result-content{
            box-shadow:var(--pri-box-shadow);
            border-radius:10px;
            overflow:hidden;
        }

        .popup-message{
            padding:2rem;
            text-align: center;
            background-color: var(--sec-bg-clr);
            color: var(--pri-bg-clr);
            box-shadow:var(--pri-box-shadow);
        }

        .popup-message i{
            font-size:3.5rem;
        }

        .popup-message h1{
            font-family: var(--pri-ft-family);
            padding:1rem;
            font-size:2rem;
        }

        .about-loan h2{
            text-align: center;
            padding:1rem;
            font-family: var(--pri-ft-family);
            font-size:1.8rem;
            letter-spacing:2px;
        }

        .loan-table{
            width: 100%;
            border-collapse: collapse;
        }

        .loan-table td{
            padding:2rem 3rem;
            font-family: var(--pri-ft-family);
            font-size:1.2rem;
        }

        .loan-table tr:nth-child(even){
            background-color: #e5e4e4;
        }

        .loan-table tr{
            transition:0.5s ease-in-out;
        }

        .loan-table tr:hover{
            background-color:var(--sec-bg-clr);
            color:#fff;
        }


        .home-btn{
            position:absolute;
            top:3rem;
            left:3rem;
            width: 60px;
            height: 60px;
            border:none;
            background-color:var(--sec-bg-clr);
            color:#fff;
            border-radius:100px;
            padding:1rem;
            transition:0.5s ease;
        }

        .home-btn:hover{
            border-radius:10px;
        }

        .home-btn i{
            font-size:1.5rem;
        }

    </style>
</head>
<body>
    <a href="../html/home.html" class="home-btn"><i class="fa-solid fa-house"></i></a>
    <div class="l-result-content">
        <div class="popup-message">
            <i class="fa-solid fa-circle-check"></i>
            <h1>Your Loan Application was successfully Submitted.</h1>
        </div>
        <div class="about-loan">
            <h2>Loan Details</h2>
            <table class="loan-table">
                <tr>
                    <td>Account Number</td>
                    <td><?php echo $getUser ?></td>
                </tr>
                <tr>
                    <td>Loan Amount</td>
                    <td><?php echo "LKR. " . $loanAmount ?></td>
                </tr>
                <tr>
                    <td>Full Amount(With Interest)</td>
                    <td><?php echo "LKR. " . $fullAmount ?></td>
                </tr>
                <tr>
                    <td>Loan Type</td>
                    <td><?php echo $loanType ?></td>
                </tr>
                <tr>
                    <td>Loan Interest Rate</td>
                    <td><?php echo $interRate . "%" ?></td>
                </tr>
                <tr>
                    <td>Loan Interest for per Month</td>
                    <td><?php echo "LKR. " . $interPerMonth ?></td>
                </tr>
                <tr>
                    <td>Loan applied Date</td>
                    <td><?php echo $appliedDate ?></td>
                </tr>
                <tr>
                    <td>Loan Expire Date</td>
                    <td><?php echo $expireDate ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

<?php $connection->close() ?>