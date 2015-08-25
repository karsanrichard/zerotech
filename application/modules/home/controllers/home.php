<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends MY_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('home/m_home');
        $this->session->set_userdata(['user_id' => 1]);
    }
    
    function index(){
    	$data['category_listing'] = $this->create_category_listing();
    	$data['offer_slider'] = $this->create_offer_slider(3);
    	$data['offer_slider_right'] = $this->create_offer_slider(2);
    	$data['lastest_products'] = $this->create_offer_slider(5);
    	$data['content_view'] = 'home/home_page';
        $this->template->call_frontend_template($data);
    }

    function create_offer_slider($limit)
    {
    	$offer_slider = '';
    	$products = $this->m_home->get_latest_products($limit);
    	if ($products) {
    		foreach ($products as $key => $value) {
    			$price_old = $value->price + ($value->price / 4) + ($value->price / ($value->price / 10));
    			$percentage = floor((($price_old - $value->price)/$value->price) * 100);
    			$offer_slider .= '<li class="product">
	                <div class="product-container">
	                    <div class="product-left">
	                        <div class="product-thumb">
	                            <a class="product-img" href="#"><img src="'.$value->cover_image.'" alt="Product"></a>
	                            <a title="Quick View" href="'.base_url().'products/product/'.$value->product_id.'" class="btn-quick-view">Quick View</a>
	                        </div>
	                        <div class="product-status">
	                            <span class="new">'.$percentage.'</span>
	                            <span class="sale">% OFF</span>
	                        </div>
	                    </div>
	                    <div class="product-right">
	                        <div class="product-name">
	                            <a href="#">'.$value->product_name.'</a>
	                        </div>
	                        <div class="price-box">
	                            <span class="product-price">Ksh. '.$value->price.'</span>
	                            <span class="product-price-old">Ksh. '.$price_old.'</span>
	                        </div>
	                        <div class="product-star">
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star-half-o"></i>
	                        </div>
	                        <div class="product-button">
	                            <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
	                            <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
	                            <a class="button-radius btn-add-cart" title="Add to Cart" href="'.base_url().'">Buy<span class="icon"></span></a>
	                        </div>
	                    </div>
	                </div>
	            </li>';
    		}
    	}

    	return $offer_slider;
    }
    
    function create_category_listing()
    {
    	$listing = "";
    	$categories = $this->m_home->get_categories();
    	if ($categories) {
    		foreach ($categories as $key => $value) {
    			$listing .= "<li>
	                <a href='". base_url() . "products/category/{$value->category_id}' title='{$value->category_name}'>
	                    <span class='text'>{$value->category_name}</span>
	                </a>
	            </li>";
    		}
    	}
    	else
    	{
    		$listing = "No Listings Yet";
    	}

    	return $listing;
    }

    function create_sub_category_listing($category_id)
    {
    	$listing = "";
    	$sub_categories = $this->m_home->get_category_sub_categories($category_id);
    	if ($sub_categories) {
    		foreach ($sub_categories as $key => $value) {
    			$sub_category_listing = $this->create_sub_category_listing($value->category_id);
    			$listing .= "<li>
	                <a href='". base_url() . "products/category/{$value->category_id}' title='{$value->category_name}'>
	                    <span class='text'>{$value->category_name}</span>
	                </a>
	            </li>";
    		}
    	}

    	return $listing;
    }
}

