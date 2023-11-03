jQuery(document).ready(function(){

	rbt_slider_template_sortable_element_customizer_init();
});

function rbtAddSliderButtonTrigger(obj = ''){
	jQuery('.slider_item_edit_active').removeClass('slider_item_edit_active');
	var send_data = {'type':'load_add_slider_form_html','action':'load_add_slider_form_html'};
	var response = rbt_call_ajax_data(obj, send_data);
	if(response.success){
		body_html = response.html;
		rbt_show_modal('<h1>Select Slider Options</h1>', body_html);
		rbt_tiny_mce_editor();
	}
}

function rbtAddSliderSection(obj = ''){

	
	var parent_selector = jQuery(obj).closest('.rbt_modal_outer');
	var form_id = parent_selector.attr('id');
	var validation_status_tab = rbt_form_validation(form_id);
	if(validation_status_tab){
		not_has_error = false;
		return false;
	}

	var heading_checked = parent_selector.find('input[name="slider_heading_y"]').prop('checked');
	var heading_text_html =  parent_selector.find('.slider_heading_html').html();
	if(heading_checked){
			heading_checked = 'Y';
	}else{
			heading_checked = 'N';
	}

	var description_checked = parent_selector.find('input[name="slider_description_y"]').prop('checked');
	var description_text_html =  parent_selector.find('.slider_description_html').html();
	if(description_checked){
			description_checked = 'Y';
	}else{
			description_checked = 'N';
	}
	heading_text_html = rbt_remove_unused_html_content(heading_text_html);
	heading_text_html = rbtTinymceRemoveIds(heading_text_html);
	
	// view button 
	var slider_view_btn_checked = parent_selector.find('input[name="slider_view_btn"]').prop('checked');
	var slider_view_btn_url = parent_selector.find('input[name="slider_view_btn_url"]').val();
	var slider_view_btn_html =  parent_selector.find('.slider_view_btn_html_text').html();
	if(slider_view_btn_checked){
			slider_view_btn_checked = 'Y';
	}else{
			slider_view_btn_checked = 'N';
	}


	description_text_html = rbt_remove_unused_html_content(description_text_html);
	description_text_html = rbtTinymceRemoveIds(description_text_html);
	slider_view_btn_html = rbtTinymceRemoveIds(slider_view_btn_html);
	

	var slider_img_id = parent_selector.find('input[name="slider_img_id"]').val();
	var slider_img_url = parent_selector.find('.add_slider_img_preview_html img').attr('src');
	
	var send_data = {'type':'load_slider_item_html','action':'load_slider_item_html','slider_img_url':slider_img_url
, 'slider_img_id':slider_img_id,'heading_checked':heading_checked,'heading_text_html':heading_text_html,'description_checked':description_checked,'description_text_html':description_text_html,'slider_view_btn_url':slider_view_btn_url,'slider_view_btn_checked':slider_view_btn_checked,'slider_view_btn_html':slider_view_btn_html};
	var response = rbt_call_ajax_data(obj, send_data);
	var slider_items_wrapper = jQuery('.template_html_wrapper_backend_slider_items');
	if(response.success){
		
		if(slider_items_wrapper.find('.slider_item_edit_active').length == 1){
				slider_items_wrapper.find('.slider_item_edit_active').after(response.html);
				slider_items_wrapper.find('.slider_item_edit_active').remove();
		}else{
				slider_items_wrapper.append(response.html);
		}

		rbt_hide_modal();
	}
	// call ajax 

}


function rbtSliderEditItem(obj = ''){
  jQuery('.slider_item_edit_active').removeClass('slider_item_edit_active');
	var parent_obj = jQuery(obj).closest('.slider_item');
	parent_obj.addClass('slider_item_edit_active')
	var slider_item_img_id = parent_obj.find('.slider_item_img_id').val();
	var slider_item_heading_checked = parent_obj.find('.slider_item_heading_checked').val();
	

	var slider_item_heading_text_html = parent_obj.find('.slider_item_heading_text_html').html();
	var slider_item_description_checked = parent_obj.find('.slider_item_description_checked').val();
	var slider_item_description_text_html = parent_obj.find('.slider_item_description_text_html').html();
	var slider_item_img_src = parent_obj.find('.slider_item_img_src').attr('src');
	
	
	// view button 
	var slider_view_btn_checked = parent_obj.find('.slider_item_view_button_checked').val();
	var slider_view_btn_url = parent_obj.find('.slider_item_view_btn_url').val();
	var slider_view_btn_html =  parent_obj.find('.slider_item_view_btn_html').html();
	/*if(slider_view_btn_checked ){
			slider_view_btn_checked = 'Y';
	}else{
			slider_view_btn_checked = 'N';
	}*/
	
	

	

	var send_data = {'type':'load_add_slider_form_html','action':'load_add_slider_form_html','slider_item_img_id':slider_item_img_id,'slider_item_heading_checked':slider_item_heading_checked,'slider_item_heading_text_html':slider_item_heading_text_html,	'slider_item_description_checked':slider_item_description_checked,'slider_item_description_text_html':slider_item_description_text_html,'slider_item_img_src':slider_item_img_src,'slider_view_btn_url':slider_view_btn_url,'slider_view_btn_checked':slider_view_btn_checked,'slider_view_btn_html':slider_view_btn_html};
	var response = rbt_call_ajax_data(obj, send_data);
	if(response.success){
		body_html = response.html;
		body_html = rbtTinymceRemoveIds(body_html);
	//	body_html = body_html.stripSlashes();
		rbt_show_modal('<h1>Select Slider Options<h1>', body_html);

		rbt_tiny_mce_editor();
	}

}

