<?php
if(isset($_GET['address'])){
	$address = $_GET['address'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Sacramento&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
	 <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        
        <link rel="stylesheet" href="style.css">
          <!---animation--css-->
	    <link rel="stylesheet" type="text/css" href="css/animate.min.css"> 
		
		  <link rel="stylesheet" href="css/navbar-fixed.css">
	
    	<link href="css/demo.css" rel="stylesheet" media="all">
	
	<title>RentaNathi Properties</title>
	<link rel="icon" type="image/x-icon" href="">
  </head>
  <body>
<div class="mapouter">
   <div class="gmap_canvas">
       <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $address; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	      <a href="https://putlocker-is.org"></a><br>
		     <style>
			      .mapouter{display:flex; margin: auto; height:500px;width:80%;}
			 </style>
			 <a href="https://www.embedgooglemap.net">put google maps on your website</a>
			 <style>
			  .gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}
					 
		     </style>
    </div>
</div>
</body>
</html>
<?php
}
?>