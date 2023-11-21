<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "C:/xampp/htdocs/RentaNathi/vendor/autoload.php";

session_start();
include("config.php");
include_once 'uniques.php';

if(isset($_REQUEST['pid']) && isset($_REQUEST['day']) && isset($_REQUEST['time']))
{
	
	$propertyID=$_REQUEST['pid'];
	$userID=$_SESSION['uid'];
	$day=$_REQUEST['day'];
	$time=$_REQUEST['time'];
	$ref  = 'REF'.get_rand_numbers(5).'';
	
 
	    $query=mysqli_query($con,"SELECT * FROM `user` WHERE uid=$userID");
		while($row=mysqli_fetch_array($query))
		 {
			$tname = $row['uname'];	
			$temail = $row['uemail'];	
		 }
		  $query1=mysqli_query($con,"SELECT * FROM `property` WHERE pid=$propertyID");
		  while($row1=mysqli_fetch_array($query1))
		   {
				$tittledeedID = $row1['tittledeedID'];	
			    
		    }
		  $query12=mysqli_query($con,"SELECT * FROM `tittledeed` WHERE titledeed='$tittledeedID'");
		  while($row12=mysqli_fetch_array($query12))
		   {
				$lname = $row12['landlord'];
                $lemail = $row12['email'];				
			    
		    }
			
		  $check_reservation = mysqli_query($con,"SELECT * FROM `reservation` WHERE userID='$userID' AND propertyID = $propertyID");
		  $num = mysqli_num_rows($check_reservation);
		  if($num > 0){
			  echo "<script>window.alert('You already reserved this property')</script>";
			  echo "<script>window.location.href='index.php' </script>";
			  
		  } else{
			
			$sql="INSERT INTO reservation (resID,propertyID,userID,day, time) VALUES ('$ref','$propertyID','$userID','$day', '$time')";
			$result=mysqli_query($con, $sql);
			
			   if($result){
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

						$mail->addAddress($temail, $tname);


						$mail->isHTML(true);								

						$mail->Subject = 'RentaNathi | Reservation';

						$mail->Body = '<html>

								   <head>

									 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

									 <title></title>

								   </head>

								   <body>

									  <div id="email-wrap" style="color:black">

									  <p>Dear '.$tname.' </p>

									 

									  <p>I hope you doing well today.</p>	

									  <p>Your apartment reservation was successful.</p>										
									  <p><strong>Your reservation reference number: '.$ref.'</strong></p>	
									  <p><strong>Property viewing details: '.$day.' - '.$time.' </strong> </p>

									   <br>

							
									  <p> Kind Regards,</p>
									  <p> RentaNatathi Properties</p>

									  

									  </div>

								</body>';

								
								

						$mail->AltBody = '';

						$mail->send();

						
									

					} catch (Exception $e) {

						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

					}
					
					
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

						$mail->addAddress($lemail, $lname);

						

						

						$mail->isHTML(true);								

						$mail->Subject = 'RentaNathi | Reservation';

						$mail->Body = '<html>

								   <head>

									 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

									 <title></title>

								   </head>

								   <body>

									  <div id="email-wrap" style="color:black">

									  <p>Dear '.$lname.' </p>

									 

									  <p>I hope you doing well today.</p>	

									  <p>Your apartment is successfully reserved by: '.$tname.'</p>										
									  <p><strong>Your reservation reference number: '.$ref.'</strong></p>	
									 <p><strong>Property viewing details: '.$day.' - '.$time.'</strong> </p>

									   <br>

							
									  <p> Kind Regards,</p>
									  <p> RentaNatathi Properties</p>

									  

									  </div>

								</body>';

								
								

						$mail->AltBody = '';

						if($mail->send()){

							echo "<script>window.alert('Your reservation was successful')</script>";
							echo "<script>window.location.href='index.php' </script>";

						}																

					

					} catch (Exception $e) {

						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

					}
			   
			  }
		  }
}