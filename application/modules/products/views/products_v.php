<style>
    .dataTables_filter{
        float:right;
    }
    .dataTables_length{
        float:left;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url().'index.php/admin' ?>">Home</a>
            </li>
            <li>
                <a>Products</a>
            </li>
            <!--             
                <li class="active">
                <strong>Data Tables</strong>
            </li> 
        -->
    </ol>
</div>
<div class="col-lg-2">

</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Products</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Price (Ksh)</th>
                                <th>Brand</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        // echo "<pre>";print_r($product_data);echo "</pre>";exit;
                            foreach ($product_data as $products) {
                                $edit_redirect = base_url().'index.php/products/edit_product/'.$products['product_id'];
                            echo "<tr>";
                            echo "<td>".$products['category_name']."</td>";
                            echo "<td>".$products['product_name']."</td>";
                            echo "<td>".$products['price']."</td>";
                            echo "<td>".$products['brand_name']."</td>";
                            echo "<td>".$products['added_on']."</td>";
                            echo '<td><a class="btn btn-w-m btn-primary" href="'.$edit_redirect.'">Edit Product</a></td>';
                            

                            echo "</tr>";
                            }
                         ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Price (Ksh)</th>
                                <th>Brand</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

