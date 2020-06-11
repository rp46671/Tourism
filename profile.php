<?php
ini_set( "display_errors", 0); 

    $sess;
    session_start();
    $con=mysqli_connect('localhost','root','','travel');
    if(!isset($_SESSION['id'])){
        $sess=0;
        header('location:index.php');
    }
    else{
        $sess=$_SESSION['id'];
        $sql=mysqli_query($con,"select * from user_info where sn='$sess'");
        $arr=mysqli_fetch_array($sql);
    }

        $upcomingbookingdetails=mysqli_query($con,"SELECT * from user_info join booking join package where booking.userid='$sess' and user_info.sn='$sess' and booking.status not like 'Cancelled'and booking.depature_date>=DATE(NOW()) and booking.packid=package.Packid");
        $pastbookingdetails=mysqli_query($con,"SELECT * from user_info join booking join package where booking.userid='$sess' and user_info.sn='$sess' and booking.status not like 'Cancelled'and booking.depature_date<DATE(NOW()) and booking.packid=package.Packid");
        $cancelledbookingdetails=mysqli_query($con,"SELECT * from user_info join booking join package where booking.userid='$sess' and user_info.sn='$sess' and booking.status like 'Cancelled' and booking.packid=package.Packid");

         $name=$_POST['u_name'];
            $email=$_POST['u_email'];
            $contact=$_POST['u_contact'];
    if (isset($_POST['profileupdate'])) {
        $pass=$_POST['password'];
        if ($pass==$arr['password']) {
           
            $user_info_update=mysqli_query($con,"UPDATE user_info set name='$name',email='$email',contact='$contact' where sn='$arr[sn]' ");
            if ($user_info_update) {
                header("refresh:0.2 profile.php");
            }
            
        }
        else{
            ?><script>alert('Password Incorrect!!');</script><?php
        }
    }
    if (isset($_POST['password_update_form_submit'])) {
       $old=$_POST['oldpassword'];
       $new=$_POST['newpassword'];
       $con_new=$_POST['connewpassword'];
       if ($new==$con_new) {
        if ($old==$arr['password']) {
               $update_pass_query=mysqli_query($con,"UPDATE user_info set password='$new' where sn='$arr[sn]' and password='$old'");
               if ($update_pass_query) {
                   ?><script>alert("Password changed Successfully !!!");</script><?php
                   header('refresh:0.1');
               }
           }
           else{
            ?><script>alert("Incorrect Password");</script><?php
           }   
       }
       else{
        ?><script>alert("Password did not match");</script><?php
       }
   }
   if ($_GET['cancelid']) {
       $cancelquery=mysqli_query($con,"UPDATE booking set status='Cancelled' where bookingid=$_GET[cancelid]");
       if ($cancelquery) {
           ?><script>alert("Your booking has been Cancelled!");</script><?php
           header("refresh: 0.1 profile.php");
       }
   }
   if ($_GET['confirmid']) {
       $confirmquery=mysqli_query($con,"UPDATE booking set status='Confirmed' where bookingid=$_GET[confirmid]");
        if ($confirmquery) {
           ?><script>alert("Your booking has been Confirmed!");</script><?php
           header("refresh: 0.1 profile.php");
       }
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
    <link href="Admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <style type="text/css">
        body{
    
}
        .image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }

    
        .dis{
            background: #fff;
            border:none;
        }
        input[type=text], input[type=number]{
            padding: 3px;
            width: 100%;
        }

        #user_profile .error , #password_update_form .error{
            color: red;
            display: block;
        }


      .table-earning thead th {
    background: #333;
    font-size: 16px;
    color: #fff;
    vertical-align: middle;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 1;
   // padding: 22px 40px;
    white-space: nowrap;
}

.table-earning thead th.text-right {
    padding-left: 15px;
    padding-right: 65px;
}

.table-earning tbody td {
    color: #808080;
   // padding: 12px 40px;
    white-space: nowrap;
}

.table-earning tbody td.text-right {
    padding-left: 15px;
    padding-right: 65px;
}

.table-earning tbody tr:hover td {
    color: #555;
    cursor: pointer;
}
    </style>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


<?php include('includes/header.php'); ?>

