<script src="<?php echo ASSETS_URL ?>product/js/modernizr.js"></script> <!-- Modernizr -->
<style type="text/css">
	.cd-main-content
	{
		min-height: 0;
	}

	
</style>
<section class="cd-single-item">
	<div class="cd-slider-wrapper">
		<ul class="cd-slider">
			<li class="selected"><img src="<?php echo $product_details->cover_image; ?>" alt="Product Image 1"></li>
			<li><img src="<?php echo ASSETS_URL ?>product/img/img-2.jpg" alt="Product Image 1"></li>
			<li><img src="<?php echo ASSETS_URL ?>product/img/img-3.jpg" alt="Product Image 2"></li>
		</ul> <!-- cd-slider -->

		<ul class="cd-slider-navigation">
			<li><a href="#0" class="cd-prev inactive">Next</a></li>
			<li><a href="#0" class="cd-next">Prev</a></li>
		</ul> <!-- cd-slider-navigation -->

		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-slider-wrapper -->

	<div class="cd-item-info">
		<h2><?php echo $product_details->product_name; ?></h2>

		<p>Price: <?php echo $product_details->price;?></p>
		<p>Color: <?php echo $product_details->color;?></p>
		<form method = "POST" action = "<?php echo base_url(); ?>shop/addtocart">
			<p>No of Items: <input type = "number" name = "no_items"></p>
			<input type = "hidden" name = "product_id" value="<?php echo $product_details->product_id; ?>" />
			<button class="add-to-cart">Add to cart</button>
		</form>						
	</div> <!-- cd-item-info -->
</section> <!-- cd-single-item -->

<section class="cd-content">
	<p>
		<?php echo $product_details->description; ?>
	</p>
</section>
<script src="<?php echo ASSETS_URL ?>product/js/jquery.mobile.min.js"></script>
<script src="<?php echo ASSETS_URL ?>product/js/main.js"></script> <!-- Resource jQuery -->