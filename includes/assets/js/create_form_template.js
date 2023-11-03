jQuery(document).ready(function(){
	rbt_tiny_mce_editor();
	rbt_add_temp_customizer_init();
	rbt_change_placehoder('rbt_field_change_placehoder');
	
	
	rbt_mediauploader_image(img_resizeable_call = 'Y');
	if (1 ||  jQuery.isFunction(jQuery.fn.rbt_img_resizeable) ) {
		rbt_img_resizeable();
	}
	
	if (1 ||  jQuery.isFunction(jQuery.fn.rbt_template_drag_drop_element_customizer_init) ) {
		rbt_template_drag_drop_element_customizer_init();
	}
	
	if (1 ||  jQuery.isFunction(jQuery.fn.rbt_template_drag_drop_element_customizer_level_2_init) ) {
		rbt_template_drag_drop_element_customizer_level_2_init();
	}
	if (1 ||  jQuery.isFunction(jQuery.fn.rbt_drag_drop_element_delete) ) {
		rbt_drag_drop_element_delete();
	}
	if (1 ||  jQuery.isFunction(jQuery.fn.rbtValidateTabs) ) {
		rbtValidateTabs(tab_class = 'rbt_tabs');
	}
});


function rbt_add_temp_customizer_init(){
	var rbt_template_customzier_outer_selector = '.template_html_outer';
	var rbt_template_customzier_selector = '.rbt_template_wrapper_customizer_init';
	
	// temp style 
	    if(jQuery('#rbt_temp_aligment').length != 0){
			jQuery('#rbt_temp_aligment').on('change',function() {
				jQuery(rbt_template_customzier_outer_selector).find('.rbt_form_wrapper_template').css('text-align',jQuery(this).val());
			});
		}
		
		if(jQuery('#rbt_temp_background_color').length != 0){
			jQuery('#rbt_temp_background_color,#rbt_temp_background_color_div').colorpicker().on('changeColor', function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('background-color', jQuery(this).colorpicker('getValue'));
			});
		}
		
		if(jQuery('#rbt_temp_wid').length != 0){
			jQuery('#rbt_temp_wid').bootstrapSlider().change(function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('max-width', +this.value + 'px');
			});
		}
	// temp border style
		if(jQuery('#rbt_temp_border_width').length != 0){
			jQuery('#rbt_temp_border_width').bootstrapSlider().change(function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('border-width', +this.value + 'px');
			});
		}
		
		if(jQuery('#rbt_temp_border_style').length != 0){
			jQuery('#rbt_temp_border_style').on('change',function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('border-style',jQuery(this).val());
			});
		}
		
		if(jQuery('#rbt_temp_border_color').length != 0){
			jQuery('#rbt_temp_border_color,#rbt_temp_border_color_div').colorpicker().on('changeColor', function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('border-color', jQuery(this).colorpicker('getValue'));
			});
		}
		
		if(jQuery('#rbt_temp_border_radius').length != 0){
			jQuery('#rbt_temp_border_radius').bootstrapSlider().change(function() {
				jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).css('border-radius', +this.value + 'px');
			});
		}
	
	//temp External Shadow Customizer
	if(jQuery('#rbt_temp_shadow_vertical_length').length != 0){
		jQuery('#rbt_temp_shadow_vertical_length').bootstrapSlider().change(function() {
			rbt_temp_form_boxShadow();
		});
	}
	if(jQuery('#rbt_temp_shadow_horizontal_length').length != 0){
		jQuery('#rbt_temp_shadow_horizontal_length').bootstrapSlider().change(function() {
			rbt_temp_form_boxShadow();
		});
	}
	
	if(jQuery('#rbt_temp_shadow_blur_radius').length != 0){
			jQuery('#rbt_temp_shadow_blur_radius').bootstrapSlider().change(function() {
			rbt_temp_form_boxShadow();
		});
	}
	
	if(jQuery('#rbt_temp_shadow_spread_radius').length != 0){
			jQuery('#rbt_temp_shadow_spread_radius').bootstrapSlider().change(function() {
			rbt_temp_form_boxShadow();
		});
	}
	
	if(jQuery('#rbt_temp_shadow_color').length != 0){
		jQuery('#rbt_temp_shadow_color,#rbt_temp_shadow_color_div').colorpicker().on('changeColor', function() {
			
			rbt_temp_form_boxShadow(jQuery(this).colorpicker('getValue'));
		});
	}
	// submit buttton style 
		var rbt_signin_btn_selector = '.signin_btn';
		if(jQuery('#rbt_temp_submit_btn_width').length != 0){
		jQuery('#rbt_temp_submit_btn_width').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('max-width', +this.value + 'px');
		});
	}
	if(jQuery('#rbt_temp_submit_btn_height').length != 0){	
		jQuery('#rbt_temp_submit_btn_height').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('line-height', +this.value + 'px');
		});
	}
	
	if(jQuery('#rbt_temp_submit_btn_border_width').length != 0){
		jQuery('#rbt_temp_submit_btn_border_width').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('border-width', +this.value + 'px');
		});
	}
	if(jQuery('#rbt_temp_submit_btn_radius').length != 0){
		jQuery('#rbt_temp_submit_btn_radius').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('border-radius', +this.value + 'px');
		});
	}
	if(jQuery('#rbt_temp_submit_btn_background_color').length != 0){
		jQuery('#rbt_temp_submit_btn_background_color,#rbt_temp_submit_btn_background_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('background-color', jQuery(this).colorpicker('getValue'));
		});
	}
	if(jQuery('#rbt_temp_submit_btn_border_color').length != 0){
		jQuery('#rbt_temp_submit_btn_border_color,#rbt_temp_submit_btn_border_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('border-color', jQuery(this).colorpicker('getValue'));
		});
	}
		
	if(jQuery('#rbt_temp_submit_btn_border_style').length != 0){
		jQuery('#rbt_temp_submit_btn_border_style').on('change',function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('border-style',jQuery(this).val());
		});
	}
		// error section   style 
		var rbt_error_div_info_selector = '.rbt_error_div_info';
	if(jQuery('#rbt_temp_error_width').length != 0){	
		jQuery('#rbt_temp_error_width').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('max-width', +this.value + 'px');
		});
	}
	
	if(jQuery('#rbt_temp_error_border_width').length != 0){
		jQuery('#rbt_temp_error_border_width').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_signin_btn_selector).css('border-width', +this.value + 'px');
		});
	}
	
	if(jQuery('#rbt_temp_error_border_radius').length != 0){
		jQuery('#rbt_temp_error_border_radius').bootstrapSlider().change(function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_error_div_info_selector).css('border-radius', +this.value + 'px');
		});
	}
	if(jQuery('#rbt_temp_error_background_color').length != 0){	
		jQuery('#rbt_temp_error_background_color,#rbt_temp_error_background_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_error_div_info_selector).css('background-color', jQuery(this).colorpicker('getValue'));
		});
	}
	if(jQuery('#rbt_temp_error_border_color').length != 0){
		jQuery('#rbt_temp_error_border_color,#rbt_temp_error_border_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_error_div_info_selector).css('border-color', jQuery(this).colorpicker('getValue'));
		});
	}
		
	if(jQuery('#rbt_temp_error_style').length != 0){	
		jQuery('#rbt_temp_error_style').on('change',function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_error_div_info_selector).css('border-style',jQuery(this).val());
		});
	}	
	
	
	// chatgtp plugin  style
	
	if(jQuery('#rbt_temp_send_msg_background_color').length != 0){
		jQuery('#rbt_temp_send_msg_background_color,#rbt_temp_send_msg_background_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).find('.chatbot-received-messages').css('background-color', jQuery(this).colorpicker('getValue'));
		});
	}
	
	if(jQuery('#rbt_temp_received_msg_background_color').length != 0){
		jQuery('#rbt_temp_received_msg_background_color,#rbt_temp_received_msg_background_color_div').colorpicker().on('changeColor', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).find('.chatbot-sent-messages').css('background-color', jQuery(this).colorpicker('getValue'));
		});
	}
	
	if(jQuery('#rbt_temp_chat_default_msg').length != 0){
		jQuery('#rbt_temp_chat_default_msg').on('keyup', function() {
			jQuery(rbt_template_customzier_outer_selector).find(rbt_template_customzier_selector).find('.chatbot-received-messages p').text(jQuery(this).val());
		});
	}
	
	

}


