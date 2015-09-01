<style type="text/css">
	.box-qty span
	{
		cursor: pointer;
	}
</style>
<div class="row">
			<div class="row">
				<div class="col-sm-5">
					<div class="block block-product-image">
						<div class="product-image easyzoom easyzoom--overlay easyzoom--with-thumbnails">
							<a href="data/zoom/full.jpg">
								<img src="<?php echo $product_details->cover_image; ?>" alt="Product" width="450" height="450" />
							</a>
						</div>
						<div class="text">Hover on the image to zoom</div>
						<div class="product-list-thumb">
							<ul class="thumbnails kt-owl-carousel" data-margin="10" data-nav="true" data-responsive='{"0":{"items":2},"600":{"items":2},"1000":{"items":3}}'>\
								<?php echo $product_images_listing; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-12 col-md-7">
							<div class="block-product-info">
								<h2 class="product-name"><?php echo $product_details->product_name; ?></h2>
								<div class="price-box">
									<span class="product-price">Ksh. <?php echo $product_details->price; ?></span>
								</div>
								<div class="product-star">
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star-half-o"></i>
		                        </div>
		                        <div class="desc"><?php echo $product_details->description; ?></div>
		                        <div class = "desc">Category: <?php echo $category->category_name; ?><??></div>
								<div class="variations-box">
									<table class="variations-table">
										
										<tr>
											<td class="table-label">Qty</td>
											<td class="table-value">
												<div class="box-qty">
													<form method = "POST" action = "<?php echo base_url(); ?>shop/addtocart">
														<span class="quantity-minus">-</span>
														<input type="text" class="quantity" value="1" name = "no_items">
														<input type = "hidden" name = "product_id" value="<?php echo $product_details->product_id; ?>" />
														<span class="quantity-plus">+</span>

														<button class="button-radius btn-add-cart">Buy<span class="icon"></span></button>
													</form>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="box-control-button">
									<a class="link-wishlist" href="#">wishlist</a>
									<a class="link-compare" href="#">Compare</a>
									<a class="link-sendmail" href="#">Email to a Friend</a>
									<a class="link-print" href="#">Print</a>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-5">
							<!-- block  top sellers -->
							<div class="block block-top-sellers">
								<div class="block-head">
									<div class="block-title">
										<div class="block-icon">
											<img src="<?php echo ASSETS_URL; ?>frontend/data/top-seller-icon.png" alt="store icon">
										</div>
										<div class="block-title-text text-sm">top</div>
										<div class="block-title-text text-lg">SELLERS</div>
									</div>
								</div>
								<div class="block-inner">
									<ul class="products kt-owl-carousel" data-margin="10" data-items="1" data-autoplay="true" data-loop="true" data-nav="true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":1}}'>
										 <?php echo $offer_slider_right; ?>
									</ul>
								</div>
							</div>
							<!-- block  top sellers -->
						</div>
						
					</div>
				</div>
			</div>
		</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.quantity-plus').click(function(){
			addition_value = parseInt($('.quantity').val());
			new_value = addition_value += 1;
			$('.quantity').val(new_value);
		});

		$('.quantity-minus').click(function(){
			addition_value = parseInt($('.quantity').val());
			if(addition_value >= 2){new_value = addition_value -= 1};
			$('.quantity').val(new_value);
		});
	});
</script>