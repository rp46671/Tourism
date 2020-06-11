<?php
	$sess;
	session_start();
  ini_set( "display_errors", 0); 

	$con=mysqli_connect('localhost','root','','travel');
	if(!isset($_SESSION['id'])){
		$sess=0;
	}
	else{
		$sess=$_SESSION['id'];
		$sql=mysqli_query($con,"select name from user_info where sn='$sess'");
		$arr=mysqli_fetch_array($sql);
	}

	$pacsql=mysqli_query($con,"select * from package");
?>
<?php include 'includes/login_signup.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Naadan Parindey</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  		 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link href="Admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="css/jquery.timepicker.css"> -->

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">


<link rel="stylesheet" href="login-signup-modal-master/login-signup-modal-master/css/style.css">

    <style type="text/css">
    	
    </style>
  </head>
  <body>
  	
    <?php include('includes/header.php'); ?>
    <?php include 'includes/login.php'; ?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Be a Traveler not a Tourist</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
          </div>
        </div>
      </div>
    </div>

  

    <section class="ftco-section" >
    	<div class="container" >
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4" id="p">Best Place to Travel</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    		<div class="row">
    			<?php while ($row=mysqli_fetch_array($pacsql)){ ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="project">
    					<a href="packagebooking.php?mid=<?php echo $row['Packid']; ?>">
    					<div class="img">
		    				<img src="Admin/upload_images/<?php echo $row['Pic1']; ?>" class="img-fluid" alt="<?php echo $row['packname']; ?>" style=" width: 300px">
	    				</div>
	    				<div class="text">
	    					<h4 class="price">&#8377;&nbsp;<?php echo $row['Packprice']; ?></h4>
	    					<span><?php echo $row['days'].'days | '; echo $row['days']-1 .'nights' ; ?></span>
	    					<h3><?php echo $row['packname']; ?></h3>
	    					
	    				</div></a>
    				</div>
    			</div><?php } ?>
    		</div>
    	</div>
    </section>

    
   	
    <section class="ftco-counter img" id="section-counter">
    	<div class="container" id="about">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">About Traveland</h2>
		            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Amazing Deals</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="200">0</strong>
		                <span>Sold Tours</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="2500">0</strong>
		                <span>New Tours</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="40">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>



		

    


    


  


  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
<script src="js/login_drop.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>


<script src="login-signup-modal-master/login-signup-modal-master/js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="login-signaup-modal-master/login-signup-modal-master/js/main.js"></script>
  </body>
</html>