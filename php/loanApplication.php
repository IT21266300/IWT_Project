<?php require_once './connect.php' ?>


<?php 

    $getUser = '';
    $accountNo ='';
    session_start();
  
    $getUser = $_SESSION['username'];

    $_SESSION['failError'] = '';
  
    if($getUser == ''){
      header('Location:../html/register.html');
    }
    else{
      $sql = ($connection->query("SELECT * FROM useraccount WHERE Username = '$getUser'"));

      if($sql){
        while($row = mysqli_fetch_assoc($sql)){
          $fname = $row['FirstName'];
          $lname = $row['LastName'];
          $fullName =  $row['FULLName'];
          $DOB = $row['DateOFBirth'];
          $NIC =  $row['NIC'];
          $passport = $row['PassportNO'];
          $gender = $row['Gender'];
          $TP =  $row['Telephone'];
          $email = $row['Email'];
          $mariStatus = $row['MaritalStatus'];
          $home =  $row['Home'];
          $city = $row['City'];
          $province = $row['Province'];
          $accountType =  $row['AccountType'];
          $username =  $row['Username'];
          $accountNo =  $row['AccountNo'];
          $accBalance = $row['AccountBalance'];
        }
      }
    }

    $_SESSION['getAccount'] = $accountNo;

    if(isset($_POST['submit'])){
      
      if(!empty($_POST['loanType']) && !empty($_POST['loanAmount']) && 
      !empty($_POST['loanTime']) && !empty($_POST['personStatus']) && !empty($_POST['personIndustry']) && 
      !empty($_POST['income']) && !empty($_POST['workTPNumber'])){

        if($_POST['income'] < 30000.000){
          $_SESSION['failError'] = "Your Monthly Income is insufficient to apply for Loans";
          header("Location:./failed.php");
        }
        else{

          $getCurrentDate = date("Y-m-d");
          $loanExDate = '';

          switch($_POST['loanTime']){
            case "three-M":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m") + 3, date("d"), date("Y")));
              break;
            
            case "six-M":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m") + 6, date("d"), date("Y")));
              break;  

            case "nine-M":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m") + 9, date("d"), date("Y")));
              break;

            case "one-Y":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m"), date("d"), date("Y") + 1));
              break;
            
            case "two-Y":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m"), date("d"), date("Y") + 2));
              break;

            case "four-Y":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m"), date("d"), date("Y") + 4));
              break;

            case "six-Y":
              $loanExDate = date("Y-m-d", mktime(0,0,0, date("m"), date("d"), date("Y") + 6));
              break;
          }

          $GY1 = strtotime($getCurrentDate); 
          $GY2 = strtotime($loanExDate); 
          
          $Y1 = date("Y", $GY1);
          $Y2 = date("Y", $GY2);

          $M1 = date("m", $GY1);
          $M2 = date("m", $GY2);

          $nMonths = (($Y2 - $Y1) * 12) + ($M2 - $M1);


          $interestRate;
          $calInterest;
          $finalAmount;

          switch($_POST['loanType']){
            case 'Personal Loan':
              $interestRate = 8;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break;
            case 'Business Loan':
              $interestRate = 10;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break;
            case 'Education Loan':
              $interestRate = 3;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break; 
            case 'Home Loan':
              $interestRate = 12;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break;
            case 'Auto Loan':
              $interestRate = 9;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break;
            case 'Travel & vacation Loan':
              $interestRate = 7;
              $calInterest = ($_POST['loanAmount'] * $interestRate / 100) * $nMonths;
              $finalAmount = ($_POST['loanAmount'] + $calInterest);
              break;
          }

          $_SESSION['currentDate'] = $getCurrentDate;
          $_SESSION['expireDate'] = $loanExDate;
          $_SESSION['interRate'] = $interestRate;
          $_SESSION['inter'] = $calInterest;
          $_SESSION['finalAmount'] = $finalAmount;

          
          $sql = ($connection->query("INSERT INTO loan(
            AccountNo,
            loanType,
            loanAmount,
            loanInterestRate,
            loanInterest,
            loanFinalAmount,
            loanPeriod,
            loanApplyDate,
            loanExpiresDate,
            peronStatus,
            peronIndustry,
            income,
            workTelnumber
          ) VALUES (
            '$accountNo',
            '$_POST[loanType]',
            '$_POST[loanAmount]',
            '$interestRate',
            '$calInterest',
            '$finalAmount',
            '$_POST[loanTime]',
            '$getCurrentDate',
            '$loanExDate',
            '$_POST[personStatus]',
            '$_POST[personIndustry]',
            '$_POST[income]',
            '$_POST[workTPNumber]'
          )
          "));

          if($sql){
            header("Location:./loanResult.php");
          }
          else{
            $_SESSION['failError'] = "Loan Submission was Failed";
            header("Location:./failed.php");
          }
        }
      }
      else{
        $_SESSION['failError'] = "Some Details are Required!";
        header("Location:./failed.php"); 
      }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Loans</title>
  <link rel="shortcut icon" href="../images/logo/blue-logo-02.jpg">
  <link rel="stylesheet" href="../css/common-style.css">
  <link rel="stylesheet" href="../css/forms.css">
  <style>
    .loan-head{
      width: 100%;
      background-color: #e5e4e4;
      padding:2rem 1.5rem; 
    }

    .loan-head h2{
      font-size:1.2rem;
      font-family:var(--pri-ft-family);
      font-weight: normal;
      line-height:2;
    }
  </style>

  <!-- fontawesome link for add icons in web page  -->
  <script src="https://kit.fontawesome.com/4e05476d91.js" crossorigin="anonymous"></script>
</head>

<body>
  <main class="container" id="m-cont">
    <nav class="account-nav">
      <div class="logo-img">
        <a href="../html/home.html"><img src="../images/logo/blue-logo-02.jpg" alt="" class="bank-logo"></a>
      </div>
    </nav>
    <section class="banner">
      <div class="banner-content">
        <h1>Apply to Loan</h1>
        <h2>Personal/Business/Education/Home/Auto/Vacation</h2>
      </div>
    </section>

    <!-- main section -->
    <section class="main-section">

      <div class="form-content">
        <div class="loan-head">
          <h2><span>Account Owner: </span><span style="color:var(--sec-bg-clr); font-size:1.5rem;"><?php echo $fullName ?></span><h2>
          <h2><span>Account No: </span><span style="color:var(--sec-bg-clr); font-size:1.5rem;"><?php echo $accountNo ?></span><h2>
          <h2><span>Account Type: </span><span style="color:var(--sec-bg-clr); font-size:1.5rem;"><?php echo $accountType ?></span><h2>
        </div>
        <form action="./loanApplication.php" method="post">
          <div class="form-item">
            <label for="">First Name: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="fName" id="fName" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $fname ?>">
          </div>
          <div class="form-item">
            <label for="">Last Name: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="lName" id="lName" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $lname ?>">
          </div>
          <div class="form-item">
            <label for="">NIC Number: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="NIC" id="NIC" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $NIC ?>">
          </div>
          <div class="form-item">
            <label for="">Passport Number: </label>
            <input type="text" name="passport" id="passport" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $passport ?>">
          </div>
          <div class="form-item">
            <label for="">Telephone Number (+94): <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="TPNumber" id="tpnumber" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo "(+94)". $TP ?>">
          </div>
          <div class="form-item">
            <label for="">Email: </label>
            <input type="email" name="email" id="email" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $email ?>">
          </div>
          <div class="form-item">
            <label for="">Address: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="address" id="adress" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $home ?>">
          </div>
          <div class="form-item">
            <label for="">City: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="city" id="city" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $city ?>">
          </div>
          <div class="form-item">
            <label for="">Province: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="province" id="province" class="f-input" style="opacity:0.5;" readonly="true" value="<?php echo $province ?>">
          </div>
          <div class="form-item">
            <label for="">Loan Type: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <select name="loanType" id="f-dropdown">
              <option value="">Loan type</option>
              <option value="Personal Loan">Personal Loan</option>
              <option value="Business Loan">Business Loan</option>
              <option value="Education Loan">Education Loan</option>
              <option value="Home Loan">Home Loan</option>
              <option value="Auto Loan">Auto Loan</option>
              <option value="Travel & vacation Loan">Travel & Vacation Loan</option>
            </select>
          </div>
          <div class="form-item">
            <label for="">Loan Amount (LKR): <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="number" step="0.01" name="loanAmount" id="loanAmount" class="f-input" placeholder="Loan Amount (LKR)" required>
          </div>
          <div class="form-item">
            <label for="">Loan Period (Months / Years): <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <select name="loanTime" id="f-dropdown">
              <option value="">Loan Period</option>
              <option value="three-M">Three Months</option>
              <option value="six-M">Six Months</option>
              <option value="nine-M">Nine Months</option>
              <option value="one-Y">One Year</option>
              <option value="two-Y">Two Years</option>
              <option value="four-Y">Four Years</option>
              <option value="six-Y">Six Years</option>
            </select>
          </div>
          <div class="form-item">
            <label for="">Employee Status: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="personStatus" id="personStatus" class="f-input" placeholder="Employee Status" required>
          </div>
          <div class="form-item">
            <label for="">Employee Industry: <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="personIndustry" id="personIndustry" class="f-input" placeholder="Employee Industry" required>
          </div>
          <div class="form-item">
            <label for="">Monthly Income (LKR): <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="number" step="0.01" name="income" id="income" class="f-input" placeholder="Monthly Income (LKR)" required>
          </div>
          <div class="form-item">
            <label for="">Work Place Telephone Number (+94): <strong style="color:rgb(40, 109, 238);">*</strong></label>
            <input type="text" name="workTPNumber" id="worktpnumber" class="f-input" placeholder="Work Place Telephone number (+94)" required>
          </div>
          <div class="agree-item">
            <input type="checkbox" name="agree" id="agree" required>
            <label for=""><strong style="color:rgb(40, 109, 238);">*</strong>I agree to <span>terms & conditions</span></label>
          </div>
          <div class="form-btn">
            <input type="reset" value="Reset" id="resetBtn">
            <input type="submit" value="Submit Application" id="submitBtn" name="submit">
          </div>
        </form>

    </section>
    <!-- end of main section -->

    <!-- footer -->
    <footer>
      <p class="copy-right">&copy;copyright &copy;Local Trust Bank(PVT).LTD <span id="cpy-date"></span> .All rights reserved</p>
    </footer>
    <!-- end of footer -->
  </main>
  <script>
    const cpyDate = document.getElementById("cpy-date");
    cpyDate.innerHTML = new Date().getFullYear();
  </script>

</body>

</html>

<?php $connection->close() ?>

