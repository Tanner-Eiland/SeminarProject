<?php include("view/header.php") ?>


    
    <?php if(($check_failed == true)) { ?> <h2 style="color:red;"> Some items previously in your cart have been removed because they are now Out of Stock. </h2> <?php } ?>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Quality</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php static $subtotal = 0; ?> 
                <?php foreach( $items as $item) : ?>
                    <?php foreach( $inventory as $inv) : 
                        if($inv['ID'] == $item['item_id']) {
                            $this_item = check_inventory($item['item_id'], $item['quantity'], $item['size']);
                        ?>
                        
                <tr>
                    <td><img src=<?= $inv['image'] ?> alt=""></td>
                    <td><?= $inv['name'] ?></td>
                    <td><?= $this_item[0]['size'] ?></td>
                    <td>$<?= $this_item[0]['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= $inv['price'] * $item['quantity'] ?></td>
                </tr>
                        <?php $subtotal +=($inv['price'] * $item['quantity']); ?>
                        <?php } ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Card Information / Shipping Address</h3>
            <div>
                <input type="text" placeholder="Card Information">
                <input type="text" placeholder="Shipping Information">
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$ <?= $subtotal ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <!-- eventuially add shipping options with a shipping variable -->
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <!-- eventuially needs to be subtotal + shipping variable above -->
                    <td><strong>$ <?= $subtotal ?></strong></td>
                </tr>
            </table>
            <button class="normal" onclick="location.href = '.?action=ordered';" >Finish Order</button>
        </div>
    </section>

    <?php include("view/footer.php") ?>