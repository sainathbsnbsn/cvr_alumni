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

 <link

  rel="stylesheet"

  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"

  integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="

  crossorigin="anonymous"

 />

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

.news-feed{

 transition:.3s linear;

 padding:3px;

}

.news-feed p:hover{

color:#6ee0e4;

}

.news-feed a{

     color:black;

     text-decoration: none;

     text-align: left;

   }

 .news-feed span[style]{

    color:black !important;

    text-align: left;

   }

   .news-feed p::before {

  font-family: "Font Awesome 5 Free";

  content: "\f1ea";

   font-size: 2em;

   margin-top: 1em;

  margin-right: 0.5em;

 }

 /* preloader loading news */

 .loader {

 border: 8px solid #f3f3f3;

 border-radius: 50%;

 border-top: 8px solid #282A35;

 width: 100px;

 height: 100px;

 -webkit-animation: spin 2s linear infinite;

 animation: spin 2s linear infinite;

}

@-webkit-keyframes spin {

 0% { -webkit-transform: rotate(0deg); }

 100% { -webkit-transform: rotate(360deg); }

}

@keyframes spin {

 0% { transform: rotate(0deg); }

 100% { transform: rotate(360deg); }

}

 </style>

</head>

<body>

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

 <div class="row">

  <!-- section title -->

  <div class="title text-center wow fadeIn" data-wow-duration="1500ms" >

  <h2>News <span class="color">Page</span> </h2>

  <div class="border"></div>

  </div>

  <!-- /section title -->

  <!-- About item -->

<div class="news-feed" id="nf">

  <center> <div class="loader"></div> </center>

</div>

  <!-- End About item -->

 </div> <!-- End row -->

 </div> <!-- End container -->

 </section> <!-- End section -->

<footer id="footer" class="bg-one">

 <div class="container">

 <div class="row wow fadeInUp" data-wow-duration="500ms">

 <div class="col-lg-12">

 <!-- Footer Social Links -->

 <div class="social-icon">

  <ul class="list-inline">

  <li><a href="#"><i class="tf-ion-social-facebook"></i></a></li>

  <li><a href="#"><i class="tf-ion-social-twitter"></i></a></li>

  <li><a href="#"><i class="tf-ion-social-youtube"></i></a></li>

  <li><a href="#"><i class="tf-ion-social-linkedin-outline"></i></a></li>

  <li><a href="#"><i class="tf-ion-social-pinterest-outline"></i></a></li>

  </ul>

 </div>

 <!--/. End Footer Social Links -->

 <!-- copyright -->

 <div class="copyright text-center">

  <a href="index.html">

  <!-- <img src="images/logo-meghna.png" alt="Meghna" /> -->

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

 <script>

fetch('https://api.codetabs.com/v1/proxy?quest=https://cvr.ac.in/home4/index.php').then((response) => response.text()).then((text) => {

var y=text;

var s=y.lastIndexOf("module-content");

var z=y.substr(s);

var s=z.indexOf("</style>");

var z=z.substr(s);

var r=z.lastIndexOf("item-separator");

var res=z.substring(s+8,r);

res=res.replace("</p>","");

res=res.substr(1,);

res = res.replaceAll("/home4/", "https://cvr.ac.in/home4/");

res = res.replaceAll("<center>", "<p>");

res = res.replaceAll("</center>", "</p>");

res = res.replaceAll("text-align: center", "");

  // console.log(res);

  setTimeout(function(){

   var q="";

   var u=res.split("</p>");

   for(var i=0;i<u.length;i++){

     if(u[i].indexOf("img")>=0 || u[i].indexOf("marquee")>=0 ){

        var t=0;

     }

     else{

      q=q+u[i]+"</p>";

     }

   }

   q=q.replaceAll("<p>&nbsp;</p>", "");

   console.log(q);

   document.getElementById("nf").innerHTML=q;

  },1);

} ).catch(err=>{

  console.log("error");

});

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

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>

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
