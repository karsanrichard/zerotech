<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'products/products_model'
		));
	}

	function index()
	{
		redirect(base_url() . 'products/display_products');
	}

	function product($product_id)
	{
		$data['product_details'] = $this->products_model->get_product_by_id($product_id);
		$data['outside_main'] = 'shop/view_product';
		$this->template->call_frontend_template($data);
	}

	function addtocart()
	{
		$product_details = $this->products_model->get_product_by_id($this->input->post('product_id'));
		$cart_data = array(
			'id'      => $this->input->post('product_id'),
			'qty'     => (int) $this->input->post('no_items'),
			'price'   => $product_details->price,
			'name'    => $product_details->product_name,
			'options' => array(
				'color' => $product_details->color, 
				'cover_image' => $product_details->cover_image
			)
		);

		if ($this->cart->insert($cart_data)) {
			redirect(base_url() . 'shop/cart');
		}
		else{
			$this->session->set_flashdata('error', 'Could not add item to cart. Please contact admin');
			redirect(base_url() . 'shop/product/' . $this->input->post('product_id'));
		}	
	}

	function cart()
	{
		$data['content_view'] = 'shop/cart_v';
		$this->template->call_frontend_template($data);
	}

	function destroy_cart()
	{
		$this->cart->destroy();
	}
}