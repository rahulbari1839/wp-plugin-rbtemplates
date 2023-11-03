<?php 

class RBT_GeneralModel {

	var $table_name;

	public function __construct($table_name = ''){
		$this->table_name = $table_name;

	}	
	public function create($data_arr = array()){
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;			
			$wpdb->insert($tableName, $data_arr);
			
			$id = $wpdb->insert_id;
			return $lastid = $id;
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: create,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: create , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	
	public function update($data_arr = array(),$where_column_name = '', $where_column_value = ''){
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;
						
			$wpdb->update($tableName,$data_arr,array($where_column_name=>$where_column_value),null,null);
			
			/*$id = $this->getId();
			return $lastid = $id;*/
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: update,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: update , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}


	public  function loadByFilter($filters = '') {
		 
		try {
			global $wpdb;
			$tableName = $this->table_prefix . $this->table_name;
			$sql = "SELECT * FROM " . $tableName;

			if(is_array($filters) && count($filters)){
				$all_filter_compaire_operators = ['='];
				$order_by_opetators = ['desc','asc'];
				foreach ($filters as $filters_info) {

					if(is_array($filters_info) && isset($filters_info['where'])){
						$sql .= " where ";
						$i = 0;
						foreach ($filters_info['where'] as $filters_info) {
							$i++;
							$column_name = $filter_info['column_name'];
							$column_value = $filter_info['column_value'];
							$filter_compair_opetator = $filter_info['filter_compair_opetator'];
							if(!empty($filter_action) && in_array($filter_compair_opetator, $all_filter_compaire_operators)){
								if($i != 1){
									$sql .= " and ";
								}
								$sql .= " `".$column_name."` ".$filter_compair_opetator." '".$column_value."'";
							}
						}

					}

					if(is_array($filters_info) && isset($filters_info['order_by'])){
						$sql .= " order by ";
						$i = 0;
						foreach ($filters_info['order_by'] as $filters_info) {
							$i++;
							$column_name = $filter_info['column_name'];
							$order_by_opetator = $filter_info['order_by_opetator'];
							if(!empty($filter_action) && in_array(strtolower($order_by_opetator), $order_by_opetators)){
								if($i != 1){
									$sql .= " , ";
								}
								$sql .= "`".$column_name."` ".$order_by_opetator ;
							}
						}

					}
					
				}
			}

			$rows = $wpdb->get_results($sql, ARRAY_A);
			$data = null;
			if(is_array($rows) && count($rows)){
				 $data = $rows;
			}
			
			return $data;
		 
		}catch (PDOException $e) {
			atdwSynclogToFile("RBT_GeneralModel.class.php: loadById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			atdwSynclogToFile("RBT_GeneralModel.class.php: loadById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	public  function loadRowByColumn($load_by_column_name = '', $load_by_column_value = '') {
		 
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;
			$sql = "SELECT * FROM " . $tableName . " WHERE `".$load_by_column_name."` ='".$load_by_column_value."'" ;
			$row = $wpdb->get_row($sql, ARRAY_A);
			$data = null;
			if(is_array($row) && count($row)){	
				$data = $row;
			}
			
			return $data;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: loadById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: loadById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}

	public  function loadRowsByColumn($load_by_column_name = '', $load_by_column_value = '', $order_by_column_name = '', $order_by_column_asc_desc = '') {
		 
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;
			$sql = "SELECT * FROM " . $tableName . " WHERE `".$load_by_column_name."` ='".$load_by_column_value."'" ;

			if(!empty($order_by_column_name)){
				$sql .= " order by `".$order_by_column_name."` ".$order_by_column_asc_desc ;
			}
			$rows = $wpdb->get_results($sql, ARRAY_A);
			$data = null;
			if(is_array($rows) && count($rows)){
				 $data = $rows;
			}
			
			return $data;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: loadById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: loadById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}

	
	
	public  function load() {
		 
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;
			$sql = "SELECT * FROM " . $tableName;
			$rows = $wpdb->get_results($sql, ARRAY_A);
			$data = null;
			if(isset($rows) && is_array($rows)){
				 $data = $rows;
			}
			
			return $data;
		 
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: load,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: load , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	public  function deleteById($delete_by_column_name = '', $delete_by_column_value = '') {
		
		try {
			global $wpdb;
			$tableName = $wpdb->prefix . $this->table_name;
			$wpdb->delete($tableName, array( $delete_by_column_name => $delete_by_column_value ) );
			return $id;
			
		}catch (PDOException $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: deleteById,  ".$e->getMessage(), RBT_ERROR_LOG);
		} catch (Exception $e) {
			RBTlogToFile("RBT_GeneralModel.class.php: deleteById , Error is".$e->getMessage(), RBT_ERROR_LOG);
		}
	}
	
	
}	
	
	
	
	
	
