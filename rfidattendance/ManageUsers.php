<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="icons/e.ico">
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	        crossorigin="anonymous">
	</script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_users.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    },5000);
	  });
	</script>
</head>
<body>
<style>
.buttons_add 
{
 background-color: #2b3647; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;

}
.buttons_Remove
{
 background-color: #f44336; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;

}
.buttons_Update
{
 background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;
}
</style>
<?php include'header.php';?>
<main>
	<h1 class="slideInDown animated">Empoloyees informations </h1>
	<div class="form-style-5 slideInDown animated">
		<form enctype="multipart/form-data">
			<div class="alert_user"></div>
			<fieldset>
				<legend><span class="number">1</span> User Info</legend>
				<input type="hidden" name="user_id" id="user_id">
				<input type="text" name="name" id="name" placeholder="User Name...">
				<input type="text" name="number" id="number" placeholder="Serial Number...">
				<input type="email" name="email" id="email" placeholder="User Email...">
			</fieldset>
			<fieldset>
			<legend><span class="number">2</span> Additional Info</legend>
			<label>
				
				<input type="radio" name="gender" class="gender" value="Female">Female
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
	      	</label >
			</fieldset>
			<button type="button" name="user_add" class="buttons_add">Add User</button>
			<button type="button" name="user_upd" class="buttons_Update">Update User</button>
			<button type="button" name="user_rmo" class="buttons_Remove">Remove User</button>
		</form>
	</div>

	<!--User table-->
	<div class="section">
		
		<div class="slideInRight animated">
			<div id="manage_users"></div>
		</div>
	</div>
</main>
</body>
</html>