<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$rbtqoptin_temp_wid = 500;
$rbtqoptin_temp_aligment = 'center';
$rbtqoptin_temp_border_wid = 1;
$rbtqoptin_temp_border_radius = 1;
$rbtqoptin_temp_border_style = 'solid';
$rbtqoptin_temp_border_color  = '#2111e3';

$rbtqoptin_temp_btn_wid = 300;
$rbtqoptin_temp_btn_height = 50;
$rbtqoptin_temp_background_color  = '#fff';
$rbtqoptin_temp_btn_background_color  = '#2111e3';


$rbtqoptin_temp_btn_border_style = 'solid';
$rbtqoptin_temp_btn_border_wid = 1;
$rbtqoptin_temp_btn_border_radius = 1;
$rbtqoptin_temp_btn_border_color = '#2111e3';


// optin temp shadow property
$rbtqoptin_temp_shadow_color = '#fff';
$rbtqoptin_temp_shadow_spread_radius = 0;
$rbtqoptin_temp_shadow_blur_radius = 0;
$rbtqoptin_temp_shadow_horizontal_length = 0;
$rbtqoptin_temp_shadow_vertical_length = 0;

$default_numaric_values = [
			'rbtqoptin_temp_wid' => $rbtqoptin_temp_wid,
			'rbtqoptin_temp_btn_wid' => $rbtqoptin_temp_btn_wid,
			'rbtqoptin_temp_btn_height' => $rbtqoptin_temp_btn_height,
			'rbtqoptin_temp_border_wid' => $rbtqoptin_temp_border_wid,
			'rbtqoptin_temp_border_radius' => $rbtqoptin_temp_border_radius,
			'rbtqoptin_temp_btn_border_wid' => $rbtqoptin_temp_btn_border_wid,
			'rbtqoptin_temp_btn_border_radius' => $rbtqoptin_temp_btn_border_radius,
			'rbtqoptin_temp_shadow_spread_radius' => $rbtqoptin_temp_shadow_spread_radius,
			'rbtqoptin_temp_shadow_blur_radius' => $rbtqoptin_temp_shadow_blur_radius,
			'rbtqoptin_temp_shadow_horizontal_length' => $rbtqoptin_temp_shadow_horizontal_length,
			'rbtqoptin_temp_shadow_vertical_length' => $rbtqoptin_temp_shadow_vertical_length,
	
	];


$default_style_values = [
			'rbtqoptin_temp_aligment'=>$rbtqoptin_temp_aligment,
			'rbtqoptin_temp_border_style' => $rbtqoptin_temp_border_style,
			'rbtqoptin_temp_btn_border_style' => $rbtqoptin_temp_btn_border_style,
];


$default_colorpicker_values = [
			'rbtqoptin_temp_background_color'=> $rbtqoptin_temp_background_color, 
			'rbtqoptin_temp_btn_background_color' => $rbtqoptin_temp_btn_background_color,
			'rbtqoptin_temp_border_color' => $rbtqoptin_temp_border_color,
			'rbtqoptin_temp_btn_border_color' => $rbtqoptin_temp_btn_border_color,
			'rbtqoptin_temp_shadow_color' => $rbtqoptin_temp_shadow_color,
];


$drag_section_action_btn_html  = rbt_drag_drop_delete_html();

$html = '<div class="rbtq_template_wrapper rbtqoptin_template_wrapper">
			<div class="rbtq_optin_template rbtq_template rbtq_optin_template1  rbt_template_wrapper_customizer_init rbt_template_enable_drag_drop_outer">
				<div class="skip_optin  rbt_template_drag_drop_item_section ui_helper_my_custom_element" style="display:none;">'.$drag_section_action_btn_html.'<div style=" text-align: right;"  class="rbt_tiny_mce_editor"><div>Skip Opt-in</div></div></div>
				<div class="rbtq-Template-title  rbt_template_drag_drop_item_section ui_helper_my_custom_element">'.$drag_section_action_btn_html.'<div class="rbt_tiny_mce_editor"><div>Almost there...</div></div></div>
				<div class=" rbtq-Template-sub-title rbt_template_drag_drop_item_section ui_helper_my_custom_element" >'.$drag_section_action_btn_html.'
					<div class="rbt_tiny_mce_editor"><div>Where can we email you the results? Please enter details below.</div></div>
				</div>
				<div class="rbtq-Template-content rbt_template_drag_drop_item_section ui_helper_my_custom_element"> 
				'.$drag_section_action_btn_html.'	
					<form id="rbtq_signup_form" class="rbtq_signup_form" name="rbtq_signup_form rbt_template_enable_drag_drop_outer_level_2" method="post" action="%%FORM_ACTION%%">
						<div class="rbtq_cls">
							<div class="rbt_field_wrapper rbt_template_drag_drop_item_section_level_2">
								<input type="text" class="rbt_field_required rbt_field_change_placehoder rbt_field" data-error-msg="||||error_name_msg||||"  name="first_name" id="first_name" value="" placeholder="Your Name">		 
								<div class="rbt_field_error_msg_html "></div>
							</div>	
							<div class="rbt_field_wrapper rbt_template_drag_drop_item_section_level_2">
								<input type="email"  name="email" class="rbt_field_required rbt_field_change_placehoder rbt_field" id="email" value="" data-error-msg="||||error_email_msg||||"  placeholder="Enter email address">
								<div class="rbt_field_error_msg_html "></div>
							</div>		
						</div>
						<div class="rbt_template_text_center rbt_template_drag_drop_item_section_level_2">
							<div class="rbtq_continue_btn rbtqoptin_continue_btn rbt_tiny_mce_editor ">
								<div>Get Started</div>
							</div>	
						</div>	
						<div class="rbt_tiny_mce_editor rbtq_text_privacy_policy rbt_template_drag_drop_item_section_level_2" > 
							<div>You can unsubscribe at any time.</div>
						</div>		
					</form>  					
				</div>	 
			</div>
		</div>';

$output = array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values);




if(!empty($template_number)){
	return $output;
}else{
	echo json_encode($output);
	die;
}
