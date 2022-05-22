<?php require_once './connect.php' ?>

<?php 

    session_start();

?>

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
    .success-content{
      width:100%;
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      text-align: center;
      background-image:url(../images/back2.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    .success-item{
      width:500px;
      padding:3rem;
      box-shadow: 6px 10px 18px #69696934;
      font-family:'Open Sans', sans-serif;
      line-height:2;
      color:#000;
      background-color:#fff;
    }

    .success-item h2{
      font-size:1.4rem;
      color:#00ab00;
    }

    .success-item i{
      font-size:3rem;
      color:#00ab00;
    }

    .success-item span{
      font-size:1.2rem;
      font-weight: 700;
    }

    .success-links{
      width:100%;
      display:flex;
      justify-content:center;
      padding:1rem 0;
    }

    .success-links a{
      width:250px;
      border-radius:10px;
      padding:0.5rem;
      color:#fff;
      transition:0.5s ease;
    }

    .success-links a:hover{
      border-radius:0;
    }

  </style>

</head>

<body>
  <section class="success-content">
    <div class="success-item">
        <i class="fa-solid fa-circle-check"></i>
        <h2><?php echo $_SESSION['trueMessage'] ?></h2>
        <div class="success-links">
            <a href="../html/home.html" style="background-color:rgb(40, 109, 238)">Go to Home</a>
        </div>
    </div>
  </section>
</body>

</html>

<?php $connection->close() ?>