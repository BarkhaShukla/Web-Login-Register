<?php
include("config.php")
?>
<html>
<head>
	<title>
	Contact Us
	</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel = "stylesheet" type ="text/css" href = "stylesheet.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="HomePage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php">HOME</a></li>
			<li><a href="about.php">ABOUT</a></li>
			<li><a href="contact.php">CONTACT US</a></li>
			<li><a href="login.php">LOGIN</a></li>
			<li><a href="register.php">REGISTER</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<br>
	<br>
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

<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p><span class="glyphicon glyphicon-map-marker"></span> Mumbai, India</p>
      <p><span class="glyphicon glyphicon-phone"></span> +91 000000000</p>
      <p><span class="glyphicon glyphicon-envelope"></span> abc123@gmail.com</p>
    </div>
    <div class="col-sm-7">
		<form name="contactUs" role="form"  action="email.php"  method="post" ENCTYPE="text/plain" name="Website contact">
                            <legend>
                                <h3>Write Us A Message</h3>
                            </legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="firstname">Name</label>
                                    <input class="form-control" name="firstname" value="" id="name" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" type="email" value="" id="email" required />
                                </div>
                                <div class="form-group">
                                    <label for="incomingmessage">Your Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                </div>
                            </fieldset>
                            <button type="submit" name="submit" class="btn btn-dark">SEND</button>
        </form>	
    </div>
	</div>
</div>
<footer class="container-fluid text-center">
  <a href="#HomePage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>
</body>
</html>