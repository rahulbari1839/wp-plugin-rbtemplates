<?php 
wp_enqueue_script("rbt_sortable_jquery_ui", "//code.jquery.com/ui/1.12.1/jquery-ui.js", array('jquery')); 
$rand_no = RBTRandNumber('image');
$template_type = 'quiz';
$form_edit_mode =  false;	
$form_edit_id  =  0;	
$form_name   =  '';	
$template_no   =  '';	

$quiz_type = 'personality';

$email_templates_list = RBT_EmailNotificationTemplates::loadByType($template_type);

$customizer_visibility_hidden_cls = ' rbt-visibility-hidden ';

$opt_in_temp_details = RBTGetTemplate('quiz/opt-in','template1');
$opt_in_temp_html = '';
if(is_array($opt_in_temp_details)){

	if(isset($opt_in_temp_details['css_file_path'])){
		$opt_in_temp_html .= '<link rel="stylesheet"  href="'.$opt_in_temp_details['css_file_path'].'">';
	}

	if(isset($opt_in_temp_details['html'])){
		$opt_in_temp_html .=  '<div class="template_html_wrapper">'.$opt_in_temp_details['html'].'</div>';
	}

}

/*$result_temp_details = RBTGetTemplate('quiz/result','template1');
$result_temp_html = '';
if(is_array($result_temp_details)){

	if(isset($result_temp_details['css_file_path'])){
		$result_temp_html .= '<link rel="stylesheet"  href="'.$result_temp_details['css_file_path'].'">';
	}

	if(isset($result_temp_details['html'])){
		$result_temp_html .=  '<div class="template_html_wrapper">'.$result_temp_details['html'].'</div>';
	}

}*/


// start template variables	
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
// for template 3
$rbtqs_temp_left_background_color = '#efd9ca';
$rbtqs_temp_right_background_color = '#141c3a';

// opt-in template variables

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

// result template variables

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


// question template variables

$rbtqquestion_temp_wid = 500;
$rbtqquestion_temp_aligment = 'center';
$rbtqquestion_temp_border_wid = 1;
$rbtqquestion_temp_border_radius = 1;
$rbtqquestion_temp_border_style = 'solid';
$rbtqquestion_temp_border_color  = '#2111e3';

$rbtqquestion_temp_background_color  = '#fff';

/*$rbtqquestion_temp_btn_wid = 300;
$rbtqquestion_temp_btn_height = 50;

$rbtqquestion_temp_btn_background_color  = '#2111e3';


$rbtqquestion_temp_btn_border_style = 'solid';
$rbtqquestion_temp_btn_border_wid = 1;
$rbtqquestion_temp_btn_border_radius = 1;
$rbtqquestion_temp_btn_border_color = '#2111e3';*/


// start temp shadow property
$rbtqs_temp_shadow_color = '#2111e3';
$rbtqs_temp_shadow_spread_radius = 0;
$rbtqs_temp_shadow_blur_radius = 0;
$rbtqs_temp_shadow_horizontal_length = 0;
$rbtqs_temp_shadow_vertical_length = 0;


// optin temp shadow property
$rbtqoptin_temp_shadow_color = '#fff';
$rbtqoptin_temp_shadow_spread_radius = 0;
$rbtqoptin_temp_shadow_blur_radius = 0;
$rbtqoptin_temp_shadow_horizontal_length = 0;
$rbtqoptin_temp_shadow_vertical_length = 0;



// Result temp shadow property
$rbtqresult_temp_shadow_color = '#2111e3';
$rbtqresult_temp_shadow_spread_radius = 0;
$rbtqresult_temp_shadow_blur_radius = 0;
$rbtqresult_temp_shadow_horizontal_length = 0;
$rbtqresult_temp_shadow_vertical_length = 0;

// Question temp shadow property
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

//Tab 1 variables
$main_template_no = '';
$form_status = 'Y';
//Tab 2 variables
$display_type = 'inpage';
$show_progress_bar = 'N';
$show_ans_tag_option = 'N';

//Tab 3 variables
$start_temp_no = '';

// Tab 4 variables
$optin_skip_enable = 'N';
$optin_temp_no = 'template1';

// Tab 5 variables
$outcome_tabs = '';
$outcome_temp_no = 'template1';
$outcome_template_html = '';
$outcome_total_no = '';


// Tab 6 variables
$question_tabs = '';
$question_temp_no = 'template1';
$question_template_html = '';
$question_total_no = '';
$quiz_branching_enable = 'N';


$edit_mode_set_customizer_values_prepopulate = [];


$shortcode_details  = '';

