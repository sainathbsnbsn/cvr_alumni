<?php

session_start();
$db=mysqli_connect("localhost","root","","alumini");
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
    tr{
        transition: .2s ease;
    }
   tr:hover{
       border-left: 5px solid black;
   }

   .section {
    padding: 10px 0;
}
   .row{
    top: 70px;
    position: sticky;
    background-color: white;
    margin-right: -15px;
    margin-left: -15px;
}

   .item {
    z-index: 1000;
    font-family:sans-serif;
    float: left;
    width: 16.5%;
    padding: 20px;
    border-radius: 0;
    cursor: pointer;
    background-color: rgb(0,0,0,0.05);
}
   .item:hover{
    background-color:white;
   
   }
   #t1{
       transition: .3s linear;
       
   }

  
    .hide{
      display: none;
    }
    .mainDiv{
        transition: .3s ease-out;
        opacity: 0;
    }
    .display{
         opacity:1;
    }
  

    .overall{
  
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap:10px;
}
  .responsive{
    box-shadow: 0 5px 15px rgba(0,0,0,.2);
    padding: 5px;

  }
  
  .responsive:hover{
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
   transition: .4s ease;
  }

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  font-family: sans-serif;
  font-weight: normal;
    padding: 25px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.table>tbody>tr:nth-child(odd){
  background-color: rgba(0,0,0,0.05);
}
.table>tbody>tr>th{
  font-weight: bold;
background-color: black;
color: white;
}
  @media screen and (max-width:800px){
  .overall{
  
  grid-template-columns: auto auto;
 
}
}

@media screen and (max-width:600px){
  .overall{
  
  grid-template-columns: auto ;
 
}
}


