<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("orders/orders_model");

        // $this->load->module();
    }
    
    public function index(){
        $order_data = $this->orders_model->get_orders();
        // echo "<pre>";print_r($order_data);echo "</pre>";exit;
        $generated_table = NULL;
        foreach ($order_data as $data) {
            $generated_table.="
            <tr>
                <td>".date('D m Y',strtotime($data['order_date']))."</td>
                <td>".$data['order_total']."</td>
                <td>".$data['first_name']." ".$data['last_name']."</td>
                <td>".$data['phone_no']."</td>
                <td>".$data['physical_address']."</td>
                <td>".$data['postal_address']."</td>
                <td><a class=\"btn btn-w-m btn-primary\" href=".base_url().'orders/order_details/'.$data['order_id'].">View Order Details</a></td>
            ";

            switch ($data['status']) {
                case 1:
                $generated_table .= "<td><a class=\"btn btn-w-m btn-danger\" href=".base_url().'orders/order_status/'.$data['order_id']."/2".">Reject</a></td>";
                    break;
                
                default:
                $generated_table .= "<td><a class=\"btn btn-w-m btn-success\" href=".base_url().'orders/order_status/'.$data['order_id']."/1".">Approve</a></td>";
                    break;
            }
            $generated_table.="</tr>";

        }
        $data['generated_table'] = $generated_table;
        $data['page_heading'] = 'Order Management';
        $data['content_view'] = 'orders/orders_listing';
        $this->template->call_backend_template($data);
    }

    public function order_details($order_id)
    {
        $order_data = $this->orders_model->get_orders($order_id);
        $order_details = $this->orders_model->get_order_details($order_id);
        // echo "<pre>";print_r($order_data);echo "</pre>";exit;
        $data['user_details'] = "
        <p>Customer Name: ".ucfirst($order_data[0]['first_name'])." ".ucfirst($order_data[0]['last_name'])."</p></br>
        <p>Phone No. : ".$order_data[0]['phone_no']."</p></br>
        <p>Physical Address. : ".$order_data[0]['physical_address']."</p></br>
        <p>Postal : ".$order_data[0]['postal_address']."</p></br>
        ";

        $data['order_details'] = "
        <p>Order Date: ".date('D m Y',strtotime($order_data[0]['order_date']))."</p></br>
        <p>Total : Ksh ".$order_data[0]['order_total']."</p></br>
        ";

        switch ($order_data[0]['status']) {
            case 1:
            $data['order_status'] = "<p>Status: UNPAID</p>";
                break;
            case 2:
            $data['order_status'] = "<p>Status: PAID</p>";
                break;
            
            default:
                # code...
                break;
        }

        $generated_table = NULL;
        foreach ($order_details as $key) {
           $generated_table.="
           <tr>
            <td>".$key['product_name']."</td>
            <td>".$key['description']."</td>
            <td>".$key['category_name']."</td>
            <td>".$key['brand_name']."</td>
            <td>".$key['brand_description']."</td>
            <td>".$key['color']."</td>
            <td>".$key['unit_price']."</td>
            <td>".$key['quantity']."</td>
            <td>".$key['total_price']."</td>
           </tr>
           ";
        }
        $data['generated_table'] = $generated_table;
    	// $data['contact_table'] = $this->contact->customer_contact();
    	$data['page_heading'] = 'Customer Page';
    	$data['content_view'] = 'orders/order_details_v';
    	$this->template->call_backend_template($data);
    }

    public function order_status($order_id,$status){
        $query = "UPDATE orders SET status= $status WHERE order_id= $order_id";
        $this ->db->query($query);

        redirect(base_url().'orders');
    }

}

