<?php
    require_once '../Backend/auth.php';

    if(!isset($_SESSION['email'])){
        include '../Components/error.php';

        return ;
    }

    //JSON Parsing
    $data = file_get_contents("../Database/Questions.json");
    $data = json_decode($data,true);

    //fetch user_info
    ob_start();
    $user_info = fetchUser($_SESSION['email']);
    ob_end_clean();

    $_SESSION['progress_count'] = (int)$user_info['progress_count'];
    $_SESSION['points'] = (int)$user_info['points'];
    $_SESSION['attempts'] = (int)$user_info['incorrect_attempts'];
    $_SESSION['hints_used'] = (int)$user_info['hints_used'];
    $_SESSION['incorrect_attempts_count'] = (int)$user_info['incorrect_attempts_count'];
    $_SESSION['hint_status'] = (int)$user_info['hint_status'];

    if($_SESSION['progress_count'] == 0){
        $time_start = time();

        updateStartTime($_SESSION['email'],$time_start);
    }

    if($_SESSION['progress_count'] == 11){
        header('location: End.php');
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

        document.forms['questionForm'].action="../Backend/points.php"
    }

    function hintSelected(){

        setTimeout(() => {
            document.getElementById("hint").disabled = true
        }, 100);

        alert("Points will be deducted if you choose for hint! ")  

        document.forms['questionForm'].action="../Backend/hint.php";
        
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FE-Quiz_Questions</title>
</head>
<body>
    <!--Header-->
    <?php include '../Components/header.php'; ?>

    <!--Content-->
    <div class="card mx-5">
        <div class="card-body row">
            <h4 class="col-3"><?php print $user_info['email']; ?></h4>
            <?php
                $current_question = (int)$user_info['progress_count'];
                $total_questions = (int)sizeof($data);

                $progress = round(($current_question/$total_questions)*100);
                $progress_percentage = $progress."%";

                print"<div class=\"progress col-6 mx-5 my-auto\">
                            <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $progress_percentage;\" 
                                aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                ".$progress."%
                            </div>
                    </div>";
            ?>
            <a class="btn btn-dark col-1" href="../Backend/logout.php" role="button">Logout</a>
        </div>
    </div>

    <!--Questions Content-->
    <?php 

        echo "points before this question: ".$_SESSION['current_points']."<br>";
        echo "current points: ".(int)$user_info['points']."<br>";
        echo "incorrect_attempts for this question: ".$_SESSION['incorrect_attempts_count']."<br>";
        echo "total incorrect_attempts: ".$_SESSION['attempts']."<br>";
        echo "Hint Status: ".$_SESSION['hint_status'];
   
        $count = $_SESSION['progress_count'];

        print "<form name=\"questionForm\" method=\"POST\" onsubmit=\"\">
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
                        print "<div class=\"alert alert-danger mx-5 w-50\" role=\"alert\">
                                    Invalid Answer! Please Try Again..
                               </div>";
                    }
        
        if($_SESSION['current_points'] <= 0 ){
            if($_SESSION['hint_status']==1){
                print"  <p><button class=\"btn btn-primary mx-5\" disabled>Hint</button></p>      
                        <div class=\" mx-5 w-50\" id=\"collapseExample\">
                            <div class=\"card card-body\">
                                ".$data[$count]['hint']."
                            </div>
                        </div>";
            }else if($_SESSION['hint_status']==0){
                print"  <p><button class=\"btn btn-primary mx-5\" disabled>Hint</button></p>";
            }
        }
        else if($_SESSION['hint_status']==1){
            print"  <p><button class=\"btn btn-primary mx-5\" disabled>Hint</button></p>      
                    <div class=\" mx-5 w-50\" id=\"collapseExample\">
                        <div class=\"card card-body\">
                            ".$data[$count]['hint']."
                        </div>
                    </div>";
        }else{
            print"           <p>
                        <button class=\"btn btn-primary mx-5\" type=\"submit\" data-toggle=\"collapse\"
                                data-target=\"#collapseExample\" aria-expanded=\"false\" 
                                aria-controls=\"collapseExample\" id=\"hint\" onclick=\"hintSelected()\">
                            Hint
                        </button>
                    </p>
                    <div class=\"collapse mx-5 w-50\" id=\"collapseExample\">
                        <div class=\"card card-body\">
                            ".$data[$count]['hint']."
                        </div>
                    </div>";
        }

        print       "<div class=\"mx-5 w-50 my-2\">
                        <button type=\"submit\" class=\"btn btn-dark\" 
                                value=\"Submit\" id=\"submit\" onclick=\"submitForm()\"> 
                            Submit
                        </button>
                    </div>
                </div>
             </form>";
        
    ?>
        
            
</body>
</html>
