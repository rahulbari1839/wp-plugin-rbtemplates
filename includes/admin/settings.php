<?php 

$settings_names_arr = array('rbt_setting_chatgpt_enable' => '','rbt_setting_chatgpt_apikey' => '');
if(is_array($settings_names_arr) && !empty($settings_names_arr)){
	extract($settings_names_arr);	
}

$settings_names_arr_keys = array_keys($settings_names_arr);

$setting_obj = RBT_MessagesNameValuePair::loadByTypeAndNamesArr('settings',$settings_names_arr_keys);

if(is_array($setting_obj) && !empty($setting_obj)){
			
	extract($setting_obj);	
}

if($rbt_setting_chatgpt_enable == 'Y'){
		$rbt_setting_chatgpt_enable = 'checked';
}
?>

<div class="rbt_main_container rbt-slider-body-admin template_type_outer_container_class_<?php echo $template_type; ?>">
	
	<ul class="nav nav-tabs rbt_tabs" id="rbt_tabs" role="tablist">
	  <li class="nav-item" role="presentation">
		<a class="nav-link active " id="rbt_tab_1_tab" data-toggle="tab" href="#rbt_tab_1" role="tab" aria-controls="rbt_tab_1" aria-selected="true">Credentials </a>
	  </li>
	  
	</ul>
	<div class="tab-content p-4  " id="rbTabContent">

	  <div class="tab-pane fade  show active accordion-item" id="rbt_tab_1" role="tabpanel" aria-labelledby="rbt_tab_1_tab"> 	   

  	        <div class="accordion" id="rbt_settings_accordion">
			  <div class="accordion-item">
			    <h2 class="accordion-header" id="headingOne">
			      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rbt_settings_accordion_1" aria-expanded="true" aria-controls="rbt_settings_accordion_1">
			        Chat-GTP Credentials
			      </button>
			    </h2>
			    <div id="rbt_settings_accordion_1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#rbt_settings_accordion">
			      <div class="accordion-body">
						<form action="rbt_settings_form" class="">

						<div class="form-group d-flex">
							<label >Enable?&nbsp;</label>
							<div class="square_switch_on_off nput-group">
								<input class="checkbox rbt_save_field" name="rbt_setting_chatgpt_enable" type="checkbox" id="rbt_setting_chatgpt_enable" name="rbt_setting_chatgpt_enable" <?php echo $rbt_setting_chatgpt_enable; ?>>
								<label for="rbt_setting_chatgpt_enable"></label>
							</div>
						 </div>	

						  
						  <div class="form-group">
							<label class="fw-bold"> API KEY</label>
							<input type="text" class="form-control w-50 rbt_save_field" placeholder="Enter you API key" name="rbt_setting_chatgpt_apikey" id="rbt_setting_chatgpt_apikey" value="<?php echo $rbt_setting_chatgpt_apikey; ?>">
						   
						  </div>					  
						  <div class="submit_btn_outer d-flex justify-content-end">
							  <button type="button" class=" px-5 py-2  rbt_save_btn" onclick="rbt_save_settings(this)">Save</button>					    
						  </div>

						</form>     			 
			      </div>			      
			    </div>
			  
			  
			  </div>			  
			</div>  
	   </div>
	</div>
</div>
