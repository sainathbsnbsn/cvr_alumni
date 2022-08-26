<?php


function endsWith($string, $endString)
{
	$len = strlen($endString);
	if ($len == 0) {
		return true;
	}
	return (substr($string, -$len) === $endString);
}


?>

<?php 

$db=mysqli_connect("localhost","root","","alumini");

$select='SELECT * FROM add_events_by_student ORDER BY `id` DESC LIMIT 9';

$gallery=mysqli_query($db,$select);

$alumini_select="SELECT * FROM add_alumini";

$alumini_result=mysqli_query($db,$alumini_select);

?>

<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 



  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  
	 }
}

if(isset($_SESSION['access_token']))
{
	$se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
	$re=mysqli_query($db,$se);
	$num=mysqli_num_rows($re);
	
}
if(!isset($_SESSION['access_token']))
{


 $login_button = '<a data-scroll href="'.$google_client->createAuthUrl().'">Login with cvr mail</a>';
}

?>


<?php
       if(isset($_SESSION['user_email_address'])){
        if(endsWith($_SESSION['user_email_address'],"@cvr.ac.in")){ 
			;
       }
       else{
		echo'<script>alert("please login with cvr mail id");
		open("logout.php","_self");
		</script>';

           // header('location:logout.php');
       }
    }
       ?>

<?php 


$db=mysqli_connect("localhost","root","","alumini");

$select='SELECT * FROM add_events ORDER BY `id` DESC LIMIT 3';

$result=mysqli_query($db,$select);



?>

<!DOCTYPE html >
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Home Page</title>

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
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
	<!--Start Preloader==================================== -->
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
Welcome Slider
==================================== -->

<section class="hero-area overlay">
	<video autoplay muted loop id="myVideo" >
  <source src="11/home.mp4" type="video/mp4">
</video>

	<!-- <video autoplay muted loop class="hero-video">
		<source src="images/banner/hero-video.mp4" type="video/mp4">
	</video> -->
	<div class="block">
		<div class="video-button">
			<a class="popup-video" href="https://www.youtube.com/watch?v=Zp0krgRvGnA">
				<i class="tf-ion-play"></i>
		</a>
		</div>
		<div class=" wow fadeIn" data-wow-duration="1500ms">
		<h1 style=" font-size:35px;" >Nobody is bothered about an institution more than its alumni</h1>
		<p>Any institutions' alumni are key to its growth. We are focused on giving a global experience to our students</p>
		</div>
		<a data-scroll href="https://cvr.ac.in" class="btn btn-transparent">Explore Us</a>
	</div>
</section>

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
                <a class="navbar-brand logo" href="#body">
				<img src="hat.png" alt="Website Logo" style="height: 50px; width: 50px;" />
                </a>
            <!-- /logo -->
        </div>

       <!-- main nav -->
    <nav class="collapse navbar-collapse navbar-right" role="Navigation" >
      <ul id="nav" class="nav navbar-nav navigation-menu">
        <li><a data-scroll href="index.php">Home</a></li>
        <li><a data-scroll href="blog.php">Events</a></li>
        <li><a data-scroll href="#about">About</a></li>
        <li><a data-scroll href="#contribute">Contribute</a>
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
        <li>
			
	

			<?php
   if($login_button == '')
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
    echo $login_button;
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


<!-- Start Blog Section =========================================== -->

 
		
