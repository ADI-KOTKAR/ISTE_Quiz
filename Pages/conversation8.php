<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
   <title>FE-Quiz_Home</title>
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
    <style>
        #dialogue-box{
                       color: white;
            text-align: center;
            padding: 10px;
        }
        .rectangle-left{
            background-color: #bbb;
            border-radius: 10px;
            padding: 5px;
            position: relative;
            top: 25%;
            color: #000;
            text-align: left;
            font-size: 30px;
            }
        .rectangle-right{
            background-color: #bbb;
            border-radius: 10px;
            padding: 5px;
            position: relative;
            top: 25%;
            color: #000;
            text-align: right;
            font-size: 30px;

        }
        .rectangle-center{
            background-color: #bbb;
            border-radius: 10px;
            padding: 5px;
            color: #000;
            text-align: center;
            font-size: 30px;

        }
        .button{
            position: relative;
            float: bottom;
        }
    </style>
</head>
<body>
  <?php include '../Components/header.php'?>
  <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            
            <div id="dialogue-box" class="col-12 row">
                <p>
                   After we went to the chemistry Lab owned by RuBi and NeO, we found Olivia tied to a chair with a lead in her hand:

                </p> 
                <button class="btn btn-success" onclick="change();" style=" position:relative ;left: 45%;">Start</button>
            </div>
      
        </div>
    </div>
  <div id="particles-js">

   
    </div>
        <script>
        var i=0;
        var box = document.getElementById('dialogue-box'); 
        function change(){
          i = i+1;
          render(i);
          }
        function back(){
            i = i-1;
            render(i);
        }
        function render(i){
            switch(i) {
            case 1:
                box.innerHTML = '<div class="col-4"><img src="https://i.pinimg.com/236x/77/03/8a/77038a8120d63dfb1d5dd92ac2bc9041.jpg" alt="" width="80%" height="90%"><h2>Character 1</h2></div><div class="col-8"><div class="rectangle-left">The next day was Wednesday</div><br><br><br><br><br><br><br><br><br><button class="btn btn-primary button" onclick="change();">Next</button></div>';
                break;
           
             case 2:
                box.innerHTML = '<div class="col-8"><div class="rectangle-right"> We sensed something strange about this lead so we asked Olivia about the names.</div><br><br><br><br><br><br><br><br><br><button class="btn btn-info button" onclick="back();">back</button> <button class="btn btn-primary button" onclick="change();">Next</button></div><div class="col-4"><img src="ch2.png" alt="" ><h2>Character 2</h2></div>';
                break;
                case 3:
                box.innerHTML = '<div class="col-4"><img src="https://i.pinimg.com/236x/77/03/8a/77038a8120d63dfb1d5dd92ac2bc9041.jpg" alt="" width="80%" height="90%"><h2>Character 1</h2></div><div class="col-8"><div class="rectangle-left">  Yes they are my friends in London.</div><br><br><br><br><br><br><br><br><br><button class="btn btn-primary button" onclick="change();">Next</button></div>';
                break;
                case 4:
                box.innerHTML = '<div class="col-8"><div class="rectangle-right">  We headed back to London to provide her friends security.</div><br><br><br><br><br><br><br><br><br><button class="btn btn-info button" onclick="back();">back</button> <button class="btn btn-primary button" onclick="change();">Next</button></div><div class="col-4"><img src="ch2.png" alt="" ><h2>Character 2</h2></div>';
                break;
                case 5:
                box.innerHTML = '<div class="col-4"><img src="https://i.pinimg.com/236x/77/03/8a/77038a8120d63dfb1d5dd92ac2bc9041.jpg" alt="" width="80%" height="90%"><h2>Character 1</h2></div><div class="col-8"><div class="rectangle-left">  We arranged a foster home for Olivia with the help of my brother Mycroft.</div><br><br><br><br><br><br><br><br><br><button class="btn btn-primary button" onclick="change();">Next</button></div>';
                break;
                case 6:
                box.innerHTML = '<div class="col-8"><div class="rectangle-right">We were then informed that Erin and Scarlett went on a trek trip with their friends.</div><br><br><br><br><br><br><br><br><br><button class="btn btn-info button" onclick="back();">back</button> <button class="btn btn-primary button" onclick="change();">Next</button></div><div class="col-4"><img src="ch2.png" alt="" ><h2>Character 2</h2></div>';
                break;
           
           
            }          
        }
      </script>


<script type="text/javascript"src="../js/particles.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
 <?php include '../Components/footer.php';?>

</body>
</html>