//Edit mode check  start
if(isset($_GET['id'])){
	$RBT_DataHas = RBT_Form::loadById($_GET['id']);
	if(isset($RBT_DataHas)){

		global $rbt_table_name_quiz_global, $rbt_table_name_quiz_outcome_global, $rbt_table_name_quiz_questions_global,$rbt_table_name_quiz_question_answers_global;

		$form_edit_mode = true;
		$form_edit_id = $_GET['id'];
		$form_name = $RBT_DataHas->getName();
		$selected_email_temp = $RBT_DataHas->getEmailTemplateId();
		$main_template_no = $RBT_DataHas->getTemplateNo();
		$display_type = $RBT_DataHas->getDisplayType();
		$form_status = $RBT_DataHas->getstatus();

		$shortcode_details  = RBTGetShortcodeNameByIdAndType($form_edit_id,$template_type);
		$shortcode_details  = '<div class="rbt_shortcode_details"><span class="shortcode_details">Here is your Shortcode:</span><p><span class="shortcode_display" id="dynamic_copyable_text_rbt_'.$form_edit_id.'">'.$shortcode_details.'</span><span data-id="dynamic_copyable_text_rbt_'.$form_edit_id.'" class="copy-btn " onclick="rbt_copy_to_clipboard(this)"><i class="fa fa-files-o" aria-hidden="true"></i> Copy</span>  </p></div>';
		//$form_html = $RBT_DataHas->getHtml();


		$quiz_obj = new RBT_GeneralModel($rbt_table_name_quiz_global);

		$has_quiz = $quiz_obj->loadRowByColumn('form_id',$form_edit_id);

		if(isset($has_quiz)){
			$customizer_visibility_hidden_cls = '';
			$basic_options = [];
			$quiz_id = $has_quiz['id'];

			if(!empty($has_quiz['basic_options'])){
				$basic_options = json_decode($has_quiz['basic_options'],true);
				if(is_array($basic_options)){
					extract($basic_options, EXTR_REFS);
				}
				
			}
			// start screen variables
			$start_screen_html = stripslashes($has_quiz['start_screen_html']);
			$start_screen_html =  '<div class="template_html_wrapper">'.$start_screen_html.'</div>';
			$start_screen_html = '<link rel="stylesheet"  href="'.plugin_dir_url(__FILE__)."../templates/".$template_type."/start/".$start_temp_no."/style.css?".rand(1,1000).'">'.$start_screen_html;

			if(isset($basic_options['start_temp_customizer_values'])){
				foreach($basic_options['start_temp_customizer_values'] as $start_temp_customizer_values){
					extract($start_temp_customizer_values, EXTR_REFS);
				}
			}


			// optin screen variables
			$optin_screen_html = stripslashes($has_quiz['optin_screen_html']);
			$optin_screen_html =  '<div class="template_html_wrapper">'.$optin_screen_html.'</div>';
			$opt_in_temp_html = '<link rel="stylesheet"  href="'.plugin_dir_url(__FILE__)."../templates/".$template_type."/opt-in/".$optin_temp_no."/style.css?".rand(1,1000).'">'.$optin_screen_html;
			if(isset($basic_options['optin_temp_customizer_values'])){
				foreach($basic_options['optin_temp_customizer_values'] as $optin_temp_customizer_values){
					extract($optin_temp_customizer_values, EXTR_REFS);
				}
			}

			// outcome screen
			$quiz_outcome_obj = new RBT_GeneralModel($rbt_table_name_quiz_outcome_global);
			$has_quiz_outcomes = $quiz_outcome_obj->loadRowsByColumn('quiz_id',$quiz_id);
			
			if(isset($has_quiz_outcomes)){
				$rbt_i = 1;
                $outcome_total_no = count($has_quiz_outcomes);
				foreach($has_quiz_outcomes as $quiz_outcome){
					$outcome_id = $quiz_outcome['id'];
					$title = $quiz_outcome['title'];
					$html = stripslashes($quiz_outcome['html']);
					//$customize_values = json_decode(stripslashes($quiz_outcome['customize_values']),true);
					$customize_values = $quiz_outcome['customize_values'];


					$rbt_screen_name = 'OutCome ';

					$item_rand_no = rbtGetDateTimeClass('outcome_item');
					$active_tab_class = '  ' ;
					$active_tab_content_class = '  ';
					$active_tab_content_display = 'none';
					if($rbt_i == 1){
						$active_tab_class = ' rbt_ul_li_active ' ;
						$active_tab_content_class = ' rbtq_template_active_content_div ';
						$active_tab_content_display = 'block';
						$edit_mode_set_customizer_values_prepopulate[] = $customize_values;
					}
					$rbt_tab_no = $rbt_i++;

					

					$outcome_tabs .= " <li class= '".$active_tab_class." rbt_anchor_btn rbt_ul_li rbt_ul_li_width_20' data-id='".$item_rand_no."' onclick='rbtq_show_templates_with_tabs_item(this,\"\",\"quiz_result_template_outer\")'  rbt_save_customizer_values_tempary='".$customize_values."'><span>".$rbt_screen_name." ".$rbt_tab_no."</span><div onclick='rbtq_delete_templates_with_tabs_item(this,\"\",\"quiz_result_template_outer\")' class='rbt_delete_btn rbt_btn'><i class='fas fa fa-trash'></i></div></li>"	;

                    $header_outcome =   RBTGetOutcomeHeaderPartHtml($quiz_outcome);
					$outcome_template_html .= '<div id="'.$item_rand_no.'" data-db-id="'.$outcome_id.'" class="template_html_wrapper  '.$active_tab_content_class.' " style="display:'.$active_tab_content_display.'">'.$header_outcome.$html.'</div>';
				}

			
				$outcome_template_html = '<link rel="stylesheet"  href="'.plugin_dir_url(__FILE__)."../templates/".$template_type."/result/".$outcome_temp_no."/style.css?".rand(1,1000).'">'.$outcome_template_html;
			}

			// Question screen
			$quiz_question_obj = new RBT_GeneralModel($rbt_table_name_quiz_questions_global);
			$has_quiz_questions = $quiz_question_obj->loadRowsByColumn('quiz_id',$quiz_id,'order','asc');
			
			if(isset($has_quiz_questions)){
				$rbt_i = 1;
                $question_total_no = count($has_quiz_questions);

				foreach($has_quiz_questions as $quiz_question_details){
					$question_id = $quiz_question_details['id'];
					$title = $quiz_question_details['title'];
					$html = stripslashes($quiz_question_details['html']);
					$question_type = '';


					if(!empty($quiz_question_details['basic_options'])){
						$basic_options = json_decode(stripslashes($quiz_question_details['basic_options']),true);
						if(is_array($basic_options)){
							$question_type = $basic_options['question_type'];
						}
					}
					

					$ans_html_items = '';
					$quiz_question_obj = new RBT_GeneralModel($rbt_table_name_quiz_question_answers_global);
					$has_quiz_question_ans = $quiz_question_obj->loadRowsByColumn('question_id',$question_id,'order','asc');
					$ans_attr_ids = [];	
					if(isset($has_quiz_question_ans)){
						
						foreach($has_quiz_question_ans as $ans_info){
							$ans_extra_class = '';
							$ans_html = '';
							$ans_option_html  = '';
							if(in_array($question_type, array('slider'))){
								$ans_extra_class = ' rbtq_question_ans_item_slider  ';
							}else{

							}
							$ans_item_rand_no = rbtGetDateTimeClass('answer_item');
							$ans_html = stripslashes($ans_info['html']);
							if(in_array($question_type, array('single','multi','yes_no','ranking_choices'))){
								$ans_option_html = RBTQuizGetQuestionAnswerOptions(array('quiz_info' => $has_quiz, 'ans_info' =>$ans_info,'question_type' => $question_type));

								$ans_html .= '<span class="rbtq_question_backend_show rbtq_question_remove_section rbtq_question_ans_delete_btn" data-id="'.$ans_item_rand_no.'"><i class="fa fa-times" aria-hidden="true"></i></span>';
							}
							$ans_html = str_replace('%%ANSWERSOPTIONSHTML%%', $ans_option_html, $ans_html);
							

							
							$ans_id = stripslashes($ans_info['id']);
							
							$ans_html  = '<div class="rbtq_question_ans_item question_type_'.$question_type.' '.$ans_extra_class.'" data-db-id="'.$ans_id.'" id="'.$ans_item_rand_no.'">'.$ans_html.'</div>';

							$ans_html_items .= $ans_html;

							$ans_attr_ids[$ans_id] = $ans_item_rand_no;
						}
						$quiz_question_details['answers_details'] = $has_quiz_question_ans;
						$quiz_question_details['ans_attr_ids'] = $ans_attr_ids;
						
					}

					//$customize_values = json_decode(stripslashes($quiz_question_details['customize_values']),true);
					$customize_values = $quiz_question_details['customize_values'];
					/*print_r($customize_values);
					echo "<br>======== Question ==========<br>";*/
					$rbt_screen_name = 'Quesion ';
					
					$item_rand_no = rbtGetDateTimeClass('question_item');
					$active_tab_class = '  ' ;
					$active_tab_content_class = '  ';
					$active_tab_content_display = 'none';
					if($rbt_i == 1){
						$active_tab_class = ' rbt_ul_li_active ' ;
						$active_tab_content_class = ' rbtq_template_active_content_div ';
						$active_tab_content_display = 'block';
						$edit_mode_set_customizer_values_prepopulate[] = $customize_values;
					}
					$rbt_tab_no = $rbt_i++;

					$question_tabs .= " <li class= '".$active_tab_class." rbt_anchor_btn rbt_ul_li rbt_ul_li_width_20' data-id='".$item_rand_no."' onclick='rbtq_show_templates_with_tabs_item(this,\"\",\"quiz_question_template_outer\")'  rbt_save_customizer_values_tempary='".$customize_values."'><span>".$rbt_screen_name." ".$rbt_tab_no."</span><div onclick='rbtq_delete_templates_with_tabs_item(this,\"\",\"quiz_question_template_outer\")' class='rbt_delete_btn rbt_btn'><i class='fas fa fa-trash'></i></div></li>"	;

					  $html = str_replace('%%ANSWERSHTML%%', $ans_html_items, $html);
						

					  $header_question =   RBTGetQuestionScreenHeaderPartHtml($quiz_question_details);
					  $footer_question =   RBTGetQuestionScreenFooterPartHtml($quiz_question_details);
					  $question_template_html .= '<div id="'.$item_rand_no.'" data-db-id="'.$question_id.'" class="template_html_wrapper  '.$active_tab_content_class.' " style="display:'.$active_tab_content_display.'">'.$header_question.$html.$footer_question.'</div>';
				}

			
				$question_template_html = '<link rel="stylesheet"  href="'.plugin_dir_url(__FILE__)."../templates/".$template_type."/question/".$question_temp_no."/style.css?".rand(1,1000).'">'.$question_template_html;
			}
			

			
		}

	}
}

