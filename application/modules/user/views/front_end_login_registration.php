<div style="margin-top: 15px;"></div>
<div class = "container">
<center><?php echo $this->session->flashdata('success');?></center>
	<div class = "row">
		<div class = "col l12">
			<div class = "col l6">
				<h5>Registered Customers</h5>
				<form method = "POST" action = "<?php echo base_url(); ?>user/authenticate" class = "login-form">
					<div class = "row">
						<div class="input-field col s12">
							<input id="email_address" type="email" class="validate" name = "email_address">
							<label for="email_address">Email Address</label>
						</div>
					</div>

					<div class = "row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" name = "password">
							<label for="password">Password</label>
						</div>
					</div>
					<div class = "row">
						<div class="input-field col s12">
							<a href="#" class = "s6">Forgot Password?</a>
						</div>
					</div>
					<p><input type="checkbox" id="test6" /><label for="test6">Remember me</label></p>
					<div class = "row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light" type="submit" name="action"> Login</button>
						</div>
					</div>
				</form>
			</div>
			<div clsss = "col l6">
				<h5>New Customers</h5>
				By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
				<br/>
				<br/>
				Interested?
				<br />
				<br />
				<a href = "<?php echo base_url(); ?>user/registration" class = "btn waves-effect waves-light">CREATE AN ACCOUNT</a>
			</div>
		</div>
	</div>
</div>