    	$(document).ready(function() {
    		$('#user').click(function(){
    			$('#profile').show();
    		});
    		 $(document).mouseup(function(e){
                var container= $('#profile');
                if(!container.is(e.target) && container.has(e.target).length ===0){
                    container.fadeOut();
                }
            }); 

      $('#signuplabel').click(function(){
        //$(this).hide();
        //$('#logincard').hide();
      });
      $('#closebtn_sigin_up').click(function(){
        $('#loginsignuppromt').hide();
      });


      $('#mainlogin').click(function(){
        $('#loginsignuppromt').show();
        $('#signuplabel').show();
        $('#login_form').show();
        $('#profile').hide();
        $('#loginlabel').hide();
        $('#sigform').hide();
      });
      $('#mainsignup').click(function(){
        $('#loginsignuppromt').show();
        $('#loginlabel').show();
        $('#sigform').show();
        $('#profile').hide();
        $('#login_form').hide();
        $('#signuplabel').hide();   
      });
      $('#signuplabel').click(function(){
        $('#loginlabel').show();
        $(this).hide();
        $('#login_form').hide();
        $('#sigform').show();
      });
      $('#loginlabel').click(function(){
        $('#signuplabel').show();
        $('#login_form').show();
        $(this).hide();
        $('#sigform').hide();
      });
    });