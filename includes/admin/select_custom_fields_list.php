<div class="rbt_template_customizers_outer customized-optional" >
			   <div class="rbt_template_customizers_inner">
				   <div class="Template-Customize-Setting" >
			         <div class="showHideLeftSidebaroptions">
			            <div class="customizer_heading" >
			               Add Fields 
			               
			                  <i class="fa fa-angle-up coptional-open-close-btn" aria-hidden="true" ></i>
			               
			            </div>
			         </div>
			        <div class="rbt_addcustomfield_draggable_elements_wrapper rbt_customizers_innner_sections customized-optional-ul" >
					  <?php 
						$data_fields_list = RBT_Fields::load();
						$fields_dragdrop_html = '';
						$fields_dragdrop_heading_html = '';
						if(isset($data_fields_list)){
							$fields_allow_array = array('textarea','text','email','number','radio','checkbox','file');
							foreach($data_fields_list as $data_field_info){
								
								$id = $data_field_info->getId();
								$date = $data_field_info->getDate();
								$field_name = $data_field_info->getName();
								$field_type = $data_field_info->getType();
								$field_value = $data_field_info->getValue();
								$field_label = $data_field_info->getLabel();
								if(!in_array($field_type, $fields_allow_array)){
									continue;
								}

								$field_placeholder = $data_field_info->getPlaceholder();
								$fields_dragdrop_heading_html .= '<div class="rbt_inner_section_side_bar rbt_addcustomfield_draggable_element_outer rbt_field_wrapper field_type_'.$field_type.'" data-type="add_custom_field" data-field-name="'.$field_name.'">
						  <span  class="draggableElement btn template_style element_btn ">'.$field_name.'</span>		
					   </div>';
					    $field_input_html  = '';
                        $field_is_required_class = ' ||||'.$field_name.'_class|||| ';
                        $field_is_required_msg = ' ||||error_'.$field_name.'_msg|||| ';

                        $edit_placeholder_class = ' rbt_field_change_placehoder ';
                        if($field_value != ''){
                        	 $edit_placeholder_class = '';

                        }

                       $extra_class = " rb_field_input_".$field_type."_class ";
					   if($field_type == 'textarea'){
					   	 $field_input_html  = '<textarea class="form-control  '.$extra_class.$edit_placeholder_class.' rbt_field '.$field_is_required_class.' " data-error-msg="'.$field_is_required_msg.'" name="'.$field_name.'" placeholder="'.$field_placeholder.'" >'.$field_value.'</textarea>';
					   }else if($field_type == 'text' || $field_type == 'email' || $field_type == 'file' ||  $field_type == 'number'){
					  	 $field_input_html  = '<input type="'.$field_type.'" class="form-control  '.$extra_class.$edit_placeholder_class.'  rbt_field '.$field_is_required_class.' " data-error-msg="'.$field_is_required_msg.'"  name="'.$field_name.'" placeholder="'.$field_placeholder.'" value="'.$field_value.'" >';
						}else if($field_type == 'radio' || $field_type == 'checkbox' ){
							 $field_input_html  = '<input value="'.$field_value.'" type="'.$field_type.'" class="form-control_rename   rbt_field '.$field_is_required_class.' " data-error-msg="'.$field_is_required_msg.'"  name="'.$field_name.'" placeholder="'.$field_placeholder.'" >';
						}else{
							continue;
						}


					 

					   if($field_type == 'file'){
					   	 $field_input_html  .= '<div class="rbt_field_file_html "></div>';
					   }
 					   $field_input_html  .= '<div class="rbt_field_error_msg_html "></div>';


					   $fields_dragdrop_html .= '<div data-action="add_custom_field" class="rbt_template_drag_drop_item_section_level_2  dragdrop_text_elements  rbt_custom_field_'.$field_name.' "  style="font-size:14px;font-weight:300;color:#333;" ><label class="rbt_tiny_mce_editor_disabled "">'.$field_label.'</label> '.$field_input_html.'</div>'; 
							}
						}else{

						}
						echo $fields_dragdrop_heading_html;
			 ?>
					   
					</div>
					<div style="display: none">
					<?php echo $fields_dragdrop_html ;?>
					</div>
				</div>
			</div>
		
			
		</div>
