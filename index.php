<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Uni-Placed</title>
<link rel="stylesheet" href="style2.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 

</head>
<body>
<section class="header">
        
        <nav>
            <a href="chatbot.php"><img src="images/chatbot3.gif" width="200" height="200"></a>
            <div class="nav-links" id="navLinks">  
                <i class="fa fa-close" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="register.php">REGISTER</a></li>
                    <li><a href="index.html">PLACEMENT</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
					<li><a href="index.php?logout='1'" style="color: red;">LOGOUT</a></li>
					<li><p><b>Welcome <strong><?php echo $_SESSION['username']; ?></strong></b></p> </li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        
        <div class="text-box">
            <h1>CHANDIGARH UNIVERSITY</h1>
            <p>“Education is one thing no one can take away from you.” <br> — Elin Nordegren</p>
            <a href="contact.html" class="hero-btn" role="button">Visit Us to Know More</a>
        </div>
    </section>
    <!---------- campus ---------->
    <section class="campus">
        <h1>Our Global campus</h1>
        <p><b>A WORD CLASS INFRASTRUCURE PROVIDING UP TO DATE ALL FACILITIES</b></p>
            <div class="row">
                <div class="campus-col">
                    <img src="images/campus1.jpg">
                    <div class="layer">
                        <h3>MAIN BLOCK</h3>
                    </div>
                </div>
                <div class="campus-col">
                    <img src="images/campus2.jpg">
                    <div class="layer">
                        <h3>NORTH CAMPUS</h3>
                    </div>
                </div>
                <div class="campus-col">
                    <img src="images/campus3.jpg">
                    <div class="layer">
                        <h3>SOUTH CAMPUS</h3>
                    </div>
                </div>
                
            </div>
    </section>
    <!------ Call To Action ------>

<section class="cta" style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('images/background.jpg')">
    
    <h1>Enroll For Our Various Online Courses<br>Anywhere From The World</h1>
     <a href="contact.html" class="hero-btn" role="button">CONTACT US</a>
 
</section>    

    <!-------- footer ---------->

<section class="footer">
        <h4>About Us</h4>
        <p>A wide spectrum of programs paired with flexibility, experiential learning and interdisciplinary orientation emancipate our students to explore their interests and pursue dream careers. At CU we are grooming students to be socially sensitive through intellectually challenging and contemporary diverse culture.</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>WELCOME <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">LOGOUT</a> </p>
    <?php endif ?>
</div>
</section>   



</body>
</html>