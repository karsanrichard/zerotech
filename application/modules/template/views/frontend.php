<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?> | Zerotech Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/css/global.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>frontend/assets/css/responsive.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .block-shop-features ul li
        {
            margin-bottom: 0;
        }

        .block-category
        {
            height: 490px !important;
            overflow: auto;
        }
    </style>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/jquery/jquery-1.11.2.min.js"></script>
</head>
<body>

<!-- header -->
    <header id="header">
        <!-- Top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <ul class="top-bar-link top-bar-link-left">
                        <li><i class="fa fa-phone"></i> Call us: +254 725 160 399</li>
                        <li><i class="fa fa-exchange"></i> 30 Days Exchange Policy</li>
                    </ul>
                    <ul class="top-bar-link top-bar-link-right dot">
                        <li><a href="<?php echo base_url(); ?>user/login">My Account</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="<?php echo base_url(); ?>user/login">Login</a></li>
                        <li><a href="#">Compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Top bar -->
        <div class="container">
            <!-- box header -->
            <div class="row">
                <div class="box-header">
                    <div class="col-sm-12 col-md-12 col-lg-3"></div>
                    <div class="block-wrap-search col-sm-6 col-md-6 col-lg-5">
                        <div class="advanced-search box-radius">
                            <form class="form-inline" action="<?php echo base_url(); ?>products/search">
                                <div class="form-group search-category">
                                    <select id="category-select" class="search-category-select">
                                        <option value="all">All Categories</option>
                                        <?php echo $category_listing_select; ?>
                                    </select>
                                </div>
                                <div class="form-group search-input">
                                    <input type="text" placeholder="What are you looking for?" name = "search_parameter">
                                </div>
                                <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="wrap-block-cl col-sm-3 col-md-3 col-lg-2">
                        <div class="inner-cl box-radius">
                            <div class="dropdown language">
                              <a data-toggle="dropdown" role="button"><img src="<?php echo ASSETS_URL; ?>frontend/data/en.jpg" alt="languae1"></a>
                              <ul class="dropdown-menu">
                                    <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/en.jpg" alt="languae2">English</a></li>
                              </ul>
                            </div>
                            <div class="dropdown currency">
                              <a data-toggle="dropdown" role="button">KSH</a>
                              <ul class="dropdown-menu">
                                    <li><a href="#">Ksh.</a></li>
                              </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-wrap-cart col-sm-3 col-md-3 col-lg-2">
                        <div class="iner-block-cart box-radius">
                            <a href="cart.html">
                                <span class="total">Ksh. 45, 900</span>
                            </a>
                        </div>
                        <div class="block-mini-cart">
                            <div class="mini-cart-content">
                            <h5 class="mini-cart-head">2 Items in my cart</h5>
                            <div class="mini-cart-list">
                                <ul>
                                    <li class="product-info">
                                        <div class="p-left">
                                            <a href="#" class="remove_link"></a>
                                            <a href="#">
                                            <img class="img-responsive" src="<?php echo ASSETS_URL; ?>frontend/data/p1.jpg" alt="Product">
                                            </a>
                                        </div>
                                        <div class="p-right">
                                            <p class="p-name">Lumia 625</p>
                                            <p class="product-price">Ksh. 25998</p>
                                            <p>Qty: 1</p>
                                        </div>
                                    </li>
                                    <li class="product-info">
                                        <div class="p-left">
                                            <a href="#" class="remove_link"></a>
                                            <a href="#">
                                            <img class="img-responsive" src="<?php echo ASSETS_URL; ?>frontend/data/p2.jpg" alt="Product">
                                            </a>
                                        </div>
                                        <div class="p-right">
                                            <p class="p-name">Samsung Galaxy S6</p>
                                            <p class="product-price">Ksh. 19902</p>
                                            <p>Qty: 1</p>
                                        </div>
                                    </li>
                                </ul>
                                </div>
                                <div class="toal-cart">
                                    <span>Total</span>
                                    <span class="toal-price pull-right">Ksh. 45, 900</span>
                                </div>
                                <div class="cart-buttons">
                                    <a href="checkout.html" class="button-radius btn-check-out">Checkout<span class="icon"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./box header -->
            <!-- main header -->
            <div class="row">
                <div class="main-header">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS_URL; ?>custom/api_logo2.png" alt="Logo" style = "width: 200px;height:70px;"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 main-header-banner">
                            <div class="herader-banner">
                                <ul class="list-banner">
                                    <li><div class="banner1"><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/option1/Picture1.png" alt="Banner"></a></div></li>
                                    <li><div class="banner1"><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/option1/Picture3.png" alt="Banner"></a></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./main header -->
        </div>
        <!-- main menu-->
        <div class="main-menu">
            <div class="container">
                <div class="row">
                    <nav class="navbar" id="main-menu">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                                    <?php echo $category_menu; ?>
                                    <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
                                    <li><a href="<?php echo base_url(); ?>contact">Contact us</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ./main menu-->
    </header>
    <!-- ./header -->

    <?php $this->load->view($content_view); ?>

    <!-- footer -->
    <footer id="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-md-7 col-sm-4 block-link-wapper">
                            <p class = "head">Who Are We?</p>
                        </div>
                        <div class="col-md-2 col-sm-4 block-link-wapper">
                            <div class="block-link">
                                <ul class="list-link">
                                    <li class="head"><a href="#">Buyer Central</a></li>
                                    <li><a href="#">Sign in</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Payment Options</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 block-link-wapper">
                            <div class="block-link">
                                <ul class="list-link flag">
                                    <li class="head"><a href="#">INTERNATIONAL SHOPPING</a></li>
                                    <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/flag1.png" alt="flang">Customer Support</a></li>
                                    <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/flag2.png" alt="flang">Canada</a></li>
                                    <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/flag3.png" alt="flang">Mexico</a></li>
                                    <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/flag4.png" alt="flang">United Kingdom</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-social">
            <div class="container">
                <div class="row">
                    <div class="block-social">
                        <ul class="list-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-pied-piper"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                    <div class="block-payment">
                        <ul class="list-logo">
                            <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/payment1.png" alt="Payment Logo"></a></li>
                            <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/payment2.png" alt="Payment Logo"></a></li>
                            <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/payment3.png" alt="Payment Logo"></a></li>
                            <li><a href="#"><img src="<?php echo ASSETS_URL; ?>frontend/data/payment4.png" alt="Payment Logo"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="block-coppyright">
                        © 2015 Zerocorp Shop All Rights Reserved.
                    </div>
                    <div class="block-shop-phone">
                        Shop by phone <strong>+254 725 160 399</strong>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ./footer -->
    <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/jquery-ui/jquery-ui.min.js"></script>
    <!-- COUNTDOWN -->
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/countdown/jquery.plugin.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/lib/countdown/jquery.countdown.js"></script>
    <!-- ./COUNTDOWN -->
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/js/jquery.actual.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL; ?>frontend/assets/js/script.js"></script>
</body>
</html>