<div class = "container">
	<div class = "row">
		<h3 class="page-title">
			<span><?php echo $category_details->category_name; ?></span>
			<a href="#" class="button-radius compare-link">Compare (0)<span class="icon"></span></a>
		</h3>

		<div class="sortPagiBar">
				<ul class="display-product-option">
                    <li class="view-as-grid">
                        <span>grid</span>
                    </li>
                    <li class="view-as-list selected">
                        <span>list</span>
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
	                    	<option value="1">Show 6</option>
	                    	<option value="1">Show 12</option>
	                    </select>
                    </div>
                    
                    <div class="sort-product">
                    	<select>
	                    	<option value="1">Postion</option>
	                    	<option value="1">Product name</option>
	                    </select>
	                    <div class="icon"><i class="fa fa-sort-alpha-asc"></i></div>
                    </div>
				</div>
			</div>

			<div class="category-products">
				<ul class="products list row">
					<?php echo $product_listing; ?>
				</ul>
			</div>
	</div>
</div>