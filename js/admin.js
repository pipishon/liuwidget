
                
        // Prepare the variable that holds our custom media manager.
        var liywidget_media_frame;
        
        
        // Bind to our click event in order to open up the new media experience.
        jQuery(document).ready(function(){
           // jQuery('.liywidget-frame-show').hide();
            jQuery('.liywidget-frame-show').click(function(e){
                e.preventDefault();
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
                jQuery('.liywidget-frame-show').after('<img id = "'+media_attachment.id+'" class="liywidget-img" src = "' + img_url + '" height="100px">');
                //alert(media_attachment.id);

                jQuery('.img-ids').val(media_attachment.id);        
                });
             liywidget_media_frame.open();
            });
           
        });
        //$(document.body).on('click', , function(e){
            // Prevent the default action from occuring.
           // e.preventDefault();
            
            
            
            /*
            // If the frame already exists, re-open it.
           
    
            // Now that everything has been set, let's open up the frame.
            liywidget_media_frame.open();*/
       // });
