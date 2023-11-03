<?php
/**
* Plugin Name: RB Templets
* Plugin URI: http://rbtemplates.com/
* Description: This plugin provide to create many templates. 
* Version: 1.2
* Author: RB
* Author URI: http://rbtemplates.com/
**/

global $rbt_plugin_version;
$rbt_plugin_version = "1.0";	
define('RBT_DEBUG_LOG', 'ALL');
define('RBT_ERROR_LOG', 'ALL');
define('RBT_PLUGIN_NAME', 'rbTemplates');
define('RBT_PLUGIN_VERSION', $rbt_plugin_version);

// theme define variable 
define('RBT_PLUGIN_ROOT_URL', plugin_dir_url(__FILE__));
define('RBT_PLUGIN_RAND_NO',  rand(10,100));


global $rbt_table_name_users_info_global,$rbt_table_name_fields_global,$rbt_table_name_logs_global,$rbt_table_name_form_global, $rbt_table_name_data_name_value_pair_global,$rbt_table_name_messages_name_value_pair_global,$rbt_table_name_email_notification_templates_global,$rbt_table_name_email_notification_send_global,$rbt_table_name_quiz_global,$rbt_table_name_quiz_outcome_global,	$rbt_table_name_quiz_questions_global,
	$rbt_table_name_quiz_question_answers_global,$rbt_table_name_quiz_users_global, $rbt_table_name_quiz_users_details_global, $rbt_table_name_category_global,$rbt_table_name_tags_global;

$rbt_table_name_users_info_global  = 'rbt_users_info';
$rbt_table_name_form_global  = 'rbt_form';
$rbt_table_name_fields_global  = 'rbt_fields';
$rbt_table_name_logs_global  = 'rbt_logs';
$rbt_table_name_data_name_value_pair_global  = 'rbt_data_name_value_pair';
$rbt_table_name_messages_name_value_pair_global  = 'rbt_messages_name_value_pair';
$rbt_table_name_email_notification_templates_global  = 'rbt_email_notification_templates';
$rbt_table_name_email_notification_send_global  = 'rbt_email_notification_send';


$rbt_table_name_quiz_global = 'rbt_quiz';
$rbt_table_name_quiz_outcome_global = 'rbt_quiz_outcome';
$rbt_table_name_quiz_questions_global = 'rbt_quiz_questions';
$rbt_table_name_quiz_question_answers_global = 'rbt_quiz_question_answers';
$rbt_table_name_quiz_users_global  = 'rbt_quiz_users';
$rbt_table_name_quiz_users_details_global  = 'rbt_quiz_users_key_value';


$rbt_table_name_category_global  = 'rbt_category';
$rbt_table_name_tags_global  = 'rbt_tags';




require_once(plugin_dir_path(__FILE__)."includes/lib/functions.php");
require_once(plugin_dir_path(__FILE__)."includes/lib/functions_ajax_admin.php");
require_once(plugin_dir_path(__FILE__)."classes.php");

if (is_admin()) {
	require_once(plugin_dir_path(__FILE__)."includes/lib/install.php");
	require_once(plugin_dir_path(__FILE__)."includes/admin/includes_css_js.php");
	require_once(plugin_dir_path(__FILE__)."includes/lib/functions_admin.php");
	register_activation_hook(__FILE__,'RBTCreateTables');
	// Media uploader
	add_action('admin_enqueue_scripts', 'rbt_uploader_enqueue');
}

function rbt_uploader_enqueue() {
		wp_enqueue_media();
}




if(is_admin() && $GLOBALS['pagenow'] == 'post.php'){
	
	
	
}else{
	session_start();
	require_once(plugin_dir_path(__FILE__)."rbTemplets_fe.php");
	require_once(plugin_dir_path(__FILE__)."includes/lib/functions_fe.php");
	require_once(plugin_dir_path(__FILE__)."includes/lib/functions_ajax_fe.php");
}
require_once(dirname(__FILE__)."/_rbTemplets.php");
require_once(dirname(__FILE__)."/includes/external_system/RBTExternalSystemAPI.php");









