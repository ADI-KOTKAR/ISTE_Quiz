<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="../css/style1.css">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FE-Quiz_Home</title>
          

</head>
<body>
  <?php include '../Components/header.php'?>
  <div class="container">
        <br>
        <br>
        <br>
        <br>
        
        <div class="row">

            <div class="col-md-6 row">

                <div class="col-6">
                  <img src="https://i.pinimg.com/236x/77/03/8a/77038a8120d63dfb1d5dd92ac2bc9041.jpg" alt="sh" width="90%" height="100%">
                </div>
                <div class="col-6" style="color:#fff">
                  <div id='car1' >

                  </div>
                </div>
            </div>
            <div class="col-md-6 row" >
                <div class="col-6" style="color:#fff; align-items: left;">
                  <div id='car2'>

                  </div> 
                </div>
                <div class="col-6">
                  <img src=" https://i.pinimg.com/236x/77/03/8a/77038a8120d63dfb1d5dd92ac2bc9041.jpg" alt="sh" width="90%" height="100%">
                </div>
            </div>
          </div>
          <button onclick="change()"; id="requestOTP" value="Submit" class="btn btn-primary ml-6 my-3" >next</button>
          
    </div>
    <script>
      var i=0;
      var car1 = document.getElementById('car1'); 
      var car2 = document.getElementById('car2'); 
      function change(){
        i = i+1;
        switch(i) {
          case 1:
            car1.innerHTML = 'Hey John.'
            car2.innerHTML = ''
            break;
          case 2:
            car1.innerHTML = ''
            car2.innerHTML = 'Yes Sherlock?'
            break;
          case 3:
            car1.innerHTML = 'I know these couple of days have been quite difficult for us, but trust me like you always have.'
            car2.innerHTML = ''
            break;
          case 4:
            car1.innerHTML = ''
            car2.innerHTML = 'For god’s sake Sherlock, why don’t you take external help for this one?'
            break;
          case 5:
            car1.innerHTML = 'Look John,I am a consultant detective. People consult me to solve crimes. And it’s not vice versa'
            car2.innerHTML = ''
            break;
          
        }          
      }

    </script>

  
   <div id="particles-js">
   
    </div>
    <script type="text/javascript"src="../js/particles.js"></script>
<script type="text/javascript" src="../js/app.js"></script>


</body>
</html>