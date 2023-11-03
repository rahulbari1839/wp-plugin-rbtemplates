<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$rbtqquestion_temp_wid = 500;
$rbtqquestion_temp_aligment = 'center';
$rbtqquestion_temp_border_wid = 1;
$rbtqquestion_temp_border_radius = 1;
$rbtqquestion_temp_border_style = 'solid';
$rbtqquestion_temp_border_color  = '#2111e3';

$rbtqquestion_temp_btn_wid = 300;
$rbtqquestion_temp_btn_height = 50;
$rbtqquestion_temp_background_color  = '#fff';
$rbtqquestion_temp_btn_background_color  = '#2111e3';


$rbtqquestion_temp_btn_border_style = 'solid';
$rbtqquestion_temp_btn_border_wid = 1;
$rbtqquestion_temp_btn_border_radius = 1;
$rbtqquestion_temp_btn_border_color = '#2111e3';


// question temp shadow property
$rbtqquestion_temp_shadow_color = '#2111e3';
$rbtqquestion_temp_shadow_spread_radius = 0;
$rbtqquestion_temp_shadow_blur_radius = 0;
$rbtqquestion_temp_shadow_horizontal_length = 0;
$rbtqquestion_temp_shadow_vertical_length = 0;



// Question ans temp  property
$rbtqquestion_temp_ans_background_color = '#e5f1ff';
$rbtqquestion_temp_ans_border_color = '#e5f1ff';
$rbtqquestion_temp_ans_border_style = 'solid';
$rbtqquestion_temp_ans_border_wid = 0;
$rbtqquestion_temp_ans_border_radius = 0;
$rbtqquestion_temp_shadow_horizontal_length = 0;
$rbtqquestion_temp_shadow_vertical_length = 0;

$default_numaric_values = [
			'rbtqquestion_temp_wid' => $rbtqquestion_temp_wid,
			'rbtqquestion_temp_btn_wid' => $rbtqquestion_temp_btn_wid,
			'rbtqquestion_temp_btn_height' => $rbtqquestion_temp_btn_height,
			'rbtqquestion_temp_border_wid' => $rbtqquestion_temp_border_wid,
			'rbtqquestion_temp_border_radius' => $rbtqquestion_temp_border_radius,
			'rbtqquestion_temp_btn_border_wid' => $rbtqquestion_temp_btn_border_wid,
			'rbtqquestion_temp_btn_border_radius' => $rbtqquestion_temp_btn_border_radius,
			'rbtqquestion_temp_shadow_spread_radius' => $rbtqquestion_temp_shadow_spread_radius,
			'rbtqquestion_temp_shadow_blur_radius' => $rbtqquestion_temp_shadow_blur_radius,
			'rbtqquestion_temp_shadow_horizontal_length' => $rbtqquestion_temp_shadow_horizontal_length,
			'rbtqquestion_temp_shadow_vertical_length' => $rbtqquestion_temp_shadow_vertical_length,
			'rbtqquestion_temp_ans_border_wid' => $rbtqquestion_temp_ans_border_wid,
			'rbtqquestion_temp_ans_border_radius' => $rbtqquestion_temp_ans_border_radius,
			'rbtqquestion_temp_shadow_horizontal_length' => $rbtqquestion_temp_shadow_horizontal_length,
			'rbtqquestion_temp_shadow_vertical_length' => $rbtqquestion_temp_shadow_vertical_length,
	];


$default_style_values = [
			'rbtqquestion_temp_aligment'=>$rbtqquestion_temp_aligment,
			'rbtqquestion_temp_border_style' => $rbtqquestion_temp_border_style,
			'rbtqquestion_temp_btn_border_style' => $rbtqquestion_temp_btn_border_style,
			'rbtqquestion_temp_ans_border_style' => $rbtqquestion_temp_ans_border_style,
];


