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
    <title>Quiz attempt</title>

<style>
    *{
        margin:0;

    }
    .bgimg{
        position:absolute;
        filter:blur(4px);
        height:742px;
        width:1488px
    }
    .quizpopup{
        position: absolute;
        background-color:rgb(212, 212, 212);
        color:black;
        margin-left:300px;
        margin-top:200px;
        padding:30px;
        border-width:3px;
        border-color:black;
        border-style:solid;
        border-radius:8px;
    }
    .mathsquiz{
        font-size:50px;
        font-weight:bold;
        font-family:century;
        margin-bottom:10px;
    }
    .generalinstructions{
        font-size:25px;
    }
    .instructions{
        font-size:20px;
        font-style:italic;
        
    }
    .buttons{
        margin-top:10px;
    }
    .goback{
        padding:10px;
        margin-right:10px;
        width:400px;
        font-size:25px;
        border-width:0;
        background-color:white;
        border-radius:0px;
        transition:0.5s
       
    }
    .continue{
        width:400px;
        padding:10px;
        background-color:black;
        color:white;
        font-size:25px;
        border-width:0;
        transition:0.5s
        
    }
    .allthebest{
        font-size:25px;
        font-style:normal;
        margin-top:10px;
    }
    .goback:hover{
        box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    }
    .continue:hover{
        box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
    transform: translateY(-0.25em);
    cursor:pointer;
    opacity:0.8;
    }
</style>
</head>
<body>
<div class="bgimg">
    <img class="bgimg" src="/Images/bgmaths.png">
</div>
    <div>
        <div class="quizpopup">
            <div class="mathsquiz">Maths Quiz-1</div>
            <div class="generalinstructions">
                General Instructions to the candidate:
            </div>
            <div class="instructions"><ul><li>Candidates are allowed to carry a pen and a rough sheet.</li><li>Only non-programmable scientific calculators are allowed.</li>
            <li>Candidates are allowed to use the hard copy of the handbook , provided by the college.</li>
            <li>All questions are compulsory.</li>
            <li>The following quiz is taken into consideration for academic grading.</li>
            <li>Quiz will automatically save and submit after 20 minutes.</li>
            </ul>
            <div class="allthebest">All the best!</div>
            <div class="buttons"><a href="maths.php"><button class="goback">Go back</button></a><a href="quizpage.php"><button class="continue">Attempt Now</button></a> </div>
    </div>
</body>
</html>
