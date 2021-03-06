<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Application/css/footer.css" />
    <link rel="stylesheet" href="../../Application/css/menu-bar.css" />
    <link rel="stylesheet" type="text/css" href="../../Application/css/signup.css">
    <link rel="stylesheet" href="../../Application/css/index.css" />


  <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<!-- menu bar-->
<?php
        include "../../navbar.php";
  ?>

<!--title of main content-->
<div class="container-md paddingblock">
  <h2 class="title">Registration
    <p class="content">Create an account now, it is easy and free!</p>
</div>

<!--direct to log in page-->
<div class="container-sm message padding-block" style="text-align: right;">
  <p>Already have an account?
    <a href="logIn.php" target="_self">Sign in</a></p>
</div>

<!--form for user-->
<form action="signup.php" method="POST" class="container-md" id="registration" name="registration" >
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" id="username" oninput="return validateUsernameLength()">
    <div >
      *Minimum username requirement:
      <p id="usernameLength" class="invalid"> Minimum 5 characters</p>
    </div>
<br>
      <div class="form-group">
          <label>type</label>
          <input type="text" name="type" class="form-control" id="username" />  enter(user/seller)
          <div >
    <br/>

    <label>Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">

    <br/>

    <label>Email address confirmation</label>
    <input type="email" name="emailconfirmation" class="form-control" placeholder="Enter email" id="confirmEmail">

    <br/>

    <label>Password*</label>
    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" oninput="return validateRequirements()">
    <div id="requirements">
      *Minimum password requirements:
      <p id="length" class="invalid"> Minimum 8 characters</p>, at least
      <p id="capital" class="invalid"> 1 uppercase letter</p>, and at least
      <p id="number" class="invalid"> 1 number</p>
    </div>

    <br/>

    <label>Password confirmation</label>
    <input type="password" name="passconfirmation" class="form-control" placeholder="Enter password" id="confirmPwd">
  </div>

  <br/>

  <fieldset class="form-group padding-block">
    <legend>Shipping Address</legend>

    <label>First name</label>
    <input type="text" class="form-control" name="firstname" id="firstName">

    <label>Last name</label>
    <input type="text" class="form-control" name="lastname" id="lastName">

    <label>Street</label>
    <input type="text" class="form-control" name="streetname" id="streetName">

    <label>Apt.</label>
    <input type="text" class="form-control" name="apt" id="aptNum">

    <label>Postal Code</label>
    <input type="text" class="form-control" name="postalcode" id="postalCode">

    <label>City</label>
    <input type="text" class="form-control" name="cityname" id="cityname">

    <br/><br/>

    <label>Phone number</label>
    <input type="tel" class="form-control" name=phonenumber placeholder="123-123-1234" id="phoneNumber">

  </fieldset>

  <br/><br/>

  <!--NEED TO VALIDATE THIS PART IN JS-->
  <fieldset>
    <legend>Payment Method</legend>

    <label>Card Number</label>
    <input type="text" class="form-control" name=cardnumber id="cardnumber">

    <label>Expiry Date</label>
    <input type="text" class="form-control" name=expirydate placeholder="Month/Year" id="expirydate">

    <label>Security Code</label>
    <input type="text" class="form-control" name=securitycode placeholder="Security Code" id="securitycode">

  </fieldset>

  <br/><br/>

  <!--checkbox for agreement-->
  <input type="checkbox" name="newsletter" value="newsletter" id="newsLetter">
  <label>I would like to receive updates, offers, and newsletter via electronic
    communications. I may withdraw my conscent at any time.
  </label>

  <br/>

  <input type="checkbox" name="agreement" value="agreement" id="agreement">

  <label>I have read and agree to the Terms of Service and Privacy Policy</label>

  <br/><br/>

  <!--button for sign up/reset-->
  <div class="button-place">
    <button type="submit" name="Add" class="btn btn-dark btn-info" id="signUpBtn"
            onclick="return validateRegistration()">Sign up</button>

    <button type="reset" class="btn btn-dark btn-info">Reset</button>
  </div>
</form>

<br/><br/>

<!--FOOTER-->
<?php
    include "../../footer.php";
  ?>

<!--javascript at the bottom for it to load after receiving all the needed information-->
<script type="text/javascript" src="../../Application/js/signup.js"></script>

</body>
</html>