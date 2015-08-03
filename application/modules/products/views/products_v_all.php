        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <!-- <a>Products</a> -->
                        <strong>Products</strong>
                    </li>
                    <li class="active">
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row col-md-12">
            <?php $counter = 0; foreach ($product_data as $products): $counter=$counter+1;?>
                <?php if($counter % 4 == 0): echo '<div class="row">';endif; ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ PHOTO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    <?php echo 'Ksh '.$products['price']; ?>
                                </span>
                                <small class="text-muted">
                                    <?php echo 'Ksh '.$products['category_name']; ?>
                                </small>
                                <a href="#" class="product-name"> 
                                    <?php echo $products['product_name']; ?>
                                </a>



                                <div class="small m-t-xs">
                                    <?php echo $products['description']; ?>
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($counter % 4 == 0): echo '</div>';endif; ?>
            <?php endforeach; ?>
            </div>

        </div>