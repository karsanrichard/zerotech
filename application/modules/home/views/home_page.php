<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-9">
                <!-- Home slide -->
                <div class="block block-slider">
                    <ul class="home-slider kt-bxslider">
                       <li><img src="<?php echo ASSETS_URL; ?>images/slider/s6.jpg" alt="Slider"></li>
                       <li><img src="<?php echo ASSETS_URL; ?>images/slider/macbook.jpg" alt="Slider"></li>
                        <li><img src="<?php echo ASSETS_URL; ?>images/slider/apple_watch.jpg" alt="Slider"></li>
                    </ul>
                </div>
                <!-- ./Home slide -->
                <div class="row">
                    <div class="col-md-12 col-lg-4" style = "height: 428px;">
                        <!-- block-shop-features -->
                        <div class="block block-shop-features">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?php echo ASSETS_URL; ?>frontend/data/shop-features-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">shop</div>
                                    <div class="block-title-text text-lg">features</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <ul class="list-banner">
                                    <li class="banner-hover"><a href="#"><img src="<?php echo ASSETS_URL; ?>images/offer.png" alt="Banner"></a></li>
                                    <li class="banner-hover"><a href="#"><img src="<?php echo ASSETS_URL; ?>images/variety.png" alt="Banner"></a></li>
                                    <li class="banner-hover"><a href="#"><img src="<?php echo ASSETS_URL; ?>images/anyone.png" alt="Banner"></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./block-shop-features-->
                    </div>
                    <div class="col-md-12 col-lg-8" style = "height: 428px;">
                        <!-- block-offers -->
                        <div class="block block-offers">
                            <div class="block-head">
                                <div class="block-title">
                                    <div class="block-icon">
                                        <img src="<?php echo ASSETS_URL; ?>frontend/data/offers-icon.png" alt="store icon">
                                    </div>
                                    <div class="block-title-text text-sm">today's</div>
                                    <div class="block-title-text text-lg">offers</div>
                                </div>
                            </div>
                            <div class="block-inner">
                                <ul class="products kt-owl-carousel" data-margin="0" data-loop="true"  data-nav="true" data-responsive='{"0":{"items":2},"600":{"items":2},"1000":{"items":2}}'>
                                    <?php echo $offer_slider;?>
                                </ul>
                            </div>
                        </div>
                        <!-- block-offers -->
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-3">
                <!-- block category -->
                <div class="block block-category">
                    <div class="block-head">
                        <ul class="nav-tab">
                            <li class="active"><a data-toggle="tab" href="#tab-categories">categories</a></li>
                            <li><a data-toggle="tab" href="#tab-guarantee">GUARANTEE</a></li>
                        </ul>
                    </div>
                    <div class="block-inner">
                        <div class="tab-container">
                            <div id="tab-categories" class="tab-panel active">
                                <ul class="categories">
                                    <?php echo $category_listing; ?>
                                </ul>
                            </div>
                            <div id="tab-guarantee" class="tab-panel">
                                <div class="block-guarantee">
                                    <h5>
                                        <span>THE OFFICIAL ZEROCORP SHOP GUARANTEE</span>
                                    </h5>
                                    <ul>
                                        <li><a href="#">Free Shipping Every Day</a></li>
                                        <li><a href="#">Earn VIP Rewards</a></li>
                                        <li><a href="#">Dedicated FamiShop Experts</a></li>
                                        <li><a href="#">Order Missing Pieces</a></li>
                                    </ul>
                                    <a href="#" class="button-radius">Learn more<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./block category -->
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
                        <ul class="products kt-owl-carousel" data-items="1" data-autoplay="true" data-loop="true" data-nav="true">
                            <?php echo $offer_slider_right; ?>
                        </ul>
                    </div>
                </div>
                <!-- block  top sellers -->
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <!-- block  host deals -->
        <div class="block block-hot-deals">
            <div class="block-head">
                <div class="block-title">
                    <div class="block-icon">
                        <img src="<?php echo ASSETS_URL; ?>frontend/data/offers-icon.png" alt="store icon">
                    </div>
                    <div class="block-title-text text-sm">latest</div>
                    <div class="block-title-text text-lg">products</div>
                </div>
                <div class="block-countdownt">
                    <span class="countdown-lastest" data-y="2016" data-m="10" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                </div>
            </div>
            <div class="block-inner">
                <ul class="products kt-owl-carousel" data-margin="20" data-loop="true" data-nav="true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                    <?php echo $lastest_products; ?>
                </ul>
            </div>
        </div>
        <!-- ./block hot deals -->
    </div>
    <!--Block banner -->
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="block block-banner banner-hover">
                    <a href="#"><img src="<?php echo ASSETS_URL; ?>images/headphones.png" alt="Banner"></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="block block-banner banner-hover">
                    <a href="#"><img src="<?php echo ASSETS_URL; ?>images/money.png" alt="Banner"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Block banner -->
    <!-- block-popular-cat--> 
    <!-- ./block-popular-cat-->
</div>