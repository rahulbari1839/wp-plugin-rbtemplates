var rbt_ajax_error = "something Wrong !";
var rtb_image_base64_url = '';
jQuery('document').ready(function(){
	RBTHideLoader();
	jQuery('.rbt_frontend_outer_div').show();
	rbt_ajax_error = jQuery('input[name="rbt_ajax_error"').val();

	
	//call rb gallery view each template	
	if(jQuery('.rbt_frontend_outer_div').length != 0){
		jQuery('.rbt_frontend_outer_div').each(function(){
				// call gallery view
				new Viewer(document.getElementById(jQuery(this).attr('id')));
		});
	}
	//call rb slider template	
	if(jQuery('.rbt_slider_items_owl_carousel').length != 0){
			jQuery('.rbt_slider_items_owl_carousel').each(function(){
				rbtOwlCarousel(jQuery(this).attr('id'));
			});
	}
	//call rb gallery view template
	/*if(jQuery('.rbt_gallery_template_wrapper').length != 0){
		jQuery('.rbt_gallery_template_wrapper').each(function(){

			new Viewer(document.getElementById(jQuery(this).closest('.rbt_form_outer_gallery').attr('id')));
		});
		
	}*/

	// if template type is button click show
	jQuery('.rbt_temp_button_click_show').on('click',function(event){
		event.preventDefault();
		if(jQuery(this).closest('.rbt_frontend_outer_div').length == 1){
			
			if(jQuery(this).closest('.rbt_frontend_outer_div').find('#rbt_form_template_wrapper .rbt_template_wrapper_customizer_init  .rbt_close_template_popup').length == 0){
				console.log("----------------");
				var rbt_close_temp_popup_btn_selector = jQuery(this).closest('.rbt_frontend_outer_div').find('.rbt_close_template_popup_outer');
				var rbt_close_temp_popup_btn_html = rbt_close_temp_popup_btn_selector.html(); 
				rbt_close_temp_popup_btn_selector.html('');
				jQuery(this).closest('.rbt_frontend_outer_div').find('#rbt_form_template_wrapper .rbt_template_wrapper_customizer_init').prepend(rbt_close_temp_popup_btn_html);
			}

			jQuery(this).closest('.rbt_frontend_outer_div').addClass('rbt_frontend_show_popup').find('#rbt_form_template_wrapper').fadeIn();
			jQuery('body').addClass('rbt_frontend_show_popup_body');
		}
	});


	// template is display type popup 
		if(jQuery('.rbt_frontend_outer_div.tmplate_display_type_popup').length != 0){

			jQuery('.rbt_frontend_outer_div.tmplate_display_type_popup').each(function(){

				if(jQuery(this).closest('.rbt_frontend_outer_div').find('#rbt_form_template_wrapper .rbt_template_wrapper_customizer_init  .rbt_close_template_popup').length == 0){
					console.log("----------------");
					var rbt_close_temp_popup_btn_selector = jQuery(this).closest('.rbt_frontend_outer_div').find('.rbt_close_template_popup_outer');
					var rbt_close_temp_popup_btn_html = rbt_close_temp_popup_btn_selector.html(); 
					rbt_close_temp_popup_btn_selector.html('');
					jQuery(this).closest('.rbt_frontend_outer_div').find('#rbt_form_template_wrapper .rbt_template_wrapper_customizer_init').prepend(rbt_close_temp_popup_btn_html);
				}
			});	
				jQuery('body').addClass('rbt_frontend_show_popup_body');
		}

// close template popup show 
	jQuery(document).on('click','.rbt_frontend_show_popup .rbt_close_template_popup',function(event){
		event.preventDefault();
		if(jQuery(this).closest('.rbt_frontend_outer_div').length == 1){			
				jQuery(this).closest('.rbt_frontend_outer_div').removeClass('rbt_frontend_show_popup').find('#rbt_form_template_wrapper').hide('slow');
				jQuery('body').removeClass('rbt_frontend_show_popup_body');
		}
	});
});
