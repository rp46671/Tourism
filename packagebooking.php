<?php
session_start();
ini_set( "display_errors", 0); 

$mid=$_REQUEST['mid'];
$con=mysqli_connect('localhost','root','','travel');
 $sql=mysqli_query($con,"select * from package where Packid='$mid'");
 $row=mysqli_fetch_array($sql);
 $sess=1;
 $user;
 $aa=explode(', ',$row[Departure]);
 $slider_img=explode(' | ', $row[slider]);
 if ($mid==null) {
   header('location:index.php#p');
 }
 
  if(!isset($_SESSION['id'])){
    $sess=0;
  }
  else{
    $sess=$_SESSION['id'];
    $sqli=mysqli_query($con,"select * from user_info where sn='$sess'");
    $arr=mysqli_fetch_array($sqli);
  }

  if ($sess==0) {
    if (isset($_POST['bookingsubmit'])) {
      ?><script>alert("Please Login First");</script><?php
    }
  }
if ($sess!=0) {


 if (isset($_POST['bookingsubmit'])) {

  $name=$_POST['name'];
  $phone=$_POST['phoneno'];
  $departt=$_POST['depart'];
  $departcity=$_POST['departcity'];
  $travelers=$_POST['travelers'];
  $depart=date("Y-m-d",strtotime($departt));


  $booksql=mysqli_query($con,"insert into booking (userid,Name,Contact,packid,depature_date,starting_location,traveller,status)values('$arr[sn]','$name','$phone','$mid','$depart','$departcity','$travelers','Pending..')");
  if ($booksql) {
    $bidq=mysqli_query($con,"select bookingid from booking where userid='$arr[sn]' and packid='$mid' and depature_date='$depart' and starting_location='$departcity' and traveller='$travelers'");
      $bid=mysqli_fetch_array($bidq);
      $bii=$bid['bookingid'];

    header("location:confirm.php?mid=$bii" );
  }

}

 }
 if (isset($_POST['login'])){
  $user=$_POST['user_login'];
$pws1=$_POST['pwd1'];
  $sq=mysqli_query($con,"select * from user_info WHERE username = '$user' AND password = '$pws1'");
  $arr=mysqli_fetch_array($sq);
  
  $count=mysqli_num_rows($sq);
  echo $count;
  if($count==1){?><script>alert("Login succ");</script>
  <?php
  session_start();
  $_SESSION['id']=$arr['sn'];
  $_SESSION['admin']=$arr['admin'];
  $sess=1;
   
  
  }
    else
    {?><script type="text/javascript">alert("LOGIN FAILED!!!");</script>
    <?php
    }
}


if (isset($_POST['enquiry_submit'])) {

  $contactno=$_POST['contactno'];
 $enq=mysqli_query($con,"insert into enquiry(Packageid,userid,Mobileno,status) values('$mid','$arr[sn]','$contactno','0')");

 if($enq){
  ?><script>alert('Our respresentive will call yo soon!!');</script><?php
 }
}
?>
<?php include 'includes/login_signup.php'; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Traveland - Free Bootstrap 4 Template by Colorlib</title>
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
    <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <style>
    	/* Slideshow container */
    .slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
    }

    /* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 0;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */

.mySlides img{
	height: 350px;
}


