<?php 
session_start();

 function startsWith($string, $startString)
{
  $len = strlen($startString);
  return (substr($string, 0, $len) === $startString);
}

$db=mysqli_connect("localhost","root","","alumini");
  
if(isset($_SESSION['access_token']))
  {

// is admin 
  $se="SELECT * FROM admin WHERE email='{$_SESSION['user_email_address']}'";
  $re=mysqli_query($db,$se);
  $num=mysqli_num_rows($re);
// end of is admin

$image=$_POST['image'];
$id=$_POST['id'];

$event_name="SELECT * FROM add_events WHERE id='$id' ";
$event=mysqli_query($db,$event_name);
while($r=mysqli_fetch_array($event)){
$event_name=$r['title'];
} 
  if(isset($_POST['submit_form'])){
      $name=$_POST['name'];
      $roll_no=$_POST['roll_no'];
      $roll_no=strtolower($roll_no);
      $branch=$_POST['branch'];
      $email=$_SESSION['user_email_address'];
      $event_name=$_POST['event_name'];
      $sql="SELECT * FROM $event_name WHERE roll_no='$roll_no'";
      $sql=mysqli_query($db,$sql);
  $n=mysqli_num_rows($sql);
    if($n==0 && startsWith($_SESSION['user_email_address'],$roll_no))
    {
      $sql = "INSERT INTO $event_name (name,email,roll_no,branch)  VALUES('$name','$email','$roll_no','$branch')";
      if(mysqli_query($db,$sql)){
       $to='sainathbsn1729@gmail.com';
        $subject="CVR_Alumni";
        $message="Thank you for registering for the event ";
       
        $from="From:Alumni Admin";

        if(mail($to, $subject, $message,$from)){
        echo"Successfull";
        }
        else{
          echo "failed to send";
        }
        header('location:blog.php');
                                }
      else{
       echo'<script>alert("Error in registration")</script>';
        header('location:blog.php');
         }
                                                                    
    }
    else{
      echo'<script>alert("Register with your Roll number only");
    open("blog.php","_self");
    </script>';
        }
}

  }
  
else{
  echo'<script>alert("Please login into the alumni website to register the events")</script>';
  header('location:login.php');
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Admin Panel</title>

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
   ?>
            </li>
      </ul>
    </nav>
    <!-- /main nav -->
      </div>
  </header>
    <div class="container">
    <!-- /main nav -->

    <div class="row">
      <form action="student_event_register.php" method="post" enctype="multipart/form-data">
      <!-- section title -->
      <div class="title text-center wow fadeIn" data-wow-duration="500ms">
        
        <h2>Register For <span class="color"><?php echo $event_name; ?></span></h2>
        <div class="border"></div>
      </div>
      <!-- /section title -->
      
      <!-- Contact Details -->
    
      <div class="contact-info col-md-6 wow fadeInUp " data-wow-duration="500ms" style="height:300px;overflow:hidden;">
        <label for="file1">
        <img src="image/<?php echo $image; ?>" width="100%" height="auto" id="output1" style="object-fit: contain;" class="file1">
      </label>
      </div><br>
      <!-- / End Contact Details -->
        
      <!-- Contact Form -->
      <div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
        
        
          <div class="form-group">
            <input type="text" placeholder="Name" class="form-control" name="name" id="title" >
          </div>
          
          <div class="form-group">
            <input type="text" placeholder="Branch" class="form-control" name="branch" id="date">
          </div>

          <div class="form-group">
            <input type="text" placeholder="Roll Number" class="form-control" name="roll_no" id="roll_no">
          </div>

          <input type="hidden" name="event_name" value="<?php echo $event_name;  ?>" style="display: none;">
          <input type="hidden" name="id" value="<?php echo $id;  ?>" style="display: none;">
          <input type="hidden" name="image" value="<?php echo $image;  ?>" style="display: none;">
          
          <div id="cf-submit">
          <input type="submit" name="submit_form" id="alumini_submit" class="btn btn-transparent" value="Submit" style="background-color: #57cbcc;">
          </div>            
          
      </div>
    </form>
    </div><br><br><br>
      <!-- ./End Contact Form -->
    </div> <!-- end row -->
    <!-- Main jQuery -->
    <script type="text/javascript">
      const btn=document.getElementById('submit');
      btn.addEventListener('click', function handleClick(event) {
        // 👇️ if you are submitting a form (prevents page reload)
        
      
              const file = document.getElementById('file');
              const title = document.getElementById('title');
              const message = document.getElementById('message');
              const date  = document.getElementById('date');
      
              // Send value to server
              console.log(firstNameInput.value);
        
              // 👇️ clear input field
              file.value ="";
              title.value ="";
              message.value ="";
              date.value ="";
        });

      
    var loadFilee = function(event) {
    var output1 = document.getElementById('output1');
    
    output1.src = URL.createObjectURL(event.target.files[0]);
   
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