<div class = "container">
	<h5>User Registration</h5>

	<form method = "POST" action="<?php echo base_url(); ?>user/complete_registration">
		<div class = "row">
			<div class="col s12">
				<div class = "row">
					<div class = "input-field col s6">
						<input id="first_name" type="text" class="validate" name = "first_name">
						<label for="first_name">First Name *</label>
					</div>
					<div class = "input-field col s6">
						<input id="last_name" type="text" class="validate" name = "last_name">
						<label for="last_name">Last Name *</label>
					</div>
				</div>
			</div>
		</div>

		<div class = "row">
			<div class="input-field col s12">
				<input id="othernames" type="text" class="validate" name = "othernames">
				<label for="othernames">Other Names</label>
			</div>
		</div>

		<div class = "row">
			<div class="col s12">
				<div class = "row">
					<div class = "input-field col s6">
						<input id="email_address" type="email" class="validate" name = "email_address">
						<label for="first_name">Email Address *</label>
					</div>
					<div class = "input-field col s6">
						<input id="re_enter_email" type="email" class="validate" name = "re_enter_email">
						<label for="re_enter_email">Re-Enter Email *</label>
					</div>
				</div>
			</div>
		</div>

		<div class = "row">
			<div class="col s12">
				<div class = "row">
					<div class = "input-field col s6">
						<input id="email_address" type="password" class="validate" name = "password">
						<label for="first_name">Password *</label>
					</div>
					<div class = "input-field col s6">
						<input id="re_enter_email" type="password" class="validate" name = "confirm_password">
						<label for="re_enter_email">Confirm Password*</label>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="g-recaptcha" data-sitekey="6LeraAoTAAAAAKdEXbPwFOinecD9f0bB4m-q421e"></div> -->
		<div class = "row">
			<div class = "col s12">
				<button class = "btn waves-effect waves-light right">Complete Registration</button>
			</div>
		</div>
	</form>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>