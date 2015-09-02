
                
// Preare the variable that holds our custom media manager.
var liywidget_media_frame;
var clicked_element; 
        
// Bind to our click event in order to open up the new media experience.
jQuery(document).ready(function(){
    jQuery('.add-image-button').live('click',function(e){
                e.preventDefault();
		clicked_element=jQuery(this);
		if ( liywidget_media_frame ) {
		     liywidget_media_frame.open();
		return;
		}
		liywidget_media_frame = wp.media.frames.liywidget_media_frame = wp.media({
			className: 'media-frame liywidget-frame',
			frame: 'select',
			multiple: false,
			title: 'title',
			library: {
			    type: 'image'
			},
			button: {
			    text:  'Add'
			}
		});
    
            liywidget_media_frame.on('select', function(){
                var media_attachment, img_url, media_attachments;
                // Grab our attachment selection and construct a JSON representation of the model.
                media_attachment = liywidget_media_frame.state().get('selection').first().toJSON();
                img_url = media_attachment.url;
		clicked_element.html('<img src="'+img_url+'" />');
               	clicked_element.parent().next().find('input[type=hidden]').val(media_attachment.id);
            });
	    
             liywidget_media_frame.open();
    });
           
});
