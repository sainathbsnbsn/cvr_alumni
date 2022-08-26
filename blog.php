<?php 
session_start();
$db=mysqli_connect("localhost","root","","alumini");

$select='SELECT * FROM add_events ORDER BY `id` DESC';

$result=mysqli_query($db,$select);

if(isset($_SESSION['access_token']))
{
	$se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
	$re=mysqli_query($db,$se);
	$num=mysqli_num_rows($re);
	
}

?>



<!DOCTYPE html>

<html class="no-js">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Events</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	

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

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
	<!--
	    Start Preloader
	    ==================================== -->
	<div class="preloader">
		<div class="sk-cube-grid">
			<div class="sk-cube sk-cube1"></div>
			<div class="sk-cube sk-cube2"></div>
			<div class="sk-cube sk-cube3"></div>
			<div class="sk-cube sk-cube4"></div>
			<div class="sk-cube sk-cube5"></div>
			<div class="sk-cube sk-cube6"></div>
			<div class="sk-cube sk-cube7"></div>
			<div class="sk-cube sk-cube8"></div>
			<div class="sk-cube sk-cube9"></div>
		</div>
	</div>
	<!-- End Preloader
        ==================================== -->

<!-- 
  Fixed Navigation
  ==================================== -->
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
      <a class="navbar-brand logo" href="index.php">
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
   ?>
						</li>
      </ul>
    </nav>
    <!-- /main nav -->

  </div>
</header>
<!--
End Fixed Navigation
==================================== -->

<section id="events" class="section">
  <div class="container">
    <div class="row">
      <!-- section title -->
      <div class="title text-center wow fadeInDown">
        <h2>Event<span class="color">s</span></h2>
        <div class="border"></div>
      </div>
      <!-- /section title -->
      <div class="clearfix">
        <!-- single blog post -->
        <?php while($row=mysqli_fetch_array($result)){  ?>
          <form action="blog-single.php" method="post">
        <article class="col-md-4 col-sm-6 col-xs-12 mb-30 clearfix wow fadeInUp" data-wow-duration="500ms">
          <div class="post-block h-100">
            <div class="media-wrapper " style="height: 250px;overflow: hidden;">
        <img src="image/<?php echo $row['event_image']; ?>"  alt="amazing caves coverimage" class="img-fluid" width="100%" height="auto">
            </div>
            <div class="content">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" style="display: none;">
              <h3><a href=""><?php echo $row['header'];$t=$row['title']; ?></a></h3>
              <p style="height: 100px;overflow: hidden;"><?php echo $row['subject']; ?></p>
              <p ><?php echo $row['date']; ?></p>
              <div id="cf-submit">
					<input type="submit" name="read_more" id="submit" value="Read more" style="background-color: #fff;color:black;border:none;text-decoration: underline;">
					</div><br>
					</form>
					<?php if($row['status']==1){ ?>
					<form action="student_event_register.php" method="post">
						      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" style="display: none;">
						      <input type="hidden" name="header" value="<?php echo $row['header']; ?>" style="display: none;">

						      <input type="hidden" name="image" value="<?php echo $row['event_image']; ?>" style="display: none;">
					<?php 
							if(isset($_SESSION['access_token'])){
							$set="SELECT * FROM $t WHERE email='{$_SESSION['user_email_address']}'";

						$show=mysqli_query($db,$set);

						$s=mysqli_num_rows($show);
																									}
							else{
								$s=0;
							}
					 ?>
					 <?php if($s==0){ ?>
							<div id="cf-submit">
					<input type="submit" name="register" id="submit" class="btn btn-transparent" value="Register" style="background-color: #57cbcc;">
					</div>
				<?php } ?>
				</form>
						
				<?php if($s==1){ ?>
							<div id="cf-submit">
					<input type="submit" name="" id="submit" class="btn btn-transparent" value="Registered" style="background-color: #57cbcc;">
					</div>
				<?php } ?>
					
			<?php } ?>

			<?php if($row['status']==0){ ?>
							<div id="cf-submit">
					<input type="submit" name="register" id="submit" class="btn btn-transparent" value="Event Ended" style="background-color: #57cbcc;">
					</div>
			<?php } ?>
			
			</div>
		</div>
        </article>
        
      <?php } ?>
      </div>
      <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination pagination-lg">
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li><a class="active" href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

<!-- end Contact Area
		========================================== -->


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
	    
		

		<!-- 
		Essential Scripts
		=====================================-->
		
		<!-- Main jQuery -->
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