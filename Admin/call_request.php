<?php
session_start();


 if (($_SESSION['admin'])!=1) {
     header('location:../index.php');
    }

$con=mysqli_connect('localhost','root','','travel');
$sql=mysqli_query($con,"SELECT * from enquiry join package where enquiry.packageid=package.packid");
$sql_id=$_GET['id'];
if (isset($_GET['id'])) {
                 $del=mysqli_query($con,"DELETE from enquiry where Enquiryid='$sql_id'");
                 if ($del) {
                    header('refresh:0.4 call_request.php');    
                 }
                 
        
}
$sta_id=$_GET['s'];
if (isset($_GET['s'])) {
        $updsta=mysqli_query($con,"UPDATE enquiry set Status='1' where Enquiryid='$sta_id'");
        if ($sta_id) {
            header('refresh:0.1 call_request.php');
        }
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
    <title>Enquires</title>

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
        <!-- HEADER MOBILE-->
       <?php include 'includes/navigation.php'; ?>
        <!-- END MENU SIDEBAR-->

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
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                           <tr>
                                                <th>Enq. Id</th>
                                                <th>Package Name</th>
                                                <th>Contact no</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php while($row=mysqli_fetch_array($sql)) {
                                                if ($row['Packageid']!=0) {?>                                        		
                                        	<tr class="tr-shadow">
                                                <td><?php echo $row['Enquiryid'];?></td>
                                                <td><?php echo $row['packname'];?></td>
                                                <td><?php echo $row['Mobileno'];?></td>
                                                <td><?php  if ($row['Status']==0) {?><a href="javascript:status(<?php echo $row['Enquiryid'];?>)    ">Pending</a><?php ;} else{echo "Done"; }?></td>
                                                <td>
                                                    <div class="table-data-feature">

                                                            <button  class="item" data-toggle="tooltip" data-placement="top" title="Delete" name="delete">
                                                              <a href="javascript:delete_id(<?php echo $row['Enquiryid'];?>)"><i class="zmdi zmdi-delete"></i>s</a>
                                                            </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr><?php } } ?>
                                            
                                          
                                        
                                            
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
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


        function delete_id(id){
            if (confirm('sure to delete '))
            {
                window.location.href='call_request.php?id='+id;
            }
        }
        function status(s) {
            window.location.href='call_request.php?s='+s;
        }

        
    </script>
      <script src="js/navshow.js"></script>



</body>

</html>