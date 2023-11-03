<?php 

$css_file_path = plugin_dir_url(__FILE__)."style.css?".rand(1,1000);

$default_numaric_values = [];
$default_style_values = [];
$default_colorpicker_values = [];

$html = ' <div class="Quiz-Template2 start_temp_outer quiz_comon_template">
	<h3 class="Quiz-Template-title sqb_tiny_mce_editor"><div>Enter the Quiz Title</div></h3>	
	<span class="sqbHideStartTemplateImageOuter"><button class="sqbHideStartTemplateImage">Hide Image</button></span>
	<span class="sqbShowStartTemplateImageOuter" style="display:none"><button class="sqbShowStartTemplateImage">Show Image</button></span>
	<div class="question_img_div " id="start_img_temp2">	 
		<!--span class="sqb_backend_show sqb_remove_section" data-id="start_img_temp2" ><i class="fa fa-trash-o" aria-hidden="true"></i></span-->
		<img class="start_img sqb_img_draggable"  src="'.plugins_url('').'/smartquizbuilder/includes/images/start_image1.jpg" >

		<span data-class="start_img" class="question_img_upload sbq_change_img" ><i class="fa fa-camera" aria-hidden="true"></i></span>
	</div>

	<div class="video-element-outer startTemplateVideoOuter" style="display:none">
		<a href="javascript:void(0)" class="startTemplateVideoOuterLinkOver" data-toggle="modal" data-target="#video-insert">1</a>
		<div class="video-add-link startTemplateInsertVideoOuter" style="display:none">
			<a href="javascript:void(0)" class="" data-toggle="modal" data-target="#video-insert"><i class="fa fa-file-video-o" aria-hidden="true"></i> Insert Video</a>
		</div>
		<div class="startTemplateYoutubeVideoOuter" style="display:none">
			<iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="external-videoWrapper startTemplateCommonVideoOuter" style="display:none">
			<video width="400" controls>
			</video>
		</div>
	</div>
 
	<div class="Quiz-Template-content">
		<div class="rbt_tiny_mce_editor sqb_content"><div> Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</div></div>  
		<div class="take-quiz-btn rbt_tiny_mce_editor "><div>TAKE THIS QUIZ</div></div>		 								
	</div>	 
</div>';


echo json_encode(array('html'=>$html,'css_file_path'=>$css_file_path,'default_numaric_values'=>$default_numaric_values,'default_style_values'=>$default_style_values,'default_colorpicker_values'=>$default_colorpicker_values));

die;
