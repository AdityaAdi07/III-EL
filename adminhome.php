<?php 
session_start();

	include("connection.php");
	include("functions1.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer|Home Page</title>
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
        .admincontent{
            margin-top:100px;
            margin-left:150px;
            display:inline-block;
        }
       .welcomeadmin{
        display:inline-block;
        font-size:70px;
        color:indigo;
        vertical-align:top;
        margin-left:10px;
        font-weight:bolder;
       }
       .studentlist{
        margin-top:10px;
        padding:20px;
        width:900px;
        font-size:35px;
        border-width:0px;
        font-weight:bold;
        background-color:black;
        border-radius:10px;
        color:white;
       }
       .studentlist:hover{
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    transition:0.5s;
    
}
    .adminoptions{
        display:inline-block;
        margin-top:20px;
    }
    .internalmarks{
        margin-top:20px;
        padding:20px;
        width:900px;
        font-size:35px;
        border-width:0px;
        font-weight:bold;
        background-color:indigo;
        border-radius:10px;
        color:white;
       }
       .internalmarks:hover{
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    transition:0.5s;
}
.attendance{
        margin-top:20px;
        padding:20px;
        width:900px;
        font-size:35px;
        border-width:0px;
        font-weight:bold;
        background-color:rgba(145, 5, 5, 0.963);
        border-radius:10px;
        color:white;
       }
       .attendance:hover{
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    transition:0.5s;
}
.quizconduct{
        margin-top:20px;
        padding:20px;
        width:900px;
        font-size:35px;
        border-width:0px;
        font-weight:bold;
        background-color:purple;
        border-radius:10px;
        color:white;
       }
       .quizconduct:hover{
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    transition:0.5s;
}
.notesupload{
        margin-top:20px;
        padding:20px;
        width:900px;
        font-size:35px;
        border-width:0px;
        font-weight:bold;
        background-color:rgb(175, 89, 26);
        border-radius:10px;
        color:white;
       }
       .notesupload:hover{
    box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    transition:0.5s;
}

.adminside{
    position:fixed;
    margin-left:1150px;
    background-color:black;
    top:70.5px;
    width:500px;
    bottom:0;

}

    .dep{
        color:grey;
        font:arial;
        font-size:50px;
        margin-top:50px;
        margin-left:20px;


    }
    </style>
</head>
<body >
    
  <div class="topbar">
    <div class="left_side"><img class="logo" src="/Images/Logo.png"></div>
    <div class="middle_side">middle side</div>
    <div class="right_side">
        <img class="profileicon" src="/Images/rv.jpeg">
        <p class="pavan"><?php echo ucwords ($user_data['teacher_name']);?></p>
        <div class="logout"><a href="logout.php"><img class="logouticon" src="/Images/logout-removebg-preview.png"></a></div>
    </div>
    <div class="sidebar"><div><img class="home" src="/Images/HomeIcon.png"></div>
      <div><img class="aboutus" src="/Images/stats-removebg-preview.png"> </div>
</div> 
    </div>
    </div>
       
<div class="admincontent">
    <div class="welcomeadmin">
        <p>Welcome <?php echo ucwords ($user_data['teacher_name']);?></p>
    </div>
    <div class="adminoptions">
        <div class="studentlist">
        <a href="student_list.php" style="text-decoration: none; color: white;"> <p>Student List</p></a>
        </div>
        <div class="internalmarks">
        <p>Marks Entry</p>
        </div>
        <div class="attendance">
       <a href="/rfid/login.php"> <p>Attendance Entry</p></a>
        </div>
        <div class="quizconduct">
            <p>Conduct Quiz</p>
        </div>
      
    </div>
</div>
<div class="adminside">
   
</div>