<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Orders</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a>Orders</a>
            </li>
            <li class="active">
                <strong>Order Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Order Details 
                        <!-- <small class="m-l-sm">This is custom panel</small> -->
                    </h5>
                </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Customer Details
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user_details; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            Order Details
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $order_details; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <i class="fa fa-info-circle"></i> Order Status
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $order_status; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>

     <div class = "row" id = "models-container">
        <div class="ibox float-e-margins"  id = 'product-table' style="margin-left: 1em; margin-right: 1em;">
            <div class="ibox-title">
                <h5>Order Details</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            </div>
        <div class="ibox-content">
        <div>
            <div>
                <table class = "table table-striped table-bordered table-hover" id = "modelstable"><thead>
                    <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Color</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $generated_table; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Color</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>