 <?php
  error_reporting(E_ERROR | E_PARSE);
$con=mysqli_connect('localhost','root','','travel');
if (isset($_POST['signup']) ) {

  $nme=$_POST['name'];
$usr=$_POST['usr'];
$pws=$_POST['pwd'];
$email=$_POST['email'];
$contact=$_POST['co'];
$uni=0;
  

  
      $sel=mysqli_query($con,"select username from user_login where username='$usr'");
        $count=mysqli_num_rows($sel);
        echo $count;
        if($count!=0){$msg="username unavailable"; $uni=1; die();}
        $sel=mysqli_query($con,"select email from user_login where email='$email'");
        $count=mysqli_num_rows($sel);
        if($count!=0){$msg="Email already registered"; $uni=1;}
        $sel=mysqli_query($con,"select contact from user_login where contact='$contact'");
        $count=mysqli_num_rows($sel);  
        if($count!=0){$msg="Contact already registered"; $uni=1;}
        if($uni==0){
            
        
   $sq=mysqli_query($con,"insert into user_info (name,username,password,email,contact,active,admin)values('$nme','$usr','$pws','$email','$contact','1','0')");
   if($sq){?>
     <script type="text/javascript">
       alert("You have successfully registered!!");
     </script> <?php
     header('refresh: 0.1');
   }
   else{
    die($contact);
    ?>
     <script type="text/javascript">alert(<?php echo $msg; ?>);</script><?php
     header('refresh: 0.1');
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
   if ($arr['admin']==0) {
      header("refresh:0.1");
      $_SESSION['ad']=$arr['admin'];
      }
    if ($arr['admin']==1) {
      $_SESSION['ad']=1;
      header('location:Admin');
    }
  }
    else
    {?><script type="text/javascript">alert("LOGIN FAILED!!!");</script>
    <?php
    header('refresh:0 ');
    }
}
?>

  