<div class="order-detail-content">
    <table class="cart_summary">
        <thead>
            <tr>
                <th class="cart_product">Product</th>
                <th>Description</th>
                <th>Avail.</th>
                <th>Unit price</th>
                <th>Qty</th>
                <th>Total</th>
                <th class="action"><i class="fa fa-trash-o"></i></th>
            </tr>
        </thead>
        <tbody>
        	<?php
				if ($this->cart->contents()) {
					$counter = 0;
					foreach ($this->cart->contents() as $key => $value) {
						$counter++;
			?>
            <tr>
                <td class="cart_product">
                    <a href="#"><img class="img-responsive" src="<?php echo $this->cart->product_options($key)['cover_image']; ?>" alt="<?php echo $value['name']; ?>"></a>
                </td>
                <td class="cart_description">
                    <p class="product-name"><a href="#"><?php echo $value['name']; ?> </a></p>
                    <small class="cart_ref">SKU : #<?php echo $key; ?></small><br>
                    <small><a href="#">Color : <?php echo $value['name']; ?></a></small><br>
                </td>
                <td class="cart_avail"><span class="label label-success">In stock</span></td>
                <td class="price"><span>Ksh. <?php echo $value['price']; ?></span></td>
                <td class="qty">
                    <input class="form-control input-sm" type="text" value="<?php echo $value['qty']; ?>">
                    <a href="#"><i class="fa fa-caret-up"></i></a>
                    <a href="#"><i class="fa fa-caret-down"></i></a>
                </td>
                <td class="price">
                    <span><?php echo $value['qty'] * $value['price']; ?></span>
                </td>
                <td class="action">
                    <a href="#">Delete item</a>
                </td>
            </tr>
            <?php }} else {?>
			<?php } ?>
        </tbody>
        <tfoot>
           
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="3"><strong>Ksh. <?php echo $this->cart->total(); ?></strong></td>
            </tr>
        </tfoot>    
    </table>
    <div class="cart_navigation">
        <a class="button" href="<?php echo base_url(); ?>"><i class="fa fa-angle-left"></i> Continue shopping </a>
        <a class="button pull-right" href="<?php echo base_url(); ?>shop/authentication">Proceed to checkout <i class="fa fa-angle-right"></i></a>
    </div>
</div>