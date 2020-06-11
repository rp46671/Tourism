<?php
session_start();
ini_set( "display_errors", 0); 


 if (($_SESSION['admin'])!=1) {
        header('location:../index.php');
    }
 $mid=$_REQUEST['mid'];
 $con=mysqli_connect('localhost','root','','travel');
 $sql=mysqli_query($con,"SELECT * from package where Packid='$mid'");
 $row1=mysqli_fetch_array($sql);

 
 
 $slider_img=explode(' | ', $row1[slider]);

  if ($mid==null) {
        header('location:selecteditpackage.php'); }

    if(isset($_POST['update'])){   

        $packname=$_POST['package_name'];
        $price=$_POST['price'];
        $days=$_POST['days'];
        $nights=$days-1;
        $details=$_POST['details'];
        $image_data=array();
        $imgchnge=0;
        $exterror=0;
        $slidermove=0;
        $sliderextensions=array("jpeg","png","jpg",null);
        $extensions=array("jpeg","png","jpg");
        foreach ($_FILES['slider']['tmp_name'] as $key => $tmp_name) {
            $slider_name=$_FILES['slider']['name'][$key];
            $slider_tmp=$_FILES['slider']['tmp_name'][$key];
            $slider_ext=strtolower(end(explode('.', $slider_name)));  
            if (in_array($slider_ext, $sliderextensions)==false){
                $exterror=1;
                ?><script>alert("File Type not Allowed");</script><?php
                }
            array_push($image_data,$slider_name);
            if ($exterror!=1) {
            $slmo=move_uploaded_file($slider_tmp, "upload_images/".($slider_name));
            if ($slmo) {
               $slidermove=1;
                $imgData=implode(' | ', $image_data);
        $row1[slider]= $row1[slider]." | ".$imgData  ;
           }
           else
           {
            $exterror=1;
           }
       }   
}




        if ($_FILES['image1']['name']!=null) {
            $image1=($_FILES['image1']['name']);
            $imgchnge=1;
        }
        if ($_FILES['image1']['name']==null) {
            $image1=$row1['Pic1'];
        }


        $departure=$_POST['starting_location'];
        $image_size=$_FILES['image1']['size'];
        $image_tmp=$_FILES['image1']['tmp'];
        $image_type=$_FILES['image1']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image1']['name'])));
        
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
     
     if ($departure==null) {
                 $msg6='From!!';
                 $err=1;
             }        
        //die();
     if ($err==0 or $exterror==0) {
      //die('ext');
        if ($imgchnge==1) {
            if (in_array($file_ext, $extensions)==false ) {
                ?><script>alert("file type not allowed");</script><?php
                }
            else{
                $path= "upload_images/".basename($_FILES['image1']['name']);
                $moved = move_uploaded_file($_FILES['image1']['tmp_name'], $path);
                }
            }
        if (($imgchnge==1 and $moved) or $imgchnge!=1 ) {
                $upd=mysqli_query($con,"UPDATE package set packname='$packname',days='$days',Packprice='$price',Pic1='$image1',Detail='$details', Departure='$departure', slider='$row1[slider]' where Packid='$mid'");
                //die('bye');
                }
            }
        
        
            if ($upd) {
                ?><script>alert('Successfully updated!!');</script><?php
            }
        else{
            ?><script>alert('Some Error Occured!!');</script><?php
        }
        
    
        
       // header('refresh:0;url=editpackage.php?mid='.$mid);
        
       }


       $sliderdeleteid=$_GET['imagedelete_id'];
       if (isset($_GET['imagedelete_id'])) {
          $arrser=array_search($sliderdeleteid, $slider_img);
          unset($slider_img[$arrser]);
            $final=implode(" | ",$slider_img );
            $slidelque=mysqli_query($con,"UPDATE package set slider='$final' where Packid='$mid' ");
            if ($slidelque) {
                ?><script>alert("Succesfully deleted");</script><?php
                header('refresh: 0.1 editpackage.php?mid='.$mid);   
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
    <title><?php echo $row1['packname']." | Edit"; ?></title>

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
        <!-- HEADER MOBILE-->
        <?php include 'includes/navigation.php'; ?>
        <!-- END MENU SIDEBAR-->

          <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'includes/header.php'; ?>
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
                                                    <input type="text" id="package_name" name="package_name" placeholder="Package Name" class="form-control" value="<?php echo $row1['packname']; ?>">
                                                    <span class="error"><?php echo $msg1?></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="price" name="price" placeholder="Price" class="form-control" value="<?php echo $row1['Packprice']; ?>">
                                                     <span class="error"><?php echo $msg2?></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Duration</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     Days: <input type="text" id="days" name="days" placeholder="Days" class="form-control" style="width: 30%;display: inline;" value="<?php echo $row1['days']; ?>">
                                                     Nights: <input type="text" id="nights" name="nights" placeholder="Nights" class="form-control" disabled style="width: 30%;display: inline;">
                                                     <span class="error"><?php echo $msg3?></span>
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">From</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="starting_location" name="starting_location" placeholder="From" class="form-control" value="<?php echo $row1['Departure']; ?>">
                                                     <span class="error"><?php echo $msg6?></span>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Details</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <textarea class="form-control" name="details" id="details" style="resize: none;"><?php echo $row1['Detail'];?></textarea>
                                                     <span class="error"><?//php echo $msg3?></span>
                                                </div>
                                            </div>
                                      
                                      

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Image 1</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="image1" id="image1" class="form-control-file" value="<?php echo $row1['Pic1']; ?>">
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
                                                    <input  type="submit" class="btn btn-lg btn-info btn-block" name="update" value="Update">                                                    
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
                        <div class="section__content section__content--p30" style="width: 100%">
                    <div class="container-fluid">
                    
                         <div class="row">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                           <tr>
                                                <th>#</th>
                                                <th>File Name</th>
                                                <th>Image</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($slider_img as $value) {if ($value!=null) {?> 
                                                
                                            
                                            <tr class="tr-shadow">
                                                <td><?php echo $row1['Packid'];?></td>
                                                <td><?php echo $value;?></td>
                                                <td><img src="upload_images/<?php echo $value; ?>" style="width: 200px;"></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                     

                                                            <button  class="item" data-toggle="tooltip" data-placement="top" title="Delete" name="delete">
                                                              <a href="javascript:sliderdelete_id('<?php echo $value;?>')"><i class="zmdi zmdi-delete"></i>s</a>
                                                            </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr><?php } }?>
                                            
                                          
                                        
                                            
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
    <script src="vendor/select2/select2.min.js">
    </script>
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


          function sliderdelete_id(id){
                if (confirm('sure to delete '))
            {
                window.location.href='editpackage.php?mid='+<?php echo $mid ?>+'&imagedelete_id='+id;
            }
            }
    </script>
      <script src="js/navshow.js"></script>
</body>

</html>