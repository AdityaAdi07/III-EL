<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course|Physics</title>
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
        margin-left:30px;
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
        margin-top:1000px;
        height:300px;
      }



    .contact_us{
        color:white;
        font-size:40px;
        margin-left:-100pxpx;
        
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
        margin-left:10px
    }
    .logout{
        display:inline-block;
    }
    .logouticon{
        height:55px;
        margin-top:8px;
        margin-left:40px;
    }
  

    .course_info{
        display:inline-block;
margin-left:1100px;
        font-family:arial;
        font-size:20px;
        position:fixed;
        margin-top:70px;
        color:white;
        background-color:black;
        bottom:0;
        top:0;
        
    }
    .coursedescription{
        font-size:35px;
        margin-left:10px;
        font-weight:bolder;
        margin-bottom:10px;
        margin-top:30px;
        color:white;
        text-shadow:1px 1px grey;
    }
    .course_description{
        font-family:century;
        margin-left:10px;
        color:rgb(150, 148, 148);
        

    }
    .teacher{

        margin-top:40px;
        margin-left:10px;
        font-size:35px;
        margin-left:10px;
        font-weight:bolder;
        margin-bottom:10px;
        margin-top:30px;
        color:white;
        text-shadow:1px 1px grey;

    }

    .profilepic{
        height:40px;
        margin-top:12px;
        margin-right:-2px;
       display:inline-block;
    
    }
  .kiran{
    margin-left:0px;
    vertical-align: top;
    font-size:27px;
    margin-top:15px;
    margin-bottom:30px;
    display:inline-block;
    font-family:century;
    color:rgb(150, 148, 148);
}
    .quizcontent{
        margin-left:100px;
        
    }

    .coursetitle{
        margin-top:100px;
        margin-left:6px;
        font-family:arial;
        font-size:25px;
        font-weight:bold;
        color:indigo;
    }
       .quizpending{
        margin-top:10px;
        font-size:25px;
        margin-left:10px;
       }
      .quizinfo{
        margin-left:90px;
        margin-top:30px;
        border-width:3px;
        border-style:solid;
        border-color:black;
        border-radius:8px;
        padding:20px;
        background-color:indigo;
        display:inline-block;
        color:white;
      }
      .quiztitle{
        font-size:40px;
        font-weight:bold;
        margin-bottom:20px;
        text-shadow:3px 3px black;
      }
      .informationaboutquiz{
        font-size:25px;
        font-style:italic;
        color:rgb(150, 148, 148);
        text-shadow:1px 1px black;
      }
      .attemptnow{
        margin-top:30px;
        padding:15px;
        width:100%;
        font-size:30px;
        font-family:century;
        background-color:#EEEEEE;
        border-radius:8px;
        border-width:0;
        transition:0.5s;
      }

      .noquiz{
        margin-top:25px;
        margin-left:30px;
        font-size:45px;
        color:black;
        font-weight:bold;
      }
        .backarrowbutton{
            height:30px;
            margin-right:20px;
            margin-left:0px;
        
        }
        .goback{
            padding:20px;
            width:400px;
            font-size:35px;
            color:white;
            background-color:black;
            border-width:0px;
            transition:0.5s;
        }
        .goback:hover{
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
        }

        .gobackhome{
            margin-left:10px;
            margin-top:10px;
            padding:30px;
            
        }
    </style>
</head>
<body>
    
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side">
        <img class="profileicon" src="/Images/rv.jpeg">
        <p class="pavan"><?php echo ucwords ($user_data['user_name']);?></p>
        <div class="logout"><img class="logouticon" src="/Images/logout-removebg-preview.png"></div>
    </div>
      
         
  
 <div class="sidebar"><div><a href="index.php"><img class="home" src="/Images/HomeIcon.png"></a></div>
      <div><img class="aboutus" src="/Images/stats-removebg-preview.png"> </div>

      
    </div>
    
    <div class="course_info"><p class="coursedescription">Course Description:</p> 
        <div><p class="course_description">Condensed Matter Physics for Engineers-PHY211AI,First Semester B.E. Electronics And Instrumentation Engineering</p>
        <div><p class="teacher">Teacher In Charge :</p> </div>
        <div class="kiran_"><img class="profilepic" src="/Images/Profile-logo.png"><p class="kiran"> Dr.SUDHA KAMATH</p></div>
        </div>
       </div></div>
       <div class="quizcontent">
        <div class="coursetitle">
            <p class="coursetitle">Condensed Matter Physics for Engineers-PHY211AI</p>
            </div>
            <div class="attemptquiz">
                <p class="quizpending">Quiz Pending :
                </p>
            </div>
           <div class="noquiz">
            <p>Currently there is no quiz pending</p>
           </div>
           <div class="gobackhome">
        <a href="/index.php"> <button class="goback"> <img class="backarrowbutton" src="/Images/backarrow.png">Go Back</button>
    </div>  
            </div>
          </div>

    

</div>


 
</body>
</html>