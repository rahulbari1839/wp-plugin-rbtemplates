<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$rbtqresult_temp_wid = 500;
$rbtqresult_temp_aligment = 'center';
$rbtqresult_temp_border_wid = 1;
$rbtqresult_temp_border_radius = 1;
$rbtqresult_temp_border_style = 'solid';
$rbtqresult_temp_border_color  = '#2111e3';

$rbtqresult_temp_btn_wid = 300;
$rbtqresult_temp_btn_height = 50;
$rbtqresult_temp_background_color  = '#fff';
$rbtqresult_temp_btn_background_color  = '#2111e3';


$rbtqresult_temp_btn_border_style = 'solid';
$rbtqresult_temp_btn_border_wid = 1;
$rbtqresult_temp_btn_border_radius = 1;
$rbtqresult_temp_btn_border_color = '#2111e3';

// Result temp shadow property
$rbtqresult_temp_shadow_color = '#2111e3';
$rbtqresult_temp_shadow_spread_radius = 0;
$rbtqresult_temp_shadow_blur_radius = 0;
$rbtqresult_temp_shadow_horizontal_length = 0;
$rbtqresult_temp_shadow_vertical_length = 0;

$default_numaric_values = [
			'rbtqresult_temp_wid' => $rbtqresult_temp_wid,
			'rbtqresult_temp_btn_wid' => $rbtqresult_temp_btn_wid,
			'rbtqresult_temp_btn_height' => $rbtqresult_temp_btn_height,
			'rbtqresult_temp_border_wid' => $rbtqresult_temp_border_wid,
			'rbtqresult_temp_border_radius' => $rbtqresult_temp_border_radius,
			'rbtqresult_temp_btn_border_wid' => $rbtqresult_temp_btn_border_wid,
			'rbtqresult_temp_btn_border_radius' => $rbtqresult_temp_btn_border_radius,
			'rbtqresult_temp_shadow_spread_radius' => $rbtqresult_temp_shadow_spread_radius,
			'rbtqresult_temp_shadow_blur_radius' => $rbtqresult_temp_shadow_blur_radius,
			'rbtqresult_temp_shadow_horizontal_length' => $rbtqresult_temp_shadow_horizontal_length,
			'rbtqresult_temp_shadow_vertical_length' => $rbtqresult_temp_shadow_vertical_length,

	];


$default_style_values = [
			'rbtqresult_temp_aligment'=>$rbtqresult_temp_aligment,
			'rbtqresult_temp_border_style' => $rbtqresult_temp_border_style,
			'rbtqresult_temp_btn_border_style' => $rbtqresult_temp_btn_border_style,
];


$default_colorpicker_values = [
			'rbtqresult_temp_background_color'=> $rbtqresult_temp_background_color, 
			'rbtqresult_temp_btn_background_color' => $rbtqresult_temp_btn_background_color,
			'rbtqresult_temp_border_color' => $rbtqresult_temp_border_color,
			'rbtqresult_temp_btn_border_color' => $rbtqresult_temp_btn_border_color,
			'rbtqresult_temp_shadow_color' => $rbtqresult_temp_shadow_color,
];

$drag_section_action_btn_html  = rbt_drag_drop_delete_html();

$html  = '';

$top_heading = '<div class="rbtq-Template-sub-title ui_helper_my_custom_element   rbt_template_drag_drop_item_section" >'.$drag_section_action_btn_html.'<div class="rbt_tiny_mce_editor"> <div>You have scored [points_scored] out of [total_questions]</div></div></div> 
				<div class="rbtq-Template-sub-title     rbt_template_drag_drop_item_section ui_helper_my_custom_element"> '.$drag_section_action_btn_html.'<div class="rbt_tiny_mce_editor"> <div>You got [correct_answers] answers correct out of [total_questions]</div> </div> </div> ';

$html .= '<div class="rbtq_template_wrapper rbtqresult_template_wrapper">
			<div class="rbtq_result_template rbtq_template rbtq_result_template1 rbt_template_wrapper_customizer_init rbt_template_enable_drag_drop_outer">
				

				<div class="rbtq-Template-title     rbt_template_drag_drop_item_section ui_helper_my_custom_element"> '.$drag_section_action_btn_html.'
				<h3 class=" rbt_tiny_mce_editor"><div>Your Result</div></h3>
				</div>	
					<div class=" rbt_template_drag_drop_item_section ui_helper_my_custom_element">
					 '.$drag_section_action_btn_html.'<div class="rbt_tiny_mce_editor"><div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</div></div></div>
					 <br>

					<div class="rbt_template_text_center rbt_template_drag_drop_item_section ui_helper_my_custom_element">
					'.$drag_section_action_btn_html.'
					<div  class="rbtq_result_continue_btn rbt_tiny_mce_editor " ><div>Continue</div></div>
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
 
