<?php require_once './openAccount.php'?>

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
    }
    .error-item{
      width:500px;
      padding:3rem;
      box-shadow: 6px 10px 18px #69696934;
      font-family:'Open Sans', sans-serif;
      line-height:2;
      color:#000;
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
      border-radius:5px;
      padding:0.5rem;
      color:#fff;
    }

  </style>

</head>

<body>
  <section class="error-content">
    <div class="error-item">
      <i class="fa-solid fa-triangle-exclamation"></i>
      <h2>Form Submission is Failed</h2>
      <span><?php echo $errorMessage ?></span>
      <div class="error-links">
        <a href="../html/openAccount.html" style="background-color:rgb(40, 109, 238)">Register Again</a>
        <a href="../html/account.html" style="background-color:rgb(247, 40, 40)">Cancel registration</a>
      </div>
    </div>
  </section>
</body>

</html>