function rbt_temp_form_boxShadow(colorval = '') {
	
	var hor_lnth = parseFloat(jQuery('#rbt_temp_shadow_horizontal_length').val());
	var ver_lnth = parseFloat(jQuery('#rbt_temp_shadow_vertical_length').val());
	var blur_radius = parseFloat(jQuery('#rbt_temp_shadow_blur_radius').val());
	var sprd_radius = parseFloat(jQuery('#rbt_temp_shadow_spread_radius').val());
	var shad_clr = jQuery('#rbt_temp_shadow_color').val();
	hor_lnth = hor_lnth + 'px';
	ver_lnth = ver_lnth + 'px';
	blur_radius = blur_radius + 'px';
	sprd_radius = sprd_radius + 'px';
	var box_shadow = hor_lnth + ' ' + ver_lnth + ' ' + blur_radius + ' ' + sprd_radius + ' ' + shad_clr;
	var cs_customize_template_outer_Selector = '#rbt_form_template_wrapper .rbt_template_wrapper_customizer_init';
	jQuery(cs_customize_template_outer_Selector).css('-webkit-box-shadow', box_shadow);
	jQuery(cs_customize_template_outer_Selector).css('-moz-box-shadow', box_shadow);
	jQuery(cs_customize_template_outer_Selector).css('box-shadow', box_shadow);
}


