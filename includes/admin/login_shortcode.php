<?php 
wp_enqueue_script("rbt_sortable_jquery_ui", "//code.jquery.com/ui/1.12.1/jquery-ui.js", array('jquery')); 
$rand_no = RBTRandNumber('image');
$rbt_temp_aligment = 'center';
$rbt_temp_wid = 573;
$rbt_temp_background_color = '#fff';
$rbt_temp_border_width = 0;
$rbt_temp_border_style = 'none';
$rbt_temp_border_color = '#fff';
$rbt_temp_border_radius = 0;


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

$rbt_temp_error_width = 352;
$rbt_temp_error_background_color = '#f05b41';
$rbt_temp_error_border_width = 0; 
$rbt_temp_error_style = 'none';
$rbt_temp_error_border_color = '#fff';
$rbt_temp_error_border_radius = 0;

$form_name = '';
$form_html = '';
$customizer_values = '';
$template_no = '';
$form_edit_id = '';
$shortcode_details = '';
$form_edit_mode = false;
$template_type = 'login';

//default value for temp display type is  click button to show
$display_type = '';
$rbt_temp_click_button_aligment = 'center';
$rbt_temp_click_button_wid = 200;
$rbt_temp_click_button_backgound_color = '#b45541';
$rbt_temp_click_button_height = 9;
$rbt_temp_click_button_margin_top = 0;
$rbt_temp_click_button_margin_botton = 0;

$temp_button_click_html_display = 'none';
$temp_button_click_html = '<div class="rbt_temp_button_click_show_outer"><div class="rbt_temp_button_click_show   %%template_button_click_merge_class%% rbt_tiny_mce_editor">Click to Login</div></div>';


$form_status = '';

//$email_templates_list = RBT_EmailNotificationTemplates::loadByType($template_type);
$email_templates_list = null;
$selected_email_temp = 0;
if(isset($_GET['id'])){
	$RBT_DataHas = RBT_Form::loadById($_GET['id']);
	if(isset($RBT_DataHas)){
		$form_edit_mode = true;
		$form_edit_id = $_GET['id'];
		$form_name = $RBT_DataHas->getName();
		$form_status = $RBT_DataHas->getStatus();
		
		$template_no = $RBT_DataHas->getTemplateNo();
		$display_type = $RBT_DataHas->getDisplayType();

		if($display_type == 'button_click'){
			$temp_button_click_html_display = 'block';
			$temp_button_click_html = stripslashes($RBT_DataHas->getHtml2());
		}
		$shortcode_details  = RBTGetShortcodeNameByIdAndType($form_edit_id,$template_type);
		$shortcode_details  = '<div class="rbt_shortcode_details"><span class="shortcode_details">Here is your Shortcode:</span><p><span class="shortcode_display" id="dynamic_copyable_text_rbt_'.$form_edit_id.'">'.$shortcode_details.'</span><span data-id="dynamic_copyable_text_rbt_'.$form_edit_id.'" class="copy-btn " onclick="rbt_copy_to_clipboard(this)"><i class="fa fa-files-o" aria-hidden="true"></i> Copy</span>  </p></div>';
		$form_html = $RBT_DataHas->getHtml();
		$form_html = stripslashes($form_html);
		$form_html = '<link rel="stylesheet"  href="'.plugin_dir_url(__FILE__)."../templates/".$template_type."/".$template_no."/style.css?".rand(1,1000).'"><div class="template_html_wrapper ">'.$form_html.'</div>';
		$customizer_values = $RBT_DataHas->getCustomizerValues();
		$customizer_values_json = $RBT_DataHas->getJson();
		
		
	    $customizer_values = rbtGetCustomizerValuesArr($customizer_values);
	    
	    if(is_array($customizer_values) && !empty($customizer_values)){
			
			extract($customizer_values);
		}
		
		$customizer_values_json = rbtGetCustomizerValuesArr($customizer_values_json);
		
	    if(is_array($customizer_values_json) && !empty($customizer_values_json)){
			//print_r($customizer_values_json);	
			extract($customizer_values_json);
		}
	}
}
?>