function rbtSliderDeleteItem(obj = ''){
		var current_obj = obj;
		swal({
			title: "Are you sure you want to delete ?",
			text: "You cannot recover the settings.",
			//type: "warning",
			showCancelButton: true,
			showCloseButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, Delete!",
			customClass: 'rbt_swal_custom_class',
			
		}).then((result) => {
			if (result.value) {		
				jQuery(current_obj).closest('.slider_item').remove();
		
			}
		});
			
}

function rbtSaveSliderSortcode_rename(obj = null,current_tab_id = '',next_tab_id = ''){
	
	var current_obj = obj;
	var form_name = jQuery('#rbt_form_name').val();
	var validation_status = rbt_form_validation(form_id = 'rbt_tab_1', validation_show_type = '');
	if(validation_status){
		rbt_next_tab_show('rbt_tab_1');
		return false;
	}
	var display_type = jQuery('#rbt_temp_display_type').val();
	var selected_template_number = jQuery('ul.rbt_templates_list .rbt_selcted_temp').attr('data-temp');
	var temp_html3 = '';
	if(jQuery('.template_html_wrapper_backend_slider_items .slider_item').length != 0){

			slider_item = '';
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
					slider_item_view_btn_url = '-';
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


	var img_size = jQuery('#rbt_temp_img_size').val();
	var arrow_color = jQuery('#rbt_form_arrow_color').val();
	var arrow_type = jQuery('#rbt_temp_arrow_type').val();
	var arrow_display_position = jQuery('#rbt_temp_arrow_display_position').val();
	var auto_slide = jQuery('#form_auto_slide').prop('checked');
	var hide_bottom_nav = jQuery('#form_hide_bottom_nav').prop('checked');

	if(auto_slide){
		auto_slide = 'Y';
	}else{
		auto_slide = 'N';
	}
	
	if(hide_bottom_nav){
		hide_bottom_nav = 'Y';
	}else{
		hide_bottom_nav = 'N';
	}

	var image_per_screen = jQuery('#rbt_image_per_screen').val();
	var customizer_values = '';
	customizer_values = image_per_screen+'||||'+auto_slide+'||||'+arrow_color+'||||'+arrow_type+'||||'+img_size+'||||'+hide_bottom_nav+'||||'+arrow_display_position;


	var edit_id = jQuery('#rbt_form_edit_id').val();
	
	var email_template_id = '';
	if(jQuery('#email_template_id').length == 1){
		var email_template_id = jQuery('#email_template_id').val();
	}
	var template_type = jQuery('#template_type').val();
	var form_status =  jQuery("input[name='form_status']").prop('checked');
 	if(form_status){
 		form_status = 'Y';
 	}else{
 		form_status = 'N';
 	}
 	
 	var temp_html2 = '';
 	if(display_type == 'button_click'){
		var temp_html2 = jQuery('.template_button_html_outer  .template_button_html_inner').html();
		temp_html2 = rbt_remove_unused_html_content(temp_html2);
		temp_html2 = rbtTinymceRemoveIds(temp_html2);
		temp_html2 = btoa(temp_html2);
	}
	var temp_html = jQuery('.template_html_outer .template_html_wrapper').html();
	temp_html = rbt_remove_unused_html_content(temp_html);
	temp_html = rbtTinymceRemoveIds(temp_html);
	temp_html = btoa(unescape(encodeURIComponent(temp_html)));
	var form_data = {
				edit_id: edit_id,
				form_name : form_name,
				selected_template_number : selected_template_number,
				temp_html : temp_html,
				temp_html3 : temp_html3,
				temp_html2 : temp_html2,
				customizer_values : customizer_values,
				email_template_id : email_template_id,
				template_type : template_type,
				form_status : form_status,
				display_type : display_type,
			}	
	
	var button_text = jQuery(current_obj).text();
	jQuery(current_obj).text('Please Wait..');
	rbt_show_loader();
	jQuery.post(ajaxurl, {
	action: 'rbt_create_form_template_ajax',
	form_data: form_data,   
	}, function(response) {
		rbt_hide_loader();
		response = JSON.parse(response);
		if(response.error){
			rbt_swal_message('',response.error,'');
			return false;
		}
		
		if(response.success){
			jQuery(current_obj).text(button_text);
			if(next_tab_id != ''){
				rbt_next_tab_show(next_tab_id);
			}
			jQuery('#rbt_form_edit_id').val(response.edit_id);
			if(response.shortcode_details){
				jQuery('.shortcode_details_div').html(response.shortcode_details);
			}
			
		}
	});
}



// for contact form
function rbt_slider_template_sortable_element_customizer_init(){

	console.log("-- rbt_slider_template_sortable_element_customizer_init --");
	
	var rbt_template_enable_sortable = "template_html_wrapper_backend";
	var rbt_template_enable_sortable_item = "slider_item";
	jQuery( "."+rbt_template_enable_sortable).sortable({
				connectWith: "."+rbt_template_enable_sortable_item,
				//opacity: 0.5,
				cursor: "move",
				disabled: false,
				cancel: ".rbt_template_disable_sortable_outer ",
				classes: {"ui-state-default": rbt_template_enable_sortable_item },
				placeholder: "element_drop_here",
                start: function (event, ui) {
					jQuery('.element_drop_here').text('Drop Element Here');
                     
                },stop: function(event, ui){
						
				},
				update: function () {
					
				}
						
	});
	
}

