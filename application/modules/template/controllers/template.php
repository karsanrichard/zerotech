<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Template extends MY_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('template/m_template');
    }
    
    function call_frontend_template($data = NULL, $type = 'frontend'){
        (!isset($type)) ? $this->load->view('template/material_test', $data) : $this->load->view('template/frontend', $data);
    }
    
    function call_backend_template($data = NULL){
        $this->load->view('template/backend', $data);
    }

    function test_front_end($data = NULL)
    {
        $categories = $this->m_template->get_categories();
        $data['title'] = "frontend";
        $data['category_listing_select'] = $this->create_category_listing($categories, 'select');
        $data['category_menu'] = $this->create_category_listing($categories, 'menu');
    	$this->load->view('template/frontend', $data);
    }

    function create_category_listing($data, $type)
    {
        $return_data = array();
        $select = $menu = "";

        if ($data) {
            foreach ($data as $key => $value) {
                $latest_product_details = $this->m_template->get_latest_product_by_category($value->category_id);
                $latest_product_image = $sub_categories_listing = $brand_listing = "";
                $sub_categories_listing = $this->create_sub_category_listing($value->category_id);
                $brand_listing = $this->create_brand_listing($value->category_id);
                $latest_product_image = (isset($latest_product_details)) ? $latest_product_details->path : ASSETS_URL .'frontend/data/banner/b17.png';
               $select .= "<option value = {$value->category_id}>{$value->category_name}</option>";
               $menu .= '<li class="dropdown">
                                        <a href="'.base_url() .'products/category/'.$value->category_id.'" class="dropdown-toggle" data-toggle="dropdown">
                                        '.$value->category_name.'</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 850px;">
                                            <li class="block-container col-sm-3 border">
                                                <div class="img_container banner-hover">
                                                    <a href="#">
                                                        <img class="img-responsive" src="'.$latest_product_image.'" alt="'.$value->category_name.'">
                                                    </a>
                                                </div>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block-megamenu-link">
                                                    <li class="link_container group_header">
                                                        <a href="#">'.$value->category_name.'</a>
                                                    </li>
                                                   '.$sub_categories_listing.'
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block-megamenu-link">
                                                    <li class="link_container group_header">
                                                        <a href="#">Brands</a>
                                                    </li>
                                                    '.$brand_listing.'
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3 border">
                                                <div class="img_container banner-hover">
                                                    <a href="#">
                                                        <img class="img-responsive" src="'.$latest_product_image.'" alt="'.$value->category_name.'">
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>';
            }
        }

        $return_data['select'] = $select;
        $return_data['menu'] = $menu;
        return $return_data[$type];
    }

    function create_sub_category_listing($category_id)
    {
        $listing = "";
        $sub_categories = $this->m_template->get_sub_categories($category_id);
        if($sub_categories){
            foreach ($sub_categories as $key => $value) {
                $listing .= "<li class='link_container'><a href='".base_url() ."products/category/{$value->category_id}'>{$value->category_name}</a></li>";
            }
        }
        else
        {
            $listing = "No Listing at the moment";  
        }

        return $listing;
    }

    function create_brand_listing($category_id)
    {
        $listing = "";
        $brands = $this->m_template->get_category_brands($category_id);
        if ($brands) {
             foreach ($brands as $key => $value) {
                $listing .= "<li class='link_container'><a href='".base_url() ."products/brand/{$value->brand_id}'>{$value->brand_name}</a></li>";
            }
        }
        else
        {
            $listing = "No Listing at the moment";  
        }

        return $listing;
    }
}
