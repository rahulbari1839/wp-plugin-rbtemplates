<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$default_numaric_values = [];
$default_style_values = [];
$default_colorpicker_values = [];

$html = '<div class="rbtq_template rbtq_start_template rbtq_start_template1  rbtq_start_template_withbutton">
		 <div class="rbtq-Template-content">
			<div class="rbtq-start-btn rbt_tiny_mce_editor "><div>TAKE THIS QUIZ</div></div>		 
		</div>	
		</div>';


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));

die;