<?php

// functions.php

// functions.php

function check_login($con) {
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM admin WHERE user_id = '$id'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

           // if (empty($user_data['quiz_start_time'])) {
                
              //  $quizStartTime = time();
              //  $_SESSION['quiz_start_time'] = $quizStartTime;

             //   $updateQuery = "UPDATE users SET quiz_start_time = '$quizStartTime' WHERE user_id = '$id'";
              //  mysqli_query($con, $updateQuery);
           // } else {
               
                //$_SESSION['quiz_start_time'] = $user_data['quiz_start_time'];
         //   }
                
            return $user_data;
        }
    }

    header("Location: login.php"); 
    die;
}






function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}