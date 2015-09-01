<?php 
class Orders_model extends MY_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_orders($order_id = NULL)
	{
		$filter=isset($order_id)? "WHERE o.order_id = $order_id" : NULL ;
		$sql = "
		SELECT 
			o.order_id AS order_id,
		    o.customer_id AS customer_id,
		    o.total AS order_total,
		    o.order_date,
		    o.status,
		    c.first_name AS first_name,
		    c.last_name AS last_name,
		    c.phone_no,
		    c.physical_address,
		    c.postal_address
		FROM
		    orders o
		        INNER JOIN
		        customer c ON o.customer_id = c.customer_id
		    $filter
		";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_order_details($order_id = NULL)
	{
		$filter=isset($order_id)? "WHERE o.order_id = $order_id" : NULL ;
		$sql = "
		SELECT 
		    o.order_id AS order_id,
		    o.customer_id AS customer_id,
		    c.first_name AS first_name,
		    c.last_name AS last_name,
		    c.phone_no,
		    c.physical_address,
		    c.postal_address,
		    o.order_date,
		    p.product_name,
		    p.description,
		    p.price AS unit_price,
		    od.quantity,
		    od.price AS total_price,
		    p.status,
		    p.added_on,
		    p.color,
		    b.brand_id,
		    b.brand_name,
		    b.brand_description,
		    cat.category_id,
		    cat.category_name,
		    p.cover_image,
		    od.product_id
		FROM
		    orders o
		        INNER JOIN
		    order_details od ON o.order_id = od.order_id
		        INNER JOIN
		    products p ON od.product_id = p.product_id
		        INNER JOIN
		    customer c ON o.customer_id = c.customer_id
		        INNER JOIN
		    brand b ON p.brand_id = b.brand_id
		        INNER JOIN
		    category cat ON p.category_id = cat.category_id
		    $filter
		";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}