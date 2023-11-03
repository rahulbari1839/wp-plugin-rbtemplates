<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$rbtqs_temp_wid = 500;
$rbtqs_temp_aligment = 'center';
$rbtqs_temp_border_wid = 1;
$rbtqs_temp_border_radius = 1;
$rbtqs_temp_border_style = 'solid';
$rbtqs_temp_border_color  = '#2111e3';

$rbtqs_temp_btn_wid = 300;
$rbtqs_temp_btn_height = 50;
$rbtqs_temp_background_color  = '#fff';
$rbtqs_temp_btn_background_color  = '#2111e3';


$rbtqs_temp_btn_border_style = 'solid';
$rbtqs_temp_btn_border_wid = 1;
$rbtqs_temp_btn_border_radius = 1;
$rbtqs_temp_btn_border_color = '#2111e3';

// start temp shadow property
$rbtqs_temp_shadow_color = '#2111e3';
$rbtqs_temp_shadow_spread_radius = 0;
$rbtqs_temp_shadow_blur_radius = 0;
$rbtqs_temp_shadow_horizontal_length = 0;
$rbtqs_temp_shadow_vertical_length = 0;

$default_numaric_values = [
			'rbtqs_temp_wid' => $rbtqs_temp_wid,
			'rbtqs_temp_btn_wid' => $rbtqs_temp_btn_wid,
			'rbtqs_temp_btn_height' => $rbtqs_temp_btn_height,
			'rbtqs_temp_border_wid' => $rbtqs_temp_border_wid,
			'rbtqs_temp_border_radius' => $rbtqs_temp_border_radius,
			'rbtqs_temp_btn_border_wid' => $rbtqs_temp_btn_border_wid,
			'rbtqs_temp_btn_border_radius' => $rbtqs_temp_btn_border_radius,
			'rbtqs_temp_shadow_spread_radius' => $rbtqs_temp_shadow_spread_radius,
			'rbtqs_temp_shadow_blur_radius' => $rbtqs_temp_shadow_blur_radius,
			'rbtqs_temp_shadow_horizontal_length' => $rbtqs_temp_shadow_horizontal_length,
			'rbtqs_temp_shadow_vertical_length' => $rbtqs_temp_shadow_vertical_length,
	];


$default_style_values = [
			'rbtqs_temp_aligment'=>$rbtqs_temp_aligment,
			'rbtqs_temp_border_style' => $rbtqs_temp_border_style,
			'rbtqs_temp_btn_border_style' => $rbtqs_temp_btn_border_style,
];


$default_colorpicker_values = [
			'rbtqs_temp_background_color'=> $rbtqs_temp_background_color, 
			'rbtqs_temp_btn_background_color' => $rbtqs_temp_btn_background_color,
			'rbtqs_temp_border_color' => $rbtqs_temp_border_color,
			'rbtqs_temp_btn_border_color' => $rbtqs_temp_btn_border_color,
			'rbtqs_temp_shadow_color' => $rbtqs_temp_shadow_color,
];

$default_display_block_sections_classes = ['rbtqs_temp_background_color_option'];
$default_display_none_sections_classes = ['rbtqs_temp_left_background_color_show','rbtqs_temp_right_background_color_show'];

$drag_section_action_btn_html  = rbt_drag_drop_delete_html();

$html = '<div class="rbtq_template_wrapper rbtqs_template_wrapper"><div class="rbtq_template rbtq_start_template rbtq_start_template1  rbtq_start_template_withbutton">
		 <div class="rbtq-Template-content rbt_template_wrapper_customizer_init rbt_template_enable_drag_drop_outer rbt_drag_btn_delete_hide">
		 <div class="rbt_template_drag_drop_item_section rbt_template_text_center ui_helper_my_custom_element ">'.$drag_section_action_btn_html.'
			<div class="rbtq-start-btn rbt_tiny_mce_editor  "><div>TAKE THIS QUIZ</div></div>
		</div>		 
		</div>	
		</div>
		</div>';


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values,'default_display_block_sections_classes' => $default_display_block_sections_classes, 'default_display_none_sections_classes' => $default_display_none_sections_classes));

die;