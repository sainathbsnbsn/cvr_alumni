<?php 
session_start();
$db=mysqli_connect("localhost","root","","alumini");

$select='SELECT * FROM add_events_by_student ORDER BY `id` DESC';

$result=mysqli_query($db,$select);
if(isset($_SESSION['access_token']))
{
	$se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
	$re=mysqli_query($db,$se);
	$num=mysqli_num_rows($re);
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Gallery</title>

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
.portfolio-block{
	width: 350px;
	height: auto;
	max-height: 350px;
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
   	
	 if ($num==1){  
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
<form action="" method="post" enctype="multipart/form-data">
			<!-- Start Portfolio Section
		=========================================== -->

<section class="portfolio section" id="gallery">
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
				<!-- section title -->
				<div class="title text-center">
					<h2>Gallery <span class="color">Wall</span></h2>
					<div class="border"></div>
				</div>
				<!-- /section title -->
			</div> <!-- /end col-lg-12 -->
		</div> <!-- end row -->
		<div class="row">
			<div class="col-md-12">
				<div class="portfolio-filter">
					<button class="active" type="button" data-filter="all">All</button>
					<button type="button" data-filter="flash_mab">Flash Mob</button>
					<button type="button" data-filter="fests">Fests</button>
					<button type="button" data-filter="parties">Parties</button>

					<?php
					if (isset($_SESSION['access_token'])){
					 echo'<button type="button" data-filter="development"><a data-scroll href="student_posts.php">Add Memories</a></button>'; } ?>
					
				</div>
			</div>
		</div>
		<div class="row filtr-container">
			<?php while($row=mysqli_fetch_array($result)){ ?>
			<div class="col-lg-4 filtr-item" data-category="<?php echo $row['category']; ?>">
				<div class="portfolio-block">
					<img class="img-responsive" src="image/<?php echo $row['event_image']; ?>" alt="">
					<div class="caption">
						<a class="search-icon image-popup" data-effect="mfp-with-zoom" href="image/<?php echo $row['event_image']; ?>"
							data-lightbox="image-1">
							<i class="tf-ion-android-search"></i>
						</a>
						<h4><a href=""><?php echo $row['title']; ?></a></h4>
						<p style="height:50px;overflow: hidden;"> <?php echo $row['subject']; ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
			
	</div> <!-- end container -->
</section> <!-- End section -->

		</form>
		</div>
			<!-- ./End Contact Form -->
		
		</div> <!-- end row -->
		<!-- Main jQuery -->
		
<footer id="footer" class="bg-one">
	<div class="container">
		<div class="row wow fadeInUp" data-wow-duration="500ms">
			<div class="col-lg-12">

				<!-- Footer Social Links -->
				<div class="social-icon">
				<ul class="list-inline">
						<li><a href="https://www.facebook.com/cvr.coe"><i class="tf-ion-social-facebook"></i></a></li>
						<li><a href="https://twitter.com/cvrcoenews"><i class="tf-ion-social-twitter"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCYd3RUcKpZBWkRvApVnKtPw"><i class="tf-ion-social-youtube"></i></a></li>
						<li><a href="https://in.linkedin.com/school/cvrcoe/?challengeId=AQEpuj063Vt5iQAAAYAUwh9jHDxesZiwY7SkvTLOKfRroaml84l8kkg5tWknXt9bPCaRhv_SsncCGMyEfM3U4CrkwHaveL0BAg&submissionId=a73b4606-bf9c-e416-f8e7-6fa23a1f4c55"><i class="tf-ion-social-linkedin"></i></a></li>
					</ul>
				</div>
				<!--/. End Footer Social Links -->

				<!-- copyright -->
				<div class="copyright text-center">
					<a href="index.html">
						<!-- <img src="images/logo-meghna.png" alt="Meghna" />  -->
						<img src="hat.png" alt="Website Logo" style="height: 50px; width: 50px;" />


					</a>
					<br />

				 <script>
							document.write(new Date().getFullYear())
						</script>. All Rights Reserved.</p>
				</div>
				<!-- /copyright -->

			</div> <!-- end col lg 12 -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</footer> <!-- end footer -->
	    
		

		
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