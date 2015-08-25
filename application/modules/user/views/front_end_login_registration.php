<div style="margin-top: 15px;"></div>
<div class = "container">
<center><?php echo $this->session->flashdata('success');?></center>
	<div class = "container">
		<div class = "row">
			<div class="main-page">
				<h1 class="page-title">Authentication</h1>
				<div class="page-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="box-border">
								<h4 style = "font-weight:bold;">Create an account</h4>
								<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
								<p>
									Interested? Join Us by clicking the button below
								</p>
								<p>
									<button class="button" id = "create_account"><i class="fa fa-user"></i> Create an accout</button>
								</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box-border">
								<h4 style = "font-weight:bold;">Already registered?</h4>
								<form method = "POST" action = "<?php echo base_url(); ?>user/authenticate">
									<p>
										<label>Email address</label>
										<input type="text" name = "email_address" required>
									</p>
									<p>
										<label>Password</label>
										<input type="password" name = "password" required>
									</p>
									<p>
										<a href="#">Forgot your password?</a>
									</p>
									<p>
										<button class="button"><i class="fa fa-lock"></i> Sign in</button>
									</p>
									<p style="color: red;"><?php if($this->session->flashdata('error')){echo $this->session->flashdata('error'); }?></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#create_account').click(function(){
		window.location.assign("<?php echo base_url(); ?>user/registration");
	});
</script>