th{
  padding:5px;
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
   ?>
						</li>
      </ul>
    </nav>
    <!-- /main nav -->
      </div>
  </header>
    <!--
		Start About Section
		==================================== -->
		<section class="bg-one about section">
			<div class="container">
			<div class="container mt-5">
        
        <div class=" d-flex row text-center">
            <div class="col-4 col-lg-2  p-3 item" id="x" alt="t1,h1" onclick="f(this)" >BOS & IQAC</div>
            <div class="col-4 col-lg-2  p-3 item" alt="t2,h2" onclick="f(this)">MoUs</div>
            <div class="col-4 col-lg-2  p-3 item" alt="t3,h3" onclick="f(this)">Tech Talks</div>
            <div class="col-4 col-lg-2  p-3 item" alt="t4,h4" onclick="f(this)">Exhibits</div>
            <div class="col-4 col-lg-2  p-3 item" alt="t5,h5" onclick="f(this)">FDP's</div>
            <div class="col-4 col-lg-2  p-3 item" alt="t6,h6" onclick="f(this)">Campus Drives</div>
             </div> 



<div class="mainDiv" id="mainDiv">

                <div class="p-5 bg-white ">

                    <h1 class="display-6" id="view1">
                        </h1>
                </div>
         <div class="table-responsive view" id="view">

         </div>

</div>






















<div class="t4 hide" >

        <div class="p-5 bg-white ">
                <h1 class="display-6" id="h4">
                    Product Exhibits by Alumni</h1>
               
        </div>

    <div class="table-responsive" id="t4">
    <table class="table table-striped " >
        <tr class="bg-dark text-white">
          <th class="p-4" >Alumni Name
      </th>
          <th class="p-4">Date
      </th>
          <th class="p-4">Title
      </th>
        </tr>
      <tr >
          <td class="p-4"  >Varun Abhiramakrishna, Manager, Oracle
      </td>
          <td class="p-4">25-26 June 2021
      </td>
          <td class="p-4">Moderator for Exhibits 
      </td>
        </tr>
        <tr>
          <td class="p-4">Shiva G, TomTom, Nedherlands
      </td>
          <td class="p-4">25 June 2021 
      </td>
          <td class="p-4">Autonomous Vehicles, TomTom Navigation Maps
      </td>
        </tr>
        <tr>
          <td class="p-4">Siva Sadhu, AWS, Netherlands
      </td>
          <td class="p-4"> 26 June 2021 
      </td>
          <td class="p-4">Artificial Web Intelligence 
      </td>
        </tr>
      <tr>
          <td class="p-4">Rohith Ageer, BOSCH, Netherlands
      </td>
          <td class="p-4">26 June 2021
      </td>
          <td class="p-4">Machine Vision and Industry 4.0
      </td>
        </tr>
      
      <tr>
          <td class="p-4">Ananth Rachakonda, Bionics
      </td>
          <td class="p-4">26 June 2021
      </td>
          <td class="p-4">KALArm
      </td>
        </tr>
      <tr>
          <td class="p-4"> Dr Sriram Somanchi, University of Notre Dame 
      </td>
          <td class="p-4">26 June 2021 
      </td>
          <td class="p-4">Data Driven AI VS Model Driven AI
      </td>
        </tr> 
      </table>
        </div>
    </div>







    <div class="t1 hide">

        <div class="p-5 bg-white ">
                <h1 class="display-6" id="h1">Alumni in BoS and IQAC</h1>
               
        </div>

        <div class="table-responsive" id="t1">
      <table class="table table-striped">
        <tr class="bg-dark text-white">
          <th class="p-4">S.No.
      </th>
          <th class="p-4">Alumni Name 
      </th>
          <th class="p-4">Body
      </th>
        </tr>
        <tr>
          <td class="p-4">1  
       
      </td>
          <td class="p-4">Aditya Swaroop Joshi, Regional Manager, ICICI 
      
      </td>
          <td class="p-4">IQAC
      </td>
        </tr>
        <tr>
          <td class="p-4">2
      </td>
          <td class="p-4">KVS Chalapathi, Xilinx
      
      </td>
          <td class="p-4">IQAC
      
      </td>
        </tr>
      <tr>
          <td class="p-4">3
      </td>
          <td class="p-4">Kartik Kulkarni
      
      </td>
          <td class="p-4">BoS, ECE
      
      </td>
        </tr>
      <tr>
          <td class="p-4">4
      </td>
          <td class="p-4">Ch. Jayashankar 
      
      </td>
          <td class="p-4">BoS, ECE
      </td>
        </tr>
      <tr>
          <td class="p-4">5
      </td>
          <td class="p-4">Ramya Poojari
      
      </td>
          <td class="p-4">BoS, ME
      </td>
        </tr>
      <tr>
          <td class="p-4">6
      </td>
      <td class="p-4">D Karthik Reddy, Director, Upakriya PVT LTD
      </td>
      <td class="p-4">BoS, IT
      </td>
      </tr>
      <tr>
      <td class="p-4">7
      </td>
      <td class="p-4">B Dakshina Murty, Manager, Pramati Technologies
      </td>
      <td class="p-4">BoS, IT
      </td>
      </tr>
      <tr>
      <td class="p-4">8
      </td>
      <td class="p-4">Mahesh T, Sr Engineer, BHEL
      </td>
      <td class="p-4">BoS, EEE
      </td>
      </tr>
        <tr>
      <td class="p-4">9
      </td>
      <td class="p-4">Nishanth P, Deputy Manager, BHEL
      </td>
      <td class="p-4">BoS, EEE
      </td>
      </tr>
        <tr>
      <td class="p-4">10
      </td>
      <td class="p-4">Shruthi Pappala
      </td>
      <td class="p-4">BoS, EIE
      </td>
      </tr>
        <tr>
      <td class="p-4">11
      </td>
      <td class="p-4">Yeleswarapu Sriya 
      </td>
      <td class="p-4">BoS, EIE
      </td>
      </tr>
        <tr>
      <td class="p-4">12
      </td>
      <td class="p-4">P Sai Prasad
      </td>
      <td class="p-4">BoS, CE
      </td>
      </tr>
        <tr>
      <td class="p-4">13
      </td>
      <td class="p-4">Varun Abhiramakrishna, Manager, Oracle
      </td>
      <td class="p-4">BoS, CSE
      </td>
      </tr>
        <tr>
      <td class="p-4">14
      </td>
      <td class="p-4">Harsh H Shah, Manager, Deloitte
      </td>
      <td class="p-4">BoS, CSE
      </td>
      </tr>
        <tr>
      <td class="p-4">15
      </td>
      <td class="p-4">B Varun Reddy, CEO, Co-Founder, Fragma Data Systems
      </td>
      <td class="p-4">BoS, CSE
      </td>
      </tr>
        <tr>
      <td class="p-4">16
      </td>
      <td class="p-4">V Krishna Teja, Product Manager, Amazon
      
      </td>
      <td class="p-4">BoS, CSIT
      </td>
        
        </tr>
      
      </table>
    </div>
      </div>
    
  


      <div class="t3 hide">

        <div class="p-5 bg-white ">
                <h1 class="display-6" id="h3">Tech Talks</h1>
               
        </div>
  
        <div class="table-responsive" id="t3">
      <table class="table table-striped">
        <tr class="bg-dark text-white">
          <th class="p-4">Alumni Name
      </th>
          <th class="p-4">Date 
      </th>
          <th class="p-4">Topic
      
      </th>
        </tr>
        <tr>
          <td class="p-4">Hitesh D 
      </td>
          <td class="p-4">20 Jan 2020
      
      </td>
          <td class="p-4">Simulink and Usecase Implementation
      </td>
        </tr>
        <tr>
          <td class="p-4">Bala Chander Reddy and Sudheer Reddy
      
      </td>
          <td class="p-4">04 Jan 2020
      
      
      </td>
          <td class="p-4">Embedded System Design Principles
      
      </td>
        </tr>
      <tr>
          <td class="p-4">B Rajesh 
      
      </td>
          <td class="p-4">19 Jan 2020
      
      
      </td>
          <td class="p-4">Serverside Scripting Technologies
      
      
      </td>
        </tr>
      <tr>
          <td class="p-4">K Rama Krishna Reddy
      
      </td>
          <td class="p-4">21 Dec 2019
      </td>
          <td class="p-4">Challenges in Bioengineering
      </td>
        </tr>
      <tr>
          <td class="p-4">SCVSLS Ravi Kiran
      
      </td>
          <td class="p-4">05 Jan 2019
      
      
      </td>
          <td class="p-4">Mobile Application 
      
      </td>
        </tr>
      <tr>
          <td class="p-4">Raghuveer Ramkumar 
      
      
      </td>
      <td class="p-4">21 Dec 2018
      </td>
      <td class="p-4">Prospects of MBA for Engineers
      </td>
      </tr>
      <tr>
      <td class="p-4">Daniel Vivek
      
      </td>
      <td class="p-4">21 Aug 2017
      </td>
      <td class="p-4">iOS Application Development
      </td>
      </tr>
      <tr>
      <td class="p-4">Priteesh Padmakar
      
      </td>
      <td class="p-4">17 Jul 2017
      
      </td>
      <td class="p-4">Web Application Development using Django framework
      </td>
      </tr>
        <tr>
      <td class="p-4">Nikhil Vedurumudi
      
      </td>
      <td class="p-4">23 Mar 2017
      
      </td>
      <td class="p-4">AJAX
      </td>
      </tr>
        <tr>
      <td class="p-4">B S Sangeetha
      
      </td>
      <td class="p-4">28 Jan 2017
      
      </td>
      <td class="p-4">Virtual Machines and Security Challenges
      </td>
      </tr>
        <tr>
      <td class="p-4">P Bharath Reddy
      
      </td>
      <td class="p-4">20 Jan  2017
      </td>
      <td class="p-4">Business Process Modeling
      </td>
      </tr>
        <tr>
      <td class="p-4">Aditya Joshi
      
      </td>
      <td class="p-4">19 Feb 2016
      </td>
      <td class="p-4">LTE</td>
        
        </tr>
        <tr>
      <td class="p-4">B Varun Reddy
      
      </td>
      <td class="p-4">24 Aug 2016
      
      </td>
      <td class="p-4">Classification Tools in Data Science 
      </td>
      </tr>
        <tr>
      <td class="p-4">G Yashwanth Reddy, Sai Meghana S & Tirupathi
      
      </td>
      <td class="p-4">22 Aug 2016
      
      </td>
      <td class="p-4">Conducted C Coding Challenge
      </td>
      </tr>
        <tr>
      <td class="p-4">Chavali Sai Kiran
      
      </td>
      <td class="p-4">12 Sept 2015
      
      </td>
      <td class="p-4">Android Application Frameworks
      </td>
      </tr>
        <tr>
      <td class="p-4">Dasika Hitesh 
      </td>
      <td class="p-4">01 Aug 2015
      </td>
      <td class="p-4">RESTFul API and Web Services
      </td>
      </tr>
      <tr>
      <td class="p-4">Harsh H Shah 
      </td>
      <td class="p-4">07 Jul 2015
      </td>
      <td class="p-4">IoT
      </td>
      </tr>  
      </table>

            
<center>
    <div class="overall container mt-3 mb-3">
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_5terre.jpg">
       <img src="https://cvr.ac.in/alumni/images/vrtalk.png" alt="Cinque Terre" width="300" height="200">
     </a>
     <div class="desc">B Varun Reddy</div>
   </div>
 </div>
 
 
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_forest.jpg">
       <img src="https://cvr.ac.in/alumni/images/dvtalk.png" alt="Forest" width="300" height="200">
     </a>
     <div class="desc">Daniel Vivek</div>
   </div>
 </div>
 
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_lights.jpg">
       <img src="https://cvr.ac.in/alumni/images/SLVtalk.png" alt="Northern Lights" width="300" height="200">
     </a>
     <div class="desc">SCVSLS Ravi Kiran</div>
   </div>
 </div>
 
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/yash.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">G Yashwanth Reddy</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/meghana.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc"> S Sai Meghana and  Tirupathi</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/raghu.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Raghuveer Ramkumar</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/harsh.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Harsh H Shah</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/dasika.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Hitesh Kumar Dashika</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="chavali.png">
       <img src="https://cvr.ac.in/alumni/images/chavali.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Chavali Sai Kiran</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="pritish.png">
       <img src="https://cvr.ac.in/alumni/images/pritish.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Pritish Padmakar</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountag">
       <img src="https://cvr.ac.in/alumni/images/sang.png" alt="Mounpntains" width="300" height="200">
     </a>
     <div class="desc">B Sangeetha</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/dashika2.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Hitesh Kumar D </div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/rajesh.png" alt="Moueins" width="300" height="200">
     </a>
     <div class="desc">Rajesh Kumar B</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/ecemeet.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">ECE Alumni Interactions with juniors</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/bharatp.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">P Bharath Reddy</div>
   </div>
 </div>
 <div class="responsive">
   <div class="gallery">
     <a target="_blank" href="img_mountains.jpg">
       <img src="https://cvr.ac.in/alumni/images/varunab.png" alt="Mountains" width="300" height="200">
     </a>
     <div class="desc">Varun Abhiramakrishna in BoS meet</div>
   </div>
 </div>
  
 </div>
 
 
 </div>
 </center>
    </div>
  </div>
   






  <div class="t5 hide">

    <div class="p-5 bg-white ">
            <h1 class="display-6" id="h5">FDPs and Workshops Conducted by Alumni</h1>
           
    </div>

    <div class="table-responsive" id="t5">
  <table class="table table-striped">
    <tr class="bg-dark text-white">
      <th class="p-4">Alumni Name
      </th>
          <th class="p-4">Date
      </th>
          <th class="p-4">Title
      </th>
        </tr>
        <tr>
          <td class="p-4">Nikhil Vedurimudi, Microsoft,  
      Harshit Kumar Walmart, and     
      Chirag Anand CaumVault 
      </td>
          <td class="p-4">25-30 Jan 2021
      </td>
          <td class="p-4">Web Engineering
      </td>
        </tr>
        <tr>
          <td class="p-4">Manish (MuSigma)
      </td>
          <td class="p-4">21 - 26 Sep 2020, Online
      </td>
          <td class="p-4">Journey of Statistics to Data Sciences
      </td>
        </tr>
      <tr>
          <td class="p-4">Harshit Kumar, Walmart and
      Karthik Rachamalli, PlaySafe
      </td>
          <td class="p-4">27 - 31 Aug 2019
      </td>
          <td class="p-4">Frontend Engineering
      </td>
        </tr>
      <tr>
          <td class="p-4">Suhail Afroz, CVRCE 
      </td>
          <td class="p-4">25 June – 20 July 2019 
      </td>
          <td class="p-4">Mobile Application Development using Android
      </td>
        </tr>
      <tr>
          <td class="p-4">Daniel Vivek, Mutual Mobile
      </td>
          <td class="p-4">16 Feb 2019
      </td>
          <td class="p-4">iOS Swift Programming
      </td>
        </tr>
      <tr>
          <td class="p-4">Daniel Vivek and 
      Phanindra
      </td>
          <td class="p-4">19 – 21 Jan 2018
       </td>
          <td class="p-4">Mobile Application Development
      using iOS
      </td>
        </tr>
      <tr>
          <td class="p-4">Mr. G Sandeep and, 
      Ravi Teja T,  Capgemini
      </td>
          <td class="p-4">15 - 16 Mar 2018
      
       </td>
          <td class="p-4">IoT Home Automation
      
      </td>
        </tr>
      <tr>
          <td class="p-4">R Sri Venkateswarlu, CTS
      
      </td>
          <td class="p-4">17 - 18 Feb 2017
      
       </td>
          <td class="p-4">R Programming
      </td>
        </tr>
      <tr>
          <td class="p-4">K Ramakrishna Reddy, CISCO 
      
      
      </td>
          <td class="p-4">18 Jan - 7 Feb 2012
      
      
      </td>
          <td class="p-4">Android Application Development
      
      </td>
        </tr>
      
      </table>
</div>
</div>




<div class="t2 hide">

    <div class="p-5 bg-white ">
            <h1 class="display-6" id="h2">MoU with Fragma Data Systems</h1>
           
    </div>  



    <div class="container d-flex justify-content-center align-content-center" id="t2">
         <center>
 <div class="card" style="width:20rem;">
     <img src="https://cvr.ac.in/alumni/images/mdx.png" class="card-img-top" alt="...">
     <div class="card-body">
         <h5 class="card-title">Fragma Data Systems</h5>
         <p >CVR College of Engineering had signed MoU with Fragma Datasystems, Bangalore, on 26 June 2021 in the presence of Prof. Nayanathara K Sattiraju, Principal, CVRCE and Mr. Varun Reddy, Co-Founder and CEO, Fragma Datasystems, and Alumnus, CSE.
           
            </div>
 </div>

        </div>
    </center>
    </div>




    <div class="t4 hide" >

        <div class="p-5 bg-white ">
                <h1 class="display-6" id="h6">
                    Campus Drive</h1>
               
        </div>

    <div class="table-responsive" id="t6">

        <img src="https://cvr.ac.in/home4/images/slideshow/placements2019.png" alt="placement" class="img-fluid">
      </div>
</div>






</div>


			</div>   	<!-- End container -->
		</section>   <!-- End section -->


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
		<script> 
    var view =document.getElementById("view");
    var view1 =document.getElementById("view1");
    var mainDiv=document.getElementById("mainDiv");
    function f(e){
        if(mainDiv.classList.contains('display'))
             mainDiv.classList.remove('display');

        setTimeout(function(){
        var y= e.getAttributeNode("alt").value;
        var t =y.split(",");
        var z =document.getElementById(t[0]);
        var z1 =document.getElementById(t[1]);
        view.innerHTML=z.innerHTML;
        view1.innerHTML=z1.innerHTML;
        mainDiv.classList.add('display');
        },250);
      



        
        
    }


function code(){
    var x =document.getElementById("x");
    f(x);
}
window.onload=code();

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