<p>Hello <?php echo $first_name . ' ' . $last_name; ?>, </p>

<div>
	<p>You have registered!</p>
	<p>Activate your account using this link: <?php echo base_url() . 'user/activate/'.$email_address.'/'.urlencode($identifier); ?></p>
</div>