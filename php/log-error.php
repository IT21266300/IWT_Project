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
      background-image:url(../images/back3.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    .success-item{
      width:700px;
      padding:2rem;
      box-shadow: 6px 10px 18px #69696934;
      font-family:var(--h-ft-family);
      line-height:2;
      color:#000;
      background-color:#fff;
    }

    .success-item p{
      font-size:1.4rem;
      font-weight: bold;
    }

    .success-item i{
      font-size:3rem;
      color:#fc2112;
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
        <i class="fa-solid fa-circle-exclamation"></i>
        <p>Login failed..!<br>Username or password incorrect</p>
        <div class="success-links">
            <a href="../html/login.html" style="background-color:#fc2112">Log Again</a>
        </div>
    </div>
  </section>
</body>

</html>

