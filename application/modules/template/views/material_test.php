<!DOCTYPE html>
<html>
<head>
	<title>ZEROCORP SHOP</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans|Cabin|Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>custom/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>custom/custom.css">
	<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<script src="<?php echo ASSETS_URL; ?>custom/modernizr.js" type="text/javascript"></script>
	<script type="text/javascript" src = "https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<style type="text/css">
	.input-field input
	{
		font-size: 12px;
	}
	.input-field label
	{
		font-size: 12px;
	}
</style>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class = "nav-on-left">
	<div class = "top-nav">
		<div class = "">
			<ul class = "hide-on-med-and-down">
				<li class = ""><a href="#">MY ACCOUNT</a></li>
				<li><a href = "#">MY WISHLIST (0)</a></li>
				<li><a href = "#">CHECKOUT</a></li>
				<li><?php if(!$this->session->userdata('is_logged_in')){?><a href = "<?php echo base_url(); ?>user/login">LOGIN OR REGISTER</a><?php } else { ?>Welcome back, <a href = "<?php echo base_url(); ?>user/user_account/<?php echo $this->session->userdata('customer_id');?>">LOGOUT<!-- <?php echo $this->session->userdata('customer_id'); ?> --></a><?php } ?></li>
			</ul>

			<div class = "top-nav-right">
				<div id="mini-cart" class="dropdown">

				<span class="dropdown-toggle hide-below-768" title="You have no items in your shopping cart.">
					<span class="my-bag">MY BAG: </span>
					<a class="summary" href="javascript:void(0)" title="View all items in your shopping cart"><span class="amount"><span>1 ITEM(S)</span></span></a>
				</span>
				<span class="dropdown-toggle show-below-768" title="View Cart">
					<a class="summary" href="javascript:void(0)" title="View all items in your shopping cart">
					<span class="subtotal">
						<span class="price">$162.00</span>
					</span>
					</a>
				</span>

				<div class="dropdown-menu" style="display: none;">
				<div class="empty">You have no items in your shopping cart.</div>
				</div>

				</div>
			</div>
		</div>
	</div>
	<header class="cd-main-header">
		<a class="cd-logo" href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS_URL; ?>custom/api_logo.png" alt="Logo"></a>

		<ul class="cd-header-buttons">
			<li><a class="cd-search-trigger" href="#cd-search">Search<span></span></a></li>
			<li><a class="cd-nav-trigger" href="#cd-primary-nav">Menu<span></span></a></li>
		</ul> <!-- cd-header-buttons -->
	</header>
	<main class="cd-main-content">
		<?php $this->load->view($content_view); ?>
		<!-- footer -->
		<footer class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Zerotech Shop</h5>
						<p class="grey-text text-lighten-4">Zerotech shop is pleased to have you onboard. We offer the best in latest technology and want the best for our customers</p>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text">SITEMAP</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Shopping Cart</a></li>
						</ul>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text">Social media</h5>
						<ul class="share-buttons">
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img src="<?php echo ASSETS_URL; ?>images/flat_web_icon_set/color/Facebook.png"></a></li>
							<li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img src="<?php echo ASSETS_URL; ?>images/flat_web_icon_set/color/Twitter.png"></a></li>
							<li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img src="<?php echo ASSETS_URL; ?>images/flat_web_icon_set/color/Google+.png"></a></li>
							<li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it"><img src="<?php echo ASSETS_URL; ?>images/flat_web_icon_set/color/Pinterest.png"></a></li>
							<li><a href="mailto:?subject=&body=:%20" target="_blank" title="Email"><img src="<?php echo ASSETS_URL; ?>images/flat_web_icon_set/color/Email.png"></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					&copy;&nbsp;<?php echo date("Y");?> Zerocorp Inc.

					<p class = "right">
						<img src="https://www.merchantequip.com/image/?logos=v|m|d|p|g|me|az|wu|vbv|msc&height=32" alt="Merchant Equipment Store Credit Card Logos" />
					</p>
				</div>
			</div>
		</footer>
		<!-- footer -->
		<div class="cd-overlay"></div>
	</main>
	<?php
		if (isset($outside_main)) {
			$this->load->view($outside_main);
		}
	?>
	<nav class="cd-nav">
		<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
			<li><a href="<?php echo base_url(); ?>" class = "selected">Home</a></li>
			<li class="has-children">
				<a href="#0">Computers</a>
	 
				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					<li class="see-all"><a href="#0">All Computers</a></li>
					<li class="has-children">
						<a href="#0">Sub Categories</a>
	 
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Computers</a></li>
							<li class="see-all"><a href="#0">All Sub Categories</a></li>
							<li><a href="#0">Laptops</a></li>
							<li><a href="#0">Desktops</a></li>
							<li><a href="#0">All-in-ones</a></li>
							<li><a href="#0">Monitors</a></li>
						</ul>
					</li>
	 
					<li class="has-children">
						<a href="#0">Brands</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Brands</a></li>
							<li class="see-all"><a href="#0">All Brands</a></li>
							<li><a href="#0">HP</a></li>
							<li><a href="#0">Lenovo</a></li>
							<li><a href="#0">Toshiba</a></li>
							<li><a href="#0">Acer</a></li>
							<li><a href="#0">Asus</a></li>
							<li><a href="#0">Macbook</a></li>
							<li><a href="#0">iMac</a></li>
						</ul>
					</li>
					<li class="has-children">
						<a href="#0">Latest Products</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/imac.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Apple iMac 2015</span><span class = "cd-nav-item-price">Ksh. 150000</span></h3>
						</a>
					</li>

					<li class="has-children">
						<a href="#0">Recommended</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/macbook.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">MacBook pro 2015</span><span class = "cd-nav-item-price">Ksh. 115000</span></h3>
						</a>
					</li>
				</ul>
			</li>
			<li class="has-children">
				<a href="#0">Accessories</a>
	 
				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Menu</a></li>
					<li class="see-all"><a href="#0">All Accessories</a></li>
					<li class="has-children">
						<a href="#0">Accessories</a>
	 
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Accessories</a></li>
							<li class="see-all"><a href="#0">All Accessories</a></li>
							<li><a href="#0">Headphones and Earphones</a></li>
							<li><a href="#0">Mouse</a></li>
							<li><a href="#0">Keyboards</a></li>
							<li><a href="#0">Speakers</a></li>
						</ul>
					</li>
	 
					<li class="has-children">
						<a href="#0">Brands</a>
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Brands</a></li>
							<li class="see-all"><a href="#0">All Brands</a></li>
							<li><a href="#0">Skull Candy</a></li>
							<li><a href="#0">Beats byDre</a></li>
							<li><a href="#0">Panasonic</a></li>
							<li><a href="#0">Digitek</a></li>
							<li><a href="#0">HP</a></li>
							<li><a href="#0">Nokia</a></li>
							<li><a href="#0">Samsung</a></li>
						</ul>
					</li>
					<li class = "has-children">
						<a href="#0">Latest Products</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/aiaiai.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Aiaiai Ghost 2000</span><span class = "cd-nav-item-price">Ksh. 7000</span></h3>
						</a>
					</li>
					<li class = "has-children">
						<a href="#0">Most Viewed</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/targus.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Targus keyboard</span><span class = "cd-nav-item-price">Ksh. 1000</span></h3>
						</a>
					</li>
				</ul>
			</li>
			<li class="has-children">
				<a href="#0">Cameras</a>
	 
				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Cameras</a></li>
					<li class="see-all"><a href="#0">All Cameras</a></li>
					<li class="has-children">
						<a href="#0">Cameras</a>
	 
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Cameras</a></li>
							<li class="see-all"><a href="#0">All Cameras</a></li>
							<li><a href="#0">Video Cameras</a></li>
							<li><a href="#0">Photography Cameras</a></li>
							<li><a href="#0">Webcams</a></li>
							<li><a href="#0">Lenses</a></li>
						</ul>
					</li>
	 
					<li class="has-children">
						<a href="#0">Brands</a>

						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Brands</a></li>
							<li class="see-all"><a href="#0">All Brands</a></li>
							<li><a href="#0">Nikon</a></li>
							<li><a href="#0">Canon</a></li>
							<li><a href="#0">Kodak</a></li>
							<li><a href="#0">Samsung</a></li>
							<li><a href="#0">Sony</a></li>
							<li><a href="#0">Panasonic</a></li>
							<li><a href="#0">LG</a></li>
						</ul>
					</li>
					<li class="has-children">
						<a href="#0">Latest Products</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/mikon.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Nikon Camera</span><span class = "cd-nav-item-price">Ksh. 60000</span></h3>
						</a>
					</li>
					<li class="has-children">
						<a href="#0">Most Viewed</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/panasonic.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Panasonic Video Camera</span><span class = "cd-nav-item-price">Ksh. 300000</span></h3>
						</a>
					</li>
				</ul>
			</li>
	 
			<li class="has-children">
				<a href="#0">Phones</a>

				<ul class="cd-secondary-nav is-hidden">
					<li class="go-back"><a href="#0">Phones</a></li>
					<li class="see-all"><a href="#0">All Phones</a></li>
					<li class="has-children">
						<a href = "#">Brands</a>
						<ul class="is-hidden">
							<li class="go-back"><a href="#0">Brands</a></li>
							<li class="see-all"><a href="#0">All Brands</a></li>
							<li><a href="#0">Samsung</a></li>
							<li><a href="#0">iPhone</a></li>
							<li><a href="#0">Xiaomi</a></li>
							<li><a href="#0">Google Nexus</a></li>
							<li><a href="#0">HTC</a></li>
							<li><a href="#0">Sony Xperia</a></li>
							<li><a href="#0">Motorolla</a></li>
							<li><a href="#0">LG</a></li>
							<li><a href="#0">Huawei</a></li>
						</ul></li>
					<li class="has-children">
						<a href="#0">Latest Product</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/s6-edge.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Samsung S6 Edge</span><span class = "cd-nav-item-price">Ksh. 90000</span></h3>
						</a>
					</li>

					<li class="has-children">
						<a href="#0">Most Viewed</a>

						<a class="cd-nav-item" href="#">
							<img src="<?php echo ASSETS_URL; ?>product_images/mi4.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Xiaomi Mi 4</span><span class = "cd-nav-item-price">Ksh. 34000</span></h3>
						</a>
					</li>

					<li class="has-children">
						<a href="#0">Offer</a>

						<a class="cd-nav-item" href="#">
							<div class = "offer-label"><p>60% off</p></div>
							<img src="<?php echo ASSETS_URL; ?>product_images/lumia-1020.jpg" alt="Product Image">
							<h3><span class = "cd-nav-item-name">Nokia Lumia 1020</span><span class = "cd-nav-item-price">Ksh. 30000</span></h3>
						</a>
					</li>
				</ul>
			</li>
	 
			<li><a href="<?php echo base_url(); ?>index.php/about">About Us</a></li>

			<li><a href="<?php echo base_url(); ?>index.php/contact">Contact Us</a></li>
		</ul> <!-- primary-nav -->
	</nav> <!-- cd-nav -->
	<div id="cd-search" class="cd-search" style = "margin-top: 48px;overflow: hidden;">
		<form>
			<input type="search" placeholder="Search...">
		</form>
	</div>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<script src="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.carousel.js"></script>
	<script src="<?php echo ASSETS_URL; ?>custom/jquery.mobile.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_URL; ?>custom/main.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#owl-example").owlCarousel({
				navigation : true, // Show next and prev buttons
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem:true,
				navigationText: ["<i class = 'fa fa-angle-left'></i>", "<i class = 'fa fa-angle-right'></i>"],
				pagination: false
			});

			$("#owl-demo").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds

				items : 4,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]

			});

			$("#brands-slider").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds

				items : 6,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]

			});
		});
	</script>
</body>
</html>