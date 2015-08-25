<style type="text/css">
	table tbody tr td
	{
		vertical-align: middle;
	}

	footer
	{
		position: absolute;
		width: 100%;
		bottom: 0;
		left: 0;
	}

	footer p
	{
		padding: 5px;
	}
</style>
<div class = "container">
	<form method = "POST" action = "<?php echo base_url(); ?>shop/update_cart">
	<table class = "striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Image</th>
				<th>Item Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if ($this->cart->contents()) {
				$counter = 0;
				foreach ($this->cart->contents() as $key => $value) {
					$counter++;
		?>
		<tr>
			<td><?php echo $counter; ?></td>
			<td><img src = "<?php echo $this->cart->product_options($key)['cover_image']; ?>" style = "width: 50px;height:50px;"/></td>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo $value['qty']; ?></td>
			<td><?php echo $value['price']; ?></td>
			<td><?php echo $value['qty'] * $value['price']; ?></td>
		</tr>
		<?php }} else {?>
		<?php } ?>
		</tbody>
	</table>
	</form>
	<div class = "right">
	</div>
</div>

