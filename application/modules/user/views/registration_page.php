<style type="text/css">
	legend
	{
		margin-top: 25px;
		color: #5A88CA;
	}

	input:hover, input:focus
	{
		border-color: #5A88CA;
	}

	.input-field
	{
		margin-bottom: 10px;
	}
</style>
<div class = "container">
	<div class = "row">
		<h1 class="page-title" style = "margin-bottom: 15px;color:#5A88CA;">User Registration</h1>

		<form method = "POST" action="<?php echo base_url(); ?>user/complete_registration">
			<legend>Customer Information</legend>
			<div class = "row">
				<div class="col-md-12">
					<div class = "row">
						<div class = "input-field col-sm-6">
							<label for="first_name">First Name *</label>
							<input id="first_name" type="text" name = "first_name" required>
						</div>
						<div class = "input-field col-sm-6">
							<label for="last_name">Last Name *</label>
							<input id="last_name" type="text" class="validate" name = "last_name" required>
						</div>
					</div>
				</div>
			</div>

			<div class = "row">
				<div class="col-md-12">
					<div class = "row">
						<div class = "input-field col-sm-6">
							<label for="othernames">Other Names</label>
							<input id="othernames" type="text" name = "othernames" required>
						</div>
					</div>
				</div>
			</div>

			<legend>Contact Information</legend>
			<div class = "row">
				<div class="col-md-12">
					<div class = "row">
						<div class = "input-field col-md-6">
							<label for="first_name">Email Address *</label>
							<input id="email_address" type="text" name = "email_address" required>
						</div>
						<div class = "input-field col-md-6">
							<label for="re_enter_email">Re-Enter Email *</label>
							<input id="re_enter_email" type="text" class="validate" name = "re_enter_email" required>
						</div>
					</div>
				</div>
			</div>

			<div class = "row">
				<div class="col-md-12">
					<div class = "row">
						<div class = "input-field col-md-6">
							<label for="phone_no">Phone Number(Optional)</label>
							<input id="phone_no" type="text" name = "phone_no">
						</div>
					</div>
				</div>
			</div>

			<legend>Security Information</legend>
			<div class = "row">
				<div class="col-md-12">
					<div class = "row">
						<div class = "input-field col-md-6">
							<label for="first_name">Password *</label>
							<input id="email_address" type="password" class="validate" name = "password" required>
						</div>
						<div class = "input-field col-md-6">
							<label for="re_enter_email">Confirm Password*</label>
							<input id="re_enter_email" type="password" class="validate" name = "confirm_password" required>
						</div>
					</div>
				</div>
			</div>

			<div class = "row" style="margin-top: 15px;">
				<div class = "col-md-12">
					<div class = "row">
						<div class = "input-field col-md-12">
							<button class = "button">Complete Registration</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