<form name="user_profile" id="user_profile" method="POST">
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-top: 68px; margin-bottom: 68px;">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold; color: #FFB400"><?php echo $arr[name];?></h2>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary"  value="Update Password" id="updpwdbutton" />
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bookings-tab" data-toggle="tab" href="#bookings" role="tab" aria-controls="bookings" aria-selected="false">Bookings</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6 ch">
                                                <input type="text" name="u_name" value="<?php echo $arr[name];?>" disabled class="etext dis"> 
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">User Name</label>
                                            </div>
                                            <div class="col-md-8 col-6 ch">
                                                <input type="text" name="" value="<?php echo $arr[username];?>" disabled class=" dis"> 
                                            </div>
                                        </div>
                                        <hr /> 

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6 ch">
                                                <input type="text" name="u_email" value="<?php echo $arr[email];?>" disabled class="etext dis"> 
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Contact Number</label>
                                            </div>
                                            <div class="col-md-8 col-6 ch">
                                                <input type="number" name="u_contact" value="<?php echo $arr[contact];?>" disabled class="etext dis"> 
                                            </div>
                                        </div>
                                        <hr />
                                            
                                        <button" class="edit btn btn-primary" style="color: #fff !important; background-color: #007bff !important; border-color: #007bff !important;"><i class="fa fa-pencil"></i> Edit</button">
                                        <input type="button" class="save btn btn-success" style="display: none;" value="Save">
                                        <input type="button" class="btn btn-danger" id="btnDiscard" value="Discard Changes" style="display: none;" />
                                    </div>
                                    <div class="tab-pane fade" id="bookings" role="tabpanel" aria-labelledby="bookings-tab">
                                         <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="upcomingbookings-tab" data-toggle="tab" href="#upcomingbookings" role="tab" aria-controls="upcomingbookings" aria-selected="true">Upcoming Bookings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pastbookings-tab" data-toggle="tab" href="#pastbookings" role="tab" aria-controls="pastbookings" aria-selected="true">Past Bookings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="cancelledbookings-tab" data-toggle="tab" href="#cancelledbookings" role="tab" aria-controls="cancelledbookings" aria-selected="true">Cancelled Bookings</a>
                                            </li>
                                        </ul>
                                        <div class="tab-pane fade show active" id="upcomingbookings" role="tabpanel" aria-labelledby="upcomingbookings-tab">
                                        
                                           <div class="row" id="upcomingbookingstable">
                                                <div class="table-responsive table--no-card m-b-30">
                                                    <?php if (mysqli_num_rows($upcomingbookingdetails)==0) {
                                                        echo "You have not any upcoming bookings";
                                                    }else{ ?>
                                                    <table class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                               <tr>
                                                                    <th>Booking<br/>Id</th>
                                                                    <th>Name</th>
                                                                    <th>Travellers</th>
                                                                    <th>Date</th>
                                                                    <th>Package<br/>Name</th>
                                                                    <th>Duration</th>
                                                                    <th>Departure</th>
                                                                    <th>Status</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr><?php } ?>
                                                        </thead>
                                                            <tbody>
                                                                <?php while($row=mysqli_fetch_array($upcomingbookingdetails)) {?> 
                                                                    
                                                                
                                                                <tr class="tr-shadow">
                                                                    <td><?php echo $row['bookingid'];?></td>
                                                                    <td><?php echo $row['Name'];?></td>
                                                                    <td><?php echo $row['traveller'];?></td>
                                                                    <td><?php echo date("d-m-Y",strtotime($row['depature_date']));?></td>
                                                                    <td><?php echo $row['packname'];?></td>
                                                                    <td><?php echo $row['days'].'D | '; echo $row['days']-1 .'N' ;?></td>
                                                                    <td><?php echo $row['starting_location'];?></td>
                                                                    <td ><?php echo $row['status'];?></td>
                                                                    <td>
                                                                        <?php if ($row['status']=='Pending..') {?>
                                                                            <a href="javascript:bookingconfirm_id(<?php echo $row['bookingid'] ?>)" style="color: green">Confirm</a> |
                                                                        <?php } ?>
                                                                        <a href="javascript:bookingcancel_id(<?php echo $row['bookingid']; ?>)" style="color: red">Cancel</a></td>
                                                                        <td><a href="javascript:print_id(<?php echo $row['bookingid']; ?>)">Print</a></td>
                                                                </tr>
                                                                <tr class="spacer"></tr><?php } ?>                                        
                                                            </tbody>
                                                    </table>
                                                </div>
                                           </div>
                                        </div>

                                        <div class="tab-pane fade" id="pastbookings" role="tabpanel" aria-labelledby="upcomingbookings-tab">
                                        
                                           <div class="row" id="pastbookingstable" style="display: none;">
                                                <div class="table-responsive table--no-card m-b-30">
                                                    <?php if (mysqli_num_rows($pastbookingdetails)==0) {
                                                        echo "You have not any previous bookings";
                                                    } else{ ?>
                                                    <table class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                               <tr>
                                                                    <th>Booking<br/>Id</th>
                                                                    <th>Name</th>
                                                                    <th>Travellers</th>
                                                                    <th>Date</th>
                                                                    <th>Package<br/>Name</th>
                                                                    <th>Duration</th>
                                                                    <th>Departure</th>
                                                                </tr><?php } ?>
                                                        </thead>
                                                            <tbody>
                                                                <?php while ($row=mysqli_fetch_array($pastbookingdetails)) {?>
                                                                    
                                                                 
                                                                    
                                                                
                                                                <tr class="tr-shadow">
                                                                    <td><?php echo $row['bookingid'];?></td>
                                                                    <td><?php echo $row['Name'];?></td>
                                                                    <td><?php echo $row['traveller'];?></td>
                                                                    <td><?php echo date("d-m-Y",strtotime($row['depature_date']));?></td>
                                                                    <td><?php echo $row['packname'];?></td>
                                                                    <td><?php echo $row['days'].'D | '; echo $row['days']-1 .'N' ;?></td>
                                                                    <td><?php echo $row['starting_location'];?></td>
                                                                </tr>
                                                                <tr class="spacer"></tr><?php }?>                                        
                                                            </tbody>
                                                    </table>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="tab-pane fade" id="cancelledbookings" role="tabpanel" aria-labelledby="cancelledbookings-tab">
                                        
                                           <div class="row" id="cancelledbookingstable" style="display: none;">
                                                <div class="table-responsive table--no-card m-b-30">
                                                    <?php if (mysqli_num_rows($cancelledbookingdetails)==0) {
                                                        echo"You have no cancelled booking.";
                                                    } else{?>
                                                    <table class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                               <tr>
                                                                    <th>Booking<br/>Id</th>
                                                                    <th>Name</th>
                                                                    <th>Travellers</th>
                                                                    <th>Date</th>
                                                                    <th>Package<br/>Name</th>
                                                                    <th>Duration</th>
                                                                    <th>Departure</th>
                                                                </tr><?php } ?>
                                                        </thead>
                                                            <tbody>
                                                                <?php while ($row=mysqli_fetch_array($cancelledbookingdetails)) {?>
                                                                    
                                                                 
                                                                    
                                                                
                                                                <tr class="tr-shadow">
                                                                    <td><?php echo $row['bookingid'];?></td>
                                                                    <td><?php echo $row['Name'];?></td>
                                                                    <td><?php echo $row['traveller'];?></td>
                                                                    <td><?php echo date("d-m-Y",strtotime($row['depature_date']));?></td>
                                                                    <td><?php echo $row['packname'];?></td>
                                                                    <td><?php echo $row['days'].'D | '; echo $row['days']-1 .'N' ;?></td>
                                                                    <td><?php echo $row['starting_location'];?></td>
                                                                </tr>
                                                                <tr class="spacer"></tr><?php }?>                                        
                                                            </tbody>
                                                    </table>
                                                </div>
                                           </div>
                                        </div>

                                    
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
<div style="background-color: rgba(214,214,194,0.8); ; left: 0; right: 0; bottom: 0; top: 0; position: fixed; z-index: 1000; display: none;" class="pwd">
    <center>
        <div class="col-lg-6" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Confirm Your Password</div>
                    <div class="card-body card-block">
                        
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                              <input type="submit" class="btn btn-success btn-sm" value="Confirm" name="profileupdate" id="profileupdatebutton">
                              <input type="button" class="btn btn-success btn-sm" value="Confirm" name="cancelbooking" id="cancelbookingbutton">
                              <input type="button" class="btn btn-danger btn-sm" value="Cancel" id="pwd_cancel">
                              <input type="button" class="btn btn-danger btn-sm" value="Cancel22" id="pwd_cancel1">
                              </div>
                        
                    </div>
            </div>

        </div>
    </center>
