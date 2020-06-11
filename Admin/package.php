<?php
session_start();

if (($_SESSION['admin'])!=1) {
        header('location:../index.php');
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
    <title>Packages</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="text/css/froala_editor.css">
  <link rel="stylesheet" href="text/css/froala_style.css">
  <link rel="stylesheet" href="text/css/plugins/code_view.css">
  <link rel="stylesheet" href="text/css/plugins/image_manager.css">
  <link rel="stylesheet" href="text/css/plugins/image.css">
  <link rel="stylesheet" href="text/css/plugins/table.css">
  <link rel="stylesheet" href="text/css/plugins/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
        ul a li{
            display: block;
        }
    </style>


</head>

<body >
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
       <?php include 'includes/navigation.php'; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'includes/header.php'; ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body card-block" style="margin-left: 100px; margin-top: 100px; margin-bottom: 100px">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <a href="addpackage.php">Add Packages</a>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">    
                                                    <a href="viewpackage.php">View Packages</a>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                        <a href="selecteditpackage.php">Edit Packages</a>
                                                </div>
                                            </div>
                                    </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <!-- <p>Copyright © 2019 Pranay. All rights reserved.</p> -->
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
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
   <!--   --><!-- <script src="js/main.js"></script> -->
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


        $('#select').change(function(){
            var url=this.value;
            window.location=url;
        });
    </script>
    <script src="js/navshow.js"></script>
</body>

</html>
<!-- end document-->
