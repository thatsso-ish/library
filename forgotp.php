<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "C:/xampp2/htdocs/RentaNathi/vendor/autoload.php";
 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reset']))
{
	$email=$_REQUEST['email'];
	
	if(!empty($email))
	{
		$sql = "SELECT * FROM tittledeed where email='$email' ";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0){
			$row=mysqli_fetch_array($result);
			if($row){
				
					$name=$row['landlord'];
					
					$mail = new  PHPMailer();

					try {							

						$mail->isSMTP();											

						$mail->Host	 = 'smtp.gmail.com;';					

						$mail->SMTPAuth = true;							

						$mail->Username = 'onke@softstartbti.co.za';				

						$mail->Password = '29041999@Sihle';						

						$mail->SMTPSecure = 'tls';							

						$mail->Port	 = 587;



						$mail->setFrom('onke@softstartbti.co.za', 'RentaNatathi Properties');		

						$mail->addAddress($email, $name);


						$mail->isHTML(true);								

						$mail->Subject = 'RentaNathi | Reset Password';

						$mail->Body = '<html>

								   <head>

									 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

									 <title></title>

								   </head>

								   <body>

									  <div id="email-wrap" style="color:black">

									  <p>Dear '.$name.' </p>

									 

									  <p>I hope you doing well today.</p>	

									  <p>Kindly follow the link provided below to reset your password</p>										
									  <p><strong>http://localhost/rentanathi/resetp.php?email='.$email.'</strong></p>	
									  

									   <br>

							
									  <p> Kind Regards,</p>
									  <p> RentaNatathi Properties</p>

									  

									  </div>

								</body>';

								
								

						$mail->AltBody = '';

						if($mail->send()){
                            echo "<script>window.alert('Check your email for a reset link')</script>";
							echo "<script>window.location.href='login.php' </script>";
						}
									

					} catch (Exception $e) {

						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

					}
					
			   }
		   }else {
			$error = "<p class='alert alert-warning'>Email you entered does not exists in our database!</p> ";
		   }  
		   
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>RentaNathi | Reset Password</title>
</head>
<body>




<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
    
		 
		 
		 
        <div class="page-wrappers login-body full-row bg-gray">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Reset Password</h1>
								<p class="account-subtitle"></p>
								<?php echo $error; ?><?php echo $msg; ?>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Enter your Email*" required>
									</div>
									
									
										<button class="btn btn-success" name="reset" value="Login" type="submit">Reset Password</button>
									
								</form>
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								
								<div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<!--	login  -->
        
        
        <!--	Footer   start--><!-- FOR MORE PROJECTS visit: codeastro.com -->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>