<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="" href="index.php"><span><img src="logo.png" style="height: 50px !important; width: 200px !important;"></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="index.php#p" class="nav-link">Package</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        <!--   <li class="nav-item cta"><a href="#" class="nav-link">Book Now</a></li> -->
	          <li class="nav-item"><span id="user" class="nav-link"><i class="fas fa-user">&nbsp;&nbsp;</i><?php if($sess==0){echo "Login";}else{echo $arr['name'];} ?></span>
	          	<div class="dropdown-menu login_dropdown" id="profile">
	          		<ul class="" style="padding: 0"><?php if($sess==0){ ?>

	          			<li><span id="mainlogin">Login</span></li>
	          			<li><span id="mainsignup">Register</span></li><?php }else{?>
	          				<li><a href="Admin/logout.php">Logout</a></li>
	          				<li><a href="profile.php" >Profile</a></li>
	          				<?php if ($_SESSION['admin']==1) {?>
	          				<li><a href="Admin/">Admin</a></li><?php }} ?>


	          	
	          		</ul>
	          	</div>
	      	  </li>
	        </ul>
	      </div>
	      
	    </div>
	</nav>