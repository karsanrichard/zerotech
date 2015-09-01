<div class = "container">
	<div class="row">
				<div class="block block-breadcrumbs">
					<ul>
						<li class="home">
							<a href="#"><i class="fa fa-home"></i></a>
							<span></span>
						</li>
						<li>Cart</li>
					</ul>
				</div>
				<div class="main-page">
					<h1 class="page-title"><?php echo $cart_title; ?></h1>
					<div class="page-content page-order">
			            <ul class="step">
			                <li class="current-step" data-step = "summary"><span>01. Summary</span></li>
			                <li data-step = "login"><span>02. Sign in</span></li>
			                <li data-step = "details"><span>03. Details</span></li>
			                <li data-step = "payment"><span>04. Payment</span></li>
			            </ul>
			            <div class="heading-counter warning">Your shopping cart contains:
			                <span><?php echo count($this->cart->contents());?> Product(s)</span>
			            </div>
			            <?php $this->load->view($sub_view); ?>
			        </div>
				</div>
			</div>
		</div>