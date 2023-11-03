<div class="rbt_main_container">
	<?php include_once('common.php'); 
	echo RBTModalHtmlAdmin('rbt_modal_outer_user_info rbt_modal_side_popup');

	$show_select_page_type_display_status = false;
	$show_list_table_display_status = false;
	if(isset($_GET['page_type'])){
		$show_select_page_type_display_status = true;
		$show_list_table_display_status = false;				
	}else{
		$show_select_page_type_display_status = false;
		$show_list_table_display_status = true;
	}
	?>
	<div class="rbt_table_contant m-2 bg-light">
		<div class="rbt_header p-4">
			<div class="row">
				<div class="col-sm-6">
					<div class="rbt_heading">
						<h3><i class="fa fa-sort"></i> Manage Users</h3>
					</div>
				</div>
				<?php if($show_select_page_type_display_status){ ?>
					<div class="col-sm-12">
						<a href="<?php echo admin_url('admin.php?page=rbt_users'); ?>" class="rbt_create-btn btn float-right">		Manage all Users Info</a>
					</div>
				<?php }	?>
				
			</div>
		</div>
		<?php 
		

		if($show_list_table_display_status){
			?>

		<div class="rbt_select_form_outer" >
			<div class="row">
				<?php 
				$shortcode_list = array();
				$shortcode_list[] = array('title'=>'Contact Form', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'contact');
				$shortcode_list[] = array('title'=>'Login Form', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'login');
				//$shortcode_list[] = array('title'=>'Gallery Page', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'rbt_create_gallery_shortcode');
				$shortcode_list[] = array('title'=>'User Registration Page', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'registration');
				$shortcode_list[] = array('title'=>'Subscribe Form', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'subscribe');

				//$shortcode_list[] = array('title'=>'Slider', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'rbt_create_slider_shortcode');

				//$shortcode_list[] = array('title'=>'Full Template', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'rbt_create_full_template_shortcode');

				$shortcode_list[] = array('title'=>'Page Visit', 'image_link' => 'assets/images/select-form.png', 'page_type' => 'page_visit');


				$html  = '';
				foreach ($shortcode_list as $key => $shortcode_info) {
					$img = plugin_dir_url(__FILE__)."../".$shortcode_info['image_link'];
					$title = $shortcode_info['title'];
					$link = admin_url('admin.php?page=rbt_users&page_type='.$shortcode_info['page_type']);
					$html  .= '<div class="col-sm-3">
								<div class="card" >
							 	 	<img class="card-img-top" src="'.$img.'">
									<div class="card-body">
									    <h5 class="card-title">'.$title.'</h5>
									    <p class="card-text d-none"></p>
									    <a href="'.$link.'"  onclick="rbt_show_loader();"  class="btn btn-primary">View</a>
								    </div>
								</div>
							</div>
							';
				}
				echo $html;
				?>
			</div>	
		</div>	
		<?php }else { ?>
			
		<div class="rbt_manage_shortcode_form_table_id_wrapper rbt_manage_table_class p-4">
			<?php echo RBTGetManageUserTableHtml();	?>
		</div>
	<?php } ?>
	</div>
</div>
