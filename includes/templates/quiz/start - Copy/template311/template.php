<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$default_numaric_values = [];
$default_style_values = [];
$default_colorpicker_values = [];

$html = '<div class="Quiz-start-Template5 start_temp_outer">
	<div class="Quiz-start-Template5-inner">
		<div class="Quiz-start-Template5-left" >
			<div class="Quiz-Template5-title rbt_tiny_mce_editor">
				<div>Enter Quiz Title Here</div>
			</div>
		</div>
		<div class="Quiz-start-Template5-right">
			<div class="Quiz-Template5-description rbt_tiny_mce_editor">
				<div><p style="font-family: \'DM Sans\',sans-serif;margin: 0;font-size: 24px;font-weight: 500;color: #fff;text-align: center;">Enter Quiz Description Here</p></div>
			</div>
			<div class="quiz-Template5-btn take-quiz-btn rbt_tiny_mce_editor"><div>Quiz Start</div></div>
		</div>
	</div>
</div>';


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));

die;
