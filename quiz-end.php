<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_sample_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$score = 0;

foreach ($_POST as $questionId => $answer) {
    $questionId = str_replace("q", "", $questionId);

    $sql = "SELECT correct_answer, question_type FROM quiz WHERE id = ?";
    
    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing SQL statement: " . $conn->error);
    }

    $stmt->bind_param("i", $questionId);

    if (!$stmt->execute()) {
        die("Error in executing SQL statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if (!$result) {
        die("Error in getting result set: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correctAnswer = $row['correct_answer'];

        // Check if the answer is correct
        if ($row['question_type'] === 'multiple_choice') {
            if ($answer === $correctAnswer) {
                $score++;
            }
        } elseif ($row['question_type'] === 'fill_in_the_blank') {
            // You may want to implement a case-insensitive comparison or additional validation here
            if (strtolower($answer) === strtolower($correctAnswer)) {
                $score++;
            }
        }
    }
    
    $stmt->close();
}

// Update the 'marks' column in the database
$updateSql = "UPDATE users SET marks = ? WHERE id = ?";
$updateStmt = $conn->prepare($updateSql);

if (!$updateStmt) {
    die("Error in preparing SQL statement: " . $conn->error);
}

$updateStmt->bind_param("ii", $score, $user_data['id']);

if (!$updateStmt->execute()) {
    die("Error updating marks: " . $updateStmt->error);
} else {
    echo "Marks updated successfully!";
}

$updateStmt->close();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz End</title>
    <link rel="stylesheet" href="/CSS/general.css">
    <link rel="stylesheet" href="/CSS/topbar.css">
    <link rel="stylesheet" href="/CSS/rightside.css">
    <link rel="stylesheet" href="/CSS/leftside.css">
    <link rel="stylesheet" href="/CSS/sidebar.css">
    <link rel="stylesheet" href="/Hover/buttonhover.css">
    <style>
        p{
        
        }
        .logo{
            height:53px;
            margin-left:40px;
            margin-top:10px;
        }
     .Logintogetstarted{
        color:white;
        margin-top:25px;
        margin-left:200px;
        font-size:25px;
        font-weight:bold;
        
     }
     .home{
        height:30px;
        margin-top:50px;
        margin-left:30px;
     }
     .aboutus{
        height:30px;
        margin-top:50px;
        margin-left:25px
     }
     .page{
       
        margin-left:50px;
        width:100%
        margin-top:10px;
          }
    .welcome{
        margin-left:250px;
        margin-top:100px;
        font-family:arial;
        font-size:45px;
        font-weight:bold;
        margin-bottom:0px;
        
        }
    .box{
        margin-left:500px;
        display:inline-block;
        margin-top:50px;;
        border-width:1px;
        border-color:black;
        margin-top:100px;
        
       
    }
    .email{
        display:block;
        width:550px;
        height:45px;
        font-size:20px;
        font-family:arial;
       
        background-color: #F6F6F6;
        border-width:0px;
       
    }

    .pw{
        display:block;
        width:550px;
      border-width:0;
        margin-top:10px;
        height:45px;
       font-size:20px;
        font-family:arial;
        background-color: #F6F6F6;
       
    }

    .login_buttons{
        margin-top:20px;
    }
    .loginbutton{
        padding:15px;
        width:250px;
        height:65.2px;
        vertical-align: top;
        background-color: black;
        border-width:0;
        color:white;
        font-family:arial;
        font-size:25px;
        font-weight:bold;
        border-radius:5px;
        
    }
    .signup{
        width:260px;
        padding:15px;
        margin-left:40px;
        font-family:arial;
        font-size:20px;
        font-weight:bold;
        height:65.2px;
        background-color:#EEEEEE;
        border-width:0;
        color:black;
        border-radius:5px;
    }
    .logo_com{
        height:100px;
        margin-left:100px;
    }
      .contact{
        margin-left:100px;
        background-color:indigo;
        margin-top:500px;
        height:300px;
      }



    .contact_us{
        color:white;
        font-size:40px;
        margin-left:30px;
        
    }
    .phone{
        color:white;
        font-size:15px;
        margin-left:8px;
        vertical-align:top;
        display:inline-block;
    }

    .mail{
        color:white;
        font-size:15px;
        margin-left:8px;
        display:inline-block;
        vertical-align:top;
    }
    .insta{
        color:white;
        font-size:15px;
        vertical-align:top;
        margin-left:8px;
        display:inline-block;
    }
    .phoneicon{
        height:13px;
        margin-left:15px;
    }
    .mailicon{
        height:13px;
        margin-left:15px;
    }

    .instaicon{
        height:19px;
        margin-left:15px;


    }
    .instaid{
        color:white;
    }
    .please{
        margin-left:38px;
        font-family:arial;
        font-size:45px;
        font-weight:bold;
        margin-bottom:0px;
    }
    .profileicon{
        margin-left:180px;
        display:inline-block;
        border-radius:35px;
        height:50px;
        margin-top:10px;
    }
    .pavan{
        color:white;
        display: inline-block;
        margin-top:23px;
        font-size:25px;
        margin-left:10px;
        font-family:arial;
    }
    .logout{
        display:inline-block;
    }
    .logouticon{
        height:55px;
        margin-top:8px;
        margin-left:70px;
    
    }
    .content{
        margin-left:100px;
        margin-top:80px;
    }
    .welcomename{
      font-family:arial;
    }
    .welcomenamepavan{
        font-size:70px;
        display:inline-block;
        margin-left:20px;
    }
    .yourcourse{
        font-size:40px;
    }
    .nametext{
        display:inline-block;
        font-size:70px;
        color:indigo;
        vertical-align:top;
        margin-left:10px;
        font-weight:bolder;
    }
    .yourcourse{
        margin-top:20px;
        margin-left:15px;
        font-weight:bold;
    }
    .maths{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:indigo;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .physics{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:purple;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .electronics{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:black;
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .idealab{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:rgba(145, 5, 5, 0.963);
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .kannada{
        padding:30px;
        margin-left:20px;
        width:1338px;
        border-radius:8px;
        margin-top:20px;
        color:white;
        font-size:30px;
        background-color:rgb(175, 89, 26);
        border-width:0;
        transition:0.5s;
        font-weight:bold;
    }
    .questionscolumn{
        margin-top:85px;
        margin-left:20px;
        margin-bottom:30px;
        font-size:60px;
        display:inline-block;
    }
    .heading1{
        margin-left:140px;
        font-size:35px;
        font-family:century;
        font-weight:bold;
        margin-bottom:15px;
       
    }
    .question1{
        margin-left:100px;
        font-family:arial;
        font-size:35px;
        margin-bottom:15px;
        
        
    }
    .options{
        margin-left:50px;
        font-size:30px;
        margin-bottom:20px;
        
    }
    .nextpage{
        margin-left:1000px;
        padding:30px;
        margin-bottom:15px;
        width:400px;
        font-size:30px;
        margin-top:30px;
        background-color: black;
        color:white;
        border-width:0;

    }
        .questionbruh{
            border-width:4px;
            border-style:solid;
            border-color:indigo;
            border-radius:8px;
        }
        .timeleft{
            display:inline-block;
            position:fixed;
            margin-top:100px;
            margin-left:1000px;
            background-color: black;
            color:white;
            padding:7px;
            font-family:arial;
            font-weight:bold;
            
            ;
        }
        
        .summarybox{
            
        }

        .bgimage{
            border-width:1px;
            border-style:solid;
            border-color:black;
            height:100%;
            width:auto;
            margin-top:70px;
        }

        .bgimg{
         
           margin-bottom:0px;
        }

        .resultbox{
            margin-top:200px;
            margin-left:300px;
            padding:30px;
            background-color:black;;
            display:inline-block;
            color:white;
            border-color:white;
            border-style:solid;
            border-width:2px;
            border-radius:10px;
        }
        .quizended{
            font-size:60px;
            font-family:century;
            font-weight:bolder;
            margin-bottom:30px;
        }

        .results{
            font-size:50px;
            font-family:century;
            margin-bottom:30px;
            font-style:italic;

        }

        .marksobtained{
            font-size:40px;
            margin-bottom:25px;
            margin-left:200px
        }

        .gohomebutton{
            padding:15px;
            width:100%;
            font-family:arial;
            font-size:35px;
            border-width:0px;
            background-color:#EEEEEE;
            transition:0.5s;
        }
    </style>
</head>
<body style="background-color:indigo">

   
    
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side">
        <img class="profileicon" src="/Images/rv.jpeg">
        <p class="pavan"><?php echo ucwords ($user_data['user_name']);?></p>
    </div>
         </div>
        
         <div class="resultbox">
            <div class="quizended">
                <p>Quiz has Ended!</p>
            </div>
            <div class="results">
            <p>You have obtained the following results</p>
            </div>
            <div class="marksobtained">
            <p> Marks :  <?= $score; ?> out of <?= count($_POST); ?></p>
            </div>
            <div class="gohome">
               <button type="submit" class="gohomebutton">
                    Go to Home page
                </button>
             </div> 
            </div>
         </div>
         
         
</body>
</html>