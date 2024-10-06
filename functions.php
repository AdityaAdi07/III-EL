<?php

// functions.php

// functions.php

function check_login($con) {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Check if the user does not have a quiz start time in the database
            if (empty($user_data['quiz_start_time'])) {
                // Set quiz start time
                $quizStartTime = time();
                $_SESSION['quiz_start_time'] = $quizStartTime;

                // Update the database with the quiz start time
                $updateQuery = "UPDATE users SET quiz_start_time = '$quizStartTime' WHERE id = '$id'";
                mysqli_query($con, $updateQuery);
            } else {
                // If quiz start time is already set in the database, update the session
                $_SESSION['quiz_start_time'] = $user_data['quiz_start_time'];
            }

            return $user_data;
        }
    }

    header("Location: login.php"); // Redirect to login if not logged in
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