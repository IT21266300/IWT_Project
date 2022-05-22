<?php require_once './connect.php'?>


<?php 

  $checkUser = '';
  $accountNo = '';

  session_start();

  $_SESSION['trueMessage'] = '';

  $checkUser = $_SESSION['username'];

  if($checkUser == ''){
    header('Location:../html/register.html');
  }
  else{
      
      $sql = ($connection->query("SELECT * FROM useraccount WHERE Username = '$checkUser'"));

      if($sql){
        
        while($row = mysqli_fetch_assoc($sql)){
          $fname = $row['FirstName'];
          $lname = $row['LastName'];
          $DOB = $row['DateOFBirth'];
          $address =  $row['Home'];
          $city = $row['City'];
          $province = $row['Province'];
          $accountNo =  $row['AccountNo'];
          $cardType = $row['cardType'];
        }
      }
      if(!($cardType == '-')){
        $_SESSION['trueMessage'] = "Sorry..! You can have only one credit card in our Bank";
        header("Location:./cardTrue.php");
      }
    }

  if(isset($_POST['submit'])){
    
    if(!empty($_POST['country']) && !empty($_POST['PostalCode']) && !empty($_POST['employeeStatus']) && !empty($_POST['Workplace']) && !empty($_POST['monthlyincome']) && !empty($_POST['workTPNumber']) && !empty($_POST['cardType'])){
      $sql = ($connection->query("UPDATE useraccount SET 
        Country = '$_POST[country]',
        ZipPostalCode = '$_POST[PostalCode]',
        EmployeeStatus = '$_POST[employeeStatus]',
        EmployeeIndustry = '$_POST[Workplace]',
        MonthlyIncome = '$_POST[monthlyincome]',
        workTelnumber = '$_POST[workTPNumber]',
        cardType = '$_POST[cardType]' WHERE Username = '$checkUser'"));

      if($sql){
        $_SESSION['trueMessage'] = "Your Loan was successfully Submitted.";
        header("Location:./cardTrue.php");
      }
      else{
        $offMessage = "Credit card Application Submission was Failed";
        require_once './failed.php';
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
  <title>Local Trust Bank New Credit Card Application</title>
  <link rel="shortcut icon" href="../images/logo/blue-logo-02.jpg">
  <link rel="stylesheet" href="../css/cardApplication.css">
  <link rel="stylesheet" href="../css/common-style.css">
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
          <a href="#" class="logo-link"><img src="../images/logo/blue-logo-02.jpg" style="color:#fff;" alt="#" class="logo-img"></a>
        </div>
        <div class="search-content">
          <div class="s-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
          <div class="s-bar">
            <input type="search" name="search" id="search-input" placeholder="Search here">
            <button type="button"  id="close-btn" onclick="clearContent()"><i class="fa-solid fa-xmark"></i></button>
          </div>
        </div>
        <button onclick="togNav()" class="btn hamburger"><i class="fa-solid fa-bars"></i></button>
      </div>
      <ul class="t-nav-list">
        <li class="t-nav-item"><a href="#" class="t-nav-link">Home</a></li>

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

        <li class="t-nav-item"><a href="#" class="t-nav-link">Contact</a></li>
        <li class="t-nav-item"><a href="#" class="t-nav-link"><i class="fa-solid fa-circle-user"></i><span>Accounts</span></a></li>
      </ul>
      </nav>
    </header>
    <!-- end of header -->

    <!-- main section -->
    <section class="main-section">
      <h1>New Credit card Application</h1>
      <div class="ccaform">
      <form method="post" action="./cardApplication.php">

          <div class="row">
           <label for="Name">Full Name:</label><br>
           <input type="text" id="fname" class="input-text2" name="firstname" style="opacity:0.5;" readonly="true" value="<?php echo $fname ?>">
           <input type="text" id="lname" class="input-text2" name="lastname" style="opacity:0.5;" readonly="true" value="<?php echo $lname ?>"><br>

           <label for="Date of Birth">Date of Birth:</label><br>
           <input type="date" id="dob" class="input-text" name="dob" style="opacity:0.5;" readonly="true" value="<?php echo $DOB ?>"><br>

           <label for="Address">Address:</label><br>
           <input type="text" id="address" class="input-text" name="address" style="opacity:0.5;" readonly="true" value="<?php echo $address ?>"><br>

           <input type="text" class="input-text2" name="city" style="opacity:0.5;" readonly="true" value="<?php echo $city ?>">
           <input type="text" class="input-text2" name="province" style="opacity:0.5;" readonly="true" value="<?php echo $province ?>"><br>

           <input type="number" class="input-text2" placeholder="Zip / Postal code" name="PostalCode">
           <select name="country" id="f-dropdown">
             <option value="">country</option>
             <option value="Sri Lanka">Sri Lanka</option>
             <option value="China">China</option>
             <option value="India">India</option>
             <option value="Uganda">Uganda</option>
           </select>
        
           </lable><br />
          <label for="accountNo">Account Number(Optional):</label>
          <input type="number" name="accountNo" id="accountNo" class="input-text3" style="opacity:0.5;" readonly="true" value="<?php echo $accountNo ?>">
          <br />
           <label for="employeeStatus">Employee Status:</label>
           <input type="text" name="employeeStatus" id="employeeStatus" placeholder="Employee Status" class="input-text">
           <br />
           <label for="workplace">Workplace:</label>
           <input type="text" name="Workplace" id="workplace" class="input-text" placeholder="Name of Workplace" >
           <br />
           <label for="monthlyincome">Monthly Income:</label>
           <input type="number" name="monthlyincome" id="monthlyincome" class="input-text" placeholder="Monthly Income in LKR">
           <br />
           <label for="workTPNumber"> Workplace Telephone Number:</label>
           <input type="number" name="workTPNumber" id="workTPNumber" class="input-text" placeholder="Telephone Number">
  
           <label for="workTPNumber"> Select Card Type:</label>
           <select name="cardType" id="f-dropdown" class="input-text">
             <option value="">Credit Card Type</option>
             <option value="Blue">Blue Card</option>
             <option value="Black">Black Card</option>
             <option value="Red">Red Card</option>
           </select>
          

           <div class="agree-item">
            <input type="checkbox" name="agree" id="agree" value="1"  required>
            <label for=""><strong style="color:rgb(40, 109, 238);">*</strong>I agree to <span>terms & conditions</span></label>
          </div>
          <div class="form-btn">
            <input type="reset" value="Reset" id="resetBtn" name="reset">
            <input type="submit" value="Submit Application" id="submitBtn" name="submit">
          </div>
        </div>

            
           



       


      </form>
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

    <a href="#m-cont" class="scroll-link top-link"><i class="fa-solid fa-angles-up"></i></a>
  </main>
  <script src="../JS/script.js"></script>
  <script src="../JS/CCAscript.js"></script>
  
</body>
</html>

<?php $connection->close() ?>