<?php 

class RBT_Form {
	
	var $id;
	var $name;
	var $html;
	var $type;
	var $customizer_values;
	var $template_no;
	var $date;
	var $email_template_id;
	var $display_type;
	var $html2;
	var $html3;
	var $status;
	var $json;
	
	function getId() {
		return $this->id;
	}
	function setId($o) {
		$this->id = $o;
	}
	
	function getName() {
		return $this->name;
	}
	function setName($o) {
		$this->name = $o;
	}
	
	function getHtml() {
		return $this->html;
	}
	function setHtml($o) {
		$this->html = $o;
	}
	
	function getCustomizerValues() {
		return $this->customizer_values;
	}
	function setCustomizerValues($o) {
		$this->customizer_values = $o;
	}
	
	function getType() {
		return $this->type;
	}
	function setType($o) {
		$this->type = $o;
	}
	
	function getDate() {
		return $this->date;
	}
	function setDate($o) {
		$this->date = $o;
	}
	
	function getTemplateNo() {
		return $this->template_no;
	}
	function setTemplateNo($o) {
		$this->template_no = $o;
	}

	function getEmailTemplateId() {
		return $this->email_template_id;
	}
	function setEmailTemplateId($o) {
		$this->email_template_id = $o;
	}


	function getDisplayType() {
		return $this->display_type;
	}
	function setDisplayType($o) {
		$this->display_type = $o;
	}

	function getHtml2() {
		return $this->html2;
	}
	function setHtml2($o) {
		$this->html2 = $o;
	}
	
	function getHtml3() {
		return $this->html3;
	}
	function setHtml3($o) {
		$this->html3 = $o;
	}
	
	function getJson() {
		return $this->json;
	}
	function setJson($o) {
		$this->json = $o;
	}


	function getStatus() {
		return $this->status;
	}
	function setStatus($o) {
		$this->status = $o;
	}
	
	


	
	
	
	
	public function create(){
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			$data = array(
				'name'=> $this->getName(),
				'type'=> $this->getType(),
				'customizer_values'=> $this->getCustomizerValues(),
				'template_no'=> $this->getTemplateNo(),
				'html'=> $this->getHtml(),
				'email_template_id'=> $this->getEmailTemplateId(),
				'display_type'=> $this->getDisplayType(),
				'html2'=> $this->getHtml2(),
				'html3'=> $this->getHtml3(),
				'json'=> $this->getJson(),
				'status'=> $this->getStatus(),
			); 
			
			$wpdb->insert($tableName, $data);
			
			$id = $wpdb->insert_id;
			return $lastid = $id;
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: create,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: create , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	
	public function update(){
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			
		
			$data = array(
				'name'=> $this->getName(),
				'type'=> $this->getType(),
				'customizer_values'=> $this->getCustomizerValues(),
				'template_no'=> $this->getTemplateNo(),
				'html'=> $this->getHtml(),
				'email_template_id'=> $this->getEmailTemplateId(),
				'display_type'=> $this->getDisplayType(),
				'html2'=> $this->getHtml2(),
				'html3'=> $this->getHtml3(),
				'json'=> $this->getJson(),
				'status'=> $this->getStatus(),
			); 
			
			
			$wpdb->update($tableName,$data,array('id'=>$this->getId()),null,null);
			
			$id = $this->getId();
			return $lastid = $id;
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: update,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: update , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	public static function loadById($id) {
		 
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			$sql = "SELECT * FROM " . $tableName . " WHERE `id` ='".$id."'" ;
			$row = $wpdb->get_row($sql, ARRAY_A);
			$data = null;
			if(isset($row)){		
				$data = new RBT_Form();
				$data->setId($row['id']);
				$data->setName($row['name']);
				$data->setType($row['type']);
				$data->setHtml($row['html']);
				$data->setCustomizerValues($row['customizer_values']);
				$data->setDate($row['date']);
				$data->setTemplateNo($row['template_no']);
				$data->setEmailTemplateId($row['email_template_id']);
				$data->setDisplayType($row['display_type']);
				$data->setHtml2($row['html2']);			
				$data->setHtml3($row['html3']);
				$data->setJson($row['json']);
							
				$data->setStatus($row['status']);	
				
			}
			
			return $data;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: loadById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: loadById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	public static function load() {
		 
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			$sql = "SELECT * FROM " . $tableName;
			$rows = $wpdb->get_results($sql, ARRAY_A);
			$data_multiples = null;
			if(isset($rows) && is_array($rows)){
				 foreach($rows as $row){		
					$data = new RBT_Form();
					$data->setId($row['id']);
					$data->setName($row['name']);
					$data->setType($row['type']);
					$data->setHtml($row['html']);
					$data->setCustomizerValues($row['customizer_values']);
					$data->setDate($row['date']);
					$data->setTemplateNo($row['template_no']);
					$data->setEmailTemplateId($row['email_template_id']);
					$data->setDisplayType($row['display_type']);
					$data->setHtml2($row['html2']);
					$data->setHtml2($row['html3']);
					$data->setStatus($row['status']);
					$data->setJson($row['json']);			
					$data_multiples[] =  $data;
				}
			}
			
			return $data_multiples;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: load,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: load , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}

	public static function loadColumn($column_name = '', $column_value = '') {
		 
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			$sql = "SELECT * FROM " . $tableName;
			if(!empty($column_name)){
				$sql .= " WHERE `".$column_name."` ='".$column_value."'" ;
			}
			$rows = $wpdb->get_results($sql, ARRAY_A);
			$data_multiples = null;
			if(isset($rows) && is_array($rows)){
				 foreach($rows as $row){		
					$data = new RBT_Form();
					$data->setId($row['id']);
					$data->setName($row['name']);
					$data->setType($row['type']);
					$data->setHtml($row['html']);
					$data->setCustomizerValues($row['customizer_values']);
					$data->setDate($row['date']);
					$data->setTemplateNo($row['template_no']);
					$data->setEmailTemplateId($row['email_template_id']);
					$data->setDisplayType($row['display_type']);
					$data->setHtml2($row['html2']);	
					$data->setHtml3($row['html3']);	
					$data->setStatus($row['status']);
					$data->setJson($row['json']);	
					$data_multiples[] =  $data;
				}
			}
			
			return $data_multiples;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: load,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: load , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	public static function deleteById($id = 0) {
		
		try {
			global $wpdb, $rbt_table_name_form_global;
			$tableName = $wpdb->prefix . $rbt_table_name_form_global;
			$wpdb->delete($tableName, array( 'id' => $id ) );
			return $id;
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_Form.php: deleteById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_Form.php: deleteById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	
}	
	
	
	
	
	
