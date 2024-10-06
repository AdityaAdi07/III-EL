<?php 
session_start();

include("connection.php");
include("functions1.php");

$user_data = check_login($con);

// Fetch the sections handled by the teacher
$teacher_id = $user_data['user_id'];
$query_sections = "SELECT sections FROM admin WHERE user_id = '$teacher_id'";
$result_sections = mysqli_query($con, $query_sections);

$sections = [];
while ($row = mysqli_fetch_assoc($result_sections)) {
    $sections[] = $row['sections'];
}

// Convert sections array to a string for the SQL query
$sections_str = implode("','", $sections);

// Fetch students from the sections handled by the teacher
$query_students = "SELECT * FROM users WHERE dept_section IN ('$sections_str')";
$result_students = mysqli_query($con, $query_students);

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
    .list_details{
        margin-left:110px;
        margin-top:100px;
        display:inline-block;
    }
    .section{
        font-size:45px;
        font-weight:bolder;
        color:indigo;
    }
    .table{
        border-collapse: collapse;
    margin: 25px 0;
    font-size: 30px;
    min-width: 800px;
    }
    .table thead tr{
        background-color:indigo;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
    }
    .content-table th,
.content-table td {
    padding: 12px 15px;}
    .content-table tbody tr {
    border-bottom: 1px solid #dddddd;}
    
    .backarrowbutton{
            height:30px;
            margin-right:20px;
            margin-left:0px;
        }
 .goback{
            padding:20px;
            width:300px;
            font-size:35px;
            color:white;
            background-color:black;
            border-width:0px;
            transition:0.5s;
        }
        .goback:hover{
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
            cursor:pointer;
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

    <div>
        <div class="list_details">
            <p class="section"><?php echo ucwords ($user_data['sections']);?></p></p>
            <div>
                <table class="table">
                    <thead>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Attendance</th>
                        <th>Email</th>
            <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($result_students)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_usn'] . "</td>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['attendance'] . "</td>";
                    echo "<td>" . $row['user_name'] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
</thead>
                </table>
                <div>
                <a href="/adminhome.php"> <button class="goback"> <img class="backarrowbutton" src="/Images/backarrow.png">Go Back</button></a>
                
            </div>
        </div>
    </div>
       