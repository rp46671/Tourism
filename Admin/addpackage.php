<?php
session_start();
ini_set( "display_errors", 0); 

if (($_SESSION['admin'])!=1) {
        header('location:../index.php');
    }



if (isset($_POST['submit1'])) {  


 $packname=$_POST['package_name'];
 $price=$_POST['price'];
 $from=$_POST['starting_location'];
  $days=$_POST['days'];
 $details=$_POST['details'];
 $image1=$_FILES['image1']['name'];
 $image_data=array();
 $image_size=$_FILES['image1']['size'];
 $image_tmp=$_FILES['image1']['tmp'];
 $image_type=$_FILES['image1']['type'];
 $file_ext=strtolower(end(explode('.',$_FILES['image1']['name'])));
 $extensions=array("jpeg","png","jpg");
  $exterror=0;
$slidermove=0;


foreach ($_FILES['slider']['tmp_name'] as $key => $tmp_name) {
    $slider_name=$_FILES['slider']['name'][$key];
    $slider_tmp=$_FILES['slider']['tmp_name'][$key];
    $slider_ext=strtolower(end(explode('.', $slider_name)));
    if (in_array($slider_ext, $extensions)==false){
        $exterror=1;
    }
    array_push($image_data,$slider_name);
    if ($exterror!=1) {
           $slmo=move_uploaded_file($slider_tmp, "upload_images/".($slider_name));
           if ($slmo) {
               $slidermove=1;
           }
       }   
      
}
 $imgData=implode(' | ', $image_data);
 $err=0;
if($packname==null){
        $msg1='Please enter Package';
        $err=1;
     }
     if (!is_numeric($price)) {
         $msg2='only numeric values';
         $err=1;
         $price=null;
     }
     if($price==null){
        $msg2='Price!!';
        $err=1;
     }
     if($days==null){
        $msg3='Days!!!';
        $err=1;
     }
     if (!is_numeric($days)) {
         $msg3='only numeric values';
         $err=1;
         $days=null;
     }
       if($days<="0"){
        $msg3='Mininum Days should be one!!!';
        $err=1;
     }
     if ($image1==null) {
        $msg5='select image';
        $err=1;
     }
     if ($_FILES['slider']['name']==null) {
         $msgsl='select at least one image';
         $err=1;
     }
     if ($from==null) {
         $msg6='From!!';
         $err=1;
     }

      if($err==0){
        if (in_array($file_ext, $extensions)==false or $exterror==1) {
         ?><script>alert("file type not allowed");</script><?php
        }

        else{
         $con=mysqli_connect('localhost','root','','travel');
         $path= "upload_images/".basename($image1);      
         $moved=move_uploaded_file($_FILES['image1']['tmp_name'], $path);
         if ($moved and $slidermove!=0) {
            $wl=mysqli_query($con,"INSERT into package(packname,days,Packprice,Pic1,Detail,Departure,slider) values('$packname','$days','$price','$image1','$details','$from','$imgData')");
            if ($wl) { ?><script>alert("Package Added Successfully!!");</script><?php
                    }   
         }
         else{ ?> <script>alert("Some error occured!\nPlease Try Again Later");</script><?php
                        }
                 
         header('refresh:0.3 addpackage.php');

     }
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
    <title>Add Packages</title>

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
        .fr-toolbar.fr-top{
            display: none;
        }
        .error{
            color: red;
            display: block;
        }
    </style>


</head>

<body >
    <div class="page-wrapper">
       
        <?php include 'includes/navigation.php'; ?>

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
                                   
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Package Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="package_name" name="package_name" placeholder="Package Name" class="form-control" value="<?php echo $packname; ?>">
                                                    <span class="error"><?php echo $msg1?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Duration</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     Days: <input type="text" id="days" name="days" placeholder="Days" class="form-control" style="width: 30%;display: inline;" value="<?php echo $days; ?>">
                                                     Nights: <input type="text" id="nights" name="nights" placeholder="Nights" class="form-control" disabled style="width: 30%;display: inline;">
                                                     <span class="error"><?php echo $msg3?></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">From</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="starting_location" name="starting_location" placeholder="From" class="form-control" value="<?php echo $from; ?>">
                                                     <span class="error"><?php echo $msg6?></span>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Details</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <textarea class="form-control" name="details" id="details" style="resize: none;"><?php echo $details;?></textarea>
                                                     <span class="error"><?//php echo $msg3?></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="price" name="price" placeholder="Price" class="form-control" value="<?php echo $price; ?>">
                                                     <span class="error"><?php echo $msg2?></span>
                                                </div>
                                            </div>
                                      
                                      

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="image1" id="image1" class="form-control-file">
                                                    <span class="error"><?php echo $msg5?></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Add Slider Images</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="slider[]" id="slider" class="form-control-file" multiple>(You can select multiple images)
                                                    <span class="error"><?php echo $msgsl; ?></span>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                   <!-- <input type="submit" class="btn btn-primary btn-sm" name="submit1" id="submit1" value="ss"> -->
                                                    <input  type="submit" class="btn btn-lg btn-info btn-block" name="submit1"> <!-- su</button> -->
                                                    
                                                </div>
                                                <div class="col col-md-3">
                                                      <button type="reset" class="btn btn-danger btn-sm" name="reset1">
                                                         Reset
                                                    </button>
                                                </div>
                                        </form>
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
    <script src="js/navshow.js"></script>
   <!--   --><!-- <script src="js/main.js"></script> -->
    <script>
        $(document).ready(function() {
                    
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
            $('#days').keyup(function(e){
                    $('#nights').val((parseInt($('#days').val()))-1);
            });

        });
    </script>
    <script>
        
    </script>

</body>


</html>
<!-- end document-->
