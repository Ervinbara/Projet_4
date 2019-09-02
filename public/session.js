$(document).ready(function() {
   jQuery(function($){
      var alert = $('#alert');
      if(alert.length>0){ //Si on à au moins une div qui à l'id alert dans la page
           alert.hide().slideDown(500);
           alert.find('.close').click(function(e){ //Au clique sur kla croix on fais disparaitre le message
            e.preventDefault();
            alert.slideUp();
           })
      }
   });
});