<section id="events" class="section">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="title text-center wow fadeInDown">
				<h2> Latest <span class="color">Events</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			<div class="clearfix" >
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
              <h3><a href=""><?php echo $row['title']; $t=$row['title'];?></a></h3>
              <p style="height: 100px;overflow: hidden;"><?php echo $row['subject']; ?></p>
              <p ><?php echo $row['date']; ?></p>
              <div id="cf-submit">
					<input type="submit" name="read_more" id="submit" value="Read more" style="background-color: #fff;color:black;border:none;text-decoration: underline;">
					</div><br>
					</form>
					<?php if($row['status']==1){ ?>
					<form action="student_event_register.php" method="post">
						      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" style="display: none;">
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
			<div class="all-post text-center">
				<a class="btn btn-main" href="blog.php">View All Events</a>
			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end section -->

<section class="section about-2 padding-0 " id="about">
	<div class="container-fluid">
		<div class="row">
			<!-- section title -->
					<div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
						<h2>About <span class="color">Us</span> </h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
					
			<div class="col-md-6 padding-0  wow fadeIn" data-wow-duration="500ms">
				<img class="img-responsive" src="images/about/maxresdefault.jpg" alt="">
			</div>
			<div class="col-md-6">
				<div class="content-block">
				<div class="title   wow fadeIn" data-wow-duration="1500ms">

					<h2>CVR Alumni website</h2>
					<p>To welcome all the old students to join Alumni Association</p>
<p>To offer an enabling platform for Alumni to serve as an industry interface</p>
					<div class="row">
						<div class="col-md-6">
							<div class="media">
								<div class="pull-left">
									<i class="tf-circle-compass"></i>	
								</div>
								<div class="media-body">
									<h4 class="media-heading"></h4>
									<p> Present Alumni in the Board of Studies and IQAC and to invite insights and suggestions on new course structure and syllabi

							</div>
						</div>
						<div class="col-md-6">
							<div class="media">
								<div class="pull-left">
									<i class="tf-hotairballoon"></i>	
								</div>
								<div class="media-body">
									<h4 class="media-heading"></h4>
									<p>Provides incubation facilities </p>

								</div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Start Testimonial
		=========================================== -->

<section id="testimonial" class="testimonial overly section bg-2">
	<div class="container">
		<div class="row" >
					<!-- section title -->
					<div class="col-md-12">
						<div class="title text-center  wow fadeIn" data-wow-duration="1500ms">
							<h2 style="color:#fff;">Facult<span class="color">y</span></h2>
							<div class="border"></div>
						</div>
					</div>
					<!-- /section title -->
				</div> 
				<!-- end row -->
		<div class="row">				
			<div class="col-lg-12">
				<!-- testimonial wrapper -->
				<div id="testimonials" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
				
					<!-- testimonial single -->
					<div class="item text-center">
						
						<!-- client photo -->
						<div class="client-thumb">
							<img src="images/team/client-1.jpg" class="img-responsive" alt="Meghna">
						</div>
						<!-- /client photo -->
						
						<!-- client info -->
						<div class="client-info">
							<div class="client-meta">
								<h3>Prof. K. Rama Sastri, B.E., M.E., Ph.D.(IIT Madras), 1976</h3>
								<span>March 26, 2022</span>
							</div>
							<div class="client-comment">
								<p>Dr. Rama Sastri was the Rector, Jawaharlal Nehru Technological University (JNTU), until July 2002. Dr. Rama Sastri had held a wide variety of academic and administrative positions including Professor, Head of Department, Vice-Principal, Principal, Director and Registrar, JNTU prior to becoming the Rector of the University.
								</p>
							</div>
						</div>
						<!-- /client info -->
					</div>
					<!-- /testimonial single -->
				
					<!-- testimonial single -->
					<div class="item text-center">
						
						<!-- client photo -->
						<div class="client-thumb">
							<img src="images/team/client-2.jpg" class="img-responsive" alt="Meghna">
						</div>
						<!-- /client photo -->
						
						<!-- client info -->
						<div class="client-info">
							<div class="client-meta">
								<h3>Dr. Nayanathara K Sattiraju</h3>
								<span>March 26, 2022</span>
							</div>
							<div class="client-comment">
								<p>Dr. Nayanathara K Sattiraju obtained  BE (ECE) and ME from the College of Engineering, Osmania University in 1983 and 1985 respectively. She is a recipient of the CMC gold medal in ME. She obtained her doctorate from the National Institute of Technology, Warangal in 2003. She was the Principal of SKTRM College of Engineering for ten years prior to joining CVR College of Engineering as Professor and Head of ECE.  </p>
							</div>
						</div>
						<!-- /client info -->
					</div>
					<!-- /testimonial single -->
				
					<!-- testimonial single -->
					<div class="item text-center">
						
						<!-- client photo -->
						<div class="client-thumb">
							<img src="images/team/client-1.jpg" class="img-responsive" alt="Meghna">
						</div>
						<!-- /client photo -->
						
						<!-- client info -->
						<div class="client-info">
							<div class="client-meta">
								<h3>Prof. K. Rama Sastri, B.E., M.E., Ph.D.(IIT Madras), 1976</h3>
								<span>March 26, 2022</span>
							</div>
							<div class="client-comment">
								<p>Dr. Rama Sastri was the Rector, Jawaharlal Nehru Technological University (JNTU), until July 2002. Dr. Rama Sastri had held a wide variety of academic and administrative positions including Professor, Head of Department, Vice-Principal, Principal, Director and Registrar, JNTU prior to becoming the Rector of the University.</p>
							</div>
						</div>
						<!-- /client info -->
					</div>
					<!-- /testimonial single -->
					
				</div>		<!-- end testimonial wrapper -->
			</div> 		<!-- end col lg 12 -->
		</div>	    <!-- End row -->
	</div>       <!-- End container -->
</section>    <!-- End Section -->


<!--
Start Call To Action
==================================== -->
<section class="call-to-action section-sm bg-1 overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center wow fadeIn" data-wow-duration="1900ms">
				<h2>STAY CONNECTED</h2>
				<p>There are dozens of ways for alumni to continue their lifelong connection to Creighton! Stay connected with former classmates, faculty, staff and the Jesuit community through alumni events, programs and more. Also, don’t forget to take advantage of your alumni benefits!<br><a href="#" class="btn btn-main">Stay Connected</a>
			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<!-- Start Team Skills
		=========================================== -->
		
		<section id="contribute" class="parallax-section ">
			<div class="container">
				<div class="row" >
					<!-- section title -->
					<div class="col-md-12">
						<div class="title text-center  wow fadeIn" data-wow-duration="1500ms">
							<h2>Contribution<span class="color">s</span></h2>
							<div class="border"></div>
						</div>
					</div>
					<!-- /section title -->
				</div>  		<!-- End row -->
				<div class="row">
					<div class="col-md-6">
						<h2>Let's support our institution <br>
	                            </h2>
							<p>you can support Us — the largest and most comprehensive fundraising campaign in CVR's history</p><img class="img-responsive" src="images/about/chart.gif" alt="">
					</div>
					<div class="col-md-6">
						<ul class="skill-bar">
							<li>
								<p><span>01-</span> Alumni Student Support Fund</p>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="100"
									aria-valuemin="0" aria-valuemax="100" style="width:100%">
									</div>
								</div>
							</li>
							<li>
								<p><span>02-</span><a href="https://milaap.org/fundraisers/support-karta-initiative-india-foundation"> Student Enrichment Fund 2020</a></p>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70"
									aria-valuemin="0" aria-valuemax="100" style="width:70%">
									</div>
								</div>
							</li>
							<li>
								<p><span>03-</span><a href="https://milaap.org/fundraisers/support-govind-51"> Alumni Welfare Funds</a></p>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70"
									aria-valuemin="0" aria-valuemax="100" style="width:85%">
									</div>
								</div>
							</li>
							<li>
								<p><span>04-</span><a href="https://milaap.org/fundraisers/thereisnoearthb">No Earth-B</a></p>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70"
									aria-valuemin="0" aria-valuemax="100" style="width:60%">
									</div>
								</div>
							</li>
							<li>
									<p><span>05-</span> <a href="https://milaap.org/fundraisers/Sparkracingteam"> Development Funds</a></p>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:94%">
										</div>
									</div>
								</li>
						</ul>
					</div>
				</div>
			</div>   	<!-- End container -->
		</section>   <!-- End section -->


<!-- 
Start Our Team
=========================================== -->

<section id="alumini" class="section">
	<div class="container">
		<div class="row">
		
			<!-- section title -->
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Alumn<span class="color">i</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<!-- team member -->
			<?php while($alumini=mysqli_fetch_array($alumini_result)){ ?>
			<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms">
               <div class="team-member">
					<div class="member-photo">
						<!-- member photo -->
						<img class="img-responsive" src="image/<?php echo $alumini['alumini_image']; ?>" alt="Meghna">
						<!-- /member photo -->
						
						<!-- member social profile -->
						<div class="mask">
							<ul class="list-inline">
								<li><a href="#"><i class="tf-ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="tf-ion-social-twitter"></i></a></li>
								<li><a href="#"><i class="tf-ion-social-linkedin"></i></a></li>
								<li><a href="#"><i class="tf-ion-social-dribbble-outline"></i></a></li>
							</ul>
						</div>
						<!-- /member social profile -->
					</div>
					
					<!-- member name & designation -->
					<div class="member-meta">
						<h4><?php echo $alumini['name']; ?></h4>
						<span><?php echo $alumini['role'] ;?></span>
						<p style="height:100px;overflow: hidden;"><?php echo $alumini['subject'];?></p>
					</div>
					<!-- /member name & designation -->
					<!-- /about member -->
				   
               </div>
            </div>
        <?php } ?>
			<!-- end team member -->
			
						
		</div>  	<!-- End row -->
		<div class="all-post text-center">
				<a class="btn btn-main" href="alumini.php">View All</a>
			</div>
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<!-- Start Portfolio Section
		=========================================== -->
<section class="portfolio section" id="gallery">
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
				<!-- section title -->
				<div class="title text-center  wow fadeIn" data-wow-duration="1500ms">
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
					 echo'<button type="button" data-filter="development"><a data-scroll href="student_posts.php" style="font-size:inherit;color:#737f8a;">Add Memories</a></button>'; } ?>
					
				</div>
			</div>
		</div>
		<div class="row filtr-container">
			<?php while($g_row=mysqli_fetch_array($gallery)){ ?>
			<div class="col-lg-4 filtr-item" data-category="<?php echo $g_row['category']; ?>">
				<div class="portfolio-block">
					<img class="img-responsive" src="image/<?php echo $g_row['event_image']; ?>" alt="">
					<div class="caption">
						<a class="search-icon image-popup" data-effect="mfp-with-zoom" href="image/<?php echo $g_row['event_image']; ?>"
							data-lightbox="image-1">
							<i class="tf-ion-android-search"></i>
						</a>
						<h4><a href=""><?php echo $g_row['title']; ?></a></h4>
						<p style="height:50px;overflow: hidden;"> <?php echo $g_row['subject']; ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
			<div class="all-post text-center">
				<a class="btn btn-main" href="gallery.php">View Gallery</a>
			</div>
		</div>

	</div> <!-- end container -->
</section> <!-- End section -->


<!--
Start Counter Section
==================================== -->
		

<section id="counter" class="parallax-section bg-1 section overly">

 <div class="container">

 <div class="row">

  <!-- first count item -->

  <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">

  <div class="counters-item">

   <i class="material-icons">

perm_identity

  </i>

   <span data-speed="3000" data-to="32423">32423</span>

   <h3>Alumni</h3>

  </div>

  </div>

  <!-- end first count item -->

  <!-- second count item -->

  <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">

  <div class="counters-item">

  <i class="material-icons">
  	place
  </i>
   <span data-speed="3000" data-to="30">30</span>

   <h3>Countries</h3>

  </div>

  </div>

  <!-- end second count item -->

  <!-- third count item -->

  <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">

  <div class="counters-item">

  <i class="material-icons">

file_present

  </i>

   <span data-speed="3000" data-to="10">10</span>

   <h3>Courses</h3>

  </div>

  </div>

  <!-- end third count item -->

  <!-- fourth count item -->

  <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">

  <div class="counters-item kill-margin-bottom">

  <i class="material-icons">

model_training

  </i>

   <span data-speed="3000" data-to="20">20</span>

   <h3>Entrepreneurs</h3>

  </div>

  </div>

  <!-- end fourth count item -->

 </div> <!-- end row -->

 </div> <!-- end container -->

</section> <!-- end section -->

<!-- Srart Contact Us
=========================================== -->		
<section id="contact-us" class="contact-us section-bg">
	<div class="container">
		<div class="row">
			
			<!-- section title -->
			<div class="title text-center wow fadeIn" data-wow-duration="500ms">
				<h2>Get In <span class="color">Touch</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<!-- Contact Details -->
			<div class="contact-info col-md-6 wow fadeInUp" data-wow-duration="500ms">
				<h3>Contact Details</h3>
				<p>CVR College Of Engineering,</p><div class="contact-details">
					<div class="con-info clearfix">
						<i class="tf-map-pin"></i>
						<span>Vastunagar, Mangalpalli (V), Ibrahimpatnam (M),
Rangareddy (D), Telangana 501 510 </span></div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-telephone-outline"></i>
						<span>Phone: 08414 661 601</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-iphone"></i>
						<span>Fax: +880-31-000-000</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-email-outline"></i>
						<span>Email: web@cvr.ac.in</span>
					</div>
				</div>
			</div>
			<!-- / End Contact Details -->
				
			<!-- Contact Form -->
			<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
				<form id="contact-form" method="post" action="sendmail.php" role="form">
				
					<div class="form-group">
						<input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
					</div>
					
					<div class="form-group">
						<input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
					</div>
					
					<div class="form-group">
						<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
					</div>
					
					<div class="form-group">
						<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>	
					</div>
					
					<div id="mail-success" class="success">
						Thank you. The Mailman is on His Way :)
					</div>
					
					<div id="mail-fail" class="error">
						Sorry, don't know what happened. Try later :(
					</div>
					
					<div id="cf-submit">
						<input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
					</div>						
					
				</form>
			</div>
			<!-- ./End Contact Form -->
		
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
					<a href="index.php#events">
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
		<script>

  const tilt = $('.js-tilt').tilt()

tilt.on('change', function(e, transforms){});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>

		<script type="text/javascript" src="js/script.js"></script>
		
    </body>
</html>