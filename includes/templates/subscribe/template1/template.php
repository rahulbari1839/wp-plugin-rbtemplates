<?php 
$rbt_temp_aligment = 'center';
$rbt_temp_wid = 573;
$rbt_temp_border_width = 0;
$rbt_temp_border_radius = 0;
$rbt_temp_border_color = '#fff';
$rbt_temp_background_color = '#fff';
$rbt_temp_border_style = 'none';
$rbt_temp_img_show = 'yes';
//$rbt_contact_image_height = 258;
$rbt_temp_captcha = 'no';




$rbt_temp_error_width = 352;
$rbt_temp_error_border_width = 0; 
$rbt_temp_error_border_radius = 0;
$rbt_temp_error_background_color = '#f05b41';

$rbt_temp_error_border_color = '#fff';
$rbt_temp_error_style = 'none';



$rbt_temp_submit_btn_width = 352;
$rbt_temp_submit_btn_height = 48;
$rbt_temp_submit_btn_border_width = 0;
$rbt_temp_submit_btn_radius = 3;

$rbt_temp_submit_btn_background_color = '#ed3851';
$rbt_temp_submit_btn_border_color = '#fff';
$rbt_temp_submit_btn_border_style = 'none';


$rbt_temp_shadow_horizontal_length = 0;
$rbt_temp_shadow_vertical_length = 0;
$rbt_temp_shadow_blur_radius = 18;
$rbt_temp_shadow_spread_radius = 4;
$rbt_temp_shadow_color =  '#999';


// default set variables
$template_type = 'subscribe';
$template_type_class = 'subscribe';
$template_heading_text = 'Subscribe to the newsletter';
$heading_error_text = 'After submit form show error/Success messages';


// ===================



$default_numaric_values = array(	
   
  
	'rbt_temp_wid' => $rbt_temp_wid,
	'rbt_temp_border_width' => $rbt_temp_border_width,
	'rbt_temp_border_radius' => $rbt_temp_border_radius,
	'rbt_temp_error_width' => $rbt_temp_error_width,
	'rbt_temp_error_border_width' => $rbt_temp_error_border_width,
	'rbt_temp_error_border_radius' => $rbt_temp_error_border_radius,
	'rbt_temp_submit_btn_width' => $rbt_temp_submit_btn_width,
	'rbt_temp_submit_btn_height' => $rbt_temp_submit_btn_height,
	'rbt_temp_submit_btn_border_width' => $rbt_temp_submit_btn_border_width,
	'rbt_temp_submit_btn_radius' => $rbt_temp_submit_btn_radius,
	//'rbt_contact_image_height' => $rbt_contact_image_height,
	'rbt_temp_shadow_horizontal_length' => $rbt_temp_shadow_horizontal_length,
	'rbt_temp_shadow_vertical_length' => $rbt_temp_shadow_vertical_length,
	'rbt_temp_shadow_blur_radius' => $rbt_temp_shadow_blur_radius,
	'rbt_temp_shadow_spread_radius' => $rbt_temp_shadow_spread_radius,
);


$default_style_values = array(	
	
	
	'rbt_temp_border_style' => $rbt_temp_border_style,
	'rbt_temp_img_show' => $rbt_temp_img_show,
	
	'rbt_temp_error_style' => $rbt_temp_error_style,
	'rbt_temp_submit_btn_border_style' => $rbt_temp_submit_btn_border_style,
	'rbt_temp_captcha' => $rbt_temp_captcha,
	'rbt_temp_aligment' => $rbt_temp_aligment
);

$default_colorpicker_values = array(
	
	 'rbt_temp_border_color' => $rbt_temp_border_color,
	
	
	 'rbt_temp_background_color' => $rbt_temp_background_color,
	 'rbt_temp_error_background_color' => $rbt_temp_error_background_color,
     'rbt_temp_error_border_color' => $rbt_temp_error_border_color,
     'rbt_temp_submit_btn_background_color' => $rbt_temp_submit_btn_background_color,
     'rbt_temp_submit_btn_border_color' => $rbt_temp_submit_btn_border_color,
     'rbt_temp_shadow_color' => $rbt_temp_shadow_color,
);


$drag_drop_delete_html  = rbt_drag_drop_delete_html();

$template_no = 1;

 $html  =  '<div id="rbt_form_template_wrapper" class=" rbt_form_wrapper_template rbt_'.$template_type_class.'_template_wrapper rbt_'.$template_type_class.'_template_'.$template_no.'">';

 $html .=  '<div class="rbt_template_wrapper_customizer_init rbt_'.$template_type_class.'_outer rbt_template_enable_drag_drop_outer">';

  $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element">'.$drag_drop_delete_html.'<div class="rbt_tiny_mce_editor " style="text-align: center;"><h1 >'.$template_heading_text.'</h1></div></div>';
 $html .= '<div class="rbt_temp_field rbt_template_drag_drop_item_section ui_helper_my_custom_element">';
 
 $html .= $drag_drop_delete_html;


 $html .= '<form id="rbt_temp_form" class="rbt_form_frontend  rbt_login_form rbt_template_enable_drag_drop_outer_level_2" >';

 $html .= '<div class="error_message_div" ><div class="rbt_tiny_mce_editor_rename additional_info rbt_error_div_info"><p class="">'.$heading_error_text.'</p></div></div>';
  
 $html .= '<div class="form-group rbt_template_drag_drop_item_section_level_2 rbt_field_wrapper">';
 $html .= '<label class="rbt_tiny_mce_editor">Email address</label>';
 $html .= '<input type="email" name = "email" class="form-control rbt_field_change_placehoder rbt_field ||||email_class|||| " data-error-msg="||||error_email_msg||||"  placeholder="Enter email address" name="email" >';

 $html .= '<div class="rbt_field_error_msg_html "></div>';
 $html .= '</div>';


 $html .= '<div class="signin_btn_outer rbt_tiny_mce_editor rbt_template_drag_drop_item_section_level_2"><span  class="btn btn-primary  signin_btn  rbt_temp_form_submit_btn">Subscribe</span></div>';

 $html .= '</form>';
 $html .= '</div>';
 $html .= '</div>';
 $html .= '</div>';
 
 


 
 
 
 



$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));
die;





;
