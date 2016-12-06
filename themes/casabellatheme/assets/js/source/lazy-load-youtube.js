/*
 * Este plugin permite cargar los videos de youtube 
 * de una forma especial haciendo la carga de web
 * más rápida
 */
'use strict';

var j = jQuery.noConflict();

(function($){

    j(".video-youtube").each(function() {

        // Based on the YouTube ID, we can easily find the thumbnail image
        j(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');
    
        // Overlay the Play icon to make it look like a video player
        j(this).append( j('<div/>', {'class': 'play'}) );
    
        j(document).delegate('#'+this.id, 'click', function() {
            // Create an iFrame with autoplay set to true
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";

            if (j(this).data('params')) iframe_url+='&'+j(this).data('params');
    
            // The height and width of the iFrame should be the same as parent
            var iframe = j('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': j(this).width(), 'height': j(this).height() , 'allowfullscreen' : true })
    
            // Replace the YouTube thumbnail with YouTube HTML5 Player
            j(this).replaceWith(iframe);
        });
	});

	/* Fin del Documento */


})(jQuery);