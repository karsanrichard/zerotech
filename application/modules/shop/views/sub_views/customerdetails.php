<h3 class="checkout-sep">Billing Infomation</h3>
<div class="box-border">
	<form method = "POST" action = "<?php echo base_url(); ?>shop/pay">
		<input type = "hidden" value = "<?php echo $this->encrypt->encode($customerdetails->customer_id); ?>" name = "customer_id"/>
	    <ul>
	        <li class="row">
	            <div class="col-sm-6">
	                <label for="first_name" class="required">First Name</label>
	                <input type="text" name="first_name" id="first_name" value = "<?php echo $customerdetails->first_name; ?>" required>
	            </div><!--/ [col] -->
	            <div class="col-sm-6">
	                <label for="last_name" class="required">Last Name</label>
	                <input type="text" name="last_name" id="last_name" value = "<?php echo $customerdetails->last_name; ?>" required>
	            </div><!--/ [col] -->
	        </li><!--/ .row -->
	        <li class="row">
	            <div class="col-sm-6">
	                <label for="email_address" class="required">Email Address</label>
	                <input type="text"  name="email_address" id="email_address" value = "<?php echo $customerdetails->email_address; ?>" required>
	            </div><!--/ [col] -->

	            <div class="col-sm-6">
	                <label for="phone_no" class="required">Phone Number</label>
	                <input type="text"  name="phone_no" id="phone_no" value = "<?php echo $customerdetails->phone_no; ?>" required>
	            </div><!--/ [col] -->
	        </li><!--/ .row -->
	        <li class="row"> 
	            <div class="col-xs-12">

	                <label for="address" class="required">Address</label>
	                <input type="text" name="address" id="address" value = "<?php echo $shipping_details->address; ?>" required>

	            </div><!--/ [col] -->

	        </li><!-- / .row -->

	        <li class="row">

	            <div class="col-sm-6">
	                
	                <label for="city" class="required">City</label>
	                <input type="text" name="city" id="city" value = "<?php echo $shipping_details->city?>" required>

	            </div><!--/ [col] -->

	            <div class="col-sm-6">
	                <label for="postal_code" class="required">Postal Code</label>
	                <input type="text" name="postal_code" id="postal_code" value = "<?php echo $shipping_details->postal_code?>" required>
	            </div><!--/ [col] -->
	        </li><!--/ .row -->
	        <div style="margin-top: 15px;"></div>
	        <li>
	            <button class="button">Continue</button>
	        </li>
	    </ul>
    </form>
</div>