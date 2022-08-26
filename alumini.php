<?php 
session_start();
$db=mysqli_connect("localhost","root","","alumini");
if(isset($_SESSION['access_token']))
{
	$se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
	$re=mysqli_query($db,$se);
	$num=mysqli_num_rows($re);
	
}

$select="SELECT * FROM add_alumini";

$result=mysqli_query($db,$select);
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Alumini</title>

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
	<style>
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
   .alumni .container {
     box-shadow: 0 2px 3px rgba(0,0,0,.2);
     padding: 10px;
    
     
   }

   .alumni .container img{
   	border-radius: 50%;
   }
   .alumni .container:hover{
     border-left: 3px solid #57cbcc;

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
    
<!-- 
Start Our Team
=========================================== -->

<section id="alumini" class="section">
	<div class="container">
		<div class="row">
		
			<!-- section title -->
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Wall of <span class="color">Fame</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<!-- team member -->
			<?php while($row=mysqli_fetch_array($result)){ ?>
			<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms">
               <div class="team-member">
					<div class="member-photo">
						<!-- member photo -->
						<img class="img-responsive" src="image/<?php echo $row['alumini_image']; ?>" alt="Meghna">
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
						<h4><?php echo $row['name']; ?></h4>
						<span><?php echo $row['role'] ;?></span>
						<p style="height:100px;overflow: hidden;"><?php echo $row['subject'];?></p>
					</div>
					<!-- /member name & designation -->
					<!-- /about member -->
				   
               </div>
            </div>
        <?php } ?>
			<!-- end team member -->
			
						
		</div>  	<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->
		

<!-- <section id="alumini" class="section">
	
		<div class="row"> -->
			<!-- section title -->
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Alumn<span class="color">i</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<div class="alumni mt-5 container">

    <div class="container p-3 mt-2 ">
      <img src="https://cvr.ac.in/alumni/images/sriram.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span>Dr Sriram Somanchi</span>(2002-06): Assistant Professor, University of Notre Dame, USA.  
    </p>
      <p>Sriram obtained his ME from IISc and received  PhD  from  CMU.</p>
    </div>
      <div class="container p-3 mt-2 ">
      <img src="https://cvr.ac.in/alumni/images/santosht.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Dr Santosh Tirunagari</span>(2005-09): ML Engineer, EMBL, and Honorary Asst Prof, MDX university.</p>
    <p> Santosh obtained his Masters from Aalto University and received  PhD  from University of   Surrey.  </p>
    </div>
        <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/srinivasvit.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
     <p><span> Dr Koppu Srinivas</span>(2002-06): Associate Professor in VIT. </p>
     <p> Srini had compled his M.Tech from IIIT-A and received   PhD from VIT. </p>
     </div>
      
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/badrianath.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Dr Badrinath Jagannath</span>(2009-13): Research Scientist, Baxter Young Investigator Awardee(2021).</p>
    <p> Badrinath obtained his MS from ASU and received PhD  in Biomedical Engineering from University of Texas, Dallas.  
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rahulreddy.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span>  K RahulReddy </span>(2016-20): Civil Servant with  UPSC rank 218.
     </p>
      </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/ramireddyper.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span> PV Rami Reddy </span>(2006-10): Deputy Financial Advisor, Ministry of Railways.  
     </p>
    <p>Rami Reddy obatined his M.Tech from IIT-Bombay.</p>
      </div>
    <div class="container p-3 mt-2">
    <img src="https://cvr.ac.in/alumni/images/kovuripavan.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span>Kovuri Pavan Kumar</span>(2002-06): Civil Servant.  
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/harshpic.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    <p><span>Harsh H Shah</span>(2005-09): Product Manager, Oracle India Pvt Ltd.</p>
    <p> Harsh received 3  Gold Medals for his academic performance as a Best Student from JNTU  and two Gold Medals in MBA from XIMB.   
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/saisubrah.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Sai Vishnubhatla</span>(2001-05): Director of Product, Hippo | ex- Yahoo, Blackboard, McKinsey.  
     </p>
      <p>Sai obtained his MBA from University of Chicago, Masters from Stanford University, and completed CFA.
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vachaspathi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Vachaspathi K </span>(2002-06): Quantitative Analyst, Engineer and programmer, ZETA Global. 
     </p>
      <p>Vachaspathi obtained his MS from  Missouri University of Science and Technology.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/ramakrishna.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    <p><span>K Ramakrishna Reddy</span>(2005-09): Software Architect, Petasense.</p>
    <p> Ramakrishna obtained his MTech from BITS. He is passionate in  conducting  Hackathons and Workshops.   
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sudheerk.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Sudheer kumar Komirishetty </span>(2001-05): Sr Software Engineer, Microsoft. 
     </p>
      <p>Sudheer obtained his M.Tech from IIT-G. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/saikrishna.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Sai Krishna Dintyala</span>(2003-07): Senior Software Development Engineer (SDE III), Amazon. 
     </p>
      <p>Krishna obtained his M.Tech from IIT-M. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/palvali.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Palvali Teja Burugu</span>(2004-08): Software Development Manager, Amazon Web Services (AWS) AI.</p>
    <p>Teja obtained his Master's from  Indian Institute of Technology, Kanpur.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rachamalla.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Shashank Rachamalla </span>(2004-08): Senior Software Engineer, Microsoft. 
     </p>
      <p>Shashank obtained his M.Tech from IIT-B. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/krishnateja.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Krishna Teja Vemuri </span>(2006-10): Software Engineer, Apple. 
     </p>
      <p>Krishna obtained his M.Tech from IIT-B. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/arunbattini.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Arunkumar Bathini</span>(2006-10): Project Manager, Oracle. 
     </p>
      <p>Arun obtained his M.Tech from IIT-M. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/bheri.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Bala Murali Krishna Bheri </span>(2007-11): Sr Software Engineer, Microsoft. 
     </p>
      <p>Murali obtained his M.Tech from IIT-B. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kuruba.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Amarnath Kuruba</span>(2008-12): Software Development Manager, Amazon. 
     </p>
      <p>Amarnath obtained his M.Tech from IIT-D. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vedavyas.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span> Vedavyas Etikala </span>(2009-13): PhD Scholar,KU Leuven. 
     </p>
      <p>Ved obtained his M.Tech from IIT-B and worked as Software Engineer @ Microsoft. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/meghashyam.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Meghashyam Pasunoori </span>(2012-16): Senior Staff Scientist,  Jukshio. 
     </p>
      <p>Meghashyam obtained his M.Tech from IISc, he got AIR 6 in GATE-17. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/narendar.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Narender Sajnani </span>(2001-05): Senior Principal Product Owner, Broadcom Inc. 
     </p>
      <p>Narender did his EPGDM from IPL. 
    </p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/shruthi_anand.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span> Shruthi Anand </span>(2001-05): Engineering Program Manager, Apple. 
     </p>
      <p>Shruthi obtained her Masters degree from University of Colorado Boulder.
    </p>
    </div>
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pramodg.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Pramod Gopisetty</span>(2001-05): Delivery Architect, Capgemini. 
     </p>
      <p>Pramod obatined his MS from The University of Memphis and MBA from Texas McCombs School of Business.</p>
    
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pradeepb.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Pradeep Kumar B </span>(2001-05): Architect | Visionary | Leader, CNA Insurance. 
     </p>
      <p>Pradeep obatined his MBA from Gies College of Business - University of Illinois Urbana-Champaign.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/amarkanth.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Amarkanth Ranganamayna </span>(2001-05): Engineering Leader, LinkedIn. 
     </p>
      <p>Amarkanth obtained his Masters from University of Southern California.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/tanikella.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Gautham Tanikella </span>(2001-05): Senior Software Development Manager, Capital One. 
     </p>
      <p>Gautham obtained his Masters from Wilkes University.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/martin.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Richard Nikhil Martin</span>(2001-05): Engineering Manager, Cerner Corporation. 
     </p>
      <p>Nikhil Martin obtained his Masters from The University of Arizona.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sushmitha.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Sushmitha karnati</span>(2001-05): Senior Test Data Engineer, ASX. 
     </p>
      <p>Sushmitha  obtained her Master's degree from University of Illinois, Springfield.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pakala.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Venkata (Yash) Pakala</span>(2001-05):   Freelance Technology Consultant and Product Management Consultant. 
     </p>
      <p>Yash obtained his MBA from Georgia State University - J. Mack Robinson College of Business.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vijayaneeli.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Vijaya Bhaskara Neeli</span>(2002-06): Parametric Test R&D Engineer, Intel Corporation. 
     </p>
      <p>Vijay   obtained his Master's degree from University of Louisiana.</p>
    
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rajasekharpilli.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Raja Sekhar Pilli</span>(2001-05): Senior Oracle Fusion HCM Developer, Blue Apron. 
     </p>
      <p>Raj obtained his Master's from  University of Texas at San Antonio.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kottapalli.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Amarnath Kothapalli </span>(2002-06): Senior Project Manager, Genpact. 
     </p>
      </div>
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vijaythota.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Vijay Kumar Thota</span>(2003-07): Senior Engineering Manager, GAP Inc. 
     </p>
      <p>Hall of fame @ ADP,  Star of the  year at TechMahindra.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/madhuresh.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Madhuresh Shah</span>(2003-07): Head - IT Infrastructure, Shah Book House. 
     </p>
      <p>Madhuresh obtained his MBA from IPE.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/mukarjee.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Soumya Mukherjee</span>(2003-07): Program Manager, Google. 
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/varada.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Sri Vishnu Varada</span>(2003-07): Head of Engineering, Google Cloud. 
     </p>
      <p>Vishnu obtained his Masters from University of Houston, C.T. Bauer College of Business. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/devnani.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Sanjay Devnani</span>(2003-07): Security Architect, Peloton. 
     </p>
      <p>Sanjay obtained his Masters from University of Utah. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/revanth.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Revanth Anireddy</span>(2004-08): Cloud Application Architect, Amazon Web Services. 
     </p>
      <p>Revanth obtained his Masters from University of Houston. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/shravanb.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
     <p><span>Sravan K. Buggaveeti</span>(2004-08): Software Engineer | Data Analytics | Power Systems, SIG. 
     </p>
      <p>Sravan obtained his Masters from New Mexico State University. 
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sadhu.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Sadhu Siva</span>(2003-07): Sr. Partner Solutions Architect, Amazon Web Services. 
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/karthikm.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Karthik Reddy Malasani</span>(2004-08): Director, Key Software, Inc. 
     </p>
      <p>Karthik obtained his Master's from  University of California, Santa Barbara.  Vice President @ Agoura Math Circle.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/abhiramk.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Varun Abhirama Krishna</span>(2004-08): Principal Product Manager, Oracle. 
     </p>
      <p>Varun obtained his MBA from  K J Somaiya Institute of Management.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/nischal.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Nischal Bomdika</span>(2004-08): Director of Engineering, KARL STORZ Endoscopy-America, Inc.</p>
      <p>Nishcal obtained his Masters from  Northern Illinois University, and MBA from The Wharton School.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sowmyaEIE.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Lakshmi Sowmya Dasari</span>(2004-08): Hyperion Administrator, Caliber Home Loans, Inc. 
     </p>
      
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/namudurisri.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Srikanth Namuduri </span>(2002-06): Data Science | IoT | Systems Engineering, Cummins Inc.</p>
    <p>Srikanth obtained his Master's from  New Yark University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/poluri.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Sarat Chandra Poluri </span>(2003-07): XPU Compute Architect, Intel.</p>
    <p>Sarat obtained his Master's from  University of Houston.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/greeshma.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Greeshma Myneni</span>(2003-07): Director & Co-Founder, Anukta IT Solutions.</p>
    <p>Greeshma obtained her Master's from The University of Akron.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/jonnala.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Sowmya Jonnalagadda</span>(2003-07): Engineering Manager, Noodle Analytics.</p>
    
    </div>
    
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kinnera.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Kinnera Banala</span>(2004-08): Senior Finance Manager - Central NACF FP&A, Amazon.</p>
    <p>Kinnera obtained her MBA from  SPJIMR SP Jain Institute of Management & Research.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rahulvarakala.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Rahul Varakala Reddy</span>(2004-08): Technical Manager- Hybrid Cloud, Big Data and IoT Solutions, Cloudera.</p>
    <p>Rahul obtained his Masters from  University of Missouri, and Graduate program in Business Analytics at Oklahoma State University.</p>
    </div> 
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vakkalagadda.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Rakesh Vakkalagadda</span>(2004-08): Software Engineer, Snap Inc.</p>
    <p>Rakesh obtained his Master's from  University of Florida.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kashyap.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Kashyap Ivaturi</span>(2004-08): Software Engineer, Level 6, Block Inc.</p>
    <p>Kashyap obtained his Master's from Stony Brook University.</p>
    </div>
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/supriya.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Supriya Chayanam</span>(2004-08): Event Director @ Eventina And Head, Market Intelligence @ Earlypad.</p>
    <p>Supriya obtained her MBA from IBS.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/nilesh.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Nilesh Vijaywargiay</span>(2004-08): Engineer, Netflix. 
     </p>
      <p>Nilesh obtained his Master's from  Stony Brook University.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sandeepshiva.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Sandeep Shiva</span>(2004-08): Senior Project Manager, REI Systems. 
     </p>
      <p>Sandeep obtained his Master's from   Old Dominion University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/peyyeti.png" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Kartheek Peyyeti</span>(2004-08): Manager, APAC University Talent Acquisition, Uber. 
     </p>
      <p>Kartheek obtained his MBA from Institute of Management Technology, Ghaziabad.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/devender.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Devendar Reddy Kolipaka</span>(2004-08): Senior Software Engineer, Microsoft. 
     </p>
      <p>Devendar obtained his Masters from IIIT-H.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/arvind.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Arvind Ragiphani </span>(2004-08): AEM Consultant, Navy Federal Credit Union. 
     </p>
    <p>Arvind obtained his Master's from  IIIT-B.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/bharathpalle.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Bharath Reddy Palle</span>(2004-08): Senior Software Engineer, Bloomberg LP. 
     </p>
    <p>Bharath obtained his Master's from  Carnegie Mellon University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/VENKATPAM.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Venkata Pamulaparthy</span>(2005-09): Principal Data Engineer, DELL. 
     </p>
    <p>Venkata obtained his Master's from  Wright State University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/karanam.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Deepthi Karnam</span>(2005-09): NLP Senior Scientist and Product Manager, Infosys. 
     </p>
    <p>Deepthi obtained her Master's from  IIIT-B and currenlty persuing PhD at IIIT-H</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kuppa.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Bhavani Kumar Kuppa</span>(2005-09): Principal Software Engineer, Amazon Development center rounded-circle. 
     </p>
    <p>Bhavani obtained his Master's from  IIIT-H.</p>
    </div>
    
    
    
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/chetan.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Chetan Muddasani</span>(2005-09): Design Assurance- Medical Devices, Stryker Corporation. 
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rajashravan.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Raja Sravan Sargu</span>(2005-09):  Senior Data Engineer, Data & Analytics, Cisco. 
     </p>
    <p> Sravan obtained his Master's from IIIT-B and MBA from IIM-B. 
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/raghavender.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Raghavender Ammagari</span>(2005-09):  Senior Applications Engineer, Oracle. 
     </p>
    <p> Raghavender obtained his Master's from IIIT-H. 
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/gaddam.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Pavankumar Gaddam</span>(2005-09):  Technical Architect, Adobe. 
     </p>
     
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/amrutha.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Amrutha Gadepalli</span>(2005-09):  Product Manager, Blue Cross Blue Shield of Michigan. 
     </p>
    <p> Amrutha obtained her Master's from Northern Illinois University. 
     </p>
     
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vasukanna.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Vasu Kanna</span>(2005-09):  Principal Risk Manager,  J.P. Morgan. 
     </p>
    <p> Vasu obtained his MBA- Finance, from Unitedworld School of BusinessUnitedworld School of Business  with a Gold Medal. 
     </p>
     
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vinodr.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Vinod Reddy Rondla</span>(2005-09):  Sr. Salesforce Developer, DocuSign. 
     </p>
    <p> Vinod
     obtained his Masters, from San Jose State University. 
     </p>
     
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/dheerajr.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Dheeraj Rampally</span>(2006-10): Data Infra @ Doordash | Ex-Paypal | Ex-Yahoo.
     </p>
      <p>Dheeraj obtained his Master's from  University of Illinois at Chicago.</p>
    
    </div>
    <div class="container p-3 mt-2">
    <img src="https://cvr.ac.in/alumni/images/madhavig.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Madhavi Gudavalli, M.Tech</span>(2007-09): Assistant Professor, IT Department, JNTUK.
     </p>
      <p>Dr. Madhavi obtained her PhD in CSE  from JNTUH.</p>
    
    </div>
    
    <div class="container p-3 mt-2">
    <img src="https://cvr.ac.in/alumni/images/sunithaeluri.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Suneetha Eluri, M.Tech</span>(2008-10): Assistant Professor, CSE Department, JNTUK.
     </p>
      <p>Dr. Suneetha obtained her PhD in CSE  from JNTUK.</p>
    
    </div>
    
    <div class="container p-3 mt-2">
    <img src="https://cvr.ac.in/alumni/images/rangaramesh.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Ranga Ramesh, M.Tech</span>(2007-09): Data Architect, Citi.
     </p>
      <p>Ramesh obtained his Master's in Mathematics from  Osmania University.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rallabandisesi.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Sesikanth Rallabhandi</span>(2006-10): Software Engineer, Cisco Systems. 
     </p>
    </div>
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/ravali.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Ravali Kuppachi</span>(2006-10): Application Consultant(Cloud), IBM. 
     </p>
    
    <p>Ravali obtained her Master's from  San Jose State University.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/loka.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Shivkumar Loka</span>(2006-10): Senior Product Manager, LogicMonito. 
     </p>
      <p>Shiva obtained his Master's from  San Jose State University.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kaushikpoluri.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Kaushik Poluri</span>(2006-10): Silicon Validation Engineer, Apple. 
     </p>
      <p>Kaushik obtained his Master's from  
    Southern Illinois University, Carbondale.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/nishanth.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Nishanth Paluri Mallampalli</span>(2006-10): Deputy Manager Purchase & Sub-contract, Bharat Heavy Electricals Limited. 
     </p>
      <p>Nishanth completed his Post Graduate Diploma in Energy Management, Energy Management at  University of Hyderabad.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/boddu.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Moahan Boddu</span>(2006-10): Senior Software Engineer, Red Hat. 
     </p>
      <p>Mohan obtained his Master's from  Indiana University–Purdue University Indianapolis.</p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pasunuri.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Kartik Pasunuri</span>(2005-09): IT Project Director, Oracle | Supply Chain Professional. 
     </p>
      <p>Karthik obtained his Master's from  Arizona State University - W. P. Carey School of Business.</p>
    
    </div>
    
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/Harini.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Harini Kandadai</span>(2003-07): Technical Architect, Preficient. 
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vikramarjun.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Vikram Arjun Challa</span>(2003-07): Systems Analyst Senior Advisor, Anthem, Inc.. 
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pullannagari.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Shravana Reddy Pullannagari</span>(2003-07): Senior Software Developer, BioTE Medical. 
     </p>
    
    <p>Shravan obtained his Masters from  from University of Louisiana.</p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/abbagari.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Siddhartha Abbagari</span>(2003-07): Senior Software development Engineer, Sterling. 
     </p>
    
    <p>Siddharth obtained his Masters from  from University of Dayton.</p>
      </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/rahuly.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Rahul Yelamanchili</span>(2003-07): Delivery & Program Manager, Mastercard. 
     </p>
    
    <p>Rahul obtained his Masters from  from Northern Illinois University.</p>
      </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/karthikece.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Karthik Kuchimanchi </span>(2001-05):  Director, Barclays Investment Bank. 
     </p><p> Karthik obtained his MBA from ISB and Masters  from Rensselaer Polytechnic Institute.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/srinathram.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Srinath Ramakrishna</span>(2002-06): Experimentalist, Jodo Technologies (OPC) Private Limited. 
     </p><p> Srinath worked as Consultant and founder of Itenary.com.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/gopal.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Sitaram Gopal Cherukuthota </span>(2001-05):  Senior Manager, TSB Bank. 
     </p>
      
    </div>
        <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/apoorvamadiraju.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Apurva Madiraju</span>(2004-08): Vice President, Swiss Re. 
     </p>
      <p>Apurva received Top Women in AI leadership award for the year 2021 and she is  Ada Fellow 21/22.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/aashritha.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Aashritha Poorna</span>(2004-08):  Consumer Insights Manager, Marico Limited. 
     </p>
      <p>Aashritha completed her MBA from Nirma University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sirishap.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Shirisha Paderu</span>(2006-09):  Partner Technical Advisor, Microsoft. 
     </p>
     </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/swathy.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Swathi Gattupalli</span>(2001-05):  Senior Technical Product/Program Manager, Facebook. 
     </p>
      <p>Swahti obtained her Masters in Management from IIMC.
    </p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sureshvarala.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Suresh Varala </span>(2001-05): Project Manager, Ray Business Technologies.  
     </p>
      <p>Suresh workded for Robert Bosch prior to this role.
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/raga2010.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Raga T S</span>(2006-10):  Vice President, JP Morgan Chase&Co.  
     </p>
      <p>Raga completed her Masters from University of Georgia.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/mishra.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Abhishek Mishra</span>(2002-06):  MTS, NetApp.  
     </p><p>Abhi completed his Masters from  Ohio State University.</p>
    
     </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/joshi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Jayashri Joshi</span>(2002-06):  Senior Manager, Cognizant.  
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/madhavi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Madhavi Dasika</span>(2002-06):  Principal Software Engineer, Infor.  
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/chaganti.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Divya Chaganti</span>(2003-07):  Principal Member Technical Staff, Oracle.  
     </p>
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/hemntha.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Hemantha Mangalampalli</span>(2003-07):  Project Manager, JELD-WEN, Inc.  
     </p>
    </p><p>Hemantha completed her Masters from  University of Houston.</p>
    
      </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pushpak.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Pushpak Senkurichy</span>(2001-05):  Director of Product, Grainger.  
     </p>
      <p>Pushpak completed  his MBA from Kellog School of Management and Masters from  University of Illinois.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/bhaskarm.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Bhaskar Mallapragada</span>(2002-06):  Senior Software Engineer, Microsoft.  
     </p>
      <p>Bhaskar obtained his Master’s Degree, MTech-Software Systems from BITS Pilani.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/dineshchalla.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Dinesh Challa</span>(2003-07):  Software Engineering Manager, Facebook.  
     </p>
      <p>Dinesh obtained his Master’s Degree from Kansas State University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/dakshina.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>DakshinaMurthy Bhamidi</span>(2003-07):   Engineering Manager, Castlight Health.  
     </p>
      <p>Dakshina Murthy obtained his Master’s Degree from IIIT-B.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/jandhyala.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Kaushik Jandhyala</span>(2002-06):   Product Management, Salesforce.  
     </p>
      <p>Kaushik completed his PGDM from Institute of Management Technology, Ghaziabad.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/bhavana.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Bhavana Konchada</span>(2003-07): Senior Software Engineer, Microsoft.  
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sowmyaprahala.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Sowmya Prabhala</span>(2003-07): Analyst, Apple.  
    <p>Sowmya is a compassionate person and sponsoring underprivileged children.</p>
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pavanvadapalli.jpeg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Pavan Vadapalli</span>(2003-07): Director of Engineering, upGrad. 
      </p>
    <p>Pavan obtained his MBA from ISB.  
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pavanparasar.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Pavan  Parashar</span>(2003-07): Senior Software Development Engineer, DocuSign. 
      </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/ram.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Ram Palakodety</span>(2001-05): Senior Technical Account Manager, Salesforce. 
      </p>
    <p>Ram obtained his Master's from The University of Toledo. </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/chalapathi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Chalapathi K V S</span>(2001-05): Design Engineer, Drut Technologies Inc. 
      </p>
    <p>Chalapathi completed his PG Dipoloma in VLSI at Vedant. </p>
      
    </div> 
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/nikhil.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Nikhil Patolla</span>(2001-05): Senior Director, Engineering & Operations, T-Mobile . 
      </p>
    <p>Nikhil obtained his Master's from George Mason University. </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/arunmavuri.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Arun Mavuri</span>(2001-05): Oracle Fusion Cloud Engineer, VT Solutions. 
      </p>
    <p>Arun obtained his Master's from George Mason University. </p>
      
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/avi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Avinash Anneboina</span>(2001-05): Senior Consultant | Architect | Leader MSF&W.  
     </p>
      <p>Avinash completed  his Masters from  University of Illinois.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/juturu.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Pavan Kumar Juturu</span>(2002-06):  Senior Software Engineer, Google Nest.  
     </p>
     </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/raghuveer.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Raghuveer Ramkumar</span>(2006-10): Senior Strategic Advisor, Arup Group.
     </p>
      <p>Raghuveer completed his MBA from Lancaster University, UK.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/akshay.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Akshay Chada</span>(2006-10): Product Lead, Cvent.
     </p>
      <p>Akshay completed his Master's  from San Jose State University.</p>
    </div>
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pavanvukku.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Pavan Kumar Vukkisila</span>(2006-10): Database Engineer, PayPal.
     </p>
      
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/karthiksrini.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Karthik Srinivas</span>(2006-10): Microsoft.
     </p>
      <p>Karthik completed  his Masters from  University of Texas at Dallas.</p>
    </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/abhinav.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Abhinav Atthota</span>(2014-18): Founder, Leapsquare Labs.</p>
     <p>
    Manufacturing Tech | Industry 4.0 | Quality 4.0 | Digital Transformation.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/praveenk.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Praveen N K </span>(2001-05): Co-Founder, UNMITI. 
     </p>
      <p>Information Technology & Services.
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/yasaswi.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Venkata Yasaswi Kala</span>(2004-08): CFO, Fragma, Senior Financial Advisor, Acuma.</p>
    <p> Yasaswi completed his CFA (US), AIMR- Investment Advisory,Portfolio Management, Equity Valuation, Derivatives & Alternate Investments.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/ashishchadha.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Ashish Chadha</span>(2004-08): Co-Founder, Fligital.</p>
    <p>Ashish obtained his MBA in finance from  National Institute of Industrial Engineering.</p>
    </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/arjunc.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Arjun Chilumala</span>(2005-09): Co-founder, Data Engineering, Compile Inc. 
     </p>
      <p> Arjun obtained his Masters from IIIT-B. 
    </p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/vidooth.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span> Vidoot Ponnala Rathnakar</span>(2001-05): Director,  Incubate Soft Tech. 
     </p>
      <p>Vidoot obtained his  Masters degree from University of Wisconsin-Madison and worked for Intel. 
    </p>
    </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/pradyumna.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
    
      <p><span> Krishna Pradyumna Mokshagundam </span>(2012-16): CTO & Co-Founder, CultNerds IT Solutions. 
     </p>
      <p>Pradyumna served COMMVAULT for two years.</p>
    </div>
    
      <div class="container p-3 mt-2">  <img src="https://cvr.ac.in/alumni/images/sukumar.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Sukumar Ranga</span>(2004-08): Managing Partner, Awicon Technologies.  
     </p>
      <p>Sukumar did his Masters from NYIT.</p>
    </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/zopboard.png" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span> Dilip Koshika  </span>(2001-05): Founder, Zopboard.com,  New Indian E-Commerce Website. 
     </p>
      
    </div>
    
      <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/VARUN.png" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Varun K Reddy B </span>(2004-08): CEO and Co-Founder, Fragma Datasystems.  
     </p>
      <p>Varun did his ME from IISc and worked as Analyst in Goldman Sachs.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/bharathnandam.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Bharath Nandam </span>(2006-10): Chief Executive Officer & Co-Founder, Think Plus Creatives.  
     </p>
      <p>Bharath did his Masters in Business Law at National Law School of India University.</p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/arghyabasunew.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>  Arghya Basu </span>(2004-08):  Co-Founder, Core Diagnostics. 
     </p>
      <p>Arghya holds a Post Graduate Diploma in Management from T.A. Pai Management Institute and worked for Google and Sify.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/roll.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>  Rahul K Velpula</span>(2006-10): Indian rapper, songwriter and actor.
     </p>
      <p>Rahul Kumar Velpula is known professionally as Roll Rida in Telugu films and music.
    </p>
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/sankalp.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span> Sankalp Reddy</span>(2002-06):  Indian film director, and screenwriter.  
     </p>
      <p>Sankalp made his directorial debut with the war film Ghazi (2017) which won the National Film Award for Best Feature Film in Telugu. </p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/kunal.jfif" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>Kunal Kaushik</span>(2002-06):  Actor @ Indian Film Industry & Story and Screenwriting from New York Film Academy.  
     </p>
      <p>Kuanl played crucial role in The Ghazi Attack, and acted in many other feature films as hero and a character artist.</p>
    <p><span>https://www.thekunalkaushik.com </span></p>
    
    </div>
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/anuragreddy.jpg" alt="Avatar" style="width:60px" class="center rounded-circle">
    
      <p><span>Anurag Reddy</span>(2005-09): Co-Founder/Producer at Chai Bisket Films, Co-Founder/Producer at A+S Movies and Co-Founder/Producer at Rowdy Club. 
     </p>
    <p>Anurag obtained his MBA  from  Narsee Monjee Institute of Management Studies.</p>
    </div>
    
    <div class="container p-3 mt-2">
      <img src="https://cvr.ac.in/alumni/images/prashanth-varma.png" alt="Avatar" style="width:60px" class="center rounded-circle">
      <p><span>  Prasanth Varma</span>(2006-10): Indian film director and Screenwriter.
     </p>
      <p>Prasanth is best known for directing Awe (2018) and Zombie Reddy (2021).
    </p>
    
    </div>
  </div>
		</div>
	
</section>

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