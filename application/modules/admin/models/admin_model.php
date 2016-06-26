<?php 
class Admin_model extends MY_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_products()
	{
		$sql = "SELECT * FROM products";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_product($id)
	{
		$sql = "SELECT * FROM products WHERE product_id = $id";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_products_by_category($category_id){
		$sql = "SELECT * FROM products WHERE category_id = $category_id";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	public function get_all_contacts()
	{
		$count = 1;
		$contacts = '';
		$result = $this->db->get('contact');

		foreach($result->result_array() as $key => $value){
			// echo "<pre>";print_r($value);die();
			$contacts .= '<li class="list-group-item fist-item">
				            <span class="pull-right">
				                09:00 pm
				            </span>
				            <span class="label label-success">'.$count.'</span>'.$value['contact_subject'].'
				           </li>';
            $count++;
		}
		// echo "<pre>";print_r($result->row());die();
		return $contacts;
	}

	public function line_contacts()
	{
		$sql = 'SELECT COUNT(*) AS `data`, MONTHNAME(`date_created`)AS `labels` FROM `contact` GROUP BY MONTH(`date_created`)';
		$data = '';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		
		$data['label'] = "Users Line Graph";
        $data['fillColor'] = "rgba(220,220,220,0.2)";
        $data['strokeColor'] = "rgba(220,220,220,1)";
        $data['pointColor'] = "rgba(220,220,220,1)";
        $data['pointStrokeColor'] = "#fff";
        $data['pointHighlightFill'] = "#fff";
        $data['pointHighlightStroke'] = "rgba(220,220,220,1)";
		foreach ($result as $key => $value) {
			$label_array[] = $value['labels'];
			$data_array[] = $value['data'];
		}
		$data['labels'] = $label_array;
		$data['data'] = $data_array;
		// echo "<pre>";print_r($data);die();
		return $data;
	}
}