$default_colorpicker_values = [
			'rbtqquestion_temp_background_color'=> $rbtqquestion_temp_background_color, 
			'rbtqquestion_temp_btn_background_color' => $rbtqquestion_temp_btn_background_color,
			'rbtqquestion_temp_border_color' => $rbtqquestion_temp_border_color,
			'rbtqquestion_temp_btn_border_color' => $rbtqquestion_temp_btn_border_color,
			'rbtqquestion_temp_shadow_color' => $rbtqquestion_temp_shadow_color,
			'rbtqquestion_temp_ans_background_color' => $rbtqquestion_temp_ans_background_color,
			'rbtqquestion_temp_ans_border_color' => $rbtqquestion_temp_ans_border_color,
];

$template_type_class = 'quiz';

$delete_html  = '<div class="hover_close_btn"><i class="fa fa-sort rbt_element_drag_drop_icon" aria-hidden="true"></i><i class="fa fa-edit element_edit" aria-hidden="true"></i><i class="fa fa-close element_delete" aria-hidden="true"></i></div>';

$delete_html  = rbt_drag_drop_delete_html();

$html = '<div class="rbtq_template_wrapper rbtqquestion_template_wrapper">
			<div class="rbtq_question_template rbtq_template rbtq_question_template1 rbt_template_wrapper_customizer_init rbt_template_enable_drag_drop_outer">';

		

		$skip_html =  '<div class="skip_question rbt_template_drag_drop_item_section ui_helper_my_custom_element " style="display:none; ">';
		$skip_html .=  $delete_html;
		$skip_html .=  '<div data-action="heading" class="dragdrop_inner_section dragdrop_heading_elements"  style="font-size:17px;font-weight:700;color:#333; color: #0f2e47;font-size: 15px;font-family: DM Sans,sans-serif;padding-bottom: 20px;"><div class="rbt_tiny_mce_editor"><div style="text-align: left;">  Skip Question</div></div></div>';
		$skip_html .=  '</div>';

		$html .= $skip_html;

		$heading_html =  '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element ">';
		$heading_html .=  $delete_html;
		$heading_html .=  '<div data-action="heading" class="dragdrop_inner_section dragdrop_heading_elements"  style="font-size:17px;font-weight:700;color:#333; color: #0f2e47;font-size: 21px;font-weight: 600;font-family: DM Sans,sans-serif;padding-bottom: 20px;"><div class="rbt_tiny_mce_editor"><div style="text-align: center;">  Enter Your Question Here</div></div></div>';
		$heading_html .=  '</div>';
								  

		$html .= $heading_html;
			
		$img_html =  '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element ">';	
		$img_html .=  $delete_html;		
		$img_html .=  '<div class="dragdrop_inner_section dragdrop_image_elements dct_img_section rbt_change_img_outer rbt_img_resizeable_outer" data-action="image" ><img class="rbt_tiny_mce_editor_img rbt_change_img "  src="'.plugin_dir_url(__FILE__).'rbt_quiz_description.png" width="100%"><span class="rbt_change_img_icon rbt_backend_show"><i class="fa fa-camera" aria-hidden="true"></i></span></div>';


		$img_html .=  '</div>';

		$html .= $img_html;


		$sub_heading_html =  '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element " style="margin-top: 40px;">';
		

		$sub_heading_html .=  $delete_html;
				
		$sub_heading_html .=  '<div data-action="subheading" class="dragdrop_inner_section dragdrop_subheading_elements"  style="font-size:17px;font-weight:500;color:#333;"><div class="rbt_tiny_mce_editor"><div style="text-align: left;"> Enter any additional information about the quiz.</div></div></div>';
		$sub_heading_html .=  '</div>';

		$html .= $sub_heading_html;

		$ans_html .=  '<div class="rbt_template_drag_drop_item_section ui_helper_my_custom_element question_add_answer_outer_main_div rbt_drag_btn_delete_hide" style="    margin-top: 22px;">';
		$ans_html .=  $delete_html;	
		$ans_html .=  '<div class="question_add_answer_outer_div rbt_template_disable_drag_drop_item_section rbtq_quest_layout_one_col_row rbt_template_enable_sortable_outer  rbt_drag_btn_delete_hide">';

		$ans_html .=  '</div>';
		$ans_html .=  '</div>';
		 
		$html .= $ans_html;						  

		
				
			
									
					 
		$html .=  '</div>
		</div>';

$output = array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values);




if(!empty($template_number)){
	return $output;
}else{
	echo json_encode($output);
	die;
}
 
