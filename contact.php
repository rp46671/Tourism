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



  if (isset($_POST['contactsubmit'])) {
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_message=$_POST['c_message'];
    $c_phone=$_POST['c_phone'];

    $cofo=mysqli_query($con,"insert into enquiry (Name,Email,Mobileno,Message) values('$c_name','$c_email','$c_phone','$c_message')");
    if ($cofo) {
      ?><script>alert("We will be in touch woith you!!");</script><?php
      header('refresh:0.1');
    }
  }
?>
<?php include 'includes/login_signup.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact</title>
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
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
        <link href="Admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/style.css">
    <style>
      #contactform .error{
        color: red;
      }
      input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button{
  -webkit-appearance:none;
  margin: 0;
}
    </style>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
       <?php include 'includes/login.php'; ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Contact Information</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>18 Anand Vihar Haldwani</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">+91 8194020608</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:negipranaysingh@gmail.com">sabhya.ps@outlook.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
	            <p><a href="index.php"><h3 class="mb-4">Website</h3></a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
			
		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form class="bg-light p-5 contact-form" name="contactform" id="contactform" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="c_name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="c_email">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Your Phone number" name="c_phone">
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" placeholder="Message" name="c_message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="contactsubmit" id="contactsubmit">
              </div>
            </form>
          
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
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
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


<script>
  $(document).ready(function(){
    $('#contactform').validate({
      rules:{
        c_name:'required',
        c_email:{
          required:true,
          email:true
        },
        c_message:'required',
        c_phone:{
          required:true,
          minlength:10,
          maxlength:10
        }
      },
      messages:{
        c_phone:{
          minlength:"Please enter valid phone number",
        maxlength:"Please enter valid phone number"
        }
      },
      submitHandler: function(form){
        form.submit();
      }
    });
  });
</script>

  </body>
</html>