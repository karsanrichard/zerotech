<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Products</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            Products
                        </li>
                        <li class="active">
                            <strong>Add Products</strong>
                        </li>
                    </ol>
                </div>
            </div>



        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add new Products below.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="<?php echo base_url();?>products/add_products">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Product Name: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="product_name" id="product_name">
                                    </div>
                                    <label class="col-sm-2 control-label">Brand: </label>
                                    <div class="col-sm-4">
                                        <?php
                                            echo $brands;
                                        ?>
                                        <!-- <input type="text" class="form-control"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category: </label>
                                    <div class="col-sm-4">
                                        <?php
                                            echo $catetgories;
                                        ?>
                                        <!-- <input type="text" class="form-control"> -->
                                    </div>
                                    <label class="col-sm-2 control-label">Sub Categories: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" disabled="true" value="6" name="sub_cat" id="sub_cat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Color: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  name="color" id="color">
                                    </div>
                                    <label class="col-sm-2 control-label">Price: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="price" id="price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description: </label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" rows="10" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(fuction(){
            $('#category').change(function(){
                id = $(this).val;
                $.get('<?php echo base_url();?>categories/get_sub_categories/'+id, function(data) {
                    obj = jQuery.parseJSON(data);
                    $.each();
                });
            });
        });
        </script>