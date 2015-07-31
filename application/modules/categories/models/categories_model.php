<?php
/**
* 
*/
class Categories_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function parent_categories()
	{
		$sql = "SELECT * FROM `category` WHERE `parent_id` = 0";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function sub_categories($parent_id)
	{
		$sql = "SELECT * FROM `category` WHERE `parent_id` = '$parent_id'";

		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

?>