<!--Session-->
<?php 
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FE-Quiz_Login</title>
</head>
<!--Validation-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

  function validateLoginForm(){
    var emailCheck = document.forms["LoginForm2"]["email"].value
    var otpCheck = document.forms["LoginForm2"]["otp"].value

    console.log("in there")

    if(emailCheck == ""){
      alert("Please enter your VES Email ID")
      return false
    }

    if(otpCheck == ""){
      alert("Please enter the OTP sent to your mail")
      return false
    }
    document.forms["LoginForm2"].action="../Backend/authLogin.php"

  }
</script>
<body>
     <!--Header-->
    <?php include '../Components/header.php'?>
 <div class="display" >
          <div class="row" style="width: 100%;height:300px; justify-content: space-evenly; align-items: center;">
            <div class="col-lg-6 col-md-5 col-sm-12  mb-5" style="margin: 10px 0px;align-items: center;display: flex; justify-content: center;height: 100%">
              <img src="../images/diwali.jpg" width="90%" height="100%"></img>
            </div>
            <div class=" col-lg-6 col-md-5 col-sm-12" style="margin: 10px 0px;align-items: center;display: flex;justify-content: center;height: 100%">
 

      
      <!--Login-->
       <div class="card mb-5 "  style="width: 90%; background-color: rgba(255,255,255,0.5);height:100%;">
        <h5 class="card-title">Login</h5>
          <!--Form-->
          <form name="LoginForm2" method="POST" onsubmit="return validateLoginForm()">
                <!--Email-->
                <div class="input-group mt-5 mb-3 mx-5" style="width: 80%;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" name="email" class="form-control" placeholder="VES Email ID" aria-label="email" aria-describedby="basic-addon1">
                </div>
                <!--OTP-->
                <div class="input-group mt-5 mb-3 mx-5" style="width: 80%;"  >
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input id="OTPinput" type="text" name="otp" class="form-control" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1">
                </div>
                

                <button type="submit" id="login" value="Submit" class="btn btn-primary ml-5 mt-2 mb-5">Submit</button>

                <?php
                  if(isset($_SESSION['loginStatus2'])=='failed'){
                    print "<div class=\"alert alert-danger mx-5 \" role=\"alert\">
                              Invalid Credentials
                           </div>";  
                    $_SESSION['loginStatus2'] = null;
                  }

                  
                ?>
          </form>
      </div>
    </div>
  </div>

    <div id="particles-js">
    </div>
      <script type="text/javascript"src="../js/particles.js"></script>
       <script type="text/javascript"src="../js/app.js"></script>

    <!--Footer-->
    <?php include '../Components/footer.php';?>  

</body>
</html>


