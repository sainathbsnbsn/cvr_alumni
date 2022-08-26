<?php 
session_start();
include('student_event_register.php');
$to=$_SESSION['user_email_address'];
$subject="CVR Alumni";
$message="Thank you for registering for the event ";
$message.=$event_name;
$from="From:Alumni Admin";

if(mail($to, $subject, $message,$from)){
	echo"Successfull";
}
else{
	echo "failed to send";
}

?>
