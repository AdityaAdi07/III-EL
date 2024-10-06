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
    $sections = array_merge($sections, explode(',', $row['sections']));
}

// Convert sections array to a string for the SQL query
$sections_str = implode("','", $sections);

// Fetch students from the sections handled by the teacher
$query_students = "SELECT * FROM users WHERE dept_section IN ('$sections_str')";
$result_students = mysqli_query($con, $query_students);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance = $_POST['attendance'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Check if attendance for the given date and time has already been submitted
    $query_check_submission = "SELECT * FROM attendance WHERE date = '$date' AND time = '$time' AND submitted = 1";
    $result_check_submission = mysqli_query($con, $query_check_submission);

    if (mysqli_num_rows($result_check_submission) > 0) {
        echo "Attendance for the selected date and time has already been submitted.";
    } else {
        foreach ($attendance as $student_id => $status) {
            // Fetch current attendance
            $query_current = "SELECT attendance FROM users WHERE id = '$student_id'";
            $result_current = mysqli_query($con, $query_current);
            if (!$result_current) {
                die("Error fetching current attendance: " . mysqli_error($con));
            }
            $row_current = mysqli_fetch_assoc($result_current);
            $current_attendance = explode(",", $row_current['attendance']);

            // Fetch subjects
            $query_subjects = "SELECT subjects FROM users WHERE id = '$student_id'";
            $result_subjects = mysqli_query($con, $query_subjects);
            if (!$result_subjects) {
                die("Error fetching subjects: " . mysqli_error($con));
            }
            $row_subjects = mysqli_fetch_assoc($result_subjects);
            $subjects = explode(",", $row_subjects['subjects']);

            // Find the index of the selected subject
            $subject_index = array_search($subject, $subjects);

            // Fetch previous attendance record
            $query_prev_attendance = "SELECT status FROM attendance WHERE student_id = '$student_id' AND date = '$date' AND time = '$time' AND subject = '$subject'";
            $result_prev_attendance = mysqli_query($con, $query_prev_attendance);
            $prev_status = mysqli_fetch_assoc($result_prev_attendance)['status'] ?? null;

            // Update attendance based on new status
            if ($subject_index !== false) {
                if ($prev_status === null) { // New record
                    if ($status == 1) {
                        $current_attendance[$subject_index]++;
                    }
                } else { // Editing existing record
                    if ($prev_status != $status) {
                        if ($status == 1) {
                            $current_attendance[$subject_index]++;
                        } else {
                            $current_attendance[$subject_index]--;
                        }
                    }
                }
            } else {
                die("Subject not found for student ID: $student_id");
            }

            // Convert attendance array back to string
            $updated_attendance = implode(",", $current_attendance);

            // Update the attendance status in the database
            $query_update = "UPDATE users SET attendance = '$updated_attendance' WHERE id = '$student_id'";
            if (!mysqli_query($con, $query_update)) {
                die("Error updating attendance: " . mysqli_error($con));
            }

            // Insert or update attendance record in attendance table
            if ($prev_status === null) {
                $query_insert = "INSERT INTO attendance (student_id, date, time, subject, status, submitted) VALUES ('$student_id', '$date', '$time', '$subject', '$status', 1)";
                if (!mysqli_query($con, $query_insert)) {
                    die("Error inserting attendance record: " . mysqli_error($con));
                }
            } else {
                $query_update_attendance = "UPDATE attendance SET status = '$status', submitted = 1 WHERE student_id = '$student_id' AND date = '$date' AND time = '$time' AND subject = '$subject'";
                if (!mysqli_query($con, $query_update_attendance)) {
                    die("Error updating attendance record: " . mysqli_error($con));
                }
            }
        }

        // Optionally, redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer|Mark Attendance</title>
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
    margin-left:125px;
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
        .attendanceregistry{
            margin-top:100px;
            margin-left:125px;
            font-size:35px;
            font-weight:bolder;
            font-family:arial;

        }
        .attendance_sections{
            margin-left:125px;
            margin-top:50px;
            
        }
        .attendance_buttons{
            padding:15px;
            size:25px;
            font-size:large;
            font-weight:bold;
            background-color:indigo;
            color:white;
            border-color:white;
            border-width:0px;
            border-radius:5px;
        }
        .section_button{
            padding:15px;
            size:25px;
            font-size:large;
            font-weight:bold;
            background-color:purple;
            color:white;
            border-color:white;
            border-width:2px;
            border-radius:5px;
            border-color:black;
        }
        .section_button:hover{
            cursor:pointer;
            opacity:0.5;
        }
        .attendance_buttons:hover{
            cursor:pointer;
            opacity:0.9;
        }
        .attendance_buttons:active{
            background-color:purple;
        }
        .sextion{
            display:inline-block;
            margin-left:200px;
            margin-top:50px;
            font-size:45px;
        }

        .check_box{
            height:15px;
            
        }
        .attendance_button{
            padding:15px;
            size:25px;
            font-size:large;
            font-weight:bolder;
            background-color:black;
            color:white;
            border-color:white;
            border-width:0px;
            border-radius:5px;
            margin-left:15px;
            display: inline-block;

        }
        .attendance_button:hover{
            opacity: 0.8;
            cursor:pointer;
        }
        
        .checkbox-container {
            display: inline-block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            user-select: none;
        }

        .checkbox-container input[type="checkbox"] {
            height: 25px;
            width: 25px;
        }

        .checkbox-container .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 5px;
        }

        .checkbox-container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        .checkbox-container .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .checkbox-container input:checked ~ .checkmark:after {
            display: block;
        }

        .checkbox-container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }
        .edit_button{
            margin-left:650px;
            display:inline-block;
            padding:15px;
            size:25px;
            font-size:large;
            font-weight:bolder;
            color:black;
            border-color:white;
            border-width:0px;
            border-radius:5px;
            display: inline-block;
            background-color:#EEEEEE;

        }
        .edit_button:hover{
            cursor:pointer;
            opacity:0.8;
        }
        .date{
            margin-left:10px;
            font-size:25px;
            size:25px;
            font-weight:bolder;
        }
        .time{
            margin-left:450px;
            font-size:25px;
            size:25px;
            font-weight:bolder;
        }
        .time_button{
            size:25px;
        }
        .date_button{
            size:25px;
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
    <div class="attendanceregistry">
        <p>Attendance Registry : 2024 Even Semester</p>
    </div>
    <div class="attendance_sections">
        <div>
            <button class="section_button">SECTION 1</button>
            <button class="attendance_buttons">SECTION 2</button>
        </div>
    </div>
    <div class="section1">
    <p class="sextion"><?php echo ucwords ($user_data['sections']);?></p>
    <div class="student_table">
    <form method="POST">
    <input type="hidden" name="subject" value="Mathematics">
    <label class="time" for="date">Select Date:</label>
    <input class="date_button" type="date" id="date" name="date" required>
    <label class="date" for="time">Select Time:</label>
    <input class="time_button" type="time" id="time" name="time" required>
    <table class="table" border="3">
                <tr>
                    <th>USN</th>
                    <th>Name</th>
                    <th>Mark Present</th>
                </tr>
                <?php while ($student = mysqli_fetch_assoc($result_students)) { ?>
                <tr>
                    <td><?php echo $student['user_usn']; ?></td>
                    <td><?php echo $student['student_name']; ?></td>
                    <td>
                    <label class="checkbox-container">
                                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="1" required>Present
                                </label>
                                <label class="checkbox-container">
                                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="0" required>Absent
                                </label>
                            </td>
                </tr>
                <?php } ?>
            </table>
            <input type="submit" value="Edit Report" class="edit_button">
            <input type="submit" value="Save Report" class="attendance_button">
                
    </div>
    </div>