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
    <div class="row" id="filters">
        <div class="col-md-4">
            <div class="input-group m-b">
                <div class="input-group-btn">
                    <a href="<?php echo base_url();?>products/add"  class="btn btn-primary "><i class="fa fa-plus fa-rotate-270"></i>&nbsp;Add Product</a>
                </div>
                <?php echo $categories;?>
            </div>
        </div>
        <div class="col-md-4">
            <ul id="pagination-demo" class="pagination pagination-sm"></ul>
        </div>
        <div class="col-md-4">
            <div class="input-group m-b">
                <div class="input-group-btn">
                    <button data-toggle="table" id = "toggler" class="btn btn-danger" type="button">Toggle view</button>
                </div>
                <!-- <form method="post"> -->
                 <input type="text" class="form-control" placeholder="Search Product" id="search_p" name="search_p">
                <!-- </form> -->
            </div>
        </div>
        
    </div>

    <div class = "row" id = "models-container">
        <div class="ibox float-e-margins"  id = 'product-table' style="margin-left: 1em; margin-right: 1em;">
            <div class="ibox-title">
                <h5>Products </h5> <span class="label label-primary">P+</span>
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
                        <th>#</th>
                        <th>Product Category</th>
                        <th>Product Name</th>
                        <th>Price (Ksh)</th>
                        <th>Brand</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $table;?>
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

        <div id = "product-grid">
            <?php echo $grid; ?>
        </div>
        </div>
    </div>
   


</div>
<script>
    $(document).ready(function(){
        $('table').dataTable();

        $('#product-table').hide();
        $('#product-grid').show();
       // getpagemodels('grid');

        $('#toggler').click(function(){
            type = $(this).attr('data-toggle');
            console.log(type);
            if(type == 'table')
            {
                $(this).attr('data-toggle', 'grid');
                $('#toggle-icon').removeClass('fa-table');
                $('#toggle-icon').addClass('fa-th');
                $('#navigation-to').text('Grid');
                $('#product-table').show();
                $('#product-grid').hide();
                $('#pagination-demo').hide();
                $('#search_p').attr("disabled", "true");
                $('#category').attr("disabled", "true");
            }
            else
            {
                $(this).attr('data-toggle', 'table');
                $('#toggle-icon').removeClass('fa-th');
                $('#toggle-icon').addClass('fa-table');
                $('#navigation-to').text('Table');
                $('#product-table').hide();
                $('#product-grid').show(); 
                $('#pagination-demo').show();
                $('#search_p').removeAttr("disabled");
                $('#category').removeAttr("disabled");  
            }
        });

        $('#search_p').keyup(function(){
            search_ = $(this).val();
            // console.log(search_);
            $.get('<?php echo base_url();?>products/ajax_grid/'+search_, function(data){
                obj = jQuery.parseJSON(data);
                $('#product-grid').html(obj);
                $(this).attr('data-toggle', 'table');
                $('#toggle-icon').removeClass('fa-th');
                $('#toggle-icon').addClass('fa-table');
                $('#navigation-to').text('Table');
                $('#product-table').hide();
                $('#product-grid').show(); 
                $('#pagination-demo').show();
                $('#search_p').removeAttr("disabled");  
            });
        });

        $('#category').on('change', function(){
            category = $(this).val();
            // console.log(category);
            $.get('<?php echo base_url();?>products/ajax_category_filter/'+category, function(data){
                 obj = jQuery.parseJSON(data);
                $('#product-grid').html(obj);
                $(this).attr('data-toggle', 'table');
                $('#toggle-icon').removeClass('fa-th');
                $('#toggle-icon').addClass('fa-table');
                $('#navigation-to').text('Table');
                $('#product-table').hide();
                $('#product-grid').show(); 
                $('#pagination-demo').show();
                $('#search_p').removeAttr("disabled");
            });
        });

        $('#pagination-demo').twbsPagination({
            totalPages: "<?php echo $pages;?>",
            visiblePages: "4"
            // onPageClick: function (event, page) {
            //     $('#page-content').text('Page ' + page);
            // }
    });
   });
</script>