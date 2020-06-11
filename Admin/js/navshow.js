$(document).ready(function(){
	$('#navbutton').click(function(){
            $('#mobile').show();
        });
         $(document).mouseup(function(e){
                var container= $('#mobile');
                if(!container.is(e.target) && container.has(e.target).length ===0){
                    container.fadeOut();
                }
            }); 

         $('.js-sub-list').hover(function(){
         	alert();
         });
});