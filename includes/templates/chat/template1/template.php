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
$template_type = 'chat';
$template_type_class = 'chat';



$rbt_temp_send_msg_background_color  = "#9f9fa1";
$rbt_temp_received_msg_background_color = "#6a5fdf";


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
     'rbt_temp_send_msg_background_color' => $rbt_temp_send_msg_background_color,
     'rbt_temp_received_msg_background_color' => $rbt_temp_received_msg_background_color,
);

$placeholder = 'Type a msg here...';
$default_style_msg = 'what can I help you today?';

			$html  =  '<div id="rbt_form_template_wrapper" class=" rbt_form_wrapper_template rbt_'.$template_type_class.'_template_wrapper rbt_'.$template_type_class.'_template_1">';
			$html .=  '<div class="rbt_template_wrapper_customizer_init rbt-chat-contanier" >';
			
			//$html .= '<div class="chatbot-open-container"><span class="material-icons open-chat-button" style=""> <i class="fab fa-rocketchat"></i></span></div>';
			
			$html .= '
			<div class="chatbot-interface">		
			   <div class="rbt-chat-messages" >
				  <div class="rbt-chat-message chatbot-received-messages"><p>'.$default_style_msg.'</p></div>
				  <div class="rbt-chat-message chatbot-sent-messages rbt_display_none_fe"><p>Hello</p></div>  
			  </div>
				   
			   <div class="chatbot-footer">
					<textarea  placeholder="'.$placeholder.'" name="chatbot-input" class="chatbot-input rbt_field_change_placehoder"></textarea>
					<div class="icon signin_btn chatbot-new-message-send-button"><span><i class="fa-solid fa-paper-plane"></i></span></div>
			   </div>		  
			</div>
			';
	

	$html .= '</div>';
	$html .= '</div>';
 
 


 
 
 
 



$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));
die;





;
