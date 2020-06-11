  <?php 
  $connn=mysqli_connect('localhost','root','','travel');
  $sess=mysqli_fetch_array(mysqli_query($connn,"SELECT name from user_info where sn='$_SESSION[id]'")); ?>
  <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        
                            <div class="header-button">
                               <!--  -->
                                <div class="account-wrap" id="account-wrap" style="position: absolute; right: 100px;">
                                    <div class="account-item clearfix js-item-menu">
                                       
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $sess['name'];?></a>
                                        </div>
                                        <div class="account-dropdow" id="account-dropdow">
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                    <a href="../profile.php" target="_blank"><i class="fas fa-user"></i>Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>