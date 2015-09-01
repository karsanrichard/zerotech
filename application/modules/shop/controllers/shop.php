<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shop extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'products/products_model',
			'shop/m_shop'
		));
	}

	function index()
	{
		redirect(base_url() . 'products/display_products');
	}

	function product($product_id)
	{
		$this->load->module('home');
		$data['product_details'] = $this->products_model->get_product_by_id($product_id);
		$data['category'] = $this->products_model->get_product_category($product_id);
		$data['offer_slider_right'] = $this->home->create_offer_slider(2);
		$data['product_images_listing'] = $this->create_product_thumb($product_id);
		$data['content_view'] = 'shop/view_product';
		$this->template->call_frontend_template($data);
	}

	function create_product_thumb($product_id)
	{
		$product_details = $this->products_model->get_product_by_id($product_id);
		$images = $this->products_model->get_product_image($product_id);
		$list = "";
		if ($images) {
			$counter = 0;
			$list = "<li><a href='".$product_details->cover_image."' data-standard='".$product_details->cover_image."'>
						<img src='".$product_details->cover_image."' alt='' style = 'width: 100px; height: 100px;'/>
					</a></li>";
			foreach ($images as $key => $value) {				
				$list .= '<li>
					<a href="'.$value['path'].'" data-standard="'.$value['path'].'">
						<img src="'.$value['path'].'" alt="" style = "width: 100px; height: 100px;"/>
					</a>
				</li>';
			}
		}

		return $list;
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
		$data['cart_title'] = 'SHOPPING CART SUMMARY';
		$data['sub_view'] = 'shop/sub_views/cart';
		$this->template->call_frontend_template($data);
	}

	function destroy_cart()
	{
		$this->cart->destroy();
	}

	function authentication()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect(base_url() . 'shop/customerdetails');
		}
		else
		{
			$data['sub_view'] = 'shop/sub_views/login_reg';
			$data['content_view'] = 'shop/cart_v';
			$data['cart_title'] = 'USER AUTHENTICATION';
			$this->template->call_frontend_template($data);
		}
	}

	function registration()
	{

	}

	function authenticate()
	{
		$this->load->module('user');
		$logged_in = $this->user->auth();
		$this->session->set_flashdata('error', 'Username or password is wrong');
		$this->authentication();
	}

	function customerdetails()
	{
		$this->load->model('user/m_user');
		if($this->session->userdata('is_logged_in'))
		{
			$data['sub_view'] = 'shop/sub_views/customerdetails';
			$data['customerdetails']= $this->m_user->get_user_details_spec($this->session->userdata('customer_id'));
			$data['content_view'] = 'shop/cart_v';
			$data['cart_title'] = 'CUSTOMER DETAILS';
			$data['shipping_details'] = $this->m_shop->get_latest_order_details($this->session->userdata('customer_id'));
			$this->template->call_frontend_template($data);
		}
		else
		{
			$this->authentication();
		}
	}

	function pay()
	{
		$_POST['customer_id'] = $this->encrypt->decode($this->input->post('customer_id'));
		$data['cart_title'] = "Complete Payment";
		$data['order_details'] = $this->input->post();
		$data['sub_view'] = 'shop/sub_views/payment';
		$data['content_view'] = 'shop/cart_v';
		$this->template->call_frontend_template($data);
	}
}