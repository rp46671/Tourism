 <div style="background-color: rgba(214,214,194,0.8); ; left: 0; right: 0; bottom: 0; top: 0; position: fixed; z-index: 1000;display: none; " class="pwd" id="loginsignuppromt">
  <span style="position: absolute; right: 0 !important; color: #000; margin: 20px; font-size: 30px; cursor: pointer;" id="closebtn_sigin_up">X</span>
    <center>
        <div class="col-lg-6" style="padding-top: 50px;">
          <form name="loginform" id="login_form" method="POST" action="" style="display: none;">
            <div class="card" id="logincard">
                <div class="card-header">Sign In</div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="user_login" placeholder="Username" class="form-control validate-input">
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="pwd1" placeholder="Password" class="form-control">
                                </div>
                            </div>

                            <div class="form-actions form-group">
                              <input type="submit" class="btn btn-success btn-sm" value="Login" name="login" id="login">
                              </div>
                        
                    </div>
            </div>
          </form>
        
          <form name="sigform" id="sigform" method="POST" action="" style="display: none;">
            <div class="card" id="logincard">
                <div class="card-header">Sign Up</div>
                    <div class="card-body card-block">
                        <div class="form-group">
                              <input type="text" name="name" placeholder="Name" class="form-control">
                              <span style="color: red;"><?php echo $msg1;?></span>
                            </div>
                            <div class="form-group">
                              <input type="text" name="usr" placeholder="Username" class="form-control">
                              <span  style="color: red"><?php echo $msg2;?></span>
                            </div>
                           
                            <div class="form-group">
                              <input type="text" placeholder="Email" name="email" class=" form-control">
                              <span  style="color: red"><?php echo $msg3;?></span>
                            </div>
                            <div class="form-group">
                              <input type="password" placeholder="Password" name="pwd" class="validate-input form-control">
                              <span  style="color: red"><?php echo $msg4;?></span>
                            </div>
                            <div class="form-group">
                              <input type="number" placeholder="Contact No" name="co" class="validate-input form-control">
                              <span  style="color: red"><?php echo $msg5;?></span>
                            </div>

                            <div class="form-actions form-group">
                              <input type="submit" class="btn btn-success btn-sm" value="Register" name="signup" id="signup">
                              </div>
                        
                    </div>
            </div>
          </form>
        </div>

        <div class="signuplabel"><label id="signuplabel" style="display: none;">Don't Have an account!! SignUP here</label></div>
        <div class="signuplabel"><label id="loginlabel" style="display: none;">Already Have an account!! SignIn here</label></div>



    </center>
</div>
