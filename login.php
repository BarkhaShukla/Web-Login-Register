<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,MD5($_POST['password']));
      $sql = "SELECT Firstname FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
<head>
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
    opacity: 0.8
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
            <h2>Sign Up/ Sign In </h2>
        </div>
        <div class="panel-body">
          <form id="Loginpart" action="login.php" method="POST">
    				<label><b>Username</b></label>
    				<input type="text" placeholder="Enter Username" name="username" required>

    				<label><b>Password</b></label>
    				<input type="password" placeholder="Enter Password" name="password" required>

    				<center>

    					<br>
    					<input type="checkbox" checked="checked"> Remember me
    				</center>
					<a class="button" href="register.php" style="float: left;">Not a user?</a>
    				<a class="psw" href="ForgotPass-form-link.html" style="float: right;">Forgot  password?</a>
    		
        </div>

        <div class="panel-footer">
          <div class="btn-group-lg btn-group">
            <button type="Submit" name="submit">Login</a></button>
    		<button type="button" class="cancelbtn">Cancel</button>

          </div>
        <div>
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
