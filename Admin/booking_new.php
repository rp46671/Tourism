<?php
session_start();


 if (($_SESSION['admin'])!=1) {
      header('location:../index.php');
    }

$con=mysqli_connect('localhost','root','','travel');
$sql=mysqli_query($con,"SELECT * FROM package JOIN booking join user_info where package.Packid = booking.packid and booking.status!='Cancelled' and booking.depature_date>=DATE(NOW()) and booking.userid= user_info.sn");





$sql_id=$_GET['c_id'];
if (isset($_GET['c_id'])) {
                 $can=mysqli_query($con,"UPDATE booking set status='Cancelled' where bookingid='$sql_id'");
                 header('refresh:0.2 booking_new.php');
        
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Upcomings Bookings</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <!-- <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all"> -->
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        
        <?php include 'includes/navigation.php'; ?>

          <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
      <?php include 'includes/header.php'; ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    
                         <div class="row">
                                <div class="table-responsive table--no-card m-b-30">
                                    <?php if (mysqli_num_rows($sql)==0) {
                                        echo " No bookings yet";
                                    }
                                    else{?>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                           <tr>
                                                <th>#</th>
                                                <th>userid</th>
                                                <th>User Name</th>
                                                <th>Package</th>
                                                <th>Duration</th>
                                                <th>From</th>
                                                <th>Departure Date</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php while($row=mysqli_fetch_array($sql)) {?> 
                                        		
                                        	
                                        	<tr class="tr-shadow">
                                                <td><?php echo $row['bookingid'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['Name'];?></td>
                                                <td><?php echo $row['packname'];?></td>
                                                <td><?php echo $row['days'].'D | '; echo $row['days']-1 .'N' ;?></td>
                                                <td><?php echo $row['starting_location'];?></td>
                                                <td><?php echo date("d-m-Y",strtotime($row['depature_date']));?></td>
                                                <td><?php echo $row['status'];?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                            <a href="javascript:cancel(<?php echo $row['bookingid']; ?>)"><i class="fa fa-times" style="color: #FF5733;"></i></a>
                                                        </button>
                                                    </div>
                                                    
                                                </td>
                                            </tr> 
                                            <tr class="spacer"></tr><?php } ?>
                                            
                                          
                                        
                                            
                                        </tbody>
                                    </table><?php } ?>
                                </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <!-- <script src="vendor/animsition/animsition.min.js"></script> -->
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <!-- <script src="js/main.js"></script> -->

     <script>
        $(document).ready(function() {
                    $('#nights').val((parseInt($('#days').val()))-1);
            $('textarea').keyup(function(){
                $(this).css('height','auto');
                $(this).height(this.scrollHeight);
            });
            $('#account-wrap').click(function(){
                $('#account-dropdow').show();
            });  
            $(document).mouseup(function(e){
                var container= $('#account-dropdow');
                if(!container.is(e.target) && container.has(e.target).length ===0){
                    container.fadeOut();
                }
            });
            $('#days').keyup(function(){
                    $('#nights').val((parseInt($('#days').val()))-1);
            });
        });


        function cancel(id){
            if(confirm('Are you sure to cancel the Booking\n This cannot be undone!!')){
                window.location.href="booking_new.php?c_id="+id;
            }
        }
    </script>


<script src="js/navshow.js"></script>

</body>

</html>