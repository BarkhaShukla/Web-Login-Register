<?php
   include("config.php");

if ( isset($_POST['submit']) ) {
  $Fname = trim($_POST['Fname']);
  $Lname = trim($_POST['Lname']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
   $sql = "INSERT INTO admin (Firstname, Lastname, username, password)
   VALUES ('$Fname','$Lname','$username', MD5('$password'))";

   if (mysqli_query($db, $sql)) {
	    header("location: login.php");
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type ="text/css" href = "stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.panel-info{
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 30%;
}
img{
	cursor: pointer;
	width: 20%;
}

/* Full-width input fields */
input[type=text], input[type=password] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
}

/* Set a style for all buttons */
button {
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 40%;
}

button:hover {
	opacity: 0.8;
}
.btn-group{
color: white;
margin: 8px 8px;
border: non;
cursor: pointer;
width: 100%;
}
/* Extra styles for the cancel button */
.cancelbtn {
	width: auto;
	padding: 14px 20px;
	margin: 8px 0;
	background-color: #f44336;
	width: 40%;
}

/* Center the image and position the close button */
.imgcontainer {
	text-align: center;
	margin: 24px 0 12px 0;
	position: relative;
}

img.avatar {
	width: 20%;
	border-radius: 50%;
}

.container {
	padding: 16px;
}

span.psw {
	float: right;
	padding-top: 16px;
}

/* The Modal (background) */

/* The Close Button (x) */
.close {
	position: absolute;
	right: 25px;
	top: 0;
	color: #000;
	font-size: 35px;
	font-weight: bold;
}

.close:hover,
.close:focus {
	color: red;
	cursor: pointer;
}

/* Add Zoom Animation */
.animate {
	-webkit-animation: animatezoom 0.6s;
	animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
	from {-webkit-transform: scale(0)}
	to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
	from {transform: scale(0)}
	to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
	span.psw {
		 display: block;
		 float: none;
	}
	.cancelbtn {
		 width: 100%;
	}
}
</style>
<body id="HomePage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="row">
<div class="col-sm-12">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="index.php">HOME</a></li>
			<li><a href="about.php">ABOUT</a></li>
			<li><a href="contact.php">CONTACT US</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	</div>
	</div>
	<br>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#HomePage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
<br>
<br>


  <div class="container-fluid col-sm-12">
    <center>
      <div class="panel panel-info">
        <div class="panel-header">
            <h1>Register</h1>
        </div>
        <div class="panel-body">
        <form id="Registerpart" action="register.php" method="POST">
			<label><b>First Name:</b></label>
            <input type="text" placeholder="Enter first name" name="Fname" required>
			<label><b>Last Name:</b></label>
            <input type="text" placeholder="Enter last name" name="Lname" required>
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="username" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <!-- <label><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        </div>
            <div class="panel-footer">
              <div class="btn-group-lg btn-group">
                <button type="Submit" name="submit">Register</button>
                <button type="cancel" class="cancelbtn">Cancel</button>
              </div>
			</div>
		</form>
		</div>
  </center>
</div>
<footer class="container-fluid text-center">
  <a href="#HomePage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>
</body>
</html>
