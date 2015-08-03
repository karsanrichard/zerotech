<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Basic Form</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Products</a>
                        </li>
                        <li class="active">
                            <strong>Add Products</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add a new product below</h5>
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
                            <form method="post" action="<?php echo base_url();?>products/add_products" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Product Name:</label>
                                    <div class="col-sm-10"><input type="text" name="product_name" id="product_name" class="form-control"></div>
                                </div>
                                <div class="form-group">
                                	<label class="col-sm-2 control-label">Category</label>
                                	<div class="col-sm-4">
	                                    <?php
	                                    	echo $categoties;
	                                    ?>
                                    </div>
                                    <label class="col-sm-2 control-label">Sub-Category</label>
                                	<div class="col-sm-4">
	                                    <select class="form-control m-b" name="sub-category" id="sub-category">
	                                        <option>option 1</option>
	                                        <option>option 2</option>
	                                        <option>option 3</option>
	                                        <option>option 4</option>
	                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                	<label class="col-sm-2 control-label">Product Brand</label>
                                	<div class="col-sm-4">
	                                    <?php
	                                    	echo $brand;
	                                    ?>
                                    </div>
                                    <label class="col-sm-2 control-label">Price</label>
                                	<div class="col-sm-4">
	                                   <input type="text" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="col-sm-2 control-label">Product Description</label>
                                	<div class="col-sm-10">
	                                    <textarea cols="123" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dropzone Area</h5>
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
                        <form id="my-awesome-dropzone" class="dropzone" action="#">
                            <div class="dropzone-previews"></div>
                            <button type="submit" class="btn btn-primary pull-right">Submit this form!</button>
                        </form>
                        <div>
                            <div class="m text-right"><small>DropzoneJS is an open source library that provides drag'n'drop file uploads with image previews: <a href="https://github.com/enyo/dropzone" target="_blank">https://github.com/enyo/dropzone</a></small> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
            </div>

            </div>

<script>
		$(document).ready(function() {		 
			$('#category').change(function(){
       		sv = $(this).val();
       		// alert(sv);
       		// console.log('<?php echo base_url(); ?>tenant/ajax_get_tenant/'+sv);
	       		$.get('<?php echo base_url(); ?>products/get_child_categories/'+sv, function(data){
	       			obj = jQuery.parseJSON(data);
	       			console.log(obj);
	       			// alert(obj.firstname);
	       			$.each(obj, function(i, val) {
	       				console.log(val['category_id']);
	       			});
	       			
	       	                
				});
       		});
       	});
</script>