/* Fading animation */
.fade1 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade1 {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade1 {
  from {opacity: .4} 
  to {opacity: 1}



}
.days{
  margin-right: 30%;
  text-transform: uppercase;
}


.activities{
  margin-bottom: 40px;
  margin-right: 20px;
  margin-left: 20px;
}

@media (min-width: 768px){
  .cola{
    max-width: 25%;
  }
}
.cola{
  width: 25%;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button{
  -webkit-appearance:none;
  margin: 0;
}




.floating-assist{
  cursor: pointer;
  display: grid;
  align-items: center;
  text-align: center;
  color: #FFF;
  position: fixed;
  bottom: 30px;
  right: 10px;
  width: 40px;
  height: 40px;
  transition: all 250ms ease-out;
  border-radius: 50%;
  background-color: #00ace6;
  z-index: 1000;
}


.asssi{
  display: none;
  background-color: #80ccff;
  position: fixed;
  bottom: 23px;
  right: 10px;
  padding: 10px;
  z-index: 999;
  color: #ffffcc;
  border-radius: 5px;
}
.calldetail input[type=text],.calldetail input[type=number]{
  font-size: 12px;
  box-shadow: inset 4px 4px 10px 0 #ddd !important;
  border-radius: 3px 0 0 3px;
  padding: 6px 12px;
  height: 30px;
  color: #000;
}

.calldetail input[type=submit]{
  background-color: #0095da;
  border:0;
  font-size: 12px;
  padding: 4px 10px;
  margin-left: -4px;
  color: #fff;
  border-radius: 0 3px 3px 0;
  height: 30px;
  cursor: pointer;
}
.calldetail, .headerr{
  display: inline-block;
  padding-right: 70px;
}


#booking_form .error, #enquiry_form .error{
  color: red;
  display: block; 
}
    </style>

    <script src="web/js/jquery-1.12.0.min.js"></script>
  </head>
  <body>
	 <?php include('includes/header.php'); ?>
      <?php include 'includes/login.php'; ?>
    
   <!--  <div class="slideshow-container">
  <div class="mySlides fade1">
    <img src="images/bg_1.jpg" style="width:100%">
  </div>

  <div class="mySlides fade1">
    <img src="images/bg_2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade1">
    <img src="images/image_5.jpg" style="width:100%">
  </div>
</div>
<br> -->


  <section class="ftco-section ftco-no-pb testimony-section" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row ftco-animate">
          <div class="col-md-12 testimonial">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <?php foreach ($slider_img as $value) { ?>
              <div class="item">
                <div class="testimony-wrap img" style="background-image: url(<?php echo "Admin/upload_images/".$value; ?>); height: 400px;">
                  <div class="overlay"></div>
                </div>
              </div>
            <?php } ?>
              
              <!-- <div class="item">
                <div class="testimony-wrap" style="background-image: url(images/traveler-2.jpg);">
                  <div class="overlay"></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div> -->
              <!-- <div class="item">
                <div class="testimony-wrap" style="background-image: url(images/traveler-3.jpg);">
                  <div class="overlay"></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap" style="background-image: url(images/traveler-4.jpg);">
                  <div class="overlay"></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap" style="background-image: url(images/traveler-5.jpg);">
                  <div class="overlay"></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" style="padding-top: 20px">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section  ftco-animate">
            <h2 style="margin-bottom: 0;"><?php echo $row['packname']; ?></h2>
            <div class="duration">
            	<div class="days" style="float: left;"><h4 style="color: #999999"><?php echo $row[days]; ?> days | <?php echo $row[days]-1?> night</h4></div>
              <div class="price"><h4>&#8377; <?php echo $row[Packprice]; ?> per person</h4></div>
            </div>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
        	 <div class="cola d-flex align-self-stretch ftco-animate">
            	<div class="media activities services d-block">
              		<div class="icon"><span class="flaticon-yatch"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Activities</h3>
              		</div>
        	    </div>
            </div>
            <div class="cola d-flex align-self-stretch ftco-animate">
            	<div class="media activities services d-block">
              		<div class="icon"><span class="flaticon-around"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Travel</h3>
              		</div>
            	</div>
            </div>
            <div class="cola d-flex align-self-stretch ftco-animate">
        	      <div class="media activities services d-block">
              		<div class="icon"><span class="flaticon-compass"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Private Guide</h3>
              		</div>
            	  </div>
            </div>
            <div class="cola d-flex align-self-stretch ftco-animate">
            	<div class="media activities services d-block">
              		<div class="icon"><span class="flaticon-map-of-roads"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Location Manager</h3>
              		</div>
            	</div>      
            </div>
            <div class="cola d-flex align-self-stretch ftco-animate">
          	    <div class="media activities services d-block">
              		<div class="icon"><span class="fas fa-fire" style="line-height: inherit;"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Activities</h3>
              		</div>
        		    </div>
                </div>      
          	
          	<div class="cola d-flex align-self-stretch ftco-animate">
            	<div class="media activities services d-block">
              		<div class="icon"><span class="fas fa-camera" style="line-height: inherit;"></span></div>
              		<div class="media-body">
                		<h3 class="heading mb-3">Activities</h3>
              		</div>
        		</div>      
          	</div>
        </div>
    		
    	</div>
    </section>





    <div class="floating-assist" name="helparrow" id="helparrow">
      <i class="fas fa-arrow-left" id="arrow"></i>
    </div>
     <div class="floating-assist" name="helpb" id="helpcross">
      <i class="fas fa-times" id="cross"></i>
    </div>
     <div class="asssi" id="asssi">
        <div class="headerr">
          <span class="title1">Need Help? Leave your number and we will call you </span>
        </div>
        <form name="enquiry_form" method="POST" id="enquiry_form" autocomplete="off">
          <div class="calldetail">+91
            <input type="number"  placeholder="Enter your Phone number" name="contactno">
            <input type="submit" name="enquiry_submit" value="Submit">
          </div>
        </form>
      </div>


    
    <!---header--->
    <div class="header w3ls">
      <h1>Booking Details</h1>
    </div>
    <!---header--->
    <!---main--->
      <div class="main">
        <div class="main-section agile">
          <div class="login-form">
            <form name="booking_form" method="POST" id="booking_form" autocomplete="off">
              <ul>
                 <li class="text-info">Full Name *</li>
                 <li><input type="text" name="name" placeholder="Your Complete Name"  value="<?php echo $name?>"></li>
                 <div class="clear"></div>
               </ul>
               <ul>
                 <li class="text-info">Phone Number *</li>
                 <li><input type="number" placeholder=" Phone no" name="phoneno" value="<?php echo $phone ?>"></li>
                 <div class="clear"></div>
               </ul>
                <ul>
                <li class="text-info">Departure Date *</li>
                <li class="dat"><input class="" id="datepicker" type="text" placeholder="dd-mm-yyyy" name="depart" value="<?php echo $depart ?>" required></li>
             <!--  -->
                <div class="clear"></div>
              </ul>
              
              <!---start-date-piker---->
                    <link rel="stylesheet" href="web/css/jquery-ui.css" />
                    <script src="web/js/jquery-ui.js"></script>
                      <script>
                        $(function() {
                        $( "#datepicker" ).datepicker({
                          format: 'dd-mm-yyyy'
                        });
                        });
                      </script>
                  <!---/End-date-piker---->
               <ul>
                <li class="text-info">Select Departure *</li>
                <li><select name="departcity">
                  <option disabled selected value="">From</option>
                  <?php foreach ($aa as $value) {?>
                    <option value="<?php echo $value?>"><?php echo $value?></option>
                 <?php } ?>
                </select></li>
                <div class="clear"></div>
              </ul>
            
               
               <ul>
                 <li class="text-info">Number of Passengers *</li>
                 <li class="se"><input type="number" name="travelers" placeholder="Number of Travellers" value="<?php echo $travelers?>" style="width: 100%" ></li>
                 <div class="clear"></div>
               </ul> 
               <ul>
              <input type="submit" value="Submit" name="bookingsubmit" id="bookingsubmit">
              <div class="clear"></div>
            </form>
          </div>
        </div>
      </div>
     
             
        






       <script><?php if ($sess==0) {?>
       
        $('#bookingsubmit').click(function(e){
          $('#loginsignuppromt').show();
          $('#login_form').show();
          $('#signuplabel').show();
          
            e.preventDefault();
        }); <?php }?>
      </script>
    <!---main--->
 
  <!--   <section class="ftco-subscribe" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 text-wrap text-center heading-section ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-10">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->


     <!-- <footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Traveland</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Infromation</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                <li><a href="#" class="py-2 d-block">Call Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experience</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Adventure</a></li>
                <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                <li><a href="#" class="py-2 d-block">Beach</a></li>
                <li><a href="#" class="py-2 d-block">Nature</a></li>
                <li><a href="#" class="py-2 d-block">Camping</a></li>
                <li><a href="#" class="py-2 d-block">Party</a></li>
              </ul>
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  </p>
          </div>
        </div>
      </div>
    </footer>  -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
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
 
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";	
    setTimeout(carousel, 2000);
    dot[i].classList.add("active");
}
</script>



  <script>
  $(document).ready(function(){
    $('#asssi').hide();
    $('#helpcross').hide();
    $('#helparrow').click(function(){
      $('#asssi').fadeIn();
      $('#helpcross').fadeIn();
      $('#helparrow').hide();
    });

    $('#helpcross').click(function(){
      $('#asssi').fadeOut();
      $('#helpcross').hide();
      $('#helparrow').fadeIn();
    });

  });
  </script>

  <script type="text/javascript" src="js/hide_show.js"></script>

    
  </body>
</html>