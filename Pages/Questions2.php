<?php
    require_once 'auth.php';

    //JSON Parsing
    $data = file_get_contents("../Database/Questions.json");
    $data = json_decode($data,true);

    //fetch user_info
    ob_start();
    $user_info = verifyCredentials($_SESSION['email'],$_SESSION['otp']);
    ob_end_clean();

    $_SESSION['progress_count'] = (int)$user_info['progress_count'];
    $_SESSION['points'] = (int)$user_info['points'];
    $_SESSION['time'] = (int)$user_info['time'];
    $_SESSION['attempts'] = (int)$user_info['incorrect_attempts'];

    if($_SESSION['progress_count'] == 11){
        header('location:End.php');
    }
?>

<!--jquery-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


 <!--Handling Reloading of Page-->   
 <script>
    // $(function (){
    //     $(window).on('beforeunload',function(){
    //         return '';
    //     })
    // })
</script>

<script>


    function submitForm(){
        console.log("enetered")
        var answer = document.getElementById('answer').value

        if(answer == ''){
            alert("Please write your answer")
            return false
        }

        document.forms['questionForm'].action="points.php"
    }

    function hintSelected(){

        setTimeout(() => {
            document.getElementById("hint").disabled = true
        }, 100);

        //alert("Points will be deducted if you choose for hint! ")  
        
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <?php include '../Components/header.php'?>

    <!--Content-->
    <div class="card mx-5">
        <div class="card-body row">
            <h3 class="col"><?php print $user_info['email']; ?></h2>
            <!-- <button type="button" id="startQuiz" onclick="startQuiz()" class="btn btn-dark col-1 mx-2">Start</button> -->
            <a class="btn btn-dark col-1" href="logout.php" role="button">Logout</a>
        </div>
    </div>

    <!--Questions Content-->
    <?php 
    
        //echo $_SESSION['progress_count'];

        $count = $_SESSION['progress_count'];

        print "<form name=\"questionForm\" method=\"POST\" onsubmit=\"return submitForm()\">
                <div class=\"card mx-5 my-5\">
                    <h3 class=\"card-title mx-5 my-2\"> Question ".($count+1)." </h3>
                    <div class=\"card-body mx-4\">
                        ".$data[$count]['question']."
                    </div>
                    <div class=\"input-group mb-3 mx-5 w-50\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Answer\" 
                               aria-label=\"Answer\" aria-describedby=\"basic-addon1\"
                               id=\"answer\" name=\"answer\">
                    </div>";

                    if(isset($_SESSION['wrongAnswer'])){
                        //echo $_SESSION['wrongAnswer'];
                        print "<div class=\"alert alert-danger mx-5 w-50\" role=\"alert\">
                                    Invalid Answer! Please Try Again..
                               </div>";
                    }
                    
        print"           <p>
                        <button class=\"btn btn-primary mx-5\" type=\"button\" data-toggle=\"collapse\"
                                data-target=\"#collapseExample\" aria-expanded=\"false\" 
                                aria-controls=\"collapseExample\" id=\"hint\" onclick=\"hintSelected()\">
                            Hint
                        </button>
                    </p>
                    <div class=\"collapse mx-5 w-50\" id=\"collapseExample\">
                        <div class=\"card card-body\">
                            ".$data[0]['hint']."
                        </div>
                    </div>
                    <div class=\"mx-5 w-50 my-2\">
                        <button type=\"submit\" class=\"btn btn-dark\" 
                                value=\"Submit\" id=\"submit\"> 
                            Submit
                        </button>
                    </div>
                </div>
             </form>";
        
    ?>
    <form action="">
        
            
            
            
            
         

</body>
</html>