//Edit mode check  end 

	
?>


<div class="rbt_main_container rbt_main_container_quiz template_type_outer_container_class_<?php echo $template_type; ?>">
	<?php include_once('common.php');
	echo RBTModalHtmlAdmin('rbt_modal_outer_img_preview');
	 ?>
	<ul class="nav nav-tabs rbt_tabs" id="rbt_tabs" role="tablist">
	  <li class="nav-item" role="presentation">
		<a class="nav-link <?php if(!$form_edit_mode){ echo ' active ';} ?>" id="rbt_tab_1_tab" data-toggle="tab" href="#rbt_tab_1" role="tab" aria-controls="rbt_tab_1" aria-selected="true">Basic Info</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link " id="rbt_tab_2_tab" data-toggle="tab" href="#rbt_tab_2" role="tab" aria-controls="rbt_tab_2" aria-selected="true">Display Settings</a>
	  </li>
	   <li class="nav-item" role="presentation">
		<a class="nav-link " id="rbt_tab_3_tab" data-toggle="tab" href="#rbt_tab_3" role="tab" aria-controls="rbt_tab_3" aria-selected="true">Start Screen</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link " id="rbt_tab_4_tab" data-toggle="tab" href="#rbt_tab_4" role="tab" aria-controls="rbt_tab_4" aria-selected="true">Opt-In Screen</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link " id="rbt_tab_5_tab" data-toggle="tab" href="#rbt_tab_5" role="tab" aria-controls="rbt_tab_5" aria-selected="true">OutCome screen</a>
	  </li>

	  <li class="nav-item" role="presentation">
		<a class="nav-link <?php if($form_edit_mode){ echo ' active ';} ?>" id="rbt_tab_6_tab" data-toggle="tab" href="#rbt_tab_6" role="tab" aria-controls="rbt_tab_6" aria-selected="true">Questions Screen</a>
	  </li>

	  <li class="nav-item" role="presentation">
		<a class="nav-link " id="rbt_tab_7_tab" data-toggle="tab" href="#rbt_tab_7" role="tab" aria-controls="rbt_tab_7" aria-selected="true">Shortcode Details</a>
	  </li>
	 
	 
	  <a  class="btn rbt_transprent_btn rbt_preview_shortcode_btn rbt_show_on_save_quiz_action" onclick="rbt_preview_shortcode(this)" href="javascript:void(0)" <?php if(!$form_edit_mode){ echo ' style="display:none"; ';} ?>>Preview Shortcode</a>
	
	</ul>

	<div class="tab-content p-4" id="rbTabContent">
	  <div class="tab-pane rbt_tab_level_1 fade  <?php if(!$form_edit_mode){ echo ' show active ';} ?>" id="rbt_tab_1" role="tabpanel" aria-labelledby="rbt_tab_1_tab">

	  	<h5 class="quiz-sub-title">Basic Settings</h5>
		<input type="hidden" class="form-control" id="rbt_form_edit_id" value="<?php echo $form_edit_id;?>">
		<input type="hidden" class="form-control" id="template_type" value="<?php echo $template_type;?>">

		<div class="quiz-card-outer-gray">
			<div class="quiz-content-card">
				
					<label for="rbt_form_name" class="quiz_label">Give the <?php echo ucfirst($template_type); ?>  a Name</label>
					<input type="text" class="form-control rbt_field_required" data-error-msg="Please enter name." name="quiz_name" id="rbt_form_name" placeholder="Enter Name" value="<?php echo $form_name;?>" style="max-width: 700px;">
				 </div>


				<div class="quiz-content-card " style="">
					<label for="" class="quiz_label">Enable?</label>
					<div class="quiz_right-content">
						<div class="square_switch_on_off">
							<input class="checkbox quiz_basic_checkbox_fields" name="form_status" type="checkbox" id="form_status"  <?php if($form_status == 'Y'){ echo "checked"; } ?>>
							<label for="form_status"></label>
						</div>
					</div>
				</div>


				<div class="quiz-content-card">
					<label class="quiz_label"><h5>Select Type of Quiz</h5></label>
					<div  class="quiz_type_wrapper">
						<label class="quiz-radio-btn--outer <?php if($quiz_type == 'personality'){ echo 'checked_cls'; } ?>" for="personality_quiz">
							<input type="radio" name="quiz_type" id="personality_quiz" value="personality" class="rbt_field_required" data-error-msg="Please Select Type of Quiz." <?php if($quiz_type == 'personality'){ echo 'checked'; } ?> >Personality
						</label>

						<label class="quiz-radio-btn--outer <?php if($quiz_type == 'scoring'){ echo 'checked_cls'; } ?>" for="scoring_quiz">
							<input type="radio" name="quiz_type" id="scoring_quiz" value="scoring"  class="rbt_field_required" data-error-msg="Please Select Type of Quiz." <?php if($quiz_type == 'scoring'){ echo 'checked'; } ?>>Scoring
						</label>

						<label class="quiz-radio-btn--outer <?php if($quiz_type == 'assessment'){ echo 'checked_cls'; } ?>" for="assessment_quiz">
							<input type="radio" name="quiz_type" id="assessment_quiz" value="assessment"  class="rbt_field_required" data-error-msg="Please Select Type of Quiz." <?php if($quiz_type == 'assessment'){ echo 'checked'; } ?>>Assessment
						</label>
					</div>

				</div>
				 <div class="quiz-content-card">
					<label class="quiz_label">Select Template</label>
					  <ul class="rbt_templates_list  rbt_field_required" data-error-type="lenght" data-error-class="rbt_selcted_temp" data-error-class data-error-msg="Please select a start template" >
					  <?php 
					 	 
						echo rbtGetTemplateListByFolderName('quiz/templates', $main_template_no,$template_type);
					  ?> 
					</ul>
				  </div>
		
		</div>
	  
		<div class="rbt_quiz_save_btn_wrapper">
			<a  href="<?php echo admin_url('admin.php?page=rbt_manage_form'); ?>"  onclick="rbt_show_loader();" class="btn btn-secondary">Return to Manage Shortcodes</a>
			<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_1')">Save</span>
			<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_1','rbt_tab_2')">Save & Next</span>
		</div>
	  
	  </div>

	  <div class="tab-pane fade rbt_tab_level_1" id="rbt_tab_2" role="tabpanel" aria-labelledby="rbt_tab_2_tab">

	  	<h5 class="quiz-sub-title">Display Settings</h5>

	  	<div class="quiz-card-outer-gray">
			<div class="quiz-content-card">
				<label for="" class="quiz_label">Show quiz in a popup or in-page? </label>
				<div class="quiz_right-content">
					<label class="radio-btn--outer"><input type="radio" name="quiz_display" value="inpage" <?php if($display_type == 'inpage'){ echo "checked"; } ?>>In-page </label>
					<label class="radio-btn--outer"><input type="radio" name="quiz_display" value="popup"  <?php if($display_type == 'popup'){ echo "checked"; } ?>>Popup</label>
					<label class="radio-btn--outer"><input type="radio" name="quiz_display" value="corner_popup" <?php if($display_type == 'corner_popup'){ echo "checked"; } ?>>Bottom Right Popup</label>
				</div>
			</div>
			<div class="quiz-content-card " style="">
				<label for="" class="quiz_label">Show Progress Bar?</label>
				<div class="quiz_right-content">
					<div class="square_switch_on_off">
						<input class="checkbox" name="show_progress_bar" type="checkbox" id="show_progress_bar"  <?php if($show_progress_bar == 'Y'){ echo "checked"; } ?>>
						<label for="show_progress_bar"></label>
					</div>
				</div>
			</div>

			<div class="quiz-content-card " style="">
				<label for="" class="quiz_label">Allow Answer with tag?</label>
				<div class="quiz_right-content">
					<div class="square_switch_on_off">
						<input class="checkbox quiz_basic_checkbox_fields" name="show_ans_tag_option" type="checkbox" id="show_ans_tag_option"  <?php if($show_ans_tag_option == 'Y'){ echo "checked"; } ?>>
						<label for="show_ans_tag_option"></label>
					</div>
				</div>
			</div>

			<div class="quiz-content-card border-bottom-0 pb-0" style="">
				<h5 class="quiz--sub-title">Retake Quiz</h5>	
				<label for="" class="quiz_label">Do you want to allow users to retake the quiz?</label>
				<div class="quiz_right-content">
					<div class="square_switch_on_off">
						<input class="checkbox" name="retake_quiz" type="checkbox" id="retake_quiz" <?php if(isset($retake_quiz) && ($retake_quiz == 'Y')){ echo "checked";} ?>>
						<label for="retake_quiz"></label>
					</div>
				</div>
			</div>
			<div class="quiz-content-card" style=" border-bottom: 1px solid #efefef;">
				<label for="" class="quiz_label" style=" color: #f56640; font-size: 17px; padding-bottom: 10px;">Connect with your Platform
					
				</label>
				<label for="" class="quiz_label">Where should the users be added?</label>
					<div class="quiz_right-content">
						<ul>
							<li>
								<span class="checkbox-custom-style">
									<input type="checkbox" name="add_user_quiz" value="add_user_in_wp" class="custom-checkbox-input"  checked="checked" disabled>
									<span class="custom--checkbox"></span>
								</span>
							
								<span>Wordpress</span>
							</li>
						</ul>
					</div>
				</div>	

		</div>
	


	  <div class="rbt_quiz_save_btn_wrapper">
	  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_1')">Previous</span>
			<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_2')">Save</span>
			<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_2','rbt_tab_3')">Save & Next</span>
		</div>
			
	  </div> <!-- rbt_tab_2_tab end -->

	  <div class="tab-pane fade rbt_tab_level_1" id="rbt_tab_3" role="tabpanel" aria-labelledby="rbt_tab_3_tab">
	  		

	  	<div class="quiz-card-outer-gray">

	  		<div class="row">
	  		<div class="col-sm-3 <?php echo $customizer_visibility_hidden_cls;?> ">
	  			<div class="customized-optional">

					<div class="customizer_heading">Template Style <i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul">
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Template Alignment','rbtqs_temp_aligment','rbtqs_template_wrapper', 'text-align',$rbtqs_temp_aligment,  array('center'=>'Center','left'=>'Left','right'=>'Right'));
							 ?>
					    </li>
					    <li>
							
							<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqs_temp_wid','rbtq_start_template','max-width', $rbtqs_temp_wid,0, 1000);?>
						</li>
						<li class="rbtqs_temp_background_color_option <?php if($start_temp_no == 'template3'){ echo ' rbt_display_none '; }?>">
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqs_temp_background_color','rbtq_start_template', 'background-color', $rbtqs_temp_background_color);?>
						</li>
						<li class="rbtqs_temp_left_background_color_show <?php if($start_temp_no != 'template3'){ echo ' rbt_display_none '; }?>">
							<?php echo
							RBTGetColorCustomizerOptionHtml('Left Background Color', 'rbtqs_temp_left_background_color','rbtq_start_template-left', 'background-color', $rbtqs_temp_left_background_color);?>
						</li>
						<li class="rbtqs_temp_right_background_color_show <?php if($start_temp_no != 'template3'){ echo ' rbt_display_none '; }?>">
							<?php echo
							RBTGetColorCustomizerOptionHtml('Right Background Color', 'rbtqs_temp_right_background_color','rbtq_start_template-right', 'background-color', $rbtqs_temp_right_background_color);?>
						</li>
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqs_temp_border_style','rbtqs_template_wrapper', 'border-style',$rbtqs_temp_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
							
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqs_temp_border_wid','rbtq_start_template','border-width', $rbtqs_temp_border_wid,0, 30);?>

						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqs_temp_border_radius','rbtq_start_template','border-radius', $rbtqs_temp_border_radius,0, 30);?>

						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqs_temp_border_color','rbtq_start_template', 'border-color', $rbtqs_temp_border_color);?>
						</li>
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Template External Shadow Customizer <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul" style="display: none;">
						<li >
							<?php echo
							RBTGetColorCustomizerOptionHtml('Shadow Color', 'rbtqs_temp_shadow_color','rbtq_start_template', 'shadow', $rbtqs_temp_shadow_color,'rbtqs_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Spread Radius','rbtqs_temp_shadow_spread_radius','rbtq_start_template','shadow', $rbtqs_temp_shadow_spread_radius,0, 50,'rbtqs_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Blur Radius','rbtqs_temp_shadow_blur_radius','rbtq_start_template','shadow', $rbtqs_temp_shadow_blur_radius,0, 50,'rbtqs_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Horizontal Length','rbtqs_temp_shadow_horizontal_length','rbtq_start_template','shadow', $rbtqs_temp_shadow_horizontal_length,0, 50,'rbtqs_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Vertical Length','rbtqs_temp_shadow_vertical_length','rbtq_start_template','shadow', $rbtqs_temp_shadow_vertical_length,0, 50,'rbtqs_temp');?>
						</li>
						
						
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Button Style <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul" style="display: none;">
						
					    <li>
					    	<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqs_temp_btn_wid','rbtq-start-btn','width', $rbtqs_temp_btn_wid,0, 500);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Height','rbtqs_temp_btn_height','rbtq-start-btn','line-height', $rbtqs_temp_btn_height,0, 200);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqs_temp_btn_background_color','rbtq-start-btn', 'background-color', $rbtqs_temp_btn_background_color);?>
						</li>

						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqs_temp_btn_border_style','rbtq-start-btn', 'border-style',$rbtqs_temp_btn_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqs_temp_btn_border_wid','rbtq-start-btn','border-width', $rbtqs_temp_btn_border_wid,0, 30);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqs_temp_btn_border_radius','rbtq-start-btn','border-radius', $rbtqs_temp_btn_border_radius,0, 30);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqs_temp_btn_border_color','rbtq-start-btn', 'border-color', $rbtqs_temp_btn_border_color);?>
						</li>
					</ul>
	  			</div>

	  		</div>


	  		<div class="col-sm-6">
		  		<div class="quiz_start_template_outer quiz_template_outer_html_cotainer template_html_wrapper_backend ">
		  			
		  			<?php
		  				if(isset($start_screen_html) && !empty($start_screen_html)){
		  					echo $start_screen_html;
		  				}else{

		  			 	echo  RBTGetEmptyBoxDesignHtml('You currently don\'t have any template.', 'Please select a start template.','rbt_full_width');
		  			 	}
		  			 ?>

		  		</div>
				<div class="quiz-content-card">
					<label ><h5>Select Template</h5></label>
					<ul class="rbt_templates_list  rbt_field_required" data-error-type="lenght" data-error-class="rbt_selcted_temp" data-error-class data-error-msg="Please select a template" >
					  <?php 
					 	
						echo rbtGetTemplateListByFolderName('quiz/start', $start_temp_no,$template_type);
					  ?>
					</ul>
			 	</div>

			 	<div class="rbt_quiz_save_btn_wrapper">
			  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_2')">Previous</span>
					<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_3')">Save</span>
					<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_3','rbt_tab_4')">Save & Next</span>
				</div>
			</div> 	
		 	<div class="col-sm-3 drag_drop_elements_wrapper <?php echo $customizer_visibility_hidden_cls;?> ">
				<?php include_once('drag_drop_elements.php'); ?>
				<?php //include_once('select_custom_fields_list.php'); ?>
			</div>
			</div>

			<div class="m-3"></div>
		</div>


		
	  </div> <!-- rbt_tab_3_tab end -->

	  <div class="tab-pane fade rbt_tab_level_1" id="rbt_tab_4" role="tabpanel" aria-labelledby="rbt_tab_4_tab">

	  	<div class="row">
	  		<div class="col-sm-3">
	  			<div class="customized-optional">

					<div class="customizer_heading">Template Style <i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul">
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Template Alignment','rbtqoptin_temp_aligment','rbtqoptin_template_wrapper', 'text-align',$rbtqoptin_temp_aligment,  array('center'=>'Center','left'=>'Left','right'=>'Right'));
							 ?>
					    </li>
					    <li>
							
							<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqoptin_temp_wid','rbtq_optin_template','max-width', $rbtqoptin_temp_wid,0, 1000);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqoptin_temp_background_color','rbtq_optin_template', 'background-color', $rbtqoptin_temp_background_color);?>
						</li>
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqoptin_temp_border_style','rbtq_optin_template', 'border-style',$rbtqoptin_temp_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
							
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqoptin_temp_border_wid','rbtq_optin_template','border-width', $rbtqoptin_temp_border_wid,0, 30);?>

						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqoptin_temp_border_radius','rbtq_optin_template','border-radius', $rbtqoptin_temp_border_radius,0, 30);?>

						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqoptin_temp_border_color','rbtq_optin_template', 'border-color', $rbtqoptin_temp_border_color);?>
						</li>
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Template External Shadow Customizer <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul"  style="display: none;">
						<li >
							<?php echo
							RBTGetColorCustomizerOptionHtml('Shadow Color', 'rbtqoptin_temp_shadow_color','rbtq_optin_template', 'shadow', $rbtqoptin_temp_shadow_color,'rbtqoptin_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Spread Radius','rbtqoptin_temp_shadow_spread_radius','rbtq_optin_template','shadow', $rbtqoptin_temp_shadow_spread_radius,0, 50,'rbtqoptin_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Blur Radius','rbtqoptin_temp_shadow_blur_radius','rbtq_optin_template','shadow', $rbtqoptin_temp_shadow_blur_radius,0, 50,'rbtqoptin_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Horizontal Length','rbtqoptin_temp_shadow_horizontal_length','rbtq_optin_template','shadow', $rbtqoptin_temp_shadow_horizontal_length,0, 50,'rbtqoptin_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Vertical Length','rbtqoptin_temp_shadow_vertical_length','rbtq_optin_template','shadow', $rbtqoptin_temp_shadow_vertical_length,0, 50,'rbtqoptin_temp');?>
						</li>
						
						
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Button Style <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul"  style="display: none;">
						
					    <li>
					    	<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqoptin_temp_btn_wid','rbtqoptin_continue_btn','width', $rbtqoptin_temp_btn_wid,0, 500);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Height','rbtqoptin_temp_btn_height','rbtqoptin_continue_btn','line-height', $rbtqoptin_temp_btn_height,0, 200);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqoptin_temp_btn_background_color','rbtqoptin_continue_btn', 'background-color', $rbtqoptin_temp_btn_background_color);?>
						</li>

						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqoptin_temp_btn_border_style','rbtqoptin_continue_btn', 'border-style',$rbtqoptin_temp_btn_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqoptin_temp_btn_border_wid','rbtqoptin_continue_btn','border-width', $rbtqoptin_temp_btn_border_wid,0, 30);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqoptin_temp_btn_border_radius','rbtqoptin_continue_btn','border-radius', $rbtqoptin_temp_btn_border_radius,0, 30);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqoptin_temp_btn_border_color','rbtqoptin_continue_btn', 'border-color', $rbtqoptin_temp_btn_border_color);?>
						</li>
					</ul>
	  			</div>

	  		</div>

			<div class="col-sm-6">
					
				<?php 

					echo RBTGetCheckboxWithIdOptionHtml('Skip Optin &nbsp;',$optin_skip_enable,'rbtq_optin_skip_enable_checkbox',' rbtq_display_flex_end');	
				

				?>


		  		<div class="quiz_optin_template_outer quiz_template_outer_html_cotainer template_html_wrapper_backend ">
		  			  <?php echo $opt_in_temp_html; ?>
		  		</div>

		  		<div class="rbt_quiz_save_btn_wrapper">
			  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_3')">Previous</span>
					<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_4')">Save</span>
					<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_4','rbt_tab_5')">Save & Next</span>
				</div>
			</div>	
			<div class="col-sm-3 drag_drop_elements_wrapper">
				<?php include('drag_drop_elements.php'); ?>
				<?php include_once('select_custom_fields_list.php'); ?>
			</div>

		</div>	

		<div class="m-3"></div>
		

	  </div> <!-- rbt_tab_4_tab end -->

	  <div class="tab-pane fade rbt_tab_level_1" id="rbt_tab_5" role="tabpanel" aria-labelledby="rbt_tab_5_tab">
		  <div class="row">
	  		<div class="col-sm-3 <?php echo $customizer_visibility_hidden_cls;?> ">
	  			<div class="customized-optional">

					<div class="customizer_heading">Template Style <i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul">
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Template Alignment','rbtqresult_temp_aligment','rbtqresult_template_wrapper', 'text-align',$rbtqresult_temp_aligment,  array('center'=>'Center','left'=>'Left','right'=>'Right'));
							 ?>
					    </li>
					    <li>
							
							<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqresult_temp_wid','rbtq_result_template','max-width', $rbtqresult_temp_wid,0, 1000);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqresult_temp_background_color','rbtq_result_template', 'background-color', $rbtqresult_temp_background_color);?>
						</li>
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqresult_temp_border_style','rbtq_result_template', 'border-style',$rbtqresult_temp_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
							
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqresult_temp_border_wid','rbtq_result_template','border-width', $rbtqresult_temp_border_wid,0, 30);?>

						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqresult_temp_border_radius','rbtq_result_template','border-radius', $rbtqresult_temp_border_radius,0, 30);?>

						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqresult_temp_border_color','rbtq_result_template', 'border-color', $rbtqresult_temp_border_color);?>
						</li>
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Template External Shadow Customizer <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul"  style="display: none;">
						<li >
							<?php echo
							RBTGetColorCustomizerOptionHtml('Shadow Color', 'rbtqresult_temp_shadow_color','rbtq_result_template', 'shadow', $rbtqresult_temp_shadow_color,'rbtqresult_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Spread Radius','rbtqresult_temp_shadow_spread_radius','rbtq_result_template','shadow', $rbtqresult_temp_shadow_spread_radius,0, 50,'rbtqresult_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Blur Radius','rbtqresult_temp_shadow_blur_radius','rbtq_result_template','shadow', $rbtqresult_temp_shadow_blur_radius,0, 50,'rbtqresult_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Horizontal Length','rbtqresult_temp_shadow_horizontal_length','rbtq_result_template','shadow', $rbtqresult_temp_shadow_horizontal_length,0, 50,'rbtqresult_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Vertical Length','rbtqresult_temp_shadow_vertical_length','rbtq_result_template','shadow', $rbtqresult_temp_shadow_vertical_length,0, 50,'rbtqresult_temp');?>
						</li>
						
						
					</ul>
	  			</div>


	  			<div class="customized-optional">

					<div class="customizer_heading">Button Style <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul"  style="display: none;">
						
					    <li>
					    	<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqresult_temp_btn_wid','rbtq_result_continue_btn','max-width', $rbtqresult_temp_btn_wid,0, 500);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Height','rbtqresult_temp_btn_height','rbtq_result_continue_btn','line-height', $rbtqresult_temp_btn_height,0, 200);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqresult_temp_btn_background_color','rbtq_result_continue_btn', 'background-color', $rbtqresult_temp_btn_background_color);?>
						</li>

						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqresult_temp_btn_border_style','rbtq_result_continue_btn', 'border-style',$rbtqresult_temp_btn_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqresult_temp_btn_border_wid','rbtq_result_continue_btn','border-width', $rbtqresult_temp_btn_border_wid,0, 30);?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqresult_temp_btn_border_radius','rbtq_result_continue_btn','border-radius', $rbtqresult_temp_btn_border_radius,0, 30);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqresult_temp_btn_border_color','rbtq_result_continue_btn', 'border-color', $rbtqresult_temp_btn_border_color);?>
						</li>
					</ul>
	  			</div>

	  		</div>

			<div class="col-sm-6">
				<div class="rbt-text-align">
					<input type="hidden" class="form-control rbt_field_required rbt_form_added_template" id="rbt_selcted_outcome_temp" data-error-msg="Add a New Outcome"  value="<?php echo $outcome_total_no;?>" >
					<input type="hidden" class="form-control rbt_field_required rbt_form_save_template" id="rbt_save_outcome" data-error-msg="Please Save Outcome"  value="test" >
				</div>

				<div class="">
		  			
			            <ul class=" rbt_display_flex_wrap rbt_templates_tabs_outer quiz_result_template_tabs rbt_template_disable_sortable_outer">

			           		<?php echo $outcome_tabs;?>

						</ul>

						
						<div class="btn rbt_transprent_btn mb-2   float-right" onclick="rbtq_add_new_outcome_trigger(this)">Add a New Outcome</div>

					
				</div>

				<div class="rbtq_empty_template_div" <?php if(!empty($outcome_template_html)){ echo 'style="display:none"';}?>>
					
					<?php echo  RBTGetEmptyBoxDesignHtml('You currently don\'t have any OutCome.', 'Please add a OutCome.','rbt_full_width','','rbtq_add_new_outcome_trigger','Click to add New OutCome');?>
				</div>
		  		<div class="quiz_result_template_outer quiz_template_outer_html_cotainer template_html_wrapper_backend  quiz-card-outer-gray rbt-padding-10">
		  			<?php echo $outcome_template_html;?>
		  					  			 
		  		</div>


		  		<div class="rbt_quiz_save_btn_wrapper">
			  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_4')">Previous</span>
					<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_5')">Save</span>
					<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_5','rbt_tab_6')">Save & Next</span>
				</div>
			</div>	
			<div class="col-sm-3 drag_drop_elements_wrapper <?php echo $customizer_visibility_hidden_cls;?> ">
				<?php include('drag_drop_elements.php'); ?>
			</div>
		</div>	

		<div class="m-3"></div>
		
	  </div> <!-- rbt_tab_5_tab end -->

	  <div class="tab-pane fade rbt_tab_level_1 <?php if($form_edit_mode){ echo ' show active ';} ?>" id="rbt_tab_6" role="tabpanel" aria-labelledby="rbt_tab_6_tab">

	  	 <div class="row">
	  		<div class="col-sm-3 <?php echo $customizer_visibility_hidden_cls;?>">
	  			<div class="customized-optional">

					<div class="customizer_heading">Template Style <i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul">
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Template Alignment','rbtqquestion_temp_aligment','rbtqquestion_template_wrapper', 'text-align',$rbtqquestion_temp_aligment,  array('center'=>'Center','left'=>'Left','right'=>'Right'));
							 ?>
					    </li>
					    <li>
							
							<?php echo RBTGetProgressCustomizerOptionHtml('Width','rbtqquestion_temp_wid','rbtq_question_template','max-width', $rbtqquestion_temp_wid,0, 1000);?>
						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqquestion_temp_background_color','rbtq_question_template', 'background-color', $rbtqquestion_temp_background_color);?>
						</li>
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqquestion_temp_border_style','rbtq_question_template', 'border-style',$rbtqquestion_temp_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
							
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqquestion_temp_border_wid','rbtq_question_template','border-width', $rbtqquestion_temp_border_wid,0, 30);?>

						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqquestion_temp_border_radius','rbtq_question_template','border-radius', $rbtqquestion_temp_border_radius,0, 30);?>

						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqquestion_temp_border_color','rbtq_question_template', 'border-color', $rbtqquestion_temp_border_color);?>
						</li>
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Template External Shadow Customizer <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul" style="display: none;">
						<li >
							<?php echo
							RBTGetColorCustomizerOptionHtml('Shadow Color', 'rbtqquestion_temp_shadow_color','rbtq_question_template', 'shadow', $rbtqquestion_temp_shadow_color,'rbtqquestion_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Spread Radius','rbtqquestion_temp_shadow_spread_radius','rbtq_question_template','shadow', $rbtqquestion_temp_shadow_spread_radius,0, 50,'rbtqquestion_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Blur Radius','rbtqquestion_temp_shadow_blur_radius','rbtq_question_template','shadow', $rbtqquestion_temp_shadow_blur_radius,0, 50,'rbtqquestion_temp');?>
						</li>
						
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Horizontal Length','rbtqquestion_temp_shadow_horizontal_length','rbtq_question_template','shadow', $rbtqquestion_temp_shadow_horizontal_length,0, 50,'rbtqquestion_temp');?>
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Vertical Length','rbtqquestion_temp_shadow_vertical_length','rbtq_question_template','shadow', $rbtqquestion_temp_shadow_vertical_length,0, 50,'rbtqquestion_temp');?>
						</li>
						
						
					</ul>
	  			</div>

	  			<div class="customized-optional">

					<div class="customizer_heading">Template 
					Answer Style 
 					<i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
					<ul class="templates-styles customized-optional-ul" style="display: none;">
						<i class="fa fa-refresh rbt_anchor_btn rbt_refesh_customizer_values_btn" aria-hidden="true" title="Refresh style for each answer fields" style="float: right;" onclick="rbt_refesh_customizer_values(this)"> &nbsp;&nbsp;Refresh Style</i>
						
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Background Color', 'rbtqquestion_temp_ans_background_color','rbtq_question_ans_item', 'background-color', $rbtqquestion_temp_ans_background_color);?>
						</li>
						<li>
							<?php
								echo RBTGetSelectCustomizerOptionHtml('Border Style','rbtqquestion_temp_ans_border_style','rbtq_question_ans_item', 'border-style',$rbtqquestion_temp_ans_border_style,  array('solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted'));
							 ?>
							
						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Width','rbtqquestion_temp_ans_border_wid','rbtq_question_ans_item','border-width', $rbtqquestion_temp_ans_border_wid,0, 30);?>

						</li>
						<li>
							<?php echo RBTGetProgressCustomizerOptionHtml('Border Radius','rbtqquestion_temp_ans_border_radius','rbtq_question_ans_item','border-radius', $rbtqquestion_temp_ans_border_radius,0, 30);?>

						</li>
						<li>
							<?php echo
							RBTGetColorCustomizerOptionHtml('Border Color', 'rbtqquestion_temp_ans_border_color','rbtq_question_ans_item', 'border-color', $rbtqquestion_temp_ans_border_color);?>
						</li>
					</ul>
	  			</div>

	  			
	  			
	  		</div>

			<div class="col-sm-6">
				<div class="rbt-text-align">
					<input type="hidden" class="form-control rbt_field_required rbt_form_added_template" id="rbt_selcted_question_temp" data-error-msg="Add a New Question"  value="<?php echo $question_total_no;?>" >
					<input type="hidden" class="form-control rbt_field_required rbt_form_save_template" id="rbt_save_question" data-error-msg="Please Save Question"  value="test" >
				</div>
				
				
				<div class="">
		  			
			            <ul class=" rbt_display_flex_wrap rbt_templates_tabs_outer quiz_question_template_tabs">

			           		<?php echo $question_tabs;?>
						</ul>

						<div class="rbt_display_flex border-top pt-2">

							<div class="quiz-content-card border-bottom-0 pb-0 p-0" style="">
								<h5 class="quiz--sub-title">Enable Branching&nbsp;</h5>	
								<div class="quiz_right-content">
									<div class="square_switch_on_off">
										<input class="checkbox quiz_basic_checkbox_fields" name="quiz_branching_enable" type="checkbox" id="quiz_branching_enable" <?php if(isset($quiz_branching_enable) && ($quiz_branching_enable == 'Y')){ echo "checked";} ?>>
										<label for="quiz_branching_enable"></label>
									</div>
								</div>
							</div>
							<div class="btn rbt_transprent_btn mb-2   float-right" onclick="rbtq_add_new_question_trigger(this)">Add a New Question</div>
						</div>

					
				</div>

				<div class="rbtq_empty_template_div" <?php if(!empty($question_template_html)){ echo 'style="display:none"';}?>>
				
					<?php echo  RBTGetEmptyBoxDesignHtml('You currently don\'t have any Question.', 'Please add a Question.','rbt_full_width','','rbtq_add_new_question_trigger','Click to add Question');?>
				</div>
		  		<div class="quiz_question_template_outer quiz_template_outer_html_cotainer template_html_wrapper_backend ">
		  				<?php echo $question_template_html;?>	  			 
		  		</div>

		  		<div class="rbt_quiz_save_btn_wrapper">
			  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_4')">Previous</span>
					<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_6')">Save</span>
					<span class="btn btn-info" onclick="rbt_save_quiz_template(this,'rbt_tab_6','rbt_tab_7')">Save & Next</span>
				</div>
		  		
			</div>	
			<div class="col-sm-3 drag_drop_elements_wrapper <?php echo $customizer_visibility_hidden_cls;?>">
				<?php include('drag_drop_elements.php'); ?>
			</div>
		</div>	
			<div class="m-3"></div>
		
	  </div> <!-- rbt_tab_6_tab end -->


	  <div class="tab-pane fade rbt_tab_level_1" id="rbt_tab_7" role="tabpanel" aria-labelledby="rbt_tab_7_tab">
	  		 <div class="form-group form-group col-sm-4 ml-0 pl-0">
			<label for="contact_form_name">Select Email Template</label>
			
			<select name="email_template_id" class="form-control" id="email_template_id">
				<option value="0" >Select Template</option>
			<?php 
				if(isset($email_templates_list)){
					foreach($email_templates_list as $email_template_info){
						$email_selected = '';
						if($selected_email_temp == $email_template_info->getId()){
							$email_selected = 'selected';
						}
						echo "<option ".$email_selected." value='".$email_template_info->getId()."'>".$email_template_info->getTemplateName()."</option>";		
					}
				
				}

			?>
			</select>

	  </div>

	  	<div class="shortcode_details_div"><?php echo $shortcode_details;?></div>

	  	<div class="rbt_quiz_save_btn_wrapper">
	  		<span class="btn rbtq-prev-btn" onclick="rbt_next_tab_show('rbt_tab_4')">Previous</span>
			<span class="btn btn-primary" onclick="rbt_save_quiz_template(this,'rbt_tab_7')">Save</span>
			<a  href="<?php echo admin_url('admin.php?page=rbt_manage_form'); ?>"  onclick="rbt_show_loader();" class="btn btn-secondary">Return to Manage Shortcodes</a>
		</div>

	  </div> <!-- rbt_tab_7_tab end -->
	 

</div>

<?php echo RBTCommonVariableHtmlAdmin(); ?>
<?php echo RBTQuizGlobalScriptVariableHtmlAdmin(); ?>




<script type="text/javascript">
	
	jQuery(document).ready(function(){
		
		<?php 


			if(!empty($edit_mode_set_customizer_values_prepopulate)){
				
			
				foreach($edit_mode_set_customizer_values_prepopulate as $set_customizer_values_prepopulate){
					?>
					if(jQuery('.rbt_edit_trigger_change_customizer').lenght != 0 ){

						jQuery('.rbt_edit_trigger_change_customizer').each(function(){
							jQuery(this).trigger('change');
						});
					}

					var set_customizer_values_prepopulate = '<?php echo $set_customizer_values_prepopulate;?>';

					set_customizer_values_prepopulate = JSON.parse(set_customizer_values_prepopulate);
					
		            rbt_set_customizer_values(set_customizer_values_prepopulate);
					<?php 

				}

			}
		?>
	});

	
</script>