function rbt_save_form_template(obj = null,current_tab_id = '',next_tab_id = ''){
	
	var current_obj = obj;
	var form_name = jQuery('#rbt_form_name').val();
	
	

	var validation_status = rbt_form_validation(form_id = 'rbt_tab_1', validation_show_type = '');
	if(validation_status){
		rbt_next_tab_show('rbt_tab_1');
		return false;
	}
	
	var selected_template_number = jQuery('ul.rbt_templates_list .rbt_selcted_temp').attr('data-temp');
	// remove customiser 
	if(jQuery('.rbt_element_customizer_wrapper_list').length != 0){
		rbt_remove_element_customizer();
	}
	var template_type = jQuery('#template_type').val();
	var display_type = jQuery('#rbt_temp_display_type').val();

	var temp_html = jQuery('.template_html_outer .template_html_wrapper').html();
	temp_html = rbt_remove_unused_html_content(temp_html);
	temp_html = rbtTinymceRemoveIds(temp_html);
	// for testimonail 
	if(template_type == 'testimonial'){
		if(jQuery('.rbt_testimonial_tab  li').length == 0){
			rbt_swal_message('','Add testimonial content','');
			return false;
		}
      	var temp_html3 = '';
        var testimonial_item_html = '';
		jQuery('.rbt_testimonial_tab  li').each(function(index){

			var testimonial_item_id = jQuery(this).attr('data-id');
			if(jQuery('.rbt_testimonial_section_content').find("#"+testimonial_item_id).length != 0){
				testimonial_item_html =  jQuery('.rbt_testimonial_section_content').find("#"+testimonial_item_id).html();
				
				testimonial_item_html = rbt_remove_unused_html_content(testimonial_item_html);
				testimonial_item_html = rbtTinymceRemoveIds(testimonial_item_html);
				if(index == 0){
					temp_html3 = testimonial_item_html;
				}else{
					temp_html3 = temp_html3+'|||'+testimonial_item_html;
				}
			}
		});

		temp_html = temp_html+'||||'+temp_html3;
	}
	//temp_html = btoa(temp_html);
	temp_html = btoa(unescape(encodeURIComponent(temp_html)));
	
	
	if( typeof display_type === 'undefined'){	
		display_type = '';
	}
	var temp_html2 = '';
	if(display_type == 'button_click'){
		var temp_html2 = jQuery('.template_button_html_outer  .template_button_html_inner').html();
		temp_html2 = rbt_remove_unused_html_content(temp_html2);
		temp_html2 = rbtTinymceRemoveIds(temp_html2);
		temp_html2 = btoa(temp_html2);
	}
	
	

	var customizer_values = '';
	customizer_values =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_2"),'','Y');
	customizer_values =  JSON.stringify(customizer_values);
	
	
	if(0){ //Comment this code because of not need more
			//Temp border section customizer
			var rbt_temp_aligment = jQuery('#rbt_temp_aligment').val();
			var rbt_temp_wid = jQuery('#rbt_temp_wid').val();
			var rbt_temp_background_color = jQuery('#rbt_temp_background_color').val();
			var customizer_value1 = rbt_temp_aligment+'||'+rbt_temp_wid+'||'+rbt_temp_background_color;
			//Temp border section customizer
			var rbt_temp_border_width = jQuery('#rbt_temp_border_width').val();
			var rbt_temp_border_style = jQuery('#rbt_temp_border_style').val();
			var rbt_temp_border_color = jQuery('#rbt_temp_border_color').val();
			var rbt_temp_border_radius = jQuery('#rbt_temp_border_radius').val();
			var customizer_value2 = rbt_temp_border_width+'||'+rbt_temp_border_style+'||'+rbt_temp_border_color+'||'+rbt_temp_border_radius;
			
			//Temp shadow section customizer
			var rbt_temp_shadow_color = jQuery('#rbt_temp_shadow_color').val();
			var rbt_temp_shadow_spread_radius = jQuery('#rbt_temp_shadow_spread_radius').val();
			var rbt_temp_shadow_blur_radius = jQuery('#rbt_temp_shadow_blur_radius').val();
			var rbt_temp_shadow_horizontal_length = jQuery('#rbt_temp_shadow_horizontal_length').val();
			var rbt_temp_shadow_vertical_length = jQuery('#rbt_temp_shadow_vertical_length').val();
			var customizer_value3 = rbt_temp_shadow_color+'||'+rbt_temp_shadow_spread_radius+'||'+rbt_temp_shadow_blur_radius+'||'+rbt_temp_shadow_horizontal_length+'||'+rbt_temp_shadow_vertical_length;
			//Temp submit button section customizer
			var rbt_temp_submit_btn_width = jQuery('#rbt_temp_submit_btn_width').val();
			var rbt_temp_submit_btn_height = jQuery('#rbt_temp_submit_btn_height').val();
			var rbt_temp_submit_btn_background_color = jQuery('#rbt_temp_submit_btn_background_color').val();
			var rbt_temp_submit_btn_border_width = jQuery('#rbt_temp_submit_btn_border_width').val();
			var rbt_temp_submit_btn_border_style = jQuery('#rbt_temp_submit_btn_border_style').val();
			var rbt_temp_submit_btn_border_color = jQuery('#rbt_temp_submit_btn_border_color').val();
			var rbt_temp_submit_btn_radius = jQuery('#rbt_temp_submit_btn_radius').val();
			var customizer_value4 = rbt_temp_submit_btn_width+'||'+rbt_temp_submit_btn_height+'||'+rbt_temp_submit_btn_background_color+'||'+rbt_temp_submit_btn_border_width+'||'+rbt_temp_submit_btn_border_style+'||'+rbt_temp_submit_btn_border_color+'||'+rbt_temp_submit_btn_radius;
			//error section customizer
			var rbt_temp_error_background_color = jQuery('#rbt_temp_error_background_color').val();
			var rbt_temp_error_width = jQuery('#rbt_temp_error_width').val();
			var rbt_temp_error_border_width = jQuery('#rbt_temp_error_border_width').val();
			var rbt_temp_error_style = jQuery('#rbt_temp_error_style').val();
			var rbt_temp_error_border_color = jQuery('#rbt_temp_error_border_color').val();
			var rbt_temp_error_border_radius = jQuery('#rbt_temp_error_border_radius').val();
			var customizer_value5 = rbt_temp_error_background_color+'||'+rbt_temp_error_width+'||'+rbt_temp_error_border_width+'||'+rbt_temp_error_style+'||'+rbt_temp_error_border_color+'||'+rbt_temp_error_border_radius;

			//template type click button show customizer
			var rbt_temp_click_button_values6 = '';
			if(display_type == 'button_click'){
				var rbt_temp_click_button_aligment = jQuery('input[name="rbt_temp_click_button_aligment"]').val();
				var rbt_temp_click_button_wid = jQuery('input[name="rbt_temp_click_button_wid"]').val();
				var rbt_temp_click_button_height = jQuery('input[name="rbt_temp_click_button_height"]').val();
				var rbt_temp_click_button_backgound_color = jQuery('input[name="rbt_temp_click_button_backgound_color"]').val();
				var rbt_temp_click_button_margin_top = jQuery('input[name="rbt_temp_click_button_margin_top"]').val();
				var rbt_temp_click_button_margin_bottom = jQuery('input[name="rbt_temp_click_button_margin_bottom"]').val();

				rbt_temp_click_button_values6 = rbt_temp_click_button_aligment+'||'+rbt_temp_click_button_wid+'||'+rbt_temp_click_button_height+'||'+rbt_temp_click_button_backgound_color+'||'+rbt_temp_click_button_margin_top+'||'+rbt_temp_click_button_margin_bottom;
			}
			
			var customizer_value7 = '';
			if(template_type == 'testimonial'){
				customizer_value7 = jQuery('#rbt_image_per_screen').val();
			}

			var customizer_values =  customizer_value1+'||||'+customizer_value2+'||||'+customizer_value3+'||||'+customizer_value4+'||||'+customizer_value5+'||||'+rbt_temp_click_button_values6+'||||'+customizer_value7;

	}// if
	var customizer_values_json = '';
	var temp_html3 = '';
	if(template_type == 'slider'){
		if(jQuery('.template_html_wrapper_backend_slider_items .slider_item').length != 0){

				var slider_item = '';
				jQuery('.template_html_wrapper_backend_slider_items .slider_item').each(function(slider_index){
					var slider_item_obj =  jQuery(this);
					var slider_item_img_id = slider_item_obj.find('.slider_item_img_id').val();
					var slider_item_heading_checked = slider_item_obj.find('.slider_item_heading_checked').val();
					if(slider_item_heading_checked != 'Y'){
						slider_item_heading_checked = 'N';
					}
					var slider_item_heading_text_html = slider_item_obj.find('.slider_item_heading_text_html').html();
					var slider_item_description_checked = slider_item_obj.find('.slider_item_description_checked').val();
					if(slider_item_description_checked != 'Y'){
						slider_item_description_checked = 'N';
					}
					var slider_item_description_text_html = slider_item_obj.find('.slider_item_description_text_html').html();
					
					
					// view button 
					var slider_item_view_btn_checked = slider_item_obj.find('.slider_item_view_button_checked').val();
					if(slider_item_view_btn_checked != 'Y'){
						slider_item_view_btn_checked = 'N';
					}
					var slider_item_view_btn_url = slider_item_obj.find('.slider_item_view_btn_url').val();
					if(slider_item_view_btn_url == ''){
						slider_item_view_btn_url = '#';
					}
					
					var slider_item_view_btn_html =  slider_item_obj.find('.slider_item_view_btn_html').html();
					

					slider_item = slider_item_img_id+'||||'+slider_item_heading_checked+'||||'+slider_item_heading_text_html+'||||'+slider_item_description_checked+'||||'+slider_item_description_text_html+'||||'+slider_item_view_btn_checked+'||||'+slider_item_view_btn_url+'||||'+slider_item_view_btn_html;
					
					if(slider_index == 0){
						temp_html3 = slider_item;
					}else{
						temp_html3 = temp_html3+'||||||'+slider_item;
					}

			});

	  }

		temp_html3 = rbt_remove_unused_html_content(temp_html3);
		temp_html3 = rbtTinymceRemoveIds(temp_html3);
		temp_html3 = btoa(temp_html3);
		
		
		
		customizer_values_json =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_1"),'','Y');
		customizer_values_json =  JSON.stringify(customizer_values_json);
	
	}
	
	var edit_id = jQuery('#rbt_form_edit_id').val();
	var email_template_id = '';
	if(jQuery('#email_template_id').length == 1){
		var email_template_id = jQuery('#email_template_id').val();
	}
	
	
	
 	var form_status =  jQuery("input[name='form_status']").prop('checked');
 	if(form_status){
 		form_status = 'Y';
 	}else{
 		form_status = 'N';
 	}
	
	console.log("++++  customizer_values +++");
	console.log(customizer_values);
	
	var form_data = {
				edit_id: edit_id,
				form_name : form_name,
				selected_template_number : selected_template_number,
				temp_html : temp_html,
				customizer_values : customizer_values,
				email_template_id : email_template_id,
				template_type : template_type,
				display_type : display_type,
				temp_html2 : temp_html2,
				temp_html3 : temp_html3,
				customizer_values_json : customizer_values_json,
				form_status : form_status,
			}	
	
	var button_text = jQuery(current_obj).text();
	jQuery(current_obj).text('Please Wait..');
	rbt_show_loader();
	jQuery.post(ajaxurl, {
	action: 'rbt_create_form_template_ajax',
	form_data: form_data,   
	}, function(response) {
		rbt_hide_loader();
		jQuery(current_obj).text(button_text);
		response = JSON.parse(response);
		if(response.error){
			rbt_swal_message('',response.error,'');
			return false;
		}
		
		if(response.success){
			
			if(next_tab_id != ''){
				rbt_next_tab_show(next_tab_id);
			}
			
			jQuery('.rbt_preview_shortcode_btn').show();

			jQuery('#rbt_form_edit_id').val(response.edit_id);
			if(response.shortcode_details){
				jQuery('.shortcode_details_div').html(response.shortcode_details);
			}
			
		}
	});
}




