      <style type="text/css">
      #filters { margin-left: 1em; margin-bottom: 1em;}
      .pagination {
            display: inherit;
            padding-left: 0;
            margin: 0px; 
            border-radius: 0px;
      }
      </style>
      
       <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <!-- <a>Products</a> -->
                        <strong>Products</strong>
                    </li>
                    <li class="active">
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class = "row" id = "models-container">
        <div class="ibox float-e-margins"  id = 'product-table' style="margin-left: 1em; margin-right: 1em;">
            <div class="ibox-title">
                <h5>Orders</h5> <span class="label label-primary">O+</span>
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
                        <th>Order Date</th>
                        <th>Order Value(Ksh)</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Physical Address</th>
                        <th>Postal Address</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $generated_table; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Order Date</th>
                            <th>Order Value(Ksh)</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Physical Address</th>
                            <th>Postal Address</th>
                            <th>Details</th>
                            <th>Action</th>
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
<script>
    $(document).ready(function(){
        $('table').dataTable();    
   });
</script>