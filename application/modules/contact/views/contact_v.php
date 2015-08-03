<div class = "row" style="margin-top: 20px;">
	<div class = "col s8" style="margin-top: 20px;">
		<center><h3>Talk to us</h3></center>
		<div class="row">
			<form class="col s12" method = "POST" action = "<?php echo base_url(); ?>contact/post_contact">
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="icon_name" type="text" class="validate" name = "contact_name">
						<label for="icon_name">Your Name</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input id="icon_telephone" type="email" class="validate" name = "contact_email">
						<label for="icon_telephone">Email Address</label>
					</div>
				</div>
				<div class = "row">
					<div class="input-field col s12">
						<i class="material-icons prefix">library_books</i>
						<input id="icon_prefix" type="text" class="validate" name = "contact_subject">
						<label for="icon_prefix">Subject</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">mode_edit</i>
						<textarea id="icon_prefix2" class="materialize-textarea" style="height: 80px;" name = "contact_message"></textarea>
						<label for="icon_prefix2">Your message</label>
					</div>
      			</div>
      			<div class = "row" style="height: 40px; line-height: 40px;">
	      			<div class = "left">
	      				<div id = "result"></div>
	      			</div>
	      			<div class = "right">
	      				<button class="waves-effect waves-light btn" type = "submit"><i class="ion ion-android-send left" style = "font-size: 120%;"></i>Send</button>
	      			</div>
      			</div>
			</form>

		</div>
	</div>
	<div class = "col s4" style="margin-top: 10px;">
		<iframe width="100%" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Strathmore+University,+Nairobi+West,+Nairobi,+Kenya&key=AIzaSyCREwperCbLUc1tHPdMZS7eqVn0YZmwUf8" allowfullscreen></iframe>
		<div class="col s12">
			<p><i class = "material-icons" style = "color: #c62828;">location_on</i>&nbsp;&nbsp;Strathmore University STC Room 12</p>
			<p><i class = "material-icons" style = "color: blue;">phone</i>&nbsp;&nbsp;+254725160399</p>
			<p><i class = "material-icons" style = "color: green;">contact_phone</i>&nbsp;&nbsp;+254 730 699850</p>
			<p><i class = "material-icons" style = "color: #c62828;">email</i>&nbsp;&nbsp;info@zerotech.com</p>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('form').submit(function(event){
		event.preventDefault();

		var form = $(this);

		url = form.attr('action');

		console.log(url);
		$.ajax({
			method: "post",
			url: url,
			data: $('form').serialize(),
			beforeSend: function( xhr ) {
				xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
				$('#result').html('<p style = "color: green;">Please wait... Posting your message</p>');
			}
		})
		.done(function( data ) {
			if ( console && console.log ) {
				obj = jQuery.parseJSON(data);
				if (obj.type == "success")
				{
					var explode = $('#result').html('<p style = "color: green;">'+obj.message+'</p>');
					setTimeout(explode, 2000);
					$('form input, form textarea').val('');
				}
				else
				{
					$('#result').html('<p style = "color: red;">'+obj.message+'</p>');
				}
			}
		});
	});
</script>