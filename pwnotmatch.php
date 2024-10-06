<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    // Check if passwords match
    if ($password !== $retype_password) {
        echo "Passwords do not match. Please re-enter.";
    } else {
        $query = "SELECT user_name FROM users WHERE user_name='$user_name'";
        $result = mysqli_query($con, $query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_num_rows($result) == 1) {
            header("Location:usernameexists.php");
        } elseif (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            // save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id, email, user_name, password) VALUES ('$user_id', '$email', '$user_name', '$hashed_password')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        } else {
            echo "Enter a valid username and password.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer|Signup page</title>
    <link rel="stylesheet" href="/CSS/general.css">
    <link rel="stylesheet" href="/CSS/topbar.css">
    <link rel="stylesheet" href="/CSS/rightside.css">
    <link rel="stylesheet" href="/CSS/leftside.css">
    <link rel="stylesheet" href="/CSS/sidebar.css">
    <link rel="stylesheet" href="/Hover/buttonhover.css">
    <style>
        p{
            font-family:Arial, Helvetica, sans-serif;
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
    .user_name{
        display:block;
        width:550px;
        height:45px;
        font-size:20px;
        font-family:arial;
       
        background-color: #F6F6F6;
        border-width:0px;
       
    }
    .email{
        display:block;
        width:550px;
        height:45px;
        font-size:20px;
        font-family:arial;
       margin-top:10px;
        background-color: #F6F6F6;
        border-width:0px;
       
    }

    .password{
        display:block;
        width:550px;
      border-width:2px;
        margin-top:10px;
        height:45px;
       font-size:20px;
        font-family:arial;
        background-color: #F6F6F6;
       border-color:red;
       border-radius:3px;
    }

    .login_buttons{
        margin-top:20px;
    }
    #button{
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
        margin-top:300px;
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
    .haveaccount{
        padding:7px;
        width:300px;
        height:65.2px;
        vertical-align:top;
        background-color: #EEEEEE;
        border-width:0;
        color:black;
        font-family:arial;
        font-size:25px;
        font-weight:bold;
        border-radius:5px;
        margin-bottom:3px;
        margin-left:10px;
    }

    .haveaccount:hover{
    cursor:pointer;
    opacity:0.8;
}

#button:hover{
    opacity:0.8;
    cursor:pointer;
}

.pwnotmatch{
    color:red;
    
}
    </style>
</head>
<body >
    
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side"><p class="Logintogetstarted">Signup To Get Started!</p> </div>
  </div>
  
 <div class="sidebar"><div><img class="home" src="/Images/HomeIcon.png"></div>
      <div><img class="aboutus" src="/Images/QuestionMark-removebg-preview.png"> </div>
      
</div>
<div class="welcome"><p class="welcome">Welcome to <u>Q</u><u>uizzer</u></p>
    <p class="please">Please create a new account to continue!</p></div>
</div>
<div class="box">
    <form method="post">
    <div class="logocom"><img class="logo_com" src="/Images/quizzer.com"></div>
    <input class="user_name" type="text" name="user_name" placeholder="Username">
    <input class="email" type="text" name="email" placeholder="Email">
     <input class="password" type="password" name="password" placeholder="Password">
     <input class="password" type="password" name="retype_password" placeholder="Retype Password">
     <p class="pwnotmatch">Password does not match!</p>
     <div class="login_buttons">
     <input id="button" type="submit" value="Signup">
     <a href="login.php"><button class="haveaccount">Have an account?Click here to login</button></a>
	
     </div>
</form>

</div>

<div class="contact">
   <br>
    <p class="contact_us">Contact us</p><br><br>
   <div><img class="phoneicon" src="/Images/phoneicon-removebg-preview.png"><p class="phone">Phone Number : 912084422881</p></div><br><br>
   <div><img class="mailicon" src="/Images/mail-removebg-preview.png"><p class="mail">Email: quizzer@gmail.com</p></div><br><br>
   <div><img class="instaicon" src="/Images/insta-removebg-preview.png"><p class="insta">Insta: <a class="instaid" href="https://instagram.com/_pavan_ganesha?igshid=OGQ5ZDc2ODk2ZA==" target="_main">@Quizzer</a></p></div>
    

</div>


 
</body>
</html>