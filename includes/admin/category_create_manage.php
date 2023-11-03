<div class="rbt_main_container">
	<?php include_once('common.php');

     $show_tab_1 = 'active';
     $show_tab_2 = '';
     $show_tab_1_content = 'show active';

    $name = '';
	$type = '';
	$is_edit_mode = null;
	$edit_id = 0;
     if(isset($_GET['mode']) && ($_GET['mode'] == 'add')){
     	 $show_tab_1 = '';
     	 $show_tab_1_content = '';
     	 $show_tab_2 = 'active';
     	 $show_tab_2_content = 'show active';
 
		if(isset($_GET['id'])){
			global $rbt_table_name_category_global;
			$cat_obj = new RBT_GeneralModel($rbt_table_name_category_global);
			$has_cat = $cat_obj->loadRowByColumn('id',$_GET['id']);
			if(isset($has_cat)){
     	  		$is_edit_mode = true;
				$name = $has_cat['name'];
				$edit_id = $has_cat['id'];
				$type = $has_cat['type'];
				
     	  }
     	}
     }
	 ?>
	<ul class="nav nav-tabs" id="rbt_tabs" role="tablist">
	  <li class="nav-item" role="presentation">
		<a class="nav-link <?php echo $show_tab_1;?> " id="rbt_tab_1_tab"  href="<?php echo admin_url('admin.php?page=rbt_category'); ?>"  onclick="rbt_show_loader();">Manage Categories</a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link   <?php echo $show_tab_2;?>" id="rbt_tab_2_tab" href="<?php echo admin_url('admin.php?page=rbt_category&mode=add'); ?>" onclick="rbt_show_loader();">Create New Category</a>
	  </li>
	</ul>
	<div class="tab-content" id="rbTabContent">
	  	<div class="tab-pane fade  show <?php echo $show_tab_1_content;?> " id="rbt_tab_1" role="tabpanel" aria-labelledby="rbt_tab_1_tab">
	  		<div class="rbt_table_contant m-2 bg-light">
				<div class="rbt_header p-4">
					<div class="row">
						<div class="col-sm-6">
							<div class="rbt_heading">
								<h3><i class="fa fa-sort"></i> Manage Categories</h3>
							</div>
						</div>
						<div class="col-sm-6">
							<a href="<?php echo admin_url('admin.php?page=rbt_category&mode=add'); ?>" class="rbt_create-btn btn float-right">
								Add New Category
							</a>
						</div>
					</div>
				</div>
				<div class="rbt_manage_shortcode_form_table_id_wrapper rbt_manage_table_class p-4">
					<?php echo rbtGetManageCategoryHtml();?>
				</div>
			</div>
	  	
	 	 </div> 
		  <div class="tab-pane fade  <?php echo $show_tab_2_content;?>" id="rbt_tab_2" role="tabpanel" aria-labelledby="rbt_tab_2_tab">

		  	<div class="row   rbt_add_fields_outer_div" id="rbt_add_category_template_outer_div">
				<div class="col-sm-6">
				  	<input type="hidden" class="form-control  rbt_field " id="edit_id" name="edit_id"  value="<?php echo $edit_id;?>">
				  	<div class="form-group form-group col-sm-4 ml-0 pl-0">
						<label for="cat_name">Name</label>
						<input type="text" class="form-control  rbt_field rbt_field_required" data-error-msg="Please enter name." id="name" placeholder="Enter Name" value="<?php echo $name;?>" name="name" >
					</div>
					<div class="form-group">
						<label for="rbt_field_type">Select type</label>
						<select class="form-control rbt_field rbt_field_required  " id="type" data-error-msg="Please select Type" name="type" <?php if(isset($is_edit_mode)){ /*echo 'readonly disabled';*/} ?> >
						  <option value="">select</option>
						  <option value="contact" <?php if($type == 'contact'){ echo 'selected';}?>>Contact-us</option>
						  <option value="quiz" <?php if($type == 'quiz'){ echo 'selected';}?>>Quiz</option>
						</select>
					</div>
					<div class="rbt_btn_actions mb-4 mt-4">
						<a href="<?php echo admin_url('admin.php?page=rbt_category'); ?>"  onclick="rbt_show_loader();" class="btn btn-secondary">Return to Manage Categories</a>
						<span class="btn btn-primary" onclick="rbt_add_category_templates(this)">Save</span>
					</div>

				</div>
			</div>
		  </div>	
	  </div>	
</div>



