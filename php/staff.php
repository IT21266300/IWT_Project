<?php require_once './connect.php' ?>

<?php

  if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $load = "SELECT * FROM staff WHERE userName = '$user' AND Spassword = '$pass' ";

    $result = mysqli_query($connection, $load);

    if(!(mysqli_num_rows($result) == 1)){
          require_once './log-error.php';
    }
    else
    {
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          $SID = $row['STID'];
          $sName = $row['Sortname'];
          $fName = $row['fullname'];
          $dob = $row['DOB'];
          $email = $row['email'];
          $tp = $row['Tphone'];
          $address = $row['Saddress'];
          $js = $row['jobStatus'];
          $depart = $row['department'];
          $jDate = $row['joinDate'];
          $bSal = $row['basicSalary'];
          $OTH = $row['oTHRS'];
          $mSal = $row['monthlySalary'];
        }
      }
    }

  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local Trust Bank Home</title>
  <link rel="shortcut icon" href="../images/logo/blue-logo-02.jpg">
  <link rel="stylesheet" href="../css/common-style.css">
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="../css/staff.css">

  <!-- fontawesome link for add icons in web page  -->
  <script src="https://kit.fontawesome.com/4e05476d91.js" crossorigin="anonymous"></script>
</head>

<body>
  
  <main class="container" id="m-cont">
    <nav class="details-nav">
      <ul class="d-nav details-list">
        <li><a href="#"><i class="fa-solid fa-location-dot"></i><span>Royal JP, MS, Kandy</span></a></li>
        <li><a href="#"><i class="fa-solid fa-phone"></i><span>+94 112356234</span></a></li>
        <li><a href="#"><i class="fa-solid fa-envelope"></i><span>localTrust@info.lk</span></a></li>
      </ul>
      <ul class="d-nav apps-list">
        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
      </ul>
    </nav>
    <!-- header -->
    <header class="top-header" id="header-top">
      <div class="t-h-st">
        <div class="logo-content">
          <a href="../html/home.html" class="logo-link"><img src="../images/logo/blue-logo-02.jpg" style="color:#fff;" alt="#" class="logo-img"></a>
        </div>
        <div class="search-content">
          <div class="s-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
          <div class="s-bar">
            <input type="search" name="search" id="search-input" placeholder="Search here">
            <button type="button"  id="close-btn" onclick="clearContent()"><i class="fa-solid fa-xmark"></i></button>
          </div>
        </div>
      </div>
      <ul class="t-nav-list">
        <li class="t-nav-item"><a href="../html/home.html" class="t-nav-link">Home</a></li>

        <!-- dropdown list -->
        <li class="t-nav-item">
          <a href="#" class="t-nav-link prod" id="pro"><span>Products</span><i class="fa-solid fa-chevron-down"></i></a>
          <ul class="dropdown-list product" id="product">
            <li><a href="#" class="drop-link">Product</a></li>
            <li><a href="#" class="drop-link">Product</a></li>
            <li><a href="#" class="drop-link">Product</a></li>
          </ul>
        </li>
        <li class="t-nav-item">
          <a href="#" class="t-nav-link ser" id="ser"><span>Services</span><i class="fa-solid fa-chevron-down"></i></a>
          <ul class="dropdown-list service" id="service">
            <li><a href="#" class="drop-link">Service</a></li>
            <li><a href="#" class="drop-link">Service</a></li>
            <li><a href="#" class="drop-link">Service</a></li>
          </ul>
        </li>
        <!-- end of dropdown list -->

        <li class="t-nav-item"><a href="../html/contact.html" class="t-nav-link">Contact</a></li>
        <li class="t-nav-item"><a href="#" class="t-nav-link"><i class="fa-solid fa-circle-user"></i><span>Accounts</span></a></li>
      </ul>
      </nav>
    </header>
    <!-- end of header -->

    <!-- main section -->
    <section class="main-section">
      <div class="staff-content">
        <div class="page-item item-01">
          <div class="staff-img">
            <img src="../images/avater.jpg" alt="#">
          </div>
          <ul class="staff-list personal">
            <li>
              <span id="staff-de-name">Staff ID Number</span><br>
              <span id="staff-de-value"><?php echo $SID ?></span>
            </li>
            <li>
              <span id="staff-de-name">Short Name</span><br>
              <span id="staff-de-value"><?php echo $sName ?></span>
            </li>
            <li>
              <span id="staff-de-name">Full Name</span><br>
              <span id="staff-de-value"><?php echo $fName ?></span>
            </li>
            <li>
              <span id="staff-de-name">Date of Birth</span><br>
              <span id="staff-de-value"><?php echo $dob ?></span>
            </li>
            <li>
              <span id="staff-de-name">Email</span><br>
              <span id="staff-de-value"><?php echo $email ?></span>
            </li>
            <li>
              <span id="staff-de-name">Telephone NO</span><br>
              <span id="staff-de-value"><?php echo "(+94)".$tp ?></span>
            </li>
            <li>
              <span id="staff-de-name">Address</span><br>
              <span id="staff-de-value"><?php echo $address ?></span>
            </li>
          </ul>
        </div>
        <div class="page-item item-02">
          <h1>Bank Details</h1>
          <ul class="staff-list">
            <li>
              <span id="staff-de-name">Job Status</span><br>
              <span id="staff-de-value"><?php echo $js ?></span>
            </li>
            <li>
              <span id="staff-de-name">Department</span><br>
              <span id="staff-de-value"><?php echo $depart ?></span>
            </li>
            <li>
              <span id="staff-de-name">Join Date</span><br>
              <span id="staff-de-value"><?php echo $jDate ?></span>
            </li>
            <li>
              <span id="staff-de-name">Basic Salary</span><br>
              <span id="staff-de-value"><?php echo "LKR.".$bSal ?></span>
            </li>
            <li>
              <span id="staff-de-name">OT Hours</span><br>
              <span id="staff-de-value"><?php echo $OTH ?></span>
            </li>
            <li>
              <span id="staff-de-name">Monthly Salary</span><br>
              <span id="staff-de-value"><?php echo "LKR.".$mSal ?></span>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- end of main section -->

    <!-- footer -->
    <footer>
      <div class="footer-content">
        <div class="f-c-item">
          <div class="f-c-logo">
            <img src="../images/logo/blue-logo-02.jpg" alt="logo" class="f-logo" style="width:150px;">
          </div>
          <p id="f-para">We are a reliable and fast-growing outsourcing call center company  that works with clients from all over the world.</p>
        </div>
        <div class="f-c-item">
          <ul class="f-l-list">
            <li><a href="#">Home</a></li>
            <li><a href="#">Personal</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Loans</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="f-c-item">
          <h2>Contact Us</h2>
          <ul class="f-list">
            <li><i class="fa-solid fa-location-dot"></i><span>Royal Junction Park, Kandy</span></li>
            <li><i class="fa-solid fa-phone"></i><span>+94 112356234</span></li>
            <li><i class="fa-solid fa-envelope"></i><span>localTrust@info.lk</span></li>
          </ul>
        </div>
        <div class="f-c-item">
          <h2>Get least updates</h2>
          <div class="f-sub">
            <input type="email" name="email" id="f-input" placeholder="Enter your email">
            <button type="submit" id="f-btn">Subscribe</button>
          </div>
        </div>
      </div>
      <ul class="f-apps-list">
        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
      </ul>
      <p class="copy-right">&copy;copyright &copy;Local Trust Bank(PVT).LTD <span id="cpy-date"></span> .All rights reserved</p>
    </footer>
    <!-- end of footer -->
    <!-- feedback  form -->
    <div class="popup-feed">
      <button href="#" class="btn feed-link">
        <span>Feedback</span>
        <i class="fas fa-comments"></i>
      </button>
    </div>

    <section class="feedback-sec">
      <aside class="feedback-content">
        <button class="btn close-btn f-c-btn"><i class="fa-solid fa-xmark"></i></button>
        <h1>Local Trust Bank</h1>
        <div class="f-f-content">
          <form action="#" class="f-f-form">
            <div class="f-f-item">
              <label for="email">Email</label>
              <input type="email" name="email" id="f-f-email" placeholder="example123@info.com">
            </div>           
            <div class="f-f-item">
              <label for="message">What do you have to say about our services?</label>
              <textarea name="message" id="f-f-message" placeholder="Enter your suggestions"></textarea>
            </div>
            <button type="submit" class="btn f-s-btn"><span>Send feedback</span><i class="fa-solid fa-paper-plane"></i></button>
          </form>
        </div>
      </aside>
    </section>
    <!-- end of feedback  form -->

    <a href="#m-cont" class="top-link"><i class="fa-solid fa-circle-chevron-up"></i></a>
  </main>
  <script src="../JS/script.js"></script>
</body>
</html>

<?php $connection->close() ?>

