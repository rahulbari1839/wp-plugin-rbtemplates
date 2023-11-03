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
$template_type = 'slider';
$template_type_class = 'slider';

$delete_html  = rbt_drag_drop_delete_html();

$template_no = 2;

 $html  =  '<div id="rbt_form_template_wrapper" class=" rbt_form_wrapper_template rbt_'.$template_type_class.'_template_wrapper rbt_'.$template_type_class.'_template_'.$template_no.'">';
 $html .=  '<div class="rbt_template_wrapper_customizer_init rbt_'.$template_type_class.'_outer ">';
 $html .= '<div class="rbt_slider_item_owl_carousel">';
 $html .= '<div class="rbt_slider_item item"  id="rbt_slider_item_%%SLIDERDYNMICNO%%">';
 $html .= '<div class="rbt_slider_item_img">';


 $html .= '<div class="rbt_slider_item_info rbt_template_enable_drag_drop_outer">';

 $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element  %%SLIDERHEADINGDISPLAY%% rbt_drag_btn_delete_hide" >';
 $html .=  $delete_html;
 $html .= '<div class="rbt_slider_item_heading rbt_tiny_mce_editor_rename "><span class="rbt_point_event_none_btn">%%HEADING%%</span></div>';
 $html .= '</div>';

 $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element  %%SLIDERDESCRIPTIONDISPLAY%%  rbt_drag_btn_delete_hide">'; 
 $html .=  $delete_html;
 $html .= '<div class="rbt_slider_item_description rbt_tiny_mce_editor_rename"><span class="rbt_point_event_none_btn">%%DESCRIPTION%%</span></div>';
 $html .= '</div>';

 $html .= '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element %%SLIDERBUTTONDISPLAY%% rbt_drag_btn_delete_hide">';
 $html .=  $delete_html;
 $html .= '<div class="rbt_slider_item_view_btn signin_btn rbt_tiny_mce_editor_rename"><span class="rbt_point_event_none_btn"><a href="%%BUTTONLINK%%">%%BUTTONTEXT%%</a></span></div>';
 $html .= '</div>';

 $html .= '</div>';

 $html .= '</div>';

 $html .= '<div class="rbt_slider_img-outer">';
 $html .= '<img class=" rbt_display_none_fe " src="'.plugin_dir_url(__FILE__).'images/preview.jpg?8989" width="100%">';
 $html .= '<img src="%%SLIDERIMAGEURL%%"  class="rbt_display_none rbt_display_block_fe" width="100%">';
 $html .= '</div>';

 $html .= '</div>';
 $html .= '</div>';
 $html .= '</div>';
 $html .= '</div>';
 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));
die;
