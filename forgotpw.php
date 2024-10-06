<?php
session_start();

include("connection.php");
include("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer|Login page</title>
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
        width:100%;
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
        border-color:black;
        border-style:solid;
        background-color: #F6F6F6;
        border-width:1px;
       
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
    #loginbutton{
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

    .forgotpw{
        margin-top:5px;
        color:grey;
        font-weight:bold;
        display:inline-block;

    }

    .forgotpw:hover{
        cursor:pointer;
        opacity:0.8;
    
    }
    .sendemail{
        margin-top:10px;
        padding:15px;
        width:100%;
        background-color:black;
        border-width:0px;
        color:white;
        font-size:25px;
        font-family:arial;
        font-weight:bold;
        transition:0.5s;
    }

    .sendemail:hover{
        opacity:0.8;
        cursor:pointer;
    }
    </style>
</head>
<body >
    
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side"><p class="Logintogetstarted">Login To Get Started!</p> </div>
  </div>
  
 <div class="sidebar"><div><img class="home" src="/Images/HomeIcon.png"></div>
     
</div>
<div class="welcome"><p class="welcome">Forgot password?</p>
    <p class="please">A mail containing an OTP will be sent to your email , which can be used to change your password.</p></div>
</div>
<div class="box">
    <form method="post"  action="password-reset-code.php">
    <div class="logocom"><img class="logo_com" src="/Images/quizzer.com"></div>
    <input id="text" type="text" name="email" placeholder="Enter the email associated with your username" class="email">
   <button type="submit" class="sendemail" name="password_reset_link">Send OTP to your email</button>
</form>
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