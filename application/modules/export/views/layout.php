<style type="text/css">
	.pull-right
	{
		float: right;
	}
</style>
<table style = "width: 100%;">
	<tr>
		<td style = "width: 40%;">
			<img src = "./assets/custom/api_logo.png" style = "width: 120px;height:100px;" />
		</td>
		<td style = "width: 60%;text-align: right;">
			<p>ZEROCORP SHOP</p>
			<p>+254725160399</p>
			<p>info@zerotech.com</p>
		</td>>
	</tr>
</table>

<table style = "width: 100%;">
	<tr>
		<td style = "text-align: center;font-weight: bold;"><h3>PRODUCT CATALOGUE</h3></td>
	</tr>
	<tr>
		<td style = "text-align: center;font-weight: bold;"><h4>CATEGORY: <?php echo $category_name; ?> </h4></td>
	</tr>
</table>
<table style = "width: 100%;border: 1px solid #f3f3f3;text-align: center;">
	<thead>
		<tr>
			<th style = "border-bottom: 1px solid #f3f3f3;">#</th>
			<th style = "border-bottom: 1px solid #f3f3f3;">Image</th>
			<th style = "border-bottom: 1px solid #f3f3f3;">Product Name</th>
			<th style = "border-bottom: 1px solid #f3f3f3;">Description</th>
			<th style = "border-bottom: 1px solid #f3f3f3;">Price Per Unit</th>
			<th style = "border-bottom: 1px solid #f3f3f3;">Color</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if($product_details)
			{
				$counter = 0;
				$total_products = count($product_details);
				foreach ($product_details as $key => $value) {
					$counter++;
					$bottom_border = $image = "";
					if($counter != $total_products)
					{
						$bottom_border = "border-bottom: 1px solid #f3f3f3;";
					}

					if($value->cover_image != NULL)
					{
						$image = str_replace(base_url(), './', $value->cover_image);
					}
					else
					{
						$image = './assets/product_images/imac.jpg';
					}
		?>
				<tr>
					<td style = "border-right: 1px solid #f3f3f3;width: 16.66667%; <?php echo $bottom_border; ?>"><?php echo $counter; ?></td>
					<td style = "border-right: 1px solid #f3f3f3;width: 16.66667%; <?php echo $bottom_border; ?>"><img src = "<?php echo $image; ?>" width = "100" height="100" /></td>
					<td style = "border-right: 1px solid #f3f3f3;width: 16.66667%; <?php echo $bottom_border; ?>"><?php echo $value->product_name; ?></td>
					<td style = "border-right: 1px solid #f3f3f3;width: 16.66667%; <?php echo $bottom_border; ?>"><?php echo $value->description; ?></td>
					<td style = "border-right: 1px solid #f3f3f3;width: 16.66667%; <?php echo $bottom_border; ?>"><?php echo $value->price; ?></td>
					<td style = "width: 16.66667%; <?php echo $bottom_border; ?>"><?php echo $value->color; ?></td>
				</tr>

		<?php
				}
			}
		?>
	</tbody>
</table>