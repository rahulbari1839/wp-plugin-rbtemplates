<div class="rbt_main_container">
	<?php include_once('common.php'); ?>
	<?php 

	$data_list = RBT_Form::loadColumn('type','quiz');

			

	?>
	<div class="rbt-card-outer-gray rbt-card-outer-gray pt-4 pb-4 m-0">
	<h5 class="rbt-sub-title">Quiz Funnel Settings</h5>
	
		<div class="rbt_quiz_funnel_field_outer_div rbt_display_flex">	
			<div class="rbt-content-card p-0 m-0">	
				<label for="rbt_form_name" class="rbt_label">Select Quiz &nbsp;</label>
				<select class="form-control rbt_field rbt_field_required  rbt_select2_drop_down quiz_form_id" id="type" data-error-msg="Please select Type" name="type">
				  <option value="">select Quiz</option>
				    <?php 
				  	if(isset($data_list)){
						foreach($data_list as $data_info){
							$id = $data_info->getId();
							$name = $data_info->getName();
							echo '<option value="'.$id.'" >'.$name.'</option>';
						}
					}
					?>
				</select>
			</div>


			<div class="rbt-content-card  rbt_funnel_options p-0 m-0" >
				<label for="" class="rbt_label">Activate Branching? &nbsp;</label>
				<div class="square_switch_on_off">
					<input class="checkbox" name="quiz_branching_enable" type="checkbox" id="quiz_branching_enable">
					<label for="quiz_branching_enable"></label>
				</div>
				<button class="rbt-save-btn btn rbt-margin-10" onclick="rbtq_funnel_save(this)" style=""> Save </button>
				<button class="btn rbt_transprent_btn rbt-margin-10" onclick="rbtq_funnel_reload_new_question(this)" style=""> Reload New Questions & Answers </button>
				<button class="btn rbt_transprent_btn rbt-margin-10" onclick="rbtq_funnel_reset_connection(this)" style=""> Reset Connections</button>
			</div>

		</div>



		<div class="quizfunnel-zoom-options">					
			<i class="fas fa-search-minus" onclick="editor.zoom_out()"></i>
			<i class="fas fa-search" onclick="editor.zoom_reset()"></i>
			<i class="fas fa-search-plus" onclick="editor.zoom_in()"></i>
		</div>

		<div class="funnel-card-outer-gray">
			<div class="wrapper">	  
				
				<div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">
				</div>
				
			</div>		   
		</div>

	</div>
</div>


<script>
		var id = document.getElementById("drawflow");
		const editor = new Drawflow(id);
</script>