<div class="rbt_main_container template_type_outer_container_class_<?php echo $template_type; ?>"">
	<?php include_once('common.php');
	echo RBTModalHtmlAdmin('rbt_modal_outer_img_preview');
	 ?>
	<ul class="nav nav-tabs rbt_tabs" id="rbt_tabs" role="tablist">
	  <li class="nav-item" role="presentation">
		<a class="nav-link <?php if(!$form_edit_mode){ echo ' active ';} ?>" id="rbt_tab_1_tab" data-toggle="tab" href="#rbt_tab_1" role="tab" aria-controls="rbt_tab_1" aria-selected="true">Basic Info</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link <?php if($form_edit_mode){ echo ' active ';} ?>" id="rbt_tab_2_tab" data-toggle="tab" href="#rbt_tab_2" role="tab" aria-controls="rbt_tab_2" aria-selected="false">Template Customizer</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link" id="rbt_tab_3_tab" data-toggle="tab" href="#rbt_tab_3" role="tab" aria-controls="rbt_tab_3" aria-selected="false">Details</a>
	  </li>

	  <a  class="btn rbt_transprent_btn rbt_preview_shortcode_btn " onclick="rbt_preview_shortcode(this)" href="javascript:void(0)" <?php if(!$form_edit_mode){ echo ' style="display:none"; ';} ?>>Preview Shortcode</a>
	</ul>
	<div class="tab-content p-4" id="rbTabContent">
	  <div class="tab-pane fade  <?php if(!$form_edit_mode){ echo ' show active ';} ?>" id="rbt_tab_1" role="tabpanel" aria-labelledby="rbt_tab_1_tab">
		<input type="hidden" class="form-control" id="rbt_form_edit_id" value="<?php echo $form_edit_id;?>">
		 <input type="hidden" class="form-control" id="template_type" value="<?php echo $template_type;?>">
		 <div class="form-group form-group col-sm-4 ml-0 pl-0">
			<label for="rbt_form_name"><?php echo ucfirst($template_type); ?>  Form Name</label>
			<input type="text" class="form-control rbt_field_required" data-error-msg="Please enter name." id="rbt_form_name" placeholder="Enter Name" value="<?php echo $form_name;?>">
		  </div>


		<div class="form-group">
			<label ><h5>Enable?</h5></label>
			<div class="square_switch_on_off nput-group form-control rbt_div_width_200">
				<input class="checkbox " name="form_status" type="checkbox" id="form_status"  <?php if($form_status == 'Y'){ echo "checked"; } ?>>
				<label for="form_status"></label>
			</div>
		</div>	

		   <div class="form-group">
			<label ><h5>Select Display Template Type</h5></label>
			<select class="input-group form-control rbt_div_width_200" id="rbt_temp_display_type" name="rbt_temp_display_type" onchange = "rbtTempDisplayType(this)" >
				<option value="in_page">In-Page </option>
				<option value="popup" <?php if($display_type == 'popup'){ echo 'selected'; } ?>>Popup </option>
				<option value="button_click" <?php if($display_type == 'button_click'){ echo 'selected'; } ?>>Button-Click</option>
			</select>  
		</div>	
		  
		  
		  <div class="form-group">
			<label ><h5>Select Template</h5></label>
			  
			  <ul class="rbt_templates_list  rbt_field_required" data-error-type="lenght" data-error-class="rbt_selcted_temp" data-error-class data-error-msg="Please select a template" >
				<?php echo rbtGetTemplateListByFolderName($template_type, $template_no,$template_type);	  ?> 
			  </ul>
			
			
		  </div>
	  
		<div class="">
			<a  href="<?php echo admin_url('admin.php?page=rbt_manage_form'); ?>"  onclick="rbt_show_loader();" class="btn btn-secondary">Return to Manage Shortcodes</a>
			
			<span class="btn btn-primary" onclick="rbt_save_form_template(this,'rbt_tab_1')">Save</span>
			<span class="btn btn-info" onclick="rbt_save_form_template(this,'rbt_tab_1','rbt_tab_2')">Save & Next</span>
		</div>
	  
	  </div>
	  <div class="tab-pane fade <?php if($form_edit_mode){ echo ' show active ';} ?>" id="rbt_tab_2" role="tabpanel" aria-labelledby="rbt_tab_2_tab">
	  
	  <div class="row">
		<div class="col-sm-3">
			
			<div class="customized-optional  temp_click_button_option_show_hide" style="display: <?php echo  $temp_button_click_html_display;?>">
				<div class="customizer_heading">Template Button Style <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
				<ul class="templates-styles customized-optional-ul">
					<li>
						<label>Alignment</label>
						<div class="input-group ">
							<select class="input-group form-control rbt_enable_select_customizer"  name="rbt_temp_click_button_aligment" onchange="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show_outer','text-align')">
							<?php 

							

							$rbt_temp_aligment_array = array('center'=>'Center','left'=>'Left','right'=>'Right');

							foreach($rbt_temp_aligment_array as $key=>$value){
								$slected = '';
								if($key == $rbt_temp_click_button_aligment ){

								$slected = 'selected=selected';
								}
								echo "<option value='".$key."' $slected >$value</option>";
							}
							?>
								
								
							</select>
						</div>
				   </li>
				    <li>
					<label>Width</label>
					<div class="input-group ">
						<div class="input-group form-control rbt_enable_progress_customizer">
							<input  name="rbt_temp_click_button_wid"  type="range" value="<?php echo $rbt_temp_click_button_wid;?>" min="0" max="500" oninput="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show','width','range')" /> 
							<div class="rtb_range_value rbt_temp_click_button_wid_dynamic_val" ><?php echo $rbt_temp_click_button_wid;?>px</div>
						</div>
					</div>
					</li>
					 <li>
					<label>Height</label>
					<div class="input-group ">
						<div class="input-group form-control rbt_enable_progress_customizer">
							<input  name="rbt_temp_click_button_height"   type="range" value="<?php echo $rbt_temp_click_button_height;?>" min="0" max="50" oninput="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show','height','range','padding')" /> 
							<div class="rtb_range_value rbt_temp_click_button_height_dynamic_val"><?php echo $rbt_temp_click_button_height;?>px</div>
						</div>
					</div>
					</li>
					<li>
					<label>Background-Color</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
							<input type="color"  name="rbt_temp_click_button_backgound_color" class="form-control rbt_enable_color_customizer" value="<?php echo $rbt_temp_click_button_backgound_color; ?>" oninput="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show','background-color')"/> 
						</div>
					</div>
					</li>
					 <li>
					<label>Margin-Top</label>
					<div class="input-group ">
						<div class="input-group form-control">
							<input class="rbt_enable_progress_customizer" name="rbt_temp_click_button_margin_top" type="range" value="<?php echo $rbt_temp_click_button_margin_top;?>" min="0" max="100" oninput="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show','margin-top','range','')"/> 

							<div class="rtb_range_value rbt_temp_click_button_margin_top_dynamic_val" ><?php echo $rbt_temp_click_button_margin_top;?>px</div>
						</div>
					</div>
					</li>
					 <li>
					<label>Margin-Bottom</label>
					<div class="input-group ">
						<div class="input-group form-control">
							<input class="rbt_enable_progress_customizer" name="rbt_temp_click_button_margin_bottom"   type="range" value="<?php echo $rbt_temp_click_button_margin_botton;?>" min="0" max="100" oninput="rbtChangeInputCustomizer(this,'rbt_temp_button_click_show','margin-bottom','range','')"	 /> 
							<div class="rtb_range_value rbt_temp_click_button_margin_bottom_dynamic_val"><?php echo $rbt_temp_click_button_margin_botton;?>px</div>
						</div>
					</div>
					</li>
				</ul>
		</div>
		<div class="customized-optional">
			<div class="customizer_heading">Template Style <i class="fa fa-angle-down coptional-open-close-btn" aria-hidden="true"></i></div>
			<ul class="templates-styles customized-optional-ul">
				<li>
					<label>Template Alignment</label>
					<div class="input-group ">
						<select class="input-group form-control rbt_enable_select_customizer" id="rbt_temp_aligment" name="rbt_temp_aligment">
						<?php 
						$rbt_temp_aligment_array = array('center'=>'Center','left'=>'Left','right'=>'Right');

						foreach($rbt_temp_aligment_array as $key=>$value){
							$slected = '';
							if($key == $rbt_temp_aligment ){

							$slected = 'selected=selected';
							}
							echo "<option value='".$key."' $slected >$value</option>";
						}
						?>
							
							
						</select>
					</div>
			   </li>
			   <li>
				<label>Width</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
						<input id="rbt_temp_wid" name="rbt_temp_wid" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="100" data-slider-max="1000" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_wid;?>" /> 
					</div>
				</div>
				</li>
				<li>
				<label>Background Color </label>
				<div class="input-group ">
				  <div id="rbt_temp_background_color_div" class="input-group colorpicker-component colorpicker-element">
				  <input type="text" id="rbt_temp_background_color" value="<?php echo $rbt_temp_background_color ?>"  name="rbt_temp_background_color" class="form-control rbt_enable_color_customizer"> 
				  <span class="input-group-addon">
					  <i style="background-color:<?php echo $rbt_temp_background_color;?>"></i>
				   </span>
				  </div>
				</div>
			</li>
			
			<li>
				<label>Border Width</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
						<input id="rbt_temp_border_width" name="rbt_temp_border_width" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_border_width;?>" /> 
						
					</div>
				</div>
			</li>
			
			<li>
				<label>Border Style </label>
				<div class="input-group ">
					<select class="input-group form-control rbt_enable_select_customizer" id="rbt_temp_border_style" name="rbt_temp_border_style">
					<?php 
					$rbt_temp_border_style_array = array('none'=>'None','solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted');

					foreach($rbt_temp_border_style_array as $key=>$value){
						$slected = '';
						if($key == $rbt_temp_border_style ){

						$slected = 'selected=selected';
						}
						echo "<option value='".$key."' $slected >$value</option>";
					}
					?>
						
						
					</select>
				</div>
		</li>
		<li>
			<label>Border Color </label>
			<div class="input-group ">
			  <div id="rbt_temp_border_color_div" class="input-group colorpicker-component">
			  <input type="text"  name="rbt_temp_border_color" value="<?php echo $rbt_temp_border_color;?>" id="rbt_temp_border_color" class="form-control rbt_enable_color_customizer" /> 
			  <span class="input-group-addon">
				  <i style="background-color:<?php echo $rbt_temp_border_color;?>"></i>
			   </span>
			  </div>
			</div>
			</li>
			<li>
				<label>Border Radius</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
					<input id="rbt_temp_border_radius" name="rbt_temp_border_radius" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_border_radius; ?>" /> 
				</div>
			</div>
			</li>

		   </ul>
		</div>
		
		<div class="customized-optional">
			<div class="customizer_heading">Submit button style 
			<i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
			<ul class="templates-styles customized-optional-ul" style="display: none">
			
				<li>
				<label>Width</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
						<input id="rbt_temp_submit_btn_width" name="rbt_temp_submit_btn_width" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="300" data-slider-max="1000" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_submit_btn_width;?>" /> 
					</div>
				</div>
				</li>
				
				<li>
					<label>Height</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
							<input id="rbt_temp_submit_btn_height" name="rbt_temp_submit_btn_height" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="5" data-slider-max="100" data-slider-step="1"
							 data-slider-value="<?php echo $rbt_temp_submit_btn_height;?>" /> 
						</div>
					</div>
				</li>
				<li >
					<label>Background Color </label>
					<div class="input-group ">
					  <div id="rbt_temp_submit_btn_background_color_div" class="input-group colorpicker-component colorpicker-element">
					  <input type="text" value="<?php echo $rbt_temp_submit_btn_background_color; ?>" id="rbt_temp_submit_btn_background_color" name="" class="form-control rbt_enable_color_customizer"> 
					  <span class="input-group-addon">
						  <i></i>
					   </span>
					  </div>
					</div>
				</li>
				<li >
					<label>Border Width</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
							<input id="rbt_temp_submit_btn_border_width" name="rbt_temp_submit_btn_border_width" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_submit_btn_border_width;?>" /> 
							
						</div>
					</div>
				</li>
				
				<li >
					<label>Button Border Style </label>
					<div class="input-group ">
						<select class="input-group form-control rbt_enable_select_customizer" id="rbt_temp_submit_btn_border_style" name="rbt_temp_submit_btn_border_style">
						<?php 
						$rbt_temp_submit_btn_border_style_array = array('none'=>'None','solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted');

						foreach($rbt_temp_submit_btn_border_style_array as $key=>$value){
						$slected = '';
						if($key == $rbt_temp_submit_btn_border_style ){

						$slected = 'selected=selected';
						}
						echo "<option value='".$key."' $slected >$value</option>";
						}
						?>
							
							
						</select>
					</div>
			</li>
			<li >
				<label>Border Color </label>
				<div class="input-group ">
				  <div id="rbt_temp_submit_btn_border_color_div" class="input-group colorpicker-component colorpicker-element">
				  <input type="text"  name="rbt_temp_submit_btn_border_color" value="<?php echo $rbt_temp_submit_btn_border_color;?>" id="rbt_temp_submit_btn_border_color" class="form-control rbt_enable_color_customizer" /> 
				  <span class="input-group-addon">
					  <i style="background-color:<?php echo $rbt_temp_submit_btn_border_color;?>"></i>
				   </span>
				  </div>
				</div>
				</li>
				<li >
					<label>Border Radius</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
						<input id="rbt_temp_submit_btn_radius" name="rbt_temp_submit_btn_radius" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_submit_btn_radius; ?>" /> 
					</div>
				</div>
				</li>
			</ul>
		</div>
		
		<div class="customized-optional">
			<div class="customizer_heading">External Shadow Customizer<i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
			<ul class="templates-styles customized-optional-ul" style="display: none">
				<li>
					<label>Shadow Color </label>
					<div class="input-group ">
					  <div id="rbt_temp_shadow_color_div" class="input-group colorpicker-component colorpicker-element">
					  <input type="text" value="<?php echo $rbt_temp_shadow_color;?>" id="rbt_temp_shadow_color" name="rbt_temp_shadow_color" class="form-control rbt_enable_color_customizer"> 
					  <span class="input-group-addon">
						  <i></i>
					   </span>
					  </div>
					</div>
				</li>
				<li>
				<label>Spread Radius</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
						<input id="rbt_temp_shadow_spread_radius" name="rbt_temp_shadow_spread_radius" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_shadow_spread_radius;?>" /> 
					</div>
				</div>
				</li>
				
				
				<li>
					<label>Blur Radius</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
							<input id="rbt_temp_shadow_blur_radius" name="rbt_temp_shadow_blur_radius" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_shadow_blur_radius;?>" /> 
							
						</div>
					</div>
				</li>
				
				
			
				<li>
					<label>Horizontal Length</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
						<input id="rbt_temp_shadow_horizontal_length" name="rbt_temp_shadow_horizontal_length" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_shadow_horizontal_length; ?>" /> 
					</div>
				</div>
				</li>
				<li>
					<label>Vertical Length</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
						<input id="rbt_temp_shadow_vertical_length" name="rbt_temp_shadow_vertical_length" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_shadow_vertical_length; ?>" /> 
					</div>
				</div>
				</li>
				
				
				
			</ul>	
		</div>
		
		
		<div class="customized-optional">
			<div class="customizer_heading">Response Section style<i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true"></i></div>
			<ul class="templates-styles customized-optional-ul" style="display: none">
				<li>
					<label>Background Color </label>
					<div class="input-group ">
					  <div id="rbt_temp_error_background_color_div" class="input-group colorpicker-component colorpicker-element">
					  <input type="text" value="<?php echo $rbt_temp_error_background_color;?>" id="rbt_temp_error_background_color" name="rbt_temp_error_background_color" class="form-control rbt_enable_color_customizer"> 
					  <span class="input-group-addon">
						  <i></i>
					   </span>
					  </div>
					</div>
				</li>
				<li>
				<label>Width</label>
				<div class="input-group ">
					<div class="input-group colorpicker-component">
						<input id="rbt_temp_error_width" name="rbt_temp_error_width" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="300" data-slider-max="1000" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_error_width;?>" /> 
					</div>
				</div>
				</li>
				
				
				<li>
					<label>Border Width</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
							<input id="rbt_temp_error_border_width" name="rbt_temp_error_border_width" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_error_border_width;?>" /> 
							
						</div>
					</div>
				</li>
				
				<li>
					<label>Border Style </label>
					<div class="input-group ">
						<select class="input-group form-control rbt_enable_select_customizer" id="rbt_temp_error_style" name="rbt_temp_error_style">
						<?php 
						$rbt_temp_error_style_array = array('none'=>'None','solid'=>'Solid','dashed'=>'Dashed','dotted'=>'Dotted');

						foreach($rbt_temp_error_style_array as $key=>$value){
						$slected = '';
						if($key == $rbt_temp_error_style ){

						$slected = 'selected=selected';
						}
						echo "<option value='".$key."' $slected >$value</option>";
						}
						?>
							
							
						</select>
					</div>
			</li>
			<li>
				<label>Border Color </label>
				<div class="input-group ">
				  <div id="rbt_temp_error_border_color_div" class="input-group colorpicker-component">
				  <input type="text"  name="rbt_temp_error_border_color" value="<?php echo $rbt_temp_error_border_color;?>" id="rbt_temp_error_border_color" class="form-control rbt_enable_color_customizer" /> 
				  <span class="input-group-addon">
					  <i style="background-color:<?php echo $rbt_temp_error_border_radius;?>"></i>
				   </span>
				  </div>
				</div>
				</li>
				<li>
					<label>Border Radius</label>
					<div class="input-group ">
						<div class="input-group colorpicker-component">
						<input id="rbt_temp_error_border_radius" name="rbt_temp_error_border_radius" class="form-control rbt_enable_progress_customizer" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo $rbt_temp_error_border_radius; ?>" /> 
					</div>
				</div>
				</li>
			</ul>	
		</div>
									
						
			
		</div>	
		<div class="col-sm-6">
			<div class="template_button_html_outer temp_click_button_option_show_hide" style="display: <?php echo  $temp_button_click_html_display;?>">
				<h4>Button Customizer<h4>
				<div class="template_button_html_inner">
					<?php echo $temp_button_click_html; ?>
				</div>	
			</div>	
		<div class="template_html_outer template_html_wrapper_backend">
				<?php echo $form_html; ?>
		</div>
		</div>
		<div class="col-sm-3 drag_drop_elements_wrapper">
			<?php include_once('drag_drop_elements.php'); ?>
			<?php include_once('select_custom_fields_list.php'); ?>
		
		</div>
	</div>
		<div class="row mt-4">
			
			<div class="col-sm-4">
				<span class="btn btn-primary" onclick="rbt_next_tab_show('rbt_tab_1')">Previous</span>
			</div>
			<div class="col-sm-4 text-center">
				<span class="btn btn-success " onclick="rbt_save_form_template(this,'rbt_tab_2')">Save</span>
			</div>
			<div class="col-sm-4 text-right">
				<span class="btn btn-info" onclick="rbt_save_form_template(this,'rbt_tab_2','rbt_tab_3')">Save & Next</span>
			</div>
			
		</div>
		
		
	  </div>
	  <div class="tab-pane fade" id="rbt_tab_3" role="tabpanel" aria-labelledby="rbt_tab_3_tab">
	  
	  <div class="shortcode_details_div"><?php echo $shortcode_details ; ?></div>
	  <div class="">
			
			<span class="btn btn-primary" onclick="rbt_next_tab_show('rbt_tab_2')">Previous</span>
			<span class="btn btn-primary" onclick="rbt_save_form_template(this,'')">Save</span>
			
		</div>
		
	  </div>
	</div>

</div>

<?php echo RBTCommonVariableHtmlAdmin(); ?>
