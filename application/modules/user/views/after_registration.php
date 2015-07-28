<div class = "container" style = 'padding: 40px;height: 70vh;'>
	<?php if(!isset($error)){?>
	<center><i class = "ion ion-checkmark-round fa-3x" style = 'color: green; width: 100px; height: 100px;border-radius: 50%; border: 5px solid green;line-height: 100px;'></i></center>
	<center>
		<h4>You have registered successfully. Please check your email and follow the link in order to activate your account</h4>
		<a href = "<?php echo base_url(); ?>home" class = "waves-effect waves-light btn-large">GO HOME</a>
	</center>
	<?php } else { ?>
		<center><i class = "ion ion-close-round fa-3x" style = 'color: red; width: 100px; height: 100px;border-radius: 50%; border: 5px solid red;line-height: 100px;'></i></center>
		<center>
			<h4><?php echo $error[0]; ?></h4>
			<a href = "<?php echo base_url(); ?>home" class = "waves-effect waves-light btn-large">GO HOME</a>
		</center>
	<?php } ?>
</div>