</div>
</form>
<div style="background-color: rgba(214,214,194,0.8); ; left: 0; right: 0; bottom: 0; top: 0; position: fixed; z-index: 1000; display: none;" id="updpwd">
    <center>
        <div class="col-lg-6" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Update Password</div>
                    <div class="card-body card-block">
                        <form  method="post" name="password_update_form" id="password_update_form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="oldpassword" name="oldpassword" placeholder="Old Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="newpassword" name="newpassword" placeholder="New Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="connewpassword" name="connewpassword" placeholder="Confirm New Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                              <input type="submit" class="btn btn-success btn-sm" value="Update" name="password_update_form_submit">
                              <input type="button" class="btn btn-danger btn-sm" value="Cancel" id="upd_pwd_cancel">
                              </div>
                        </form>
                    </div>
            </div>

        </div>

    </center>
</div>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
   <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script src="js/main.js"></script>
<script src="js/login_drop.js"></script>

<script type="text/javascript">
$(document).ready(function () {
           
            

            $('.edit').click(function(){
                $(this).hide();
                $('#btnDiscard').show();
                 $('.etext').removeClass('dis');
                 $('.etext').css("padding","5px");
                // $('.ch').attr('contenteditable','true');
                $('.save').show();
                $('.etext').prop("disabled",false);
                $('#user_profile').find(':input').each(function(i,elem){
                    $(this).data("previous-value",$(this).val());
                });
                function restore(){
                    $('#user_profile').find(':input').each(function(i,elem) {
                        $(this).val($(this).data("previous-value"));
                    });
                }

                $('#btnDiscard').click(function(){
                    restore();
                    $(this).hide();
                    $('.save').hide();
                    $('.edit').show();
                    $('.etext').css("padding","3px")
                    $('.etext').addClass('dis');
                    $('.etext').prop("disabled",true);
                });
                $('.save').click(function(){
                    $('.pwd').show();
                    $('#cancelbookingbutton,#pwd_cancel1').hide();
                    $('#profileupdatebutton,#pwd_cancel').show();
                });
                $('#pwd_cancel').click(function(){
                    $('.pwd').hide();
                    $('#password').val(null);
                });

            });

            $('#upd_pwd_cancel').click(function(){
                $('#updpwd').hide();
            });
            $('#updpwdbutton').click(function(){
                $('#updpwd').show();
            });
            $('.more').attr("disabled","disabled");
            $('.more').css("cursor","pointer");

            $('#upcomingbookings-tab').click(function(){
                 $('#upcomingbookingstable').show();
                 $('#pastbookingstable').hide();
                 $('#cancelledbookingstable').hide();
            });
            $('#pastbookings-tab').click(function(){
                $('#upcomingbookingstable').hide();
                $('#pastbookingstable').show();
                $('#cancelledbookingstable').hide();
            });
            $('#cancelledbookings-tab').click(function(){
                $('#upcomingbookingstable').hide();
                $('#pastbookingstable').hide();
                $('#cancelledbookingstable').show();
            });
                  $('#pwd_cancel1').click(function(){
                    $('.pwd').hide();
                    $('#password').val(null);
                });
                  $('#cancelbookingbutton').click(function(){
                    $('.pwd').hide();
                    
                  });


          
        });
function bookingcancel_id(b_cid){
                
            if (confirm('Are You Sure to Cancel the Booking'))
            {

                      
                window.location.href="profile.php?cancelid="+b_cid;

            }
        }

        function bookingconfirm_id(b_conid){
            window.location.href="profile.php?confirmid="+b_conid;
        }

         function print_id(cid){
                window.location.href="confirm_print.php?cid="+cid;
            }
</script>
<script>
    $('#user_profile').validate({
    rules:{
        password: "required"
        },
    messages:{
            password:'Please enter your password'
        },
        submitHandler: function(form){
            form.submit();
        }
    
});

       $('#password_update_form').validate({
        rules:{
            oldpassword:'required',
            newpassword:{
                required:true,
                minlength:5
            },
            connewpassword:{
                required: true,
                equalTo: '#newpassword'
            }
        },
        messages:{
            oldpassword:'Please enter your Old Password',
            newpassword:{
                required:'Please enter your New Password',
                minlength:'Password should contain atleast 5 characters'
            },
            connewpassword:{
                required:'Please Confirm your new Password',
                equalTo: 'Password did not match'
            }
        }
    });
</script>
</body>
</html>
