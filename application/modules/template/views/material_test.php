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
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>custom/custom.css">
	<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.theme.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class = "top-nav">
		<div class = "container">
			<ul class = "hide-on-med-and-down">
				<li class = ""><a href="#">MY ACCOUNT</a></li>
				<li><a href = "#">MY WISHLIST (0)</a></li>
				<li><a href = "#">CHECKOUT</a></li>
				<li><a href = "<?php echo base_url(); ?>user/login">LOGIN OR REGISTER</a></li>
			</ul>

			<div class = "top-nav-right">
				<div id="mini-cart" class="dropdown">

				<span class="dropdown-toggle hide-below-768" title="You have no items in your shopping cart.">

				<span class="my-bag">MY BAG: </span>
				<span class="empty">0 ITEM(S)</span>

				</span>

				<span class="dropdown-toggle show-below-768" title="You have no items in your shopping cart.">

				<span class="empty"><span class="price">Ksh. 0.00</span></span>

				</span>

				<div class="dropdown-menu" style="display: none;">
				<div class="empty">You have no items in your shopping cart.</div>
				</div>

				</div>
			</div>
		</div>
	</div>
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo"><img src = "<?php echo ASSETS_URL; ?>custom/api_logo.png"/></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li class = "active"><a href="<?php echo base_url(); ?>">HOME</a></li>
				<li><a href="#">COMPUTERS</a></li>
				<li><a href="#">MOBILE PHONES</a></li>
				<li><a href="#">ACCESSORIES</a></li>
				<li><a href="#">CAMERAS</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">CONTACT US</a></li>
			</ul>
		</div>
	</nav>

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
	<script type="text/javascript" src = "https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<script src="<?php echo ASSETS_URL; ?>owl.carousel/owl-carousel/owl.carousel.js"></script>
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