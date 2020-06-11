$(document).ready(function(){
    $('.login-show').fadeIn();
    $('.login-info-box').hide();
    $('.register-show').hide();

    $('#label-login').click(function(){
         $('.register-info-box').hide();
         $('.register-show').fadeIn();
         $('.login-show').hide();
         $('.white-panel').addClass('right-log');
         $('.login-info-box').show();         
    });
    $('#label-register').click(function(){
        $('.register-info-box').show();
        $('.white-panel').removeClass('right-log');
        $('.register-show').hide();
        $('.login-show').show();
        $('.login-info-box').hide();
         
         
    });
});