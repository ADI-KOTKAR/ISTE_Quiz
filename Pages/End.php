<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
    require_once '../Backend/auth.php';
    require_once '../Backend/authLogin.php';

        if(!isset($_SESSION['email'])){
            include '../Components/error.php';

            return ;
        }

        //fetch user_info
        ob_start();
        $user_info = fetchUser($_SESSION['email']);
        ob_end_clean();

        if( (int)$user_info['progress_count'] != 11){
            include '../Components/incomplete.php';

            return ;
        }

        function getHoursMinutes($seconds, $format = '%02d:%02d:%02d') {

            if (empty($seconds) || ! is_numeric($seconds)) {
                return false;
            }
        
            $minutes = round($seconds / 60);
            $hours = floor($minutes / 60);
            $remainMinutes = ($minutes % 60);
            $remainSeconds = ($seconds % 60);
        
            return sprintf($format, $hours, $remainMinutes, $remainSeconds);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FE-Quiz_End</title>
</head>
<body>
    <!--Header-->
    <?php include '../Components/header.php'?>

    <!--Content-->
    <div class="card mx-5 mt-5 w-50">
        <div class="card-body">
            <h1>Congratulations</h1>
            <ul class="list-group my-5 w-50">
                <?php
                    $time_taken = $user_info['time_end'] - $user_info['time_start'];
                    $time =  getHoursMinutes($time_taken);

                    print"  <li class=\"list-group-item\"><b>Points: </b>".$user_info['points']."</li>
                            <li class=\"list-group-item\"><b>Incorrect Attempts: </b>".$user_info['incorrect_attempts']."</li>
                            <li class=\"list-group-item\"><b>Time taken: </b>".$time."</li>";
                ?>
            </ul>
            <a href="../Backend/logout.php" type="button" class="btn btn-dark">End</a>
        </div>
    </div>
</body>
</html>