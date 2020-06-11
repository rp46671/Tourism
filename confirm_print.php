<?php
ini_set( "display_errors", 0); 

session_start();
if (!isset($_SESSION[id])) {
  header('location:index.php#p');
}
$mid=$_REQUEST['cid'];
   if ($mid==null) {
        header('location:packagebooking.php'); }

        $con=mysqli_connect('localhost','root','','travel');
        $arr=mysqli_fetch_array(mysqli_query($con,"SELECT * from booking where booking.bookingid='$mid'"));
        $pack=mysqli_fetch_array(mysqli_query($con,"SELECT * from package where Packid='$arr[packid]' "));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $pack['packname']; ?> | Confirm</title>
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
    <link rel="stylesheet" href="css/style.css">
    <style>
      input[type=submit], input[type=button]{
            font-size: 1em;
    padding: .2em 1em;
    text-transform: capitalize;
    border: none;
    outline: none;
    color: #fff;
    cursor: pointer;
      }
       td{
      padding-left: 20px;
    }
    .cancel:hover{
      background-color: #ff6666;
    }
    .cancel{
      background-color: #ff0000;
    }
    .confirm{
      background-color: #3366ff;
    }
    .confirm:hover{
      background-color: #809fff;
    }
    .aa{
      padding-left: 20px;
    }
    </style>
  </head>
  <body>
    <?php include('includes/header.php'); ?>
   

    
      <div class="container">
        <div class="row d-flex">
          <div class="col-md- pr-md-5 py-5" style="width: 100%">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <h2 class="mb-4" style="text-align: center; margin-bottom: 0 !important;"><?php echo $pack['packname']; ?></h2>
                <h3 class="mb-4" style="text-align: center;margin-left: 170px;"><?php echo $pack['days'].'D | ';echo $pack['days']-1 . 'N'; ?></h3>
              </div>
            </div>
            <div class="row d-flex">
              <div class="col-md-12">

                <table align="center">
                  <tr>  
                    <th>Name</th>
                    <th class="aa">:</th>
                    <td><?php echo $arr['Name'];?></td>
                  </tr>
                  <tr>
                    <th>Contact No</th>
                    <th class="aa">:</th>
                    <td><?php echo $arr['Contact'];?></td>
                  </tr>
                  <tr>
                    <th>Package Price</th>
                    <th class="aa">:</th>
                    <td><?php echo $pack['Packprice'];?></td>
                  </tr>
                  <tr>
                    <th>Departure Date</th>
                    <th class="aa">:</th>
                    <td><?php echo date("d.m.Y",strtotime($arr[depature_date]));?></td>
                  </tr>
                  <tr>
                    <th>Starting Point</th>
                    <th class="aa">:</th>
                    <td><?php echo $arr['starting_location'];?></td>
                  </tr>
                  <tr>
                    <th>No Of Travellers</th>
                    <th class="aa">:</th>
                    <td><?php echo $arr['traveller'];?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <th class="aa">:</th>
                    <td><?php echo $arr['status']; ?></td>
                  </tr>
                  <tr >
                     <td style="padding-top: 20px; text-align: center;"colspan="3"><input type="button" name="print" value="Print" class="confirm" id="print"></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    

    

    </footer>
    
  

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


  <script>
    $('#print').click(function(){
      $(this).hide();
      window.print();
      $(this).show();
      return false;
    });
  </script>
    
  </body>
</html> 