function rbt_show_hide_testimonial_add_screen(obj,show_hide_val = ''){
	if(show_hide_val == 'show'){
		jQuery('.rbt_add_testimonial_show_section').show();
		jQuery('.rbt_add_testimonial_hide_section').hide();
	}else if(show_hide_val == 'hide'){
		jQuery('.rbt_add_testimonial_show_section').hide();
		jQuery('.rbt_add_testimonial_hide_section').show();
	}

}

function rbtAddTestimonialButtonTrigger(obj){
	jQuery('.rbt_testimonial_section_outer').show();
	jQuery('.empty-item-section-outer').hide();
	rbt_add_testimonial_template();
}

function rbt_add_testimonial_template(){
	var rand_no = rbt_rand_date_time('testimonial');
    var testimonial_no = jQuery('.rbt_testimonial_tab li').length;
	var testimonial_no = testimonial_no+1; 

	// delete active class
	jQuery('.rbt_testimonial_section_outer').find('.rbt_testimonial_no_active').removeClass('rbt_testimonial_no_active');
	jQuery('.rbt_testimonial_section_outer').find('.rbt_testimonial_item_active').removeClass('rbt_testimonial_item_active');
	
	var li_html = '<li class="rbt_testimonial_no_active rbt_anchor_btn" data-id="'+rand_no+'" onclick="rbt_show_testimonial_item(this)"><span>Testimonial '+testimonial_no+'</span><div onclick="rbt_delete_testimonial_item(this)" class="rbt_delete_btn rbt_btn"><i class="fas fa fa-trash"></i></div></li>';
	
	var html = jQuery('.add_template_html').html();
	html = html.replace("%%RBTCURRENTDATETIME%%", rand_no);
	html = html.replace("%%RBTEXTRACLASS%%", 'rbt_testimonial_item_active');
	html = html.replace("rbt_tiny_mce_editor_rename", 'rbt_tiny_mce_editor');
	html = html.replace("rbt_tiny_mce_editor_rename", 'rbt_tiny_mce_editor');
	jQuery('.rbt_testimonial_tab').append(li_html);
	jQuery('.rbt_testimonial_section_content').append(html);

	rbt_template_drag_drop_element_customizer_init();
	rbt_img_resizeable();	
	rbt_tiny_mce_editor();
}

