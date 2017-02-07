<!-- This is the products part of the view on the website for the Shopping Cart Tutorial. The tutorial can be
found here:- https://code.tutsplus.com/articles/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187 -->

<ul class="products">
    <?php foreach($products as $p): ?>
    <li>
        <h3><?php echo $p['name']; ?></h3>
        <div  id = "imgSize">
            <img src="<?php echo base_url(); ?>application/assets/img/products/<?php echo $p['image']; ?>" width="100%" alt=""/>
        </div>
        <small>&euro;<?php echo $p['price']; ?></small>
        <?php echo form_open('ShoppingCartCon/Cart/add_cart_item'); ?>
            <fieldset>
                <label>Quantity</label>
                <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                <?php echo form_hidden('product_id', $p['id']); ?>
                <?php echo form_submit('add', 'Add'); ?>
            </fieldset>
        <?php echo form_close(); ?>
    </li>
    <?php endforeach;?>
</ul>
