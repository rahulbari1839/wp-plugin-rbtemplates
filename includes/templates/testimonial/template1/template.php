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

$rbt_temp_submit_btn_background_color = '#4787fd';
$rbt_temp_submit_btn_border_color = '#fff';
$rbt_temp_submit_btn_border_style = 'none';


$rbt_temp_shadow_horizontal_length = 0;
$rbt_temp_shadow_vertical_length = 0;
$rbt_temp_shadow_blur_radius = 18;
$rbt_temp_shadow_spread_radius = 4;
$rbt_temp_shadow_color =  '#999';




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


// default set variables
$template_type = 'testimonial';
$template_type_class = 'testimonial';
$template_heading_text = 'OUR CLIENTS';
$template_heading_text2 = 'What Client’s Say?';
$heading_error_text = 'After submit form show error/Success messages';


$drag_drop_delete_html  = rbt_drag_drop_delete_html();

 $html  =  '<div id="rbt_form_template_wrapper" class=" rbt_form_wrapper_template rbt_'.$template_type_class.'_template_wrapper rbt_'.$template_type_class.'_template_1">';
 $html .=  '<div class="rbt_template_wrapper_customizer_init rbt_'.$template_type_class.'_outer rbt_template_enable_drag_drop_outer">';




 $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element">'.$drag_drop_delete_html.'<div class="rbt_tiny_mce_editor " style="text-align: center;"><h1 >'.$template_heading_text.'</h1></div></div>';
  $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element">'.$drag_drop_delete_html.'<div class="rbt_tiny_mce_editor " style="text-align: center;"><h1 >'.$template_heading_text2.'</h1></div></div>';


  $html .=  '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element rbt_template_drag_drop_item_static rbt_template_drag_drop_item_dynamic_content_fontend ">';
  $html .=  '<div class="rbt_backend_hide">%%TESTIMONALIITESMHTML%%</div>';
  $html .=  $drag_drop_delete_html;
 $html .=  '<div class=" rbt_'.$template_type_class.'_img rbt_change_img_outer_rename rbt_img_resizeable_outer_rename  rbt_backend_show">';
 $html .= '<img class="rbt_change_img " src="'.plugin_dir_url(__FILE__).'/../../../../assets/images/testimonail_placeholder.png" width="100%">';
 //$html .= '<span class="rbt_change_img_icon rbt_frontend_hide" data-class="start_img"><i class="fa fa-camera" aria-hidden="true"></i></span>';
 $html .= '</div>';
 $html .= '</div>';

 $html .= '</div>';
 $html .= '</div>';
 
 


 
 
 
 



$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));
die;





;
