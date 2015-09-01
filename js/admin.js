
                
        // Prepare the variable that holds our custom media manager.
        var liywidget_media_frame;
       var clicked_element; 
        
        // Bind to our click event in order to open up the new media experience.
        jQuery(document).ready(function(){
           // jQuery('.liywidget-frame-show').hide();
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
//                jQuery('.liywidget-frame-show').after('<img id = "'+media_attachment.id+'" class="liywidget-img" src = "' + img_url + '" height="100px">');
                //alert(media_attachment.id);

               	clicked_element.parent().next().find('input[type=hidden]').val(media_attachment.id);
		    //               jQuery('.img-ids').val(media_attachment.id);        
                });
             liywidget_media_frame.open();
            });
           
/*	jQuery('#liuwidget-table tr').each(function(){
		if (jQuery(this).find('input[type=hidden]').val()!=''){
			jQuery(this).find('a').html('<img src="'+wp_get_attachment_image_src(jQuery(this).find('input [type=hidden]').val())+'" />'); 
	
		}
			//parent().find('a').html('<img src="'+wp_get_attachment_image_src(jQuery(this).find('input [type=hidden]').val())+'" />'); 
		 
		});*/
        });
        //$(document.body).on('click', , function(e){
            // Prevent the default action from occuring.
           // e.preventDefault();
            
            
            
            /*
            // If the frame already exists, re-open it.
           
    
            // Now that everything has been set, let's open up the frame.
            liywidget_media_frame.open();*/
       // });
