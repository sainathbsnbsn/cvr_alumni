<?php 
session_start();
$db=mysqli_connect("localhost","root","","alumini");

if(isset($_SESSION['access_token']))
{
	$se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
	$re=mysqli_query($db,$se);
	$num=mysqli_num_rows($re);
	
}

$image="";
$category="";
$roll_no=""; 
$title="";
$subject="";
$date="";
	if(isset($_POST['submit'])){
			$title=$_POST['title'];
			$category=$_POST['category'];
			$subject=$_POST['subject'];
			$roll_no=$_SESSION['user_email_address'];
			$date=$_POST['date'];
			if($_FILES['image']['name']!=""){
			$image = $_FILES['image']['name'];
		}
			else{
				header('location:student_posts.php');
			}

			$target = "image/".basename($image);

		
			if($image!=""){
$sql = "INSERT INTO add_events_by_student(title,category,event_image,subject,date,roll_no)  VALUES('$title','$category','$image','$subject','$date','$roll_no')";
		mysqli_query($db,$sql);
		
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
			header('location:gallery.php');
			
			
		}
		else{
			$msg="There was a problem in uploading the image";
		}
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Gallery page</title>

	<!-- Mobile Specific Meta
		================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" /> -->

	<!-- CSS
		================================================== -->
	<!-- Fontawesome Icon font -->
	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<!-- Magnific popup css -->
	<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/jpg" href="images/about/logo.jpg">
	<style type="text/css">
		#nav li:nth-child(5),#nav li:nth-child(4){
height:40px;
overflow: hidden;
transition: .5s ease;
}
#nav li:nth-child(5):hover{
height: 150px;
z-index: 1000;
}
#nav li:nth-child(4):hover{
height: 80px;
z-index: 1000;
}
#nav li:nth-child(5) ul li{
padding: 5px;
}
#nav li:nth-child(4) ul li{
padding: 5px;
}
	</style>
</head>
<body>
	<header id="navigation" class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
              <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->
    
                <!-- logo -->
                <a class="navbar-brand logo" href="#body">
                    <!-- <img src="images/logo.png" alt="Website Logo" /> -->
					<img src="hat.png" alt="Website Logo" style="height: 50px; width: 50px;" />




                </a>
            <!-- /logo -->
        </div>

        <!-- main nav -->
    <nav class="collapse navbar-collapse navbar-right" role="Navigation" >
      <ul id="nav" class="nav navbar-nav navigation-menu">
        <li><a data-scroll href="index.php">Home</a></li>
        <li><a data-scroll href="blog.php">Events</a></li>
        <li><a data-scroll href="index.php#about">About</a></li>
        <li><a data-scroll href="index.php#contribute">Contribute</a>
          <ul style="display: block;">
        <li><a data-scroll href="needs.php">&emsp;Needs</a></li>
      </ul>
        </li>
        <li><a data-scroll href="alumini.php">Alumni</a>
          <ul style="display: block;">
        <li><a data-scroll href="alumini_engagement.php">Engagement</a></li>
        <li><a data-scroll href="alumini_chapters.php">Chapters</a></li>
        <li><a data-scroll href="alumini.php">Wall of Fame</a></li>
      </ul>
        </li>
        <li><a data-scroll href="gallery.php">Gallery</a></li>
        <li><a data-scroll href="news.php">News</a></li>
        <li><?php
   if(isset($_SESSION['access_token']))
   {
   	
	 if ($num>=1){  
    echo '<a data-scroll href="admin_page.php" >Admin</a>';
    }
    else{
    echo '<a data-scroll href="#">'.$_SESSION['user_last_name'].'</a>';
    }
    echo '<li><a data-scroll href="logout.php">Logout</a></li>';
    
   }
   else
   {
    echo '<a data-scroll href="login.php">Login with cvr mail</a>';
   }
   ?>		</li>
      </ul>
    </nav>
    <!-- /main nav -->
      </div>
  </header>
    <div class="container">
    <!-- /main nav -->

		<div class="row">
			<form action="student_posts.php" method="post" enctype="multipart/form-data">
			<!-- section title -->
			<div class="title text-center wow fadeIn" data-wow-duration="500ms">
				<h2>Add <span class="color">Memories</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<!-- Contact Details -->
		
			<div class="contact-info col-md-6 wow fadeInUp " data-wow-duration="500ms" style="height:300px;overflow:hidden;">
				<label for="file">
				<img src="images/backgrounds/upload.png" width="100%" height="auto" id="output" style="object-fit: contain;">
			</label>
				<input type="file" id="file" accept="image/*" onchange="loadFile(event)" name="image" style="display: none;">
			</div><br>
			<!-- / End Contact Details -->
				
			<!-- Contact Form -->
			<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
				
				
					<div class="form-group">
						<input type="text" placeholder="Title" class="form-control" name="title" id="name" required>
					</div>
					
					<div class="form-group">
						<select name="category" class="form-control" required>
							<option value="all" style="background-color:#fff;">Select Category</option>
							<option value="flash_mab" style="background-color:#fff;">Flash Mab</option>
							<option value="fests" style="background-color:#fff;">Fests</option>
							<option value="parties" style="background-color:#fff;">Parties</option>
						</select>	
					</div>
					
					<div class="form-group">
						<textarea rows="6" placeholder="Subject" class="form-control" name="subject" id="message" required></textarea>	
					</div>

					<div class="form-group">
						<input type="date" placeholder="Date" class="form-control" name="date" id="subject" required>
					</div>
					
					<div id="cf-submit">
					<input type="submit" name="submit" id="submit" class="btn btn-transparent" value="Submit" style="background-color: #57cbcc;">
					</div>						
					
			</div>
		</form>
		</div>
			<!-- ./End Contact Form -->
		
		</div> <!-- end row -->
		<!-- Main jQuery -->
		<script type="text/javascript">
			var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
   
  };
		</script>
		
		<script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.1 -->
		<script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Slick Carousel -->
		<script type="text/javascript" src="plugins/slick-carousel/slick/slick.min.js"></script>
		<!-- Portfolio Filtering -->
		<script type="text/javascript" src="plugins/filterzr/jquery.filterizr.min.js"></script>
		<!-- Smooth Scroll -->
		<script type="text/javascript" src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
		<!-- Magnific popup -->
		<script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<!-- Google Map API -->
		<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
		<!-- Sticky Nav -->
		<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
		<!-- Number Counter Script -->
		<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
		<!-- wow.min Script -->
		<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
		<!-- Custom js -->
		<script type="text/javascript" src="js/script.js"></script>
</body>
</html>