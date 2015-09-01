<style type="text/css">
    .list2-product .product
    {
        width: 100%;
    }

    .check-box-list li ul
    {
        margin-left: 20px;
    }

    li.view-as-list-2.selected
    {
        color: #fff;
        background-color: #5a88ca !important;
    }
</style>
<div class = "container">
	<div class = "row">
        <div class = "products-contained-sidebar">
            <div class="block block-sidebar">
                        <div class="block-head">
                            <h5 class="widget-title">Catalog</h5>
                        </div>
                        <div class="block-inner">
                            <div class="block-filter">
                                <div class="block-sub-title">Categories</div>
                                <div class="block-filter-inner">
                                    <ul class="check-box-list">
                                        <?php echo $category_list; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter">
                                <div class="block-sub-title">Price</div>
                                <div class="block-filter-inner">
                                    <div class="amount-range-price">Range: $50 - $350</div>
                                    <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                                </div>
                            </div>
                            <div class="block-filter">
                                <div class="block-sub-title">Brands</div>
                                <div class="block-filter-inner">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="m1" name="cc">
                                            <label for="m1">
                                            <span class="button"></span>
                                            Fashion Manufacturer<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="m2" name="cc">
                                            <label for="m2">
                                            <span class="button"></span>
                                            Electronis <span class="count">(10)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter">
                                <div class="block-sub-title">Properties</div>
                                <div class="block-filter-inner">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="p1" name="cc">
                                            <label for="p1">
                                            <span class="button"></span>
                                            Midi Dress<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p2" name="cc">
                                            <label for="p2">
                                            <span class="button"></span>
                                            Short Dress <span class="count">(10)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter">
                                <div class="block-sub-title">AVAILABILITY</div>
                                <div class="block-filter-inner">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="a1" name="cc">
                                            <label for="a1">
                                            <span class="button"></span>
                                            In stock<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="a2" name="cc">
                                            <label for="a2">
                                            <span class="button"></span>
                                            Not available <span class="count">(10)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class = "products-contained">
    		<h3 class="page-title">
    			<span><?php echo $category_details->category_name; ?></span>
    			<a href="#" class="button-radius compare-link">Compare (0)<span class="icon"></span></a>
    		</h3>

    		<div class="sortPagiBar">
    				<ul class="display-product-option">
                        <li class="view-as-grid selected" data-type = "grid">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list" data-type = "list">
                            <span>list(2 columns)</span>
                        </li>
                        <li class = "view-as-list-2" data-type = "list_one_column" style="width: 30px;height: 30px;display: block;float: left;cursor: pointer;text-align: center;background-color: #f9f9f9;border:2px solid #f3f3f3;">
                            <i class = "fa fa-list" style = "line-height: 30px;"></i>
                        </li>
                    </ul>
    				<div class="sortPagiBar-inner">
    					<nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next »</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                        <div class="show-product-item">
                        	<select class="">
    	                    	<option value="6">Show 6</option>
    	                    	<option value="12">Show 12</option>
    	                    </select>
                        </div>
                        
                        <div class="sort-product">
                        	<select id = "sorter">
    	                    	<option value="product_id ASC">Latest</option>
    	                    	<option value="product_name ASC">Product name (A-Z)</option>
                                <option value="product_name DESC">Product name (Z-A)</option>
    	                    </select>
    	                    <div class="icon"><i class="fa fa-sort-alpha-asc"></i></div>
                        </div>

                        <div class="sort-product">
                            <select id = "export">
                                <option value="<?php echo base_url(); ?>products/export/pdf/category/<?php echo $category_id; ?>">Export PDF</option>
                                <option value="<?php echo base_url(); ?>products/export/excel/category/<?php echo $category_id; ?>">Export EXCEL</option>
                            </select>
                            <div class="icon"><i class="fa fa-sort-alpha-asc"></i></div>
                        </div>
    				</div>
    			</div>

    			<div class="category-products">
    				<ul class="products list row">
    					<?php //echo $product_listing; ?>
    				</ul>
    			</div>
	   </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.products-contained-sidebar').hide();
        category_id = "<?php echo $category_id; ?>";
        get_product_listing(category_id);
        $('#sorter').change(function(){
            get_product_listing(category_id);
        });
    });

    $('.display-product-option li').click(function(){
        $('ul.products').removeClass("list");
        $('ul.products').removeClass("row");
        $('.display-product-option li').removeClass("selected");
        $(this).addClass("selected");
        if($(this).attr('data-type') == "list")
        {
            $('ul.products').addClass("list");
            $('ul.products').addClass("row");
            $('.products-contained').removeClass("col-xs-12 col-sm-8 col-md-9");
            $('.products-contained-sidebar').removeClass("col-xs-12");
            $('.products-contained-sidebar').removeClass("col-sm-4");
            $('.products-contained-sidebar').removeClass("col-md-3");
            $('.products-contained-sidebar').hide();
        }
        else if($(this).attr('data-type') == "list_one_column")
        {
            $('ul.products').addClass("list");
            $('.products-contained').addClass("col-xs-12 col-sm-8 col-md-9");
            $('.products-contained-sidebar').addClass("col-xs-12");
            $('.products-contained-sidebar').addClass("col-sm-4");
            $('.products-contained-sidebar').addClass("col-md-3");
            $('.products-contained-sidebar').show();
        }
        else
        {
            $('ul.products').addClass("row");   
            $('.products-contained').removeClass("col-xs-12 col-sm-8 col-md-9");
            $('.products-contained-sidebar').removeClass("col-xs-12");
            $('.products-contained-sidebar').removeClass("col-sm-4");
            $('.products-contained-sidebar').removeClass("col-md-3");
            $('.products-contained-sidebar').hide();
        }
        get_product_listing(category_id);
    });
    function get_product_listing(category_id)
    {
        listing_type = $('.display-product-option li.selected').attr('data-type');
        sorter = $('#sorter').val();
        url = "<?php echo base_url(); ?>products/create_products_listing/"+listing_type + "/" + category_id + "/ajax/" + sorter;

        var request = $.ajax({
            url: url,
            method: "GET"
        });

        request.done(function(data){
            $('ul.products').html(data);
        });
    }

    $('#export').change(function(){
        window.location.assign($(this).val());
    });
</script>