function rbt_show_testimonial_item(obj){
	console.log("++++++++rbt_show_testimonial_item ++++");
	if(jQuery(obj).hasClass('rbt_deleted')){
		return false;
	}
	jQuery('.rbt_testimonial_section_outer').find('.rbt_testimonial_no_active').removeClass('rbt_testimonial_no_active');
	jQuery('.rbt_testimonial_section_outer').find('.rbt_testimonial_item_active').removeClass('rbt_testimonial_item_active');

	var item_id = jQuery(obj).attr('data-id');
	jQuery(obj).addClass('rbt_testimonial_no_active');
	jQuery('.rbt_testimonial_section_content').find('#'+item_id).addClass('rbt_testimonial_item_active');
	rbt_template_drag_drop_element_customizer_init();
	rbt_img_resizeable();
}

function rbt_delete_testimonial_item(obj){
	console.log("++++++++ rbt_delete_testimonial_item ++++");


	var current_obj = obj;
		
		swal({
		title: "Are you sure you want to delete ?",
		text: "You cannot recover the settings.",
		//type: "warning",
		showCancelButton: true,
		showCloseButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, Delete!",
		customClass: 'rbt_sweet_alert',
		
		}).then((isConfirm) => {
			console.log("isConfirm");
			console.log(isConfirm);
			if (isConfirm.value) {
				var item_delete_id = jQuery(current_obj).closest('li').addClass('rbt_deleted').attr('data-id');
				jQuery(current_obj).closest('li').remove();
				jQuery('.rbt_testimonial_section_content').find('#'+item_delete_id).remove();

				//shwo empty screen
				if(jQuery('.rbt_testimonial_tab li').length == 0){
					jQuery('.rbt_testimonial_section_outer').show();
					jQuery('.empty-item-section-outer').show();
				}else{
					jQuery('.rbt_testimonial_tab li:first').trigger('click');
				}
			    rbt_reorder_tab(outer_class = 'rbt_testimonial_tab', each_class = 'rbt_anchor_btn', pre_text="Testimonial",find_tag = 'span');

			}
		});
	}

function rbt_reorder_tab(outer_class = '', each_class, pre_text,find_tag){
	console.log("rbt_reorder_tab call");
	if(jQuery('.'+outer_class).length == 1){
		console.log("rbt_reorder_tab call 2");
		jQuery('.'+outer_class).find('.'+each_class).each(function(index){
			console.log("rbt_reorder_tab call 3==="+jQuery(this).find(find_tag).text());
			jQuery(this).find(find_tag).text(pre_text+' '+(index+1));
		});
	}

}
