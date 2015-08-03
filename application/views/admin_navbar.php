<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo ASSETS_URL;?>backend/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php $username = 'Admin';echo $username;?></strong>
                             </span> <span class="text-muted text-xs block"><?php $user_type = 'Admin';echo $user_type;?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            ZT
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url();?>admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url();?>products/add">Add Products</a></li>
                            <li><a href="ecommerce_product_list.html">Products list</a></li>
                            <li><a href="ecommerce_product.html">Product edit</a></li>
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </nav>