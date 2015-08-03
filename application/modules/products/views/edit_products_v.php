<style>
	.grey{
		background: #f2f2f2;
		width: 300px;
	}
	.next-to-grey{
		width: 650px!important;
	}
</style>
<div class="wrapper wrapper-content animated fadeInRight">	
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Edit Product</h5>
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
	            <center>
	            <?php 
	            	$attr = array( 'class' => "form-horizontal", $id = "product_edit_form"); 
	            	$url = base_url().'index.php/products/update_details';
	            	echo form_open($url,$attr);
	            ?>
	                <!-- <form class="form-horizontal" id="product_edit" action="<?php echo base_url().'index.php/products/update_details'; ?>"> -->
	                    <!-- <p>Sign in today for more expirience.</p> -->
	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Product Name</span>
	                        	<input type="text" class="form-control next-to-grey" id="product_name" name="product_name" value="<?php echo $product_details[0]['product_name']; ?>">
	                        	<input type="hidden" class="form-control next-to-grey" id="product_id" name="product_id" value="<?php echo $product_details[0]['product_id']; ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Product Description</span>
	                        	<input type="text" class="form-control next-to-grey" id="description" name="description" value="<?php echo $product_details[0]['description']; ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Color</span>
	                        	<input type="text" class="form-control next-to-grey" id="color" name="color" value="<?php echo $product_details[0]['color']; ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Price (Ksh)</span>
	                        	<input type="text" class="form-control next-to-grey" id="price" name="price" value="<?php echo $product_details[0]['price']; ?>">
	                        </div>
	                    </div>
	                   <!--  
	                   <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Brand Name</span>
	                        	<input type="text" class="form-control next-to-grey" id="brand_name" name="brand_name" value="<?php echo $product_details[0]['brand_name']; ?>">
	                        	<input type="hidden" class="form-control next-to-grey" id="brand_id" name="brand_id" value="<?php echo $product_details[0]['brand_id']; ?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Brand Description</span>
	                        	<input type="text" class="form-control next-to-grey" id="brand_description" name="brand_description" value="<?php echo $product_details[0]['brand_description']; ?>">
	                        </div>
	                    </div> 
	                    -->

	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Brand Description</span>
	                        	<select class="form-control next-to-grey" name="brand">
	                        		<?php 
	                        		foreach ($brands as $brand) {
	                        			echo "<option value = ".$brand['brand_id'];
	                        			if ($brand['brand_id'] == $product_details[0]['brand_id']) {
	                        				echo " selected";
	                        			}
	                        			echo ">".$brand['brand_name']."</option>";
	                        		} 
	                        		?>
	                        	</select>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <div class="input-group m-b">
	                        	<span class="input-group-addon grey">Product Category</span>
	                        	<select class="form-control next-to-grey" name="category">
	                        		<?php 
	                        		foreach ($categories as $cat) {
	                        			echo "<option value = ".$cat['category_id'];
	                        			if ($cat['category_id'] == $product_details[0]['category_id']) {
	                        				echo " selected";
	                        			}
	                        			echo ">".$cat['category_name']."</option>";
	                        		} 
	                        		?>
	                        	</select>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <div class="col-lg-12" style="float:right;">
	                            <button class="btn btn-w-m btn-primary" type="submit">Update</button>
	                        </div>
	                    </div>
	                <?php echo form_close(); ?>
	            </center>
	            </div>
	        </div>
	    </div>
</div>