<?php require_once './loanApplication.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Open New Account</title>
  <link rel="shortcut icon" href="../images/logo/blue-logo-02.jpg">
  <link rel="stylesheet" href="../css/common-style.css">

  <!-- fontawesome link for add icons in web page  -->
  <script src="https://kit.fontawesome.com/4e05476d91.js" crossorigin="anonymous"></script>

  <style>
    .error-content{
      width:100%;
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      text-align: center;
      background-image:url(../images/back3.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    .error-item{
      width:600px;
      padding:3rem;
      box-shadow: 6px 10px 18px #69696934;
      font-family:'Open Sans', sans-serif;
      line-height:2;
      color:#000;
      background-color:#fff;
    }

    .error-item i{
      font-size:3rem;
      color:rgb(247, 40, 40) ;
    }

    .error-item span{
      font-size:1.2rem;
      color:red;
      font-weight: 700;
    }

    .error-links{
      width:100%;
      display:flex;
      justify-content: space-between;
      padding:1rem 0;
    }

    .error-links a{
      width:180px;
      border-radius:10px;
      padding:0.5rem;
      color:#fff;
      transition:0.5s ease;
    }

    .error-links a:hover{
      border-radius:0;
    }

  </style>

</head>

<body>
  <section class="error-content">
    <div class="error-item">
      <i class="fa-solid fa-triangle-exclamation"></i>
      <h2>Loan Submission is Failed</h2>
      <span><?php echo $offMessage ?></span>
      <div class="error-links">
        <a href="./loanApplication.php" style="background-color:rgb(40, 109, 238)">Apply to Loan Again</a>
        <a href="../html/home.html" style="background-color:rgb(247, 40, 40)">Cancel</a>
      </div>
    </div>
  </section>
</body>

</html>

