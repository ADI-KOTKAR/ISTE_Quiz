<?php

    require_once 'auth.php';

    //JSON Parsing
    $data = file_get_contents("../Database/Questions.json");
    $data = json_decode($data,true);

    $_SESSION['wrongAnswer'] = null;

    $question_no = (int)$_SESSION['progress_count'];

    if(isset($_POST['answer'])){

        //Collecting Strings
        $correct_answer = trim(strtoupper($data[$question_no]['answer']));
        $input = trim(strtoupper($_POST['answer']));


        //Regex Match
        if(preg_match('/'.$correct_answer.'/',$input)){
            //echo "Matched";
            $_SESSION['progress_count']++;
            $_SESSION['points'] += 10;

            $current_time = time();
            
            updateProgress($_SESSION['email'],$_SESSION['progress_count'],$_SESSION['points'],$current_time);
            header('location:timer.php');

        }else{
            echo "not matched";

            $_SESSION['wrongAnswer'] = "true";
            updatePointsForAttempts($_SESSION['email'],$_SESSION['attempts'],$_SESSION['points']);
            header('location:Questions2.php');
        }
    }

    function updateProgress($email,$progress_count,$points,$time){
        $collection = connectDB();

        $updateResult = $collection->updateOne(
            ['email' => $email],
            ['$set' => [
                'progress_count' => (int)$progress_count, 
                'points' => (int)$points, 
                'time_end' => $time
                ]
            ]
        );
    }

    function updatePointsForAttempts($email,$attempts,$points){
        $collection = connectDB();

        $updateResult = $collection->updateOne(
            ['email' => $email],
            ['$set' => ['incorrect_attempts' => ( (int)$attempts+1 ), 'points' => ( (int)$points-2 )]]
        );